<?php

include '../../controller/OrdoC.php';
include '../../model/Ordo.php';

$error = "";

// create client
$ordo = null;

// create an instance of the controller
$ordoC = new OrdoC();
if (
    isset($_POST["nommed"]) &&
    isset($_POST["dosage"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["rq"]) 
) {
    if (
        !empty($_POST['nommed']) &&
        !empty($_POST["dosage"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["rq"]) 
    ) {
        $ordo = new Ordo (
            null,
            $_POST['nommed'],
            $_POST['dosage'],
            $_POST['duree'],
            $_POST['rq']
        );
        $ordoC->addOrdo($ordo);
        header('Location:listOrdo.php');
    } else
        $error = "Missing information";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordonnance </title>
    <link href="../../asset/frontoffice/css/ADDMEDbootstrap.min.css" rel="stylesheet">
    <link href="../../asset/frontoffice/css/addmed.css" rel="stylesheet">
</head>

<body class="reservation-page" background="../../asset/frontoffice/images/pharmacien.jpg">
    <div id="error">
        <?php echo $error; ?>
    </div>
            <section class="booking-section section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="booking-form-wrap">
                                <div class="row">
                                    <div class="col-lg-7 col-12 p-0">
                                            <div class="text-center mb-4 pb-lg-2">
                                                <em class="text-white">Ordonnance</em>

                                                <h2 class="text-white">Nouveau médicament</h2>
                                            </div>

                                            <div class="booking-form-body">
                                            <form action="" method="POST" id="form" class="custom-form booking-form">
                                                <table class="table" >
                                                <tr>
                                                <td><label for="nommed">Nom du médicament :</label></td>
                                                <td>
                                                <select id="nommed" name="nommed">
                                                    <?php
                                                    $ledicOptions = $ordoC->getLedicOptions();
                                                    foreach ($ledicOptions as $option) {
                                                        echo "<option value='" . $option['medicament'] . "'>" . $option['medicament'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="dosage">Dosage :</label></td>
                                                        <td>
                                                            <input type="text" id="dosage" name="dosage" />
                                                        </td>
                                                        <td> <span id="erreurdosage" style="color: red"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="duree">Durée du traitement:</label></td>
                                                        <td>
                                                            <input type="text" id="duree" name="duree" />
                                                        </td>
                                                        <td><span id="erreurduree" style="color: red"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rq">Vos remarques:</label></td>
                                                        <td>
                                                            <input type="text" id="rq" name="rq" />
                                                            
                                                        </td>
                                                        <td><span id="erreurrq" style="color: red"></span></td>
                                                    </tr>

                                                    <td>
                                                        <button type="submit" class="bouton" onclick="location.href='listOrdo.php';">Enregistrer</button>
                                                    </td>
                                                    <td>
                                                        <button type="reset" class="bouton" >Reset</button>
                                                    </td>
                                                    </table>
                                                    </form>
                                            </div>
                                    </div>

                                    <div class="col-lg-5 col-12 p-0">
                                        <div class="booking-form-image-wrap">
                                            
                                            <img src="../../asset/frontoffice/images/photoaddmed.jpg" class="booking-form-image img-fluid" alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <br><br><br><br>          
</body>
<script src="../../asset/frontoffice/js/ordonnance.js"></script>
</html>