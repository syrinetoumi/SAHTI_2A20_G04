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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se Connecter</title>
</head>
<body>
    <div class="inscri">
        <header>Se connecter</header>
        <form method="post">
            <fieldset>
                <br/>

                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <br/><br/><br><br>

                <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                <br/><br/><br>

                <input type="submit" name="submit" id="submit" value="Se connecter">
            </fieldset>
        </form>
    </div>
</body>
</html>
