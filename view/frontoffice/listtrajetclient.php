<?php
// Include the necessary files
include '../../Controller/trajetT.php';
//include '../../Controller/vehiculeC.php';


// Create an instance of the controller
$trajetT = new TrajetT();

if (isset($_POST['idVehicule'])) {
    $vehicule = $_POST['idVehicule'];
}
// Get the list of trajectories
$tab = $trajetT->listTrajetuser($vehicule);
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
     <link rel="stylesheet" href="../../asset/frontoffice/css/searchbar.css">

     
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

          option , #etat{
            color: #b1fa07;
            background-color: #252525;
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
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

</head>

<body class="background" id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

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

<br><br><br><br>

        <center>
            <h1 style="color:#b1fa07;">Liste des Trajets</h1>
        </center>

        <div class="wrappersearch">
    <div class="containersearch">
      <form role="search" method="get" class="search-form form" action="">
        <label>
            <span class="screen-reader-text">Search for...</span>
            <input type="search" class="search-field" placeholder="Type something..." value="" name="s" title="" />
        </label>
        <input type="submit" class="search-submit buttonsearch" value="&#xf002" />
    </form>
    </div>
  </div>

        <table width="80%" style="margin: 0 auto; border-collapse: collapse; border: 2px solid white; background-color: trasnparent;">
            <tr class="tableheader">
                <td colspan="8" align="center" style="border-bottom: 2px solid white;">
                    <b id="mod">Trajet</b>
                </td>
            </tr>
            <tr class="tableheader" >
                <td  align="center" width="20%" style="border-right: 2px solid white;"><b>ID Trajet</b></td>
                <td  align="center" width="20%" style="border-right: 2px solid white;"><b>État</b></td>
                <td  align="center" width="20%" style="border-right: 2px solid white;"><b>Année d'expérience</b></td>
                <td  align="center" width="20%" style="border-right: 2px solid white;"><b>Routes Préférées</b></td>
                <td  align="center" width="100%" style="border-right: 2px solid white;width: 115.2px;"><b>Préférence Véhicule</b></td>
                <td  align="center" width="20%" style="border-right: 2px solid white;"><b>Compétences Spéciales</b></td>
                <td  align="center" width="20%" style="border-right: 2px solid white;"><b>Mise à jour</b></td>
                <td  align="center" width="20%" style="border-right: 2px solid white;"><b>Supprimer</b></td>
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
        <form method="POST" action="addtrajet.php">
                        <section id="b-ajouter-trajet" class="container text-center">
     <div class="row">
         <div class="col-md-12">
         <button type="submit" class="ajout" id="misTrajet" name="submitTrajet">Ajouter</button>
         <input  type="hidden" value="<?= $vehicule; ?>" id="idVehicule" name="idVehicule">

                 </div>
     </div>
 </section>
            </form>
    </div>
</div>
</div>

    <!-- Add your scripts or other body content if needed -->
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
<script src="../../asset/frontoffice/js/trajet.js"></script>

</html>
