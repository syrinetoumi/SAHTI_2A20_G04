<?php
include '../../Controller/ProgramP.php';
$programP = new ProgramP();
$programP->deleteProgram($_GET["id"]);
header('Location:listProgram.php');
