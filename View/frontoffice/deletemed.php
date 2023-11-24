<?php
include '../../Controller/medecinM.php';
$medM = new medecinM();
$medM->deletemedecin($_GET["id_med"]);
header('Location:listmed.php');
