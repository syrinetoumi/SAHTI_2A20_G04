<?php
class Router {
    public static function redirect($role) {
        switch ($role) {
            case 'admin':

                header("Location: admin.php");
                exit();
            case 'medecin':
                header("Location: med.html");
                exit();
            case 'chauffeur':
                header("Location: chauffeur.php");
                exit();
            case 'coach':
                header("Location: coach.php");
                exit();
            default:
                header("Location: acceil.html");
                exit();
        }
    }
}
?>
