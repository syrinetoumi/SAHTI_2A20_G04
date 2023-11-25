<?php
session_start();
require_once '../../Controller/userC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST["role_u"];
    $email = $_POST["email_u"];
    $motdepasse = $_POST["mdp_u"];
    
    $userC = new userC(); // Correction du nom de classe ici
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

                <input type="email" name="email_u" id="email_u" placeholder="email_u" required>
                <br/><br/><br><br>

                <input type="password" name="mdp_u" id="mdp_u" placeholder="mdp_u" required>
                <br/><br/><br>

                <!-- Ajout du champ "role_u" -->
                <label for="role_u">Rôle :</label>
                <select name="role_u" id="role_u" required>
                    <option value="admin">Admin</option>
                    <option value="medecin">Médecin</option>
                    <option value="chauffeur">Chauffeur</option>
                    <option value="coach">Coach</option>
                </select>

                <br/><br/>

                <input type="submit" name="submit" id="submit" value="Se connecter">
            </fieldset>
        </form>
    </div>
</body>
</html>
