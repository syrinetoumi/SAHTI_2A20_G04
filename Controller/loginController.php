<?php
// loginController.php
include 'config.php';
include 'Router.php';

$pdo = Config::getConnexion(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email_u"];
    $password = $_POST["mdp_u"];

    $query = $pdo->prepare("SELECT * FROM user WHERE email_u = ? AND mdp_u = ?");
    $query->execute([$email, $password]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $userRole = $user['role_u'];
        Router::redirect($userRole . '.html');
    } else {
        echo "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>
