<?php
include '../Controller/medecinM.php';
$medM = new medecinM();
$medM->deletemed($_GET["id_med"]);
header('Location:listmed.php');
