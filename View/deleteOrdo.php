<?php
include '../Controller/OrdoC.php';
$ordoC = new OrdoC();
$ordoC->deleteOrdo($_GET["Num"]);
header('Location:listOrdos.php');

?>
