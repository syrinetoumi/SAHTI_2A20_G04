<?php
include '../../Controller/OrdoC.php';
$c = new OrdoC();
$c->deleteOrdo($_GET["idordo"]);
header('Location:listOrdo.php');
