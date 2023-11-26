<?php
// Include the necessary files
include '../../Controller/trajetT.php';
//include '../../Controller/vehiculeC.php';


// Create an instance of the controller
$trajetT = new TrajetT();

if (isset($_POST['idVehicule'])) {
    echo('hello');
    $vehicule = $_POST['idVehicule'];
    echo($vehicule);
}
// Get the list of trajectories
$tab = $trajetT->listTrajetuser($vehicule);
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

    <style>
    .bouton {
            background: #b1fa07;
            border-radius: 3px;
            color: #1c1c1c;
            font-weight: 100;
            padding-top: 12px;
            padding-bottom: 12px;
            margin-top: 10px;
            align:center;
            }

            .bouton:hover {
            background: white;
             color: #1c1c1c !important;
            }

            .boutondel {
            background: red;
            border-radius: 3px;
            color: #1c1c1c;
            font-weight: 100;
            padding-top: 12px;
            padding-bottom: 12px;
            margin-top: 10px;
            align:center;
            }

            </style>
</head>

<body class="bg02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="accueilback.html">
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
                                <a class="nav-link" href="accueilback.html">Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="accueilback.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="accueilback.html">Yearly Report</a>
                                </div>
                            </li>
                            <li class="nav-item ">
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
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block" style="width: 1406px;">
<br><br><br><br>

        <center>
            <h1 style="color:#b1fa07;">Liste des Trajets</h1>
        </center>
        <table width="80%" style="margin: 0 auto; border-collapse: collapse; border: 2px solid white; background-color: trasnparent;">
            <tr>
                <td class="styleTable" colspan="8" align="center" style="border-bottom: 2px solid white;">
                    <b id="mod">Trajet</b>
                </td>
            </tr>
            <tr>
                <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black;"><b>ID Trajet</b></td>
                <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black; border-bottom: 2px solid black;"><b>État</b></td>
                <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black;"><b>Année d'expérience</b></td>
                <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black;"><b>Routes Préférées</b></td>
                <td class="styleTable" align="center" width="100%" style="border-right: 2px solid black;width: 115.2px;"><b>Préférence Véhicule</b></td>
                <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black;"><b>Compétences Spéciales</b></td>
                <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black;"><b>Mise à jour</b></td>
                <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black;"><b>Supprimer</b></td>
            </tr>
            <?php
            foreach ($tab as $trajet) {
            ?>
                <tr style="border-top: 2px solid white;">
                    <td class="styleTable" align="center" width="25%" style="border-right: 2px solid black;"><?= $trajet['trajet_id']; ?></td>
                    <td class="styleTable" align="center" width="25%" style="border-right: 2px solid black;"><?= $trajet['etat']; ?></td>
                    <td class="styleTable" align="center" width="25%" style="border-right: 2px solid black;"><?= $trajet['annee_exp']; ?></td>
                    <td class="styleTable" align="center" width="25%" style="border-right: 2px solid black;"><?= $trajet['routes_pre']; ?></td>
                    <td class="styleTable" align="center" width="25%" style="border-right: 2px solid black;"><?= $trajet['pref_veh']; ?></td>
                    <td class="styleTable" align="center" width="25%" style="border-right: 2px solid black;"><?= $trajet['comp_spe']; ?></td>
                    <td class="styleTable" align="center" width="25%" style="border-right: 2px solid black;">
                        <form method="POST" action="updatetrajet.php">
                            <button style="width: 115.2px;color:white" class="bouton" id="up1" type="submit" name="update" value="Update">
                                <input type="hidden" value="<?= $trajet['trajet_id']; ?>" name="idTrajet">
                                Mise à jour
                            </button>
                        </form>
                    </td>
                    <td class="styleTable" align="center" width="20%" style="border-right: 2px solid black;">
                        <form method="POST" action="deletetrajet.php">
                            <button style="width: 115.2px;color:whit" class="boutondel" type="submit" name="delete" value="<?= $trajet['trajet_id']; ?>">
                                Supprimer
                            </button>
                        </form>
                                                
               
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <!--form method="POST" action="addtrajet.php">
                        <section id="b-ajouter-trajet" class="container text-center">
     <div class="row">
         <div class="col-md-12">
         <button type="submit" class="ajout" id="misTrajet" name="submitTrajet">Ajouter</button>
         <input  type="hidden" value="<?= $vehicule; ?>" id="idVehicule" name="idVehicule">

                 </div>
     </div>
 </section>
            </form-->
    </div>
</div>
</div>

    <!-- Add your scripts or other body content if needed -->
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
</body>

</html>