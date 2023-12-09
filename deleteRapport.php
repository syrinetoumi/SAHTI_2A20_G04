<?php
include '../../Controller/RapportR.php';
$rapportR = new RapportR();
$rapportR->deleteRapport($_GET["id"]);
header('Location:listRapport.php');
