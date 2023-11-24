<?php
class Router {
    public static function redirect($role) {
        switch ($role) {
            case 'admin':
                header("Location: ../view/frontoffice/admin.php");
                exit();
            case 'chauffeur':
                header("Location: ../view/frontoffice/chauffeur.php");
                exit();
            case 'coach':
                header("Location: ../view/frontoffice/coach.php");
                exit();
            case 'medecin':
                header("Location: ../view/frontoffice/med.php");
                exit();
            case 'patient':
                header("Location: ../view/frontoffice/patient.php");
                exit();
            default:
                header("Location: ../view/frontoffice/acceuil.php");

                exit();
        }
    }
}
?>
