<?php
include '../../Controller/RDV_ConsultationC.php';

$rdvConsultationC = new RDV_ConsultationC();

if (isset($_POST["delete"])) {
    $cinToDelete = $_POST["cin"];
    $rdvConsultationC->deleteRDV_Consultation($cinToDelete);
    header('Location: listConsultation.php');
    exit;
}
?>

