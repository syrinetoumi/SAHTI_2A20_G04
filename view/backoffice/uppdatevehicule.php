<?php

include '../../Controller/vehiculeC.php';
include '../../model/vehicule.php';
$error = "";

// create vehicule
$vehicule = null;
// create an instance of the controller
$vehiculeC = new VehiculeC();

if (
    isset($_POST["marque"]) &&
    isset($_POST["modele"]) &&
    isset($_POST["annee"]) &&
    isset($_POST["plnum"])
) {
    if (
        !empty($_POST['marque']) &&
        !empty($_POST["modele"]) &&
        !empty($_POST["annee"]) &&
        !empty($_POST["plnum"])
    ) {
        $vehicule = new Vehicule(
            null,
            $_POST['marque'],
            $_POST['modele'],
            $_POST['annee'],
            $_POST['plnum']
        );

        $vehiculeC->updateVehicule($vehicule, $_POST['idVehicule']);

        // Redirect to listVehicules.php after successful update
        header('Location: listVehicules.php');
        exit; // Ensure no further code is executed after the redirection
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
    <title>ajouter un utilisateur</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../../asset/backoffice/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
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
                    <a class="navbar-brand" href="./backoffice/accueilback.html">
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
                                <a class="nav-link" href="./backoffice/accueilback.html">Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="./backoffice/accueilback.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="./backoffice/accueilback.html">Yearly Report</a>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="./backoffice/products.html">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="./backoffice/accounts.html">Accounts</a>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    chauffeur
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="listvehicule.php">listvehicule</a>
                                    <a class="dropdown-item" href="listtrajettotalle.php">listtrajet</a>
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
    <!--button><a href="listvehicules.php">Back to list</a></button-->
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idVehicule'])) {
        $vehicule = $vehiculeC->showVehicule($_POST['idVehicule']);
    ?>
<div class="row tm-mt-big">

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="bg-white tm-block">
        <form action="uppdatevehicule.php" method="POST">
            <table>
                <tr>
                    <td ><label style="color:white" for="idVehicule">Vehicule Id:</label></td>
                    <td>
                        <input type="text" id="idVehicule" name="idVehicule" value="<?php echo $_POST['idVehicule'] ?>" readonly />
                        <span id="erreurIdVehicule" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:white" for="marque">Marque :</label></td>
                    <td>
                        <input type="text" id="marque" name="marque" value="<?php echo $vehicule['marque'] ?>" />
                        <span id="erreurMarque" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:white" for="modele">Modèle :</label></td>
                    <td>
                        <input type="text" id="modele" name="modele" value="<?php echo $vehicule['modele'] ?>" />
                        <span id="erreurModele" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:white" for="annee">Année :</label></td>
                    <td>
                        <input type="text" id="annee" name="annee" value="<?php echo $vehicule['annee'] ?>" />
                        <span id="erreurAnnee" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:white" for="plnum">Plaque matricule :</label></td>
                    <td>
                        <input type="text" id="plnum" name="plnum" value="<?php echo $vehicule['plnum'] ?>" />
                        <span id="erreurPlanum" style="color: red"></span>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Save" id="updateVehicule">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>
            </div>
</div>
</div>
        </form>
    <?php
    }
    ?>
<!-- FOOTER -->
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
    <script src="../../asset/backoffice/jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="../../asset/backoffice/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
    <script src="../../asset/frontoffice/js/updatevehicule.js"></script>
</body>

</html>
