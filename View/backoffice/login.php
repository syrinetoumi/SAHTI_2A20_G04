
<?php
session_start();
require_once '../../Controller/userC.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST["role_u"];
    $email = $_POST["email_u"];
    $motdepasse = $_POST["mdp_u"];
    
    $userC = new UserC();
    $user = $userC->showUserByEmail($email);

    if ($user) {
        if ($user->getmdp_u() === $motdepasse) {
            if ($role == $user->getrole_u()) {
                $_SESSION['user_id'] = $user->getid_u();
                $_SESSION['user_role'] = $user->getrole_u();
                $_SESSION['user_email'] = $user->getemail_u();

                switch ($role) {
                    case "admin":
                        header("Location: admin.php");
                        break;
                    case "medecin":
                        header("Location: med.html");
                        break;
                    case "chauffeur":
                        header("Location: chauffeur.php");
                        break;
                    case "coach":
                        header("Location: coach.php");
                        break;
                    default:
                        // Redirection par défaut
                        break;
                }
                exit();
            } else {
                echo "Incorrect role for the user.";
            }
        } else {
            echo "Password is incorrect.";
        }
    } else {
        echo "Email not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page - Dashboard Admin Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../../asset/bakoffice/css/fontawesome.min.css">

    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../../asset/bakoffice/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../../asset/bakoffice/css/tooplate.css">
</head>

<body class="bg03">
    <div class="container">
        <div class="row tm-mt-big">
            <div class="col-12 mx-auto tm-login-col">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="logo">
                                <img src="../../asset/frontoffice/images/logo.png" class="imglogologin" alt="">
                           </div>
                            <h2 class="tm-block-title mt-3">Login</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="index.html" method="post" class="tm-login-form" id="login">
                                <div class="input-group">
                                    <label for="username" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom d'utilisateur</label>
                                    <input name="username" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="username" value="admin" required>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="password" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mot de passe</label>
                                    <input name="password" type="password" class="form-control validate" id="password" value="1234" required>
                                </div>
                                <div class="input-group mt-3">
                                    <button type="submit" class="btn btn-primary d-inline-block mx-auto">se connecter</button>
                                </div>
                                <div class="input-group mt-3">
                                    <p><em>.........</em></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light text-center">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2023/2024 Esprit école sup privée
                   <!-- <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>-->
                </p>
            </div>
        </footer>
    </div>
</body>

</html>