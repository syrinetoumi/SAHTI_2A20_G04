<?php

include '../../Controller/MedicC.php';
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../../asset/backoffice/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/tooplate.css">
</head>

<body class="bg02">
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <div class="logo">
                            <img src="../../asset/backoffice/img/logo.png" class="imglogo" alt="">
                       </div>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="index.html">Yearly Report</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="products.html">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="accounts.html">Accounts</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Settings
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Billing</a>
                                    <a class="dropdown-item" href="#">Customize</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.html">
                                    <div class="hov"> <i class="far fa-user mr-2 tm-logout-icon" id="c1"></i>
                                     <span id="log">Logout</span></div>
                                 </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_POST['id'])) {
        $medic = $medicC->showMedic($_POST['id']);
        
    ?>
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Modifier le médicament</h2>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                    
                            <form action="" class="tm-edit-product-form">
                        
                                <div class="input-group mb-3">
                                    <label for="id" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Id</label>
                                    <input  id="id" name="id" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $_POST['id'] ?>" readonly>
                                </div>                              
                                <div class="input-group mb-3">
                                    <label for="medicament" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom médicament</label>                     
                                    <input  id="medicament" name="medicament" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                        data-large-mode="true" value="<?php echo $medic['medicament'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="lien" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Lien</label>
                                    <input  id="lien" name="lien" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7"  value="<?php echo $medic['lien'] ?>" >
                                </div>
                                <div class="input-group mb-3">
                                        <label for="new_photo" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nouvelle photo</label>   
                                        <input id="new_photo" name="new_photo" type="file" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" class="btn btn-primary">Modifier
                                        </button>
                                    </div>
                                </div>
                                
                            </form>
                            <?php
                                        }
                                        ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2023/2024 Esprit école sup privée
                </p>
            </div>
        </footer>
    </div>

    <script src="../../asset/backoffice/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="../../asset/backoffice/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
     <script src="../../asset/frontoffice/js/medicament.js"></script>
</body>

</html>