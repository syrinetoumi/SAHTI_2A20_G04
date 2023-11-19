<?php

include '../../controller/MedicC.php';
include '../../model/Medic.php';

$error = "";
$medic = null;
$medicC = new MedicC();

if (isset($_POST["medicament"]) && isset($_POST["photo"]) && isset($_POST["lien"])) {
    if (!empty($_POST['medicament']) && !empty($_POST["photo"]) && !empty($_POST["lien"])) {
        // Check if an image file is selected
        if (!empty($_FILES["new_photo"]["name"])) {
            $filename = $_FILES["new_photo"]["name"];
            $tempname = $_FILES["new_photo"]["tmp_name"];
            $folder = "./image/" . $filename;

            if (move_uploaded_file($tempname, $folder)) {
                // Image uploaded successfully, update Medic object
                $medic = new Medic(
                    null,
                    $_POST['medicament'],
                    $filename,
                    $_POST['lien']
                );
            } else {
                $error = "Failed to upload image!";
            }
        } else {
            // No new image selected, use the existing one
            $medic = new Medic(
                null,
                $_POST['medicament'],
                $_POST['photo'],
                $_POST['lien']
            );
        }

        if (!$error) {
            $medicC->updateMedic($medic, $_POST['id']);
            header('Location: listMedic.php');
            exit();
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
    <title>User Display</title>
    <link href="../../asset/frontoffice/css/ADDMEDbootstrap.min.css" rel="stylesheet">
    <link href="../../asset/frontoffice/css/addmed.css" rel="stylesheet">
</head>

<body class="reservation-page" background="../../asset/frontoffice/images/pharmacien.jpg">
    <button><a href="listMedic.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $medic = $medicC->showMedic($_POST['id']);
        
    ?>

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
                                                        <td><label for="id">Id :</label></td>
                                                        <td>
                                                            <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="medicament">medicament :</label></td>
                                                        <td>
                                                            <input type="text" id="medicament" name="medicament" value="<?php echo $medic['medicament'] ?>" />
                                                            <span id="erreurmedicament" style="color: red"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="new_photo">New Photo:</label></td>
                                                        <td>
                                                            <input type="file" id="new_photo" name="new_photo" />
                                                            <!-- <span id="erreurPrenom" style="color: red"></span>-->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><label for="lien">lien :</label></td>
                                                        <td>
                                                            <input type="text" id="lien" name="lien" value="<?php echo $medic['lien'] ?>" />
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
                                        <?php
                                        }
                                        ?>
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

        
</body>
<script src="../../asset/frontoffice/js/medicament.js"></script>
</html>