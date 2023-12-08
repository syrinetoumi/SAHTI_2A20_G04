<?php
include '../../Controller/RDV_ConsultationC.php';
include '../../model/RDV_Consultation.php';

$error = "";

// create consultation
$consultation = null;
// create an instance of the controller
$rdvConsultationC = new RDV_ConsultationC();

if (
    isset($_POST["cin"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["maladie"]) &&
    isset($_POST["dateRdv"]) &&
    isset($_POST["nom_medecin"]) &&
    isset($_POST["adresse_medecin"])
) {
    if (
        !empty($_POST['cin']) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["maladie"]) &&
        !empty($_POST["dateRdv"]) &&
        !empty($_POST["nom_medecin"]) &&
        !empty($_POST["adresse_medecin"])
    ) {
        $consultation = new RDV_Consultation(
            $_POST['cin'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['maladie'],
            $_POST['dateRdv'],
            $_POST['nom_medecin'],
            $_POST['adresse_medecin']
        );

        $rdvConsultationC->updateRDV_Consultation($consultation);

        // Redirect to listConsultation.php after successful update
        header('Location: listConsultation.php');
        exit; // Ensure no further code is executed after the redirection
    } else {
        $error = "Missing information";
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
     <script src="../../asset/frontoffice/css/bootstrap.min.css"></script>

     <link rel="stylesheet" href="../../asset/frontoffice/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../asset/frontoffice/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../asset/frontoffice/css/animate.css">
    <link rel="stylesheet" href="../../asset/frontoffice/css/owl.carousel.css">
    <link rel="stylesheet" href="../../asset/frontoffice/css/owl.theme.default.min.css">
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../asset/frontoffice/css/tooplate-style.css">


</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <a href="listConsultation.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_POST['cin'])) {
        $consultation = $rdvConsultationC->getConsultation($_POST['cin']);
    ?>
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

                    <!-- <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>ealth Center</a> -->
                    <div class="logo">
                         <img src="../../asset/frontoffice/img/logo.png" class="imglogo" alt="">
                    </div>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.html">Accueil</a></li>
                         <li><a href="#rend" class="smoothScroll">Mes rendez-vous</a></li>
                         <li><a href="#cordonnee" class="smoothScroll">Mes cordonnée</a></li>
                         <li><a href="#profupdate" class="smoothScroll">Modier mon profil</a></li>

                        <!-- <li class="appointment-btn"><a href="C:\Users\1cyri\OneDrive\Bureau\projet\View\upmed.html">Modifier mon profil  </a></li>-->
                         <li class="appointment-btn"><a href="../View/formulaire.html">se deconnecter</a></li>

                    </ul>
               </div>

          </div>
          
     </section>

        <form action="updateconsultation.php" method="POST">
            <table>
                <tr>
                    <td><label for="cin">CIN:</label></td>
                    <td>
                        <input id="cin" name="cin" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['cin'] ?>" readonly />
                        <span id="erreurCIN" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                    <input id="nom" name="nom" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['nom'] ?>"/>
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prenom :</label></td>
                    <td>
                    <input id="prenom" name="prenom" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['prenom'] ?>"/>
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                    <input id="email" name="email" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['email'] ?>"/>
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="tel">Tel :</label></td>
                    <td>
                    <input id="tel" name="tel" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['tel'] ?>"/>
                        <span id="erreurTel" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="maladie">Maladie :</label></td>
                    <td>
                    <input id="maladie" name="maladie" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['maladie'] ?>"/>
                        <span id="erreurMaladie" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="dateRdv">Date RDV :</label></td>
                    <td>
                    <input id="dateRdv" name="dateRdv" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['dateRdv'] ?>"/>
                        <span id="erreurDateRdv" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_medecin">Nom Médecin :</label></td>
                    <td>
                    <input id="nom_medecin" name="nom_medecin" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['nom_medecin'] ?>"/>
                        <span id="erreurNomMedecin" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="adresse_medecin">Adresse Médecin :</label></td>
                    <td>
                    <input id="adresse_medecin" name="adresse_medecin" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" value="<?php echo $consultation['adresse_medecin'] ?>"/>
                        <span id="erreurAdresseMedecin" style="color: red"></span>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Save" class="appointment-btn" id="mis" style="height: 36px;width: 76px;">
                </td>
                <td>
                <td>
    <button type="button" class="appointment-btn" id="mis" style="height: 36px; width: 76px;" onclick="window.location.href='listConsultation.php'">Show List</button>
</td>
            </table>
        </form>
    <?php
    }
    ?>
</body>
<!-- footer-->
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

     <!-- SCRIPTS -->
     <script src="../../asset/frontoffice/js/jquery.js"></script>
     <script src="../../asset/frontoffice/js/bootstrap.min.js"></script>
     <script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
     <script src="../../asset/frontoffice/js/jquery.stellar.min.js"></script>
     <script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
     <script src="../../asset/frontoffice/js/smoothscroll.js"></script>
     <script src="../../asset/frontoffice/js/owl.carousel.min.js"></script>
     <script src="../../asset/frontoffice/js/custom.js"></script>
     <script src="../../asset/frontoffice/js/addconsultation.js"></script>


</html>
