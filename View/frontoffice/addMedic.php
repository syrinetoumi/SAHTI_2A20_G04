<?php
include '../../controller/MedicC.php';
include '../../model/Medic.php';

$error = "";

// create client
$medic = null;

// create an instance of the controller
$medicC = new MedicC();

if (
    isset($_POST["medicament"]) &&
    isset($_FILES["photo"]) &&
    isset($_POST["lien"])
) {
    if (
        !empty($_POST['medicament']) &&
        !empty($_FILES["photo"]["name"]) &&
        !empty($_POST["lien"])
    ) {
        $filename = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];
        $folder = "../../asset/frontoffice/images/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            // Image uploaded successfully, create Medic object
            $medic = new Medic(
                null,
                $_POST['medicament'],
                $filename, // Use the uploaded filename
                $_POST['lien']
            );

            $medicC->addMedic($medic);
            header('Location: listMedic.php');
        } else {
            $error = "Failed to upload image!";
        }
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicament </title>
    <link href="../../asset/frontoffice/css/ADDMEDbootstrap.min.css" rel="stylesheet">
    <link href="../../asset/frontoffice/css/addmed.css" rel="stylesheet">
</head>

<body class="reservation-page" background="../../asset/frontoffice/images/pharmacien.jpg">
    <a href="listMedic.php">Back to list </a>
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
                                            <div class="text-center mb-4 pb-lg-2">
                                                <em class="text-white">Médicament</em>

                                                <h2 class="text-white">Ajouter à la liste</h2>
                                            </div>

                                            <div class="booking-form-body">
                                            <form action="" method="POST" enctype="multipart/form-data" id="form" class="custom-form booking-form">
                                            <table class="table">
                                                <tr>
                                                    <td><label for="medicament">Medicament :</label></td>
                                                    <td>
                                                        <input type="text" id="medicament" name="medicament" />
                                                        <span id="erreurmedicament" style="color: red"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td><label for="photo">Photo:</label></td>
                                                <td>
                                                    <input type="file" id="photo" name="photo" />
                                                    <!-- <span id="erreurphoto" style="color: red"></span>-->
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="lien">Lien :</label></td>
                                                    <td>
                                                        <input type="text" id="lien" name="lien" />
                                                        <span id="erreurlien" style="color: red"></span>
                                                    </td>
                                                </tr>

                                                <td>
                                                    <button type="submit"  class="bouton">Enregistrer</button>
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
                                            
                                            <img src="../../asset/frontoffice/images/pills.jpg" class="booking-form-image img-fluid" alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <br><br><br><br>
                <script src="../../asset/frontoffice/js/medicament.js"></script>
</body>

</html>