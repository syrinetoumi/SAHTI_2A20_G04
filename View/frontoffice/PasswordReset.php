<?php

require_once '../../vendor/autoload.php';

use Twilio\Rest\Client;

class PasswordReset
{
    private $sid = 'ACa4b08c5aae26c3f32eb316f017fb45ba';
    private $token = 'ACa4b08c5aae26c3f32eb316f017fb45ba';
    private $from = '+21692821394';

    public function sendResetCodeBySMS($to, $resetCode)
    {
        try {
            $client = new Client($this->sid, $this->token);

            $client->messages->create(
                $to,
                [
                    'from' => $this->from,
                    'body' => 'Votre code de réinitialisation est : ' . $resetCode
                ]
            );

            echo 'Message SMS envoyé avec succès.';
        } catch (Exception $e) {
            echo 'Erreur Twilio: ' . $e->getMessage();
        }
    }

    public function sendSms($to, $message)
    {
        try {
            $client = new Client($this->sid, $this->token);

            $client->messages->create(
                $to,
                [
                    'from' => $this->from,
                    'body' => $message
                ]
            );

            echo 'Message SMS envoyé avec succès.';
        } catch (Exception $e) {
            echo 'Erreur Twilio: ' . $e->getMessage();
        }
    }
}

// Exemple d'utilisation
$passwordReset = new PasswordReset();
$to = '+21692821394';  // Remplacez par le numéro de téléphone réel
$resetCode = 'XTB9BJUGPZLF8P4X4PMETVA5';  // Remplacez par le code réel
$message = 'Votre code de réinitialisation est : ' . $resetCode;  // Message avec le code réel
$passwordReset->sendResetCodeBySMS($to, $resetCode);

?>
