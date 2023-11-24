<?php
include '../../Controller/userC.php';
$usC= new userC();
$usC->deleteuser($_GET["id_u"]);
header('Location:listuser.php');
?>