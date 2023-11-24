<?php
session_start();
session_destroy();
echo 'Vous êtes déconnecté. <a href="./seconnecter.php">Se connecter ?</a>';
?>
