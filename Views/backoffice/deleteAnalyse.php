<?php
include '../Controller/RDV_analyse_imagerieC.php';

$rdvAnalyseC = new RDV_analyse_imagerieC();

if (isset($_POST["delete"])) {
    $idToDelete = $_GET["id"];
    $rdvAnalyseC->deleteRDV_analyse_imagerie($idToDelete);
    header('Location: listAnalyse.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Analyse</title>
</head>

<body>
    <h1>Delete Analyse</h1>

    <!-- You can add a confirmation message or additional content here if needed -->

    <button><a href="listAnalyse.php">Back to list</a></button>
</body>

</html>
