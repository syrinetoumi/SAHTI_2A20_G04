<?php
require_once '../../vendor/autoload.php'; // Chemin vers le fichier autoload.php généré par Composer

use Twilio\Rest\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_phone = $_POST["email_or_phone"];

    // Générez le code de réinitialisation
    $code = rand(100000, 999999);

    // Intégration réelle avec Twilio pour envoyer un SMS
    if (sendSMS($email_or_phone, $code)) {
        echo "Un code de réinitialisation a été envoyé à votre adresse e-mail ou votre numéro de téléphone.";
    } else {
        echo "Erreur lors de l'envoi du code de réinitialisation par SMS.";
    }
}

function sendSMS($phone, $code) {
    // Remplacez ces informations par celles de votre compte Twilio
    $account_sid = 'votre_account_sid';
    $auth_token = 'votre_auth_token';
    $twilio_phone_number = 'votre_numéro_Twilio';

    // Créez un client Twilio
    $twilio = new Client($account_sid, $auth_token);

    // Envoyez le SMS
    try {
        $message = $twilio->messages->create(
            $phone, // Numéro de téléphone de destination
            [
                'from' => $twilio_phone_number,
                'body' => "Votre code de réinitialisation : $code",
            ]
        );

        // Retourne true pour indiquer que le SMS a été envoyé avec succès
        return true;
    } catch (Exception $e) {
        // En cas d'erreur, affichez le message d'erreur
        echo "Erreur Twilio: " . $e->getMessage();
        return false;
    }
}
?>
