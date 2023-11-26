<?php
include '../../Controller/trajetT.php';

if (isset($_POST["delete"])) {
    $trajetT = new TrajetT();
    $trajetT->deleteTrajet($_POST["delete"]);
    header('Location: listvehicule.php');
}
?>
