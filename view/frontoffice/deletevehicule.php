<?php
include '../../Controller/vehiculeC.php';
$vehiculeC = new VehiculeC();
$vehiculeC->deleteVehicule($_GET["id"]);
header('Location: listVehicules.php');
