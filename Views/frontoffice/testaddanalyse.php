<?php
include '../../Controller/RDV_analyse_imagerieC.php';
include '../../model/RDV_analyse_imagerie.php';

$error = "";

// create RDV_Consultation
$consultation = null;

// create an instance of the controller
$rdvConsultationC = new RDV_ConsultationC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitVehicule"])) {
if (
    isset($_POST["cin"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["maladie"]) &&
    isset($_POST["dateRdv"]) &&
    isset($_POST["nom_medecin"]) &&
    isset($_POST["adresse_medecin"])
) {
    if (
        !empty($_POST['cin']) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["maladie"]) &&
        !empty($_POST["dateRdv"]) &&
        !empty($_POST["nom_medecin"]) &&
        !empty($_POST["adresse_medecin"])
    ) {
        $consultation = new RDV_Consultation(
            $_POST['cin'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['maladie'],
            $_POST['dateRdv'],
            $_POST['nom_medecin'],
            $_POST['adresse_medecin']
        );

        $rdvConsultationC->addRDV_Consultation($consultation);
        // Display a success message or perform any additional actions here
    } else {
        $error = "Missing information";
    }
}
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordonnance </title>
    <link href="../../asset/frontoffice/css/ADDMEDbootstrap.min.css" rel="stylesheet">
    <link href="../../asset/frontoffice/css/rdv.css" rel="stylesheet">
</head>

<body class="reservation-page" background="../../asset/frontoffice/img/pharmacien.jpg">
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
                                                <h2 class="text-white">Prendre un rendez-vous</h2>
                                            </div>

                                            <div class="booking-form-body">
                                            <form action="" method="POST" id="form" class="custom-form booking-form">
                                                <table class="table" >
                                                    <tr>
                                                        <td><label for="dosage">Cin :</label></td>
                                                        <td>
                                                            <input type="text" id="dosage" name="dosage" />
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><label for="duree">Nom:</label></td>
                                                        <td>
                                                            <input type="text" id="duree" name="duree" />
                                                        </td>
                                                       
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rq">Prénom:</label></td>
                                                        <td>
                                                            <input type="text" id="rq" name="rq" />
                                                            
                                                        </td>
                            
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rq">Email:</label></td>
                                                        <td>
                                                            <input type="text" id="rq" name="rq" />
                                                            
                                                        </td>
            
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rq">Tel:</label></td>
                                                        <td>
                                                            <input type="text" id="rq" name="rq" />
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rq">Maladie:</label></td>
                                                        <td>
                                                            <input type="text" id="maladie" name="maladie" />
                                                        </td>
                                                    </tr>
                                                   <tr>
                                                        <td><label for="rq">Nom Medecin:</label></td>
                                                        <td>
                                                            <input type="text" id="nom medecin" name="nom medecin" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rq">Adresse Medecin:</label></td>
                                                        <td>
                                                            <input type="text" id="Adresse medecin" name="Adresse medecin" />
                                                        </td>
                                                    </tr>
                                                   <!-- <tr>
                                                <td><label for="nommed">Maladie :</label></td>
                                                <td>
                                                <select id="nommed" name="nommed">
                                                   
                                                </select>
                                                </td>
                                                <tr>
                                                <td><label for="nommed">Medecin :</label></td>
                                                <td>
                                                <select id="nommed" name="nommed">
                                                   
                                                </select>-->
                                                </td>
                                                    </tr>
                                                    </tr>
                                                    <td>
                                                        <button type="submit" class="bouton" onclick="location.href='listConsultation.php';">Enregistrer</button>
                                                    </td>
                                                    <td>
                                                        <button type="reset" class="bouton" >Reset</button>
                                                    </td>
                                                    <td>
                                                    <a href="listConsultation.php">Back to list</a>
                                                    </td>
                                                    </table>
                                                    </form>
                                            </div>
                                    </div>

                                    <div class="col-lg-5 col-12 p-0">
                                        <div class="booking-form-image-wrap">
                                            
                                            <img src="../../asset/frontoffice/img/photoaddmed.jpg" class="booking-form-image img-fluid" alt="">
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