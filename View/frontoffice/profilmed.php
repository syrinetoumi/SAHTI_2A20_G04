<?php
include '../../Controller/userC.php';
include '../../model/user.php';

$error = "";

// create user
$user = null;
// create an instance of the controller
$userC = new userC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["nom_u"]) &&
        isset($_POST["prenom_u"]) &&
        isset($_POST["cin_u"]) &&
        isset($_POST["tel_u"]) &&
        isset($_POST["email_u"]) && // Update to match the input name in the form
        isset($_POST["role_u"]) &&
        isset($_POST["mdp_u"])
    ) {
        if (
            !empty($_POST['nom_u']) &&
            !empty($_POST["prenom_u"]) &&
            !empty($_POST["cin_u"]) &&
            !empty($_POST["tel_u"]) &&
            !empty($_POST["email_u"]) && // Update to match the input name in the form
            !empty($_POST["role_u"]) &&
            !empty($_POST["mdp_u"])
        ) {
            // Update the following line to use the correct properties of the user object
            $user = new user(
                null,
                $_POST['nom_u'],
                $_POST['prenom_u'],
                $_POST['cin_u'],
                $_POST['tel_u'],
                $_POST['email_u'], // Update to match the input name in the form
                $_POST['role_u'],
                $_POST['mdp_u']
            );

            $userC->updateuser($user, $_POST['id_u']);

            // Add these lines for debugging
            echo "Update request processed.<br>";
            echo "ID: " . $_POST['id_u'] . "<br>";
            echo "Nom: " . $_POST['nom_u'] . "<br>";
            echo "Prenom: " . $_POST['prenom_u'] . "<br>";
            echo "CIN: " . $_POST['cin_u'] . "<br>";
            echo "EMAIL: " . $_POST['email_u'] . "<br>"; 
            echo "TEL: " . $_POST['tel_u'] . "<br>";
            echo "ROLE: " . $_POST['role_u'] . "<br>";
            echo "MOT DE PASSE: " . $_POST['mdp_u'] . "<br>";

            // ...

            header('Location: listuser.php');
            exit;
        } else {
            $error = "Missing information";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>E-SAHTI</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <script src="../asset/frontoffice/css/bootstrap.min.css"></script>

     <link rel="stylesheet" href="../../asset/frontoffice/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/animate.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.carousel.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.theme.default.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/style123.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../asset/frontoffice/css/tooplate-style.css">


</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>

<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<center>
<h1> Mon profile</h1>

<section>

<div class="box1 box">
  <div class="content">
    <div class="image">
      <img src="../../asset//frontoffice/images/medecin.png" alt="Profile Image" width="500" >
    </div>
 
    <div class="text">
      <p class="name">Rania tmar</p>
      <p class="job_title">MEDECIN</p>
      <p class="job_discription">id=6 <br> Numero telephone: 90856321<br>Cin : 00012365 <br>Email: rania.tmar@esprit.tn <br>.</p>
    </div>
    <div class="icons">
      <button>
        <ion-icon name="logo-dribbble"></ion-icon>
      </button>
      <button>
        <ion-icon name="logo-instagram"></ion-icon>
      </button>
      <button>
        <ion-icon name="logo-twitter"></ion-icon>
      </button>
      <button>
        <ion-icon name="logo-linkedin"></ion-icon>
      </button>
      <button>
        <ion-icon name="logo-facebook"></ion-icon>
      </button>
      <button>
        <ion-icon name="logo-behance"></ion-icon>
      </button>
    </div>
    <div class="button">
      <div>
        <button class="message" type="button"><a href="acceil.html">déconnecter</a></button>
      </div>
      <div>
        <button class="connect" type="button"><a href="med.php">Retour</a></button>
      </div>
    </div>
  </div>
</div>
</section>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


                   
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
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    </div>
               </div>
          
     </footer>

     <!-- SCRIPTS 
     <script src="../Controller/custom.js"></script>-->





     <script src="../../asset/frontoffice/js/jquery.js"></script>
     <script src="../../asset/frontoffice/js/bootstrap.min.js"></script>
     <script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
     <script src="../../asset/frontoffice/js/jquery.stellar.min.js"></script>
    <!--<script src="../../asset/frontoffice/js/jquery.magnific-popup.min.js"></script>
     <script src="../../asset/frontoffice/js/magnific-popup-options.js"></script>--> 
     <script src="../../asset/frontoffice/js/wow.min.js"></script>
     <script src="../../asset/frontoffice/js/smoothscroll.js"></script>
     <script src="../../asset/frontoffice/js/owl.carousel.min.js"></script>
     <script src="../../asset/frontoffice/js/custom.js"></script>
     <script src="../../asset/frontoffice/js/controle.js"></script>
     <script src="../../asset/frontoffice/js/valider.js"></script>



</html>