<?php
// reset_password.php
require_once 'chemin_vers_votre_fichier/PasswordReset.php';
require_once 'chemin_vers_votre_fichier/functions.php';

$passwordReset = new PasswordReset();
$emailOrPhone = $_POST['emailOrPhone'];

$resetCode = generateResetCode();

try {
    if ($passwordReset->sendResetCodeBySMS($emailOrPhone, $resetCode)) {
        echo 'Un code de réinitialisation a été envoyé à votre adresse e-mail ou votre numéro de téléphone.';
    } else {
        echo 'Erreur lors de l\'envoi du code de réinitialisation par SMS.';
    }
} catch (Exception $e) {
    echo 'Erreur Twilio: ' . $e->getMessage();
}

?>
