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
        $_SESSION["user"] = [
            "id_u" => $user->getid_u(),
            "nom" => $user->getnom_u(),
            "email_u" => $user->getemail_u(),
            "role" => $user->getrole_u()
        ];

        if ($motdepasse == $user->getmdp_u()) {
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
<link rel="stylesheet" href="../../asset/frontoffice/css/form_style.css">
<script src="../../asset/frontoffice/js/controle.js"></script>
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
                <input type="submit" name="submit" id="submit" value="Se connecter">
                <a href="motdepasse_oublie.php">Mot de passe oublié ?</a>
            </fieldset>
        </form>
    </div>
</body>
