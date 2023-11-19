<?php
/*

include '../../controller/HistoC.php';
include '../../model/Histo.php';

$error = "";

// create client
$histo = null;

// create an instance of the controller
$histoC = new HistoC();
if (
    isset($_POST["idpat"]) &&
    isset($_POST["diagnostic"]) 
) {
    if (
        !empty($_POST['idpat']) &&
        !empty($_POST["diagnostic"]) 
    ) {
        $histo = new HistoC(
            null,
            $_POST['idpat'],
            $_POST['diagnostic']
        );
        $histoC->addHisto($histo);
        header('Location:listHisto.php');
    } else
        $error = "Missing information";
}*/
require 'C:\xampp\htdocs\projetweb - Copie\config.php';
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug: Print POST data
    print_r($_POST);

    if (isset($_POST["idpatient"])) {
        $groupIdentifier = $_POST["idpatient"];
        
        // Assuming you have a database connection
        $db = config::getConnexion();
        
        try {
            $sql = "UPDATE ordo SET idpat = :idpat WHERE idpat IS NULL";
            $query = $db->prepare($sql);
            $query->bindValue(':idpat', $groupIdentifier);
            $query->execute();
            
            echo 'Update successful!';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo 'Error: "idpatient" not set in the form submission.';
    }
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
    <a href="listHisto.php">Retour </a>
    <hr>

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
                                        <form class="custom-form booking-form" action="#" method="post" role="form">
                                            <div class="text-center mb-4 pb-lg-2">
                                                <em class="text-white">Ordonnance</em>

                                                <h2 class="text-white">Pour qui !</h2>
                                            </div>

                                            <div class="booking-form-body">
                                            <form action="" method="POST">
                                                <table class="table" >
                                                    <tr>
                                                        <td><label for="idpatient">L'id du patient</label></td>
                                                        <td>
                                                            <input type="text" id="idpatient" name="idpatient" />
                                                            <span id="erreurEmail" style="color: red"></span>
                                                        </td>
                                                    </tr>

                                                    <td>
                                                        <button type="submit" class="bouton" >Créer</button>
                                                    </td>
                                                    <td>
                                                        <button type="reset" class="bouton" >Reset</button>
                                                    </td>
                                                    </table>
                                                    </form>
                                            </div>
                                            </form>
                                    </div>

                                    <div class="col-lg-5 col-12 p-0">
                                        <div class="booking-form-image-wrap">
                                            
                                            <img src="../../asset/frontoffice/images/pat.jpg" class="booking-form-image img-fluid" alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <br><br><br><br>
</body>

</html>