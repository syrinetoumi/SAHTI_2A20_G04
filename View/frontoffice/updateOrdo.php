<?php

include '../../controller/OrdoC.php';
include '../../model/Ordo.php';
$error = "";
$ordo = null;
$ordoC = new OrdoC();

if (isset($_POST["nommed"]) && isset($_POST["dosage"]) && isset($_POST["duree"]) && isset($_POST["rq"])) {
    if (!empty($_POST['nommed']) && !empty($_POST["dosage"]) && !empty($_POST["duree"]) && !empty($_POST["rq"]))
    {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $ordo = new Ordo(
            null,
            $_POST['numMedic'],
            $_POST['dosage'],
            $_POST['duree'],
            $_POST['rq']
        );
        var_dump($ordo);
        
        $ordoC->updateOrdo($ordo, $_POST['id']);
        header('Location: listOrdo.php');
        exit();
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <link href="../../asset/frontoffice/css/ADDMEDbootstrap.min.css" rel="stylesheet">
    <link href="../../asset/frontoffice/css/addmed.css" rel="stylesheet">
</head>

<body class="reservation-page" background="../../asset/frontoffice/images/pharmacien.jpg">
    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $ordo = $ordoC->showOrdo($_POST['id']);
        
    ?>
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
                                                <td><label for="id">Id :</label></td>
                                                <td>
                                                    <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                                                </td>
                                                </tr>
                                                <tr>
                                                        <td><label for="nommed">Nom du médicament :</label></td>
                                                        <td>
                                                            <input type="text" id="nommed" name="nommed" value="<?php echo $ordo['nommed'] ?>"/>
                                                            <span id="erreurnommed" style="color: red"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="dosage">Dosage :</label></td>
                                                        <td>
                                                            <input type="text" id="dosage" name="dosage" value="<?php echo $ordo['dosage'] ?>"/>
                                                            <span id="erreurdosage" style="color: red"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="duree">Durée du traitement:</label></td>
                                                        <td>
                                                            <input type="text" id="duree" name="duree" value="<?php echo $ordo['duree'] ?>"/>
                                                            <span id="erreurduree" style="color: red"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rq">Vos remarques:</label></td>
                                                        <td>
                                                            <input type="text" id="rq" name="rq" value="<?php echo $ordo['rq'] ?>"/>
                                                            <span id="erreurrq" style="color: red"></span>
                                                        </td>
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
                                        <?php
                                        }
                                        ?>
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