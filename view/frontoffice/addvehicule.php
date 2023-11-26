<?php
include '../../Controller/vehiculeC.php';
include '../../model/vehicule.php';

$error = "";

// create vehicule
$vehicule = null;

// create an instance of the controller
$vehiculeC = new VehiculeC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitVehicule"])) {

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
                null, //$vehicule_id,  // Fix the parameter here
                $_POST['marque'],
                $_POST['modele'],
                $_POST['annee'],
                $_POST['plnum']
            );

            $vehiculeC->ajouter($vehicule);
            // Display a success message or perform any additional actions here
        } else {
            $error = "Missing information";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>Chauffeur</title>

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
              border-radius: 8px;
              color: #b1fa07;
              background-color: #252525;
              cursor: pointer;
              transition: background-color 0.3s ease-in-out;
          }
          
          .ajout:hover {
               background-color: #252525;
          }

          #ajouter td[colspan="4"], #rend td[colspan="6"] {
              font-size: 24px;
          }
          .background {
	background-image: url("../../asset/frontoffice/img/slider3.jpg") !important;
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

     <center>
            <h1 style="color:#b1fa07;">Ajouter vehicule</h1>
        </center>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <!-- Display success message or additional content here -->
<form method="POST" action="addvehicule.php">
    <input type="hidden" name="formType" value="vehicule">
    <section id="ajouter">
     <center>
       <table width="80%" style="margin: 0 auto; border-collapse: collapse; border: 2px solid white; background-color: transparent;">
         <tr class="tableheader">
           <td colspan="4" align="center" style="border-bottom: 2px solid white;">
             <b id="mod">Vehicule</b>
           </td>
         </tr>
         <tr class="tableheader">
           <td align="center" width="25%" style="border-right: 2px solid white;"><b>Marque</b></td>
           <td align="center" width="25%" style="border-right: 2px solid white;"><b>Modèle</b></td>
           <td align="center" width="25%" style="border-right: 2px solid white;"><b>Année</b></td>
           <td align="center" width="25%" style="border-right: 2px solid white;"><b>Plaque matricule</b></td>
         </tr>
         <tr style="border-top: 2px solid white;">
          <td align="center" width="25%" style="border-right: 2px solid white;">
            <b><input value="" id="marque" name="marque" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_marque"></div><br></b>
          </td>
          <td align="center" width="25%" style="border-right: 2px solid white;">
            <b><input value="" id="modele" name="modele" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_modele"></div></b>
          </td>
          <td align="center" width="25%" style="border-right: 2px solid white;">
            <b><input value="" id="annee" name="annee" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_anneeVehicule"></div></b>
          </td>
          <td align="center" width="25%" style="border-right: 2px solid white;">
            <b><input value="" id="plnum" name="plnum" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_plaqueMatricule"></div></b>
          </td>
         </tr>
       </table>
     </center>
   </section>
   
   <section id="b-ajouter" class="container text-center">
     <div class="row">
         <div class="col-md-12">
         <button type="submit" name="submitVehicule" class="ajout " id="misVehicule">Ajouter</button>
         </div>
     </div>
 </section>
 </form>
            <!--td>
                <input type="reset" value="Reset">
            </td>
        </table-->
    
</body>


<br><br><br><br>
<br><br><br><br>
<br><br><br><br>

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
                              <p>Copyright &copy; 2023/2024 Esprit ecole sup privée d'ingénierie et de technologies | Design: <a rel="nofollow" href="https://www.facebook.com/tooplate" target="_parent">Tooplate</a></p>
                         </div>
                    </div>
                    <div class="col-md-2 col-sm-2 text-align-center">
                         <div class="angle-up-btn"> 
                             <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s">TOP</a>
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
<script src="../../asset/frontoffice/js/vehicule.js"></script>

</html>
