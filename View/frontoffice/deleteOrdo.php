<?php
include '../../Controller/OrdoC.php';
$c = new OrdoC();
$c->deleteOrdo($_GET["numMedic"]);
header('Location:listOrdo.php');
