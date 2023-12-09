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
                         <img src="../../asset//frontoffice/images/logo.png" class="imglogo" alt="">
                    </div>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.html">Accueil</a></li>
                         <li><a href="suiviecoach.php" class="smoothScroll">Liste des utilisateurs</a></li>
                         <li><a href="rendezvoussportif.php" class="smoothScroll"></a></li>
                         <li><a href="profiladmin.php" class="smoothScroll">Profil</a></li>

                         <li class="appointment-btn"><a href="../../View/frontoffice/deconnecter.php">se deconnecter</a></li>

                    </ul>
               </div>

          </div>
     </section>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>

    
  




<section id="profupdate">

     <div id="for">
     <div class="row tm-mt-big">
          <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
              <div class="bg-white tm-block">
                  <div class="row">
                      <div class="col-12">
                          <h2 id="mod">Modifier votre profil</h2>
                      </div>
                  </div>
                  <div class="row mt-4 tm-edit-product-row">
                      <div class="col-xl-7 col-lg-7 col-md-12">
                          <form action="" class="tm-edit-product-form" name="ff">
                                   <table>
                  
                                        <tr>
                                             <td>
                                                  <div class="input-group mb-3">
                                                       <label for="expire_date" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom</label><br>
                                             </td>
                                             <td>
<input id="nom" name="name" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                          </div>
                                          <br>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <div class="input-group mb-3">
                                                       <label for="prenom" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Prenom
                                                       </label>
                                             </td>
                                             <td>
          
                                                  <input  id="pre" name="pre" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                             </div>
                                             <br>
                                             </td>
                                        </tr>
                                  
                                   <tr>
                                        <td>
                                             <div class="input-group mb-3">
                                                  <label for="tel" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Telephone</label><br>
                                        </td>
                                        <td>
                                    <input placeholder="telephone "  id="tel" name="tel" type="tel" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                   data-large-mode="true">
                                     </div>
                                     <br>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <div class="input-group mb-3">
                                                  <label for="stock" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Cin
                                                  </label>
                                        </td>
                                        <td>

                                             <input placeholder="cin"  id="cin" name="cin" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7">
                                        </div>
                                        <br>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <div class="input-group mb-3">
                                                  <label for="amdp" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Ancien mot de passe
                                                  </label>
                                        </td>
                                        <td>

                                             <input placeholder="amdp"  id="amdp" name="amdp" type="password" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7">
                                        </div>
                                        <br>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <div class="input-group mb-3">
                                                  <label for="stock" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nouveau mot de passe
                                                  </label>
                                        </td>
                                        <td>
                                             <input placeholder="nouveau mot de passe"  id="nmdp" name="nmdp" type="password" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7">
                                        </div>
                                        <br>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                                                 
                                                  <img src="../../asset/frontoffice/images/tele.png" alt="Profile Image" class="img-fluid mx-auto d-block" width="50" height="50"></td>
                                   </tr><tr> <td ><div class="custom-file mt-3 mb-3" >
                                                      <input id="fileInput" type="file" style="display:none;" width="250">
                                                      <input type="button"  value="Mise a jour ..." onclick="document.getElementById('fileInput').click();"/ ></td></tr>
                                                  </div>
                                                  <tr>
                                                       <td>
                                                                      <div class="input-group mb-3">
                                                                           <div >
                                                                               <button type="submit" class="appointment-btn" id="mis">Mise a jour
                                                                               </button>
                                                                           </div>
                                                       </td>
                                                       <td>

                                                            <div class="input-group mb-3">
                                                                 <div >
                                                                     <button type="submit" class="appointment-btn" id="mis">Supprimer mon compte
                                                                     </button>
                                                                 </div>  
                                                       </td>
                                                  </tr>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                      </div>
                                        </td>
                                   </tr>
                                   </table>
                              </div>
                         </form>
                     </div> 
                    </div>
               </section>
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