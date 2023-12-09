<?php
session_start();
session_destroy();
header('Location: ../../view/frontoffice/acceil.html');
exit();
?>
