<?php
require_once 'password_reset_functions.php';

function generateResetCode() {
    return sprintf('%06d', mt_rand(0, 999999));
}

function sendResetCodeBySMS($emailOrPhone, $resetCode) {
    // Implémentation de l'envoi SMS avec Twilio ici
}





?>
