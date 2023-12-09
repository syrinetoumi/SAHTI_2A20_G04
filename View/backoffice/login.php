<?php
session_start();
require_once '../../Controller/userC.php';
require_once '../../Controller/Router.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email_u"];
    $motdepasse = $_POST["mdp_u"];

    $userC = new userC();
    $user = $userC->showUserByEmail($email);

    if ($user) {
        if (($motdepasse == $user->getmdp_u())) {
            $_SESSION['user_id'] = $user->getid_u();
            $_SESSION['user_role'] = $user->getrole_u();
            $_SESSION['user_email'] = $user->getemail_u();

            Router::redirect($user->getrole_u());
        } else {
            echo "Le mot de passe est incorrect.";
        }
    } else {
        echo "E-mail non trouvé.";
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
    <link rel="stylesheet" href="../../asset/backoffice/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/tooplate.css">  
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
                            <form method="post" class="tm-login-form" id="login">
                                <div class="input-group">
                                    <label for="email_u" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Email</label>
                                    <input name="email_u" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="username" placeholder="email admin" required>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="mdp_u" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mot de passe</label>
                                    <input name="mdp_u" type="password" class="form-control validate" id="mdp_u" placeholder="...." required>
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
<script src="../../asset/frontoffice/js/controle.js"></script>

</html>