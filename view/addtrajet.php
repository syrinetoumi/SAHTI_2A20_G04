<?php
include '../Controller/trajetT.php';
include '../model/trajet.php';

$error = "";

// Create trajectory instance
$trajet = null;

// Create an instance of the controller
$trajetT = new TrajetT();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitTrajet"])) {

    if (
        
        isset($_POST["etat"]) &&
        isset($_POST["annee_exp"]) &&
        isset($_POST["routes_pre"]) &&
        isset($_POST["pref_veh"]) &&
        isset($_POST["comp_spe"])
    ) {
        if (
            !empty($_POST["etat"]) &&
            !empty($_POST["annee_exp"]) &&
            !empty($_POST["routes_pre"]) &&
            !empty($_POST["pref_veh"]) &&
            !empty($_POST["comp_spe"])
        ) {
            $trajet = new Trajet(
                null,
                $_POST["etat"],
                $_POST["annee_exp"],
                $_POST["routes_pre"],
                $_POST["pref_veh"],
                $_POST["comp_spe"]
            );

            $trajetT->ajouter($trajet);
            // Redirect to the listtrajet.php page after successful addition
            header('Location: listtrajet.php');
            exit; // Ensure no further code is executed after the redirection
        } else {
            $error = "Missing information";
        }
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
     <link rel="stylesheet" href="../asset/frontoffice/css/bootstrap.min.css">
     <link rel="stylesheet" href="../asset/frontoffice/css/css/font-awesome.min.css">
     <link rel="stylesheet" href="../asset/frontoffice/css/animate.css">
     <link rel="stylesheet" href="../asset/frontoffice/css/owl.carousel.css">
     <link rel="stylesheet" href="../asset/frontoffice/css/owl.theme.default.min.css">
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

          option , #etat{
            color: #b1fa07;
            background-color: #252525;
        }
         
     </style>

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../asset/frontoffice/css/tooplate-style.css">

</head>
<body>
<body  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

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
                    <img src="../asset/frontoffice/img/logo.png" class="imglogo" alt="">
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

<a href="listvehicule.php">Back to list</a>
<hr>

<div id="error">
   <?php echo $error; ?>
</div>
    <!-- Your HTML body content -->
    <form method="POST" action="addtrajet.php" id="trajetForm">
    <input type="hidden" name="formType" value="trajet">

        <section id="rend">
     <table width="80%" style="margin: 0 auto; border-collapse: collapse; border: 2px solid black; background-color: #f2f2f2;">
       <tr>
         <td colspan="6" align="center" style="border-bottom: 2px solid black;">
           <b id="mod">Trajet</b>
         </td>
       </tr>
       <tr>
         <td align="center" width="16.67%" style="border-right: 2px solid black;"><b>Etat</b></td>
         <td align="center" width="16.67%" style="border-right: 2px solid black;"><b>Année d'expérience</b></td>
         <td align="center" width="16.67%" style="border-right: 2px solid black;"><b>Routes préférées</b></td>
         <td align="center" width="16.67%" style="border-right: 2px solid black;"><b>Préférence de véhicule</b></td>
         <td align="center" width="16.67%" style="border-right: 2px solid black;"><b>Compétences spéciales</b></td>
       </tr>
       <tr style="border-top: 2px solid black;">
         <td style="border-right: 2px solid black;">
           <b><div class="input-group mb-3">
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
           </div></b>
         </td>
         <td align="center" width="16.67%" style="border-right: 2px solid black;">
           <input value="" id="annee_exp" name="annee_exp" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_annee"></div>
         </td>
         <td style="border-right: 2px solid black;"><b><input value="" id="routes_pre" name="routes_pre" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_route"></div></b></td>
         <td style="border-right: 2px solid black;"><b><input value="" id="pref_veh" name="pref_veh" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_preference"></div></b></td>
         <td style="border-right: 2px solid black;"><b><input value="" id="comp_spe" name="comp_spe" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"><div id="vide_competence"></div></b></td>
       </tr>
     </table>
   </section>
<br><br>
<section id="b-ajouter-trajet" class="container text-center">
     <div class="row">
         <div class="col-md-12">
         <button type="submit" class="ajout" id="misTrajet" name="submitTrajet">Ajouter</button>

         </div>
     </div>
 </section>
        </form>

    <!-- Add your scripts or other body content if needed -->
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
<script src="../asset/frontoffice/js/jquery.js"></script>
<script src="../asset/controllerjs/bootstrap.min.js"></script>
<script src="../asset/frontoffice/js/jquery.sticky.js"></script>
<script src="../asset/frontoffice/js/jquery.stellar.min.js"></script>
<script src="../asset/frontoffice/js/jquery.sticky.js"></script>
<script src="../asset/frontoffice/js/smoothscroll.js"></script>
<script src="../asset/frontoffice/js/owl.carousel.min.js"></script>
<script src="../asset/frontoffice/js/custom.js"></script>
<script src="../asset/frontoffice/js/trajet.js"></script>

</html>
