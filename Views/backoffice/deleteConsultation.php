<?php
include '../Controller/RDV_ConsultationC.php';

$rdvConsultationC = new RDV_ConsultationC();

if (isset($_POST["delete"])) {
    $cinToDelete = $_POST["cin"];
    $rdvConsultationC->deleteRDV_Consultation($cinToDelete);
    header('Location: listconsultation.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Consultation</title>
</head>

<body>
    <h1>Delete Consultation</h1>

    <!-- You can add a confirmation message or additional content here if needed -->

    <button><a href="listconsultation.php">Back to list</a></button>
</body>

</html>
