<?php
include '../../Controller/RDV_ConsultationC.php';

$rdvConsultationC = new RDV_ConsultationC();


    $cinToDelete = $_GET["cin"];
    $rdvConsultationC->deleteRDV_Consultation($cinToDelete);
    header('Location: listConsultation.php');

?>


