<?php

include '../../Controller/trajetT.php';
include '../../model/trajet.php';

$error = "";
$success = "";

// Create a Trajet object
$trajet = null;

// Create an instance of the controller
$trajetC = new TrajetT();

// Check if form is submitted
if (isset($_POST["update"]) && isset($_POST["idTrajet"])) {
    $idTrajet = $_POST["idTrajet"];

    // Validate and fetch Trajet details from the database
    $trajetData = $trajetC->showTrajet($idTrajet);

    if ($trajetData) {
        // Create a Trajet object with the fetched data
        $trajet = new Trajet(
            $trajetData['trajet_id'],
            $trajetData['etat'],
            $trajetData['annee_exp'],
            $trajetData['routes_pre'],
            $trajetData['pref_veh'],
            $trajetData['comp_spe']
        );
    } else {
        // Handle error if Trajet data is not found
        $error = "Trajet not found!";
    }
}

// Check if form is submitted to update Trajet
if (isset($_POST["updateTrajet"])) {
    // Validate form data
    if (
        isset($_POST['idTrajet']) &&
        isset($_POST['etat']) &&
        isset($_POST['annee_exp']) &&
        isset($_POST['routes_pre']) &&
        isset($_POST['pref_veh']) &&
        isset($_POST['comp_spe'])
    ) {
        $idTrajet = $_POST['idTrajet'];
        $etat = $_POST['etat'];
        $annee_exp = $_POST['annee_exp'];
        $routes_pre = $_POST['routes_pre'];
        $pref_veh = $_POST['pref_veh'];
        $comp_spe = $_POST['comp_spe'];

        // Create a Trajet object with the submitted data
        $updatedTrajet = new Trajet($idTrajet, $etat, $annee_exp, $routes_pre, $pref_veh, $comp_spe);

        // Update the Trajet in the database
        $trajetC->updateTrajet($updatedTrajet, $idTrajet);

        // Set success message
        $success = "Trajet updated successfully!";
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
         
     </style>

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../asset/frontoffice/css/tooplate-style.css">

</head>

<body background="../../asset/frontoffice/img/pharmacien.jpg"  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

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


        <div id="error">
            <?php echo $error; ?>
        </div>

        <div id="success">
            <?php echo $success; ?>
        </div>

        <?php if ($trajet) : ?>
            
            <div class="row tm-mt-big">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="bg-white tm-block">
                        <form action="updatetrajet.php" method="POST">
                            <input type="hidden" name="idTrajet" value="<?php echo $trajet->getTrajetId(); ?>">

                            <table>
                                <tr>
                                    <td><label for="etat" style="color:black">État:</label></td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <select id="etat" name="etat">
                                        <option value="Tunis">Tunis</option>
                                        <option value="Ariana">Ariana</option>
                                        <option value="Ben Arous">Ben Arous</option>
                                        <option value="Manouba">Manouba</option>
                                        <option value="Nabeul">Nabeul</option>
                                        <option value="Zaghouan">Zaghouan</option>
                                        <option value="Bizerte">Bizerte</option>
                                        <option value="Béja">Béja</option>
                                        <option value="Jendouba">Jendouba</option>
                                        <option value="Le Kef">Le Kef</option>
                                        <option value="Siliana">Siliana</option>
                                        <option value="Kairouan">Kairouan</option>
                                        <option value="Kasserine">Kasserine</option>
                                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                                        <option value="Sousse">Sousse</option>
                                        <option value="Monastir">Monastir</option>
                                        <option value="Mahdia">Mahdia</option>
                                        <option value="Sfax">Sfax</option>
                                        <option value="Gafsa">Gafsa</option>
                                        <option value="Tozeur">Tozeur</option>
                                        <option value="Kebili">Kebili</option>
                                        <option value="Tataouine">Tataouine</option>
                                        <option value="Medenine">Medenine</option>
                                        <option value="Gabès">Gabès</option>
                                        <!-- ... (other options) ... -->
                                        </select>
                                        </div>
                                    </td>
                                </tr>
                            
                                <tr>
                            <div class="form-group">
                                <td><label for="annee_exp" style="color:black">Année d'expérience:</label></td>
                                <td>
                                    <input type="text" class="form-control" id="annee_exp" name="annee_exp" value="<?php echo $trajet->getAnnee_exp(); ?>" required>
                                    <span id="erreurAnneeExp" style="color: red"></span>
                                </td>
                            </div>
                            </tr>
                            
                            
                            
                            <tr>
                            <div class="form-group">
                            <td><label for="routes_pre" style="color:black">Routes Préférées:</label></td>
                            <td>
                                <input type="text" class="form-control" id="routes_pre" name="routes_pre" value="<?php echo $trajet->getRoutesPreferees(); ?>" required>
                                <span id="erreurRoutesPre" style="color: red"></span>
                            </td>
                            </div>
                            </tr> 
                            
                            
                            <tr>
                            <div class="form-group">
                            <td><label style="color:black" for="pref_veh">Préférence Véhicule:</label></td>
                            <td>
                                <input type="text" class="form-control" id="pref_veh" name="pref_veh" value="<?php echo $trajet->getPreferenceVehicule(); ?>" required>
                                <span id="erreurPrefVeh" style="color: red"></span>
                            </td>
                            </div>
                            </tr>

                            <tr>
                            <div class="form-group">
                            <td><label style="color:white" for="comp_spe">Compétences Spéciales:</label></td>
                            <td>
                                <input  type="text" class="form-control" id="comp_spe" name="comp_spe" value="<?php echo $trajet->getCompetencesSpeciales(); ?>" required>
                                <span id="erreurCompSpe" style="color: red"></span>
                            </td>
                            </div>
                            </tr>

                            <td>
                            <input type="submit" class="ajout" value="save" name="updateTrajet" id="updateTrajet">
                            </td>
        </table>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        </body>

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
                             <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
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