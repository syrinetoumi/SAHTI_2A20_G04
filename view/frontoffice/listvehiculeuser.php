<?php
include '../../Controller/vehiculeC.php';

$c = new VehiculeC();
$tab = $c->listVehiculeuser();

?>



<!DOCTYPE html>
<html lang="en">
<head>

     <title>Health Template - News Page</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../../asset/frontoffice/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/magnific-popup.css">

     <link rel="stylesheet" href="../../asset/frontoffice/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/animate.css">

     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.carousel.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.theme.default.min.css">

     <link rel="stylesheet" href="../../asset/frontoffice/css/vehicule.css"> 
     <link rel="stylesheet" href="../../asset/frontoffice/css/nour.css">

   
</head>
<body background="../../asset/frontoffice/img/slider3.jpg"  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <!-- PRE LOADER -->
    <section class="preloader">
         <div class="spinner">

              <span class="spinner-rotate"></span>
              
         </div>
    </section>


    
    <section class="navbar navbar-default navbar-static-top" role="navigation">
         <div class="container">

             <div class="navbar-header">
                   <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                   </button>
                   <div class="logo">
                        <img src="../../asset/frontoffice/img/logo.png" class="imglogo" alt="">
                   </div>
              </div>

              <div class="collapse navbar-collapse">
                   <ul class="nav navbar-nav navbar-right">
                        <li><a href="#footer" class="smoothScroll">Contact</a></li>
                        <li class="appointment-btn"><a href="suiviemedecin.html">Acceuil</a></li>

                   </ul>
              </div>

         </div>
    </section>
    <section class="ordonnance" >
        <form id="form">
        <center><table class="dataTable" id="medicationTable">
            <thead>
                <tr class="col1">
                    <th>id vehicule</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Année</th>
                    <th>Plaque matricule</th>
                    <th>Trajet</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
    foreach ($tab as $vehicule) {
    ?> 




        <tr>
            <td><?=  $vehicule['vehicle_id']; ?></td>
            <td><?= $vehicule['marque'];  ?></td>
            <td><?= $vehicule['modele']; ?></td>
            <td><?=  $vehicule['annee']; ?></td>
            <td><?= $vehicule['plnum']; ?></td>
            <td>
            <form method="POST" action="listtrajet.php">
            <input  id="up1" type="submit" name="list" value="list">
            <input  type="hidden" value="<?= $vehicule['vehicle_id'];?>" name="idVehicule">
            </form>

            </td>
            <td align="center">
                <form method="POST" action="uppdatevehicule.php">
                    <input id="up1"type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $vehicule['vehicle_id']; ?>" name="idVehicule">
                </form>
            </td>
            
            <td>
           <form method="GET" action="deletevehicule.php">
            <button   id="up1"type="submit" name="del" value="del" style="background-color:transparent;border-color:transparent;">
                <a   href="deletevehicule.php?id=<?= $vehicule['vehicle_id']; ?>">Delete</a>                                                                                                                                                                             
    </button>
            </form>
            </td>
        </tr>
    <?php
    }
    ?>
            </tbody>
         </table></center>
            </tbody>
         </table></center>
         <button type="button" class="bouton" onclick="location.href='addVehicule.php';">Ajouter véhicule</button>
        <br><br><br><br><br>

         </form>
    </section>

     

     <!-- SCRIPTS  <script src="../../asset/frontoffice/js/ordonnance.js"></script>-->
     <script src="../../asset/frontoffice/js/jquery.js"></script>
     <script src="../../asset/frontoffice/js/bootstrap.min.js"></script>
     <script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
     <script src="../../asset/frontoffice/js/jquery.stellar.min.js"></script>
     <script src="../../asset/frontoffice/js/jquery.magnific-popup.min.js"></script>
     <script src="../../asset/frontoffice/js/magnific-popup-options.js"></script>
     <script src="../../asset/frontoffice/js/wow.min.js"></script>
     <script src="../../asset/frontoffice/js/smoothscroll.js"></script>
     <script src="../../asset/frontoffice/js/owl.carousel.min.js"></script>
     <script src="../../asset/frontoffice/js/custom.js"></script>
     <script src="../../asset/frontoffice/js/vehicule.js"></script>

</body>
</html>
