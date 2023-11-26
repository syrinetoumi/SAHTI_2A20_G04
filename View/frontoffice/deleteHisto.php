<?php
include '../../Controller/HistoC.php';
$c = new HistoC();
$c->deleteHisto($_GET["idordo"]);
header('Location:listHistoMedecin.php');
?>