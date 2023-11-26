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
   <title>add trajet</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet" href="../../asset/frontoffice/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/animate.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.carousel.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.theme.default.min.css">
     <style>
          select {
              width: 180%;
              padding: 10px;
              font-size: 16px;
              text-align: center;
          }
          
          .ajout {
              width: 200px;
              padding: 15px;
              font-size: 18px;
              text-align: center;
              border-radius: 8px;
              color: #b1fa07;
              background-color: #252525;
              cursor: pointer;
              transition: background-color 0.3s ease-in-out;
          }
          
          .ajout:hover {
               background-color: #b1fa07;
               color: black;
          }

          #ajouter td[colspan="4"], #rend td[colspan="6"] {
              font-size: 24px;
          }

          .ajoutdel {
              width: 200px;
              padding: 15px;
              font-size: 18px;
              text-align: center;
              border-radius: 8px;
              color: red;
              background-color:#252525;
              cursor: pointer;
              transition: background-color 0.3s ease-in-out;
          }
          
          .ajoutdel:hover {
               background-color: red;
               color: black;
          }

          option , #etat{
            color: #b1fa07;
            background-color: #252525;
        }
        .background {
	background-image: url("../../asset/frontoffice/img/slider3.jpg") !important;
    background-repeat:no-repeat;
}

.styleTable{
      color:black;
      border-color: white !important;
    }
    .tableheader{
     color:white;
     background-color:black;
     border: 2px solid white;
    }

     
     </style>

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../asset/frontoffice/css/tooplate-style.css">

</head>

<body class="background"  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- PRE LOADER -->
<section class="preloader">
     <div class="spinner">
          <span class="spinner-rotate"></span>
     </div>
</section>

<!-- MENU -->
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
          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="accu.html">Accueil</a></li>
                    <li><a href="#read1" class="smoothScroll">Mes Donnees</a></li>
                    <li><a href="#ajouter" class="smoothScroll">Ajouter un nouveau</a></li>
                    <li class="appointment-btn"><a href="C:\xampp\htdocs\projetweb\View\formulaire.html">se deconnecter</a></li>
               </ul>
          </div>
     </div>
</section>
    
<h1 style="color:#b1fa07;">Mise a jour</h1>

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
                    <td   ><label style="color:black;font-size:30px;" for="idVehicule">Vehicule Id:</label></td>
                    <td >
                        <input type="text" id="idVehicule" name="idVehicule" style="height: 45.55556px;width: 257.55556px;" value="<?php echo $_POST['idVehicule'] ?>" readonly />
                        <span id="erreurIdVehicule" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:black;font-size:30px;" for="marque">Marque :</label></td>
                    <td >
                        <input type="text" id="marque" name="marque" style="height: 45.55556px;width: 257.55556px;" value="<?php echo $vehicule['marque'] ?>" />
                        <span id="erreurMarque" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:black;font-size:30px;" for="modele">Modèle :</label></td>
                    <td>
                        <input type="text" id="modele" name="modele" style="height: 45.55556px;width: 257.55556px;" value="<?php echo $vehicule['modele'] ?>" />
                        <span id="erreurModele" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:black;font-size:30px;" for="annee">Année :</label></td>
                    <td>
                        <input type="text" id="annee" name="annee" style="height: 45.55556px;width: 257.55556px;" value="<?php echo $vehicule['annee'] ?>" />
                        <span id="erreurAnnee" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label style="color:black;font-size:30px;" for="plnum">Plaque matricule :</label></td>
                    <td>
                        <input type="text" id="plnum" name="plnum" style="height: 45.55556px;width: 257.55556px;" value="<?php echo $vehicule['plnum'] ?>" />
                        <span id="erreurPlanum" style="color: red"></span>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Save" id="updateVehicule" class="ajout" style="height: 53.2px;width: 115.55556px;">
                </td>
                <td>
                    <input type="reset" value="Reset" class="ajoutdel" style="height: 53.2px;width: 115.55556px;">
                </td>
            </table>
            </div>
</div>
</div>
        </form>
    <?php
    }
    ?>

    </body>

<!-- FOOTER -->
<footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact</h4>
                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> +21692821394</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">Sahti.tunisie@esprit.tn</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="./../asset/frontoffice/img/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Amazing Technology</h5></a>
                                        <span>March 08, 2018</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="../../asset/frontoffice/img/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>New Healing Process</h5></a>
                                        <span>February 20, 2018</span>
                                   </div>
                              </div>
                         </div>
                    </div> 

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Horaires d'ouvertures</h4>
                                   <p>LUNDI - VENDREDI <span>06:00 AM - 10:00 PM</span></p>
                                   <p>SAMEDI <span>09:00 AM - 08:00 PM</span></p>
                                   <p>DIMANCHE <span>FERMEE</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2023/2024 Esprit ecole sup privée d'ingénierie et de technologies
                                   
                                   | Design: <a rel="nofollow" href="https://www.facebook.com/tooplate" target="_parent">Tooplate</a></p>
                              </div>
                         </div>
                         <!--<div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div> -->
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s">
                                  TOP
                              </a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

<!-- SCRIPTS -->
<script src="../../asset/frontoffice/js/jquery.js"></script>
<script src="../../asset/controllerjs/bootstrap.min.js"></script>
<script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
<script src="../../asset/frontoffice/js/jquery.stellar.min.js"></script>
<script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
<script src="../../asset/frontoffice/js/smoothscroll.js"></script>
<script src="../../asset/frontoffice/js/owl.carousel.min.js"></script>
<script src="../../asset/frontoffice/js/custom.js"></script>
<script src="../../asset/frontoffice/js/updatevehicule.js"></script>

</html>
