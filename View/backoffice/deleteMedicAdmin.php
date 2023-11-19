<?php
include '../../Controller/MedicC.php';
$c = new MedicC();
$c->deleteMedic($_GET["idmed"]);
header('Location:listMedicAdmin.php');
