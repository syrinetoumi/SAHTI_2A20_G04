
<?php
session_start();
require_once '../../Controller/userC.php';

$userC = new userC();

// Vérifier si l'utilisateur est connecté et si le jeton est valide
if (!isset($_SESSION['token_u']) || !$userC->isTokenValid($_SESSION['email_u'], $_SESSION['token_u'])) {
    // Rediriger vers la page de connexion
    header("Location: seconnecter.php");
    exit();
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
     <link rel="stylesheet" href="../../asset/frontoffice/css/tooplate-style.css">


</head>
     <body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


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
                         <img src="../../asset/frontoffice/images/logo.png" class="imglogo" alt="">
                    </div>
               </div>

               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="rendez_vous.php" class="smoothScroll"> Rendez-vous</a></li><!-- rendez vous mn3and azouz -->
                         <li><a href="suivie.php" class="smoothScroll">Suivie</a></li> <!-- suive mn3and rania -->
                         <li><a href="profilmed.php" class="smoothScroll"> Mon profil</a></li><!-- profil selon le role -->
                         <li class="appointment-btn"><a href="../../view//frontoffice/deconnecter.php">Se deconnecter</a></li>
                         <li class="appointment-btn"><a href="../../view/frontoffice/acceil.html">Acceuil</a></li>


                    </ul>
               </div>

          </div>
     </section>
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3> ----------</h3>
                                             <h1>----------</h1>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Suivre votre patient en ligne .</h3>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Consulter les ordonnance de votre patient à tout moment
                                                  </h3>
                                             <h1>Suivie</h1>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>
    <!--<section id="cordonnee">
     <center>
     <table width="90%" height="182">
          <tr>
               <td colspan="7" align="center">
               <p align="center"><b>Mes informations </b></td>
          </tr>
          <tr>
               <td align="center" width="15%"><b>Nom</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
               <td align="center" width="15%"><b>Prenom</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
               <td align="center" width="15%"><b>Email</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
               <td align="center" width="15%"><b>Telephone</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
               <td align="center" width="15%"><b>Cin</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
               <td align="center" width="15%"><b>Specialite</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
               <td align="center" width="15%"><b>Mot de passe</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
          </tr>
          <tr>
               <td width="15%">&nbsp;</td>
               <td width="15%">&nbsp;</td>
               <td width="15%">&nbsp;</td>
               <td width="15%">&nbsp;</td>
               <td width="15%">&nbsp;</td>
               <td width="15%">&nbsp;</td>
               <td width="15%">&nbsp;</td>
          </tr>
     </table></center>
    </section>
    <br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>    <br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
    <br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>




    <section id="rend">
     <center>
          <table width="90%" height="182">
               <tr>
                    <td colspan="7" align="center">
                    <p align="center"><b>Mes rendez-vous </b></td>
               </tr>
               <tr>
                    <td align="center" width="15%"><b>Nom_Patient</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
                    <td align="center" width="15%"><b>Prenom_Patient</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
                    <td align="center" width="15%"><b>Telephone_Patient</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
                    <td align="center" width="15%"><b>Maladie</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</td>
                    <td align="center" width="15%"><b>Ordonnance</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>

               </tr>
               <tr>
                    <td width="15%">&nbsp;</td>
                    <td width="15%">&nbsp;</td>
                    <td width="15%">&nbsp;</td>
                    <td width="15%">&nbsp;</td>
                    <td width="15%">&nbsp;</td>
                    <td width="15%">&nbsp;</td>
                    <td width="15%">&nbsp;</td>
               </tr>
          </table></center>
    </section>

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
                          <form action="" class="tm-edit-product-form" name="ff" enctype="multipart/form-data">
                                   <table>
                  
                                        <tr>
                                             <td>
                                                  <div class="input-group mb-3">
                                                       <label for="expire_date" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom</label><br>
                                             </td>
                                             <td>
                                         <input  id="nom" name="name" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
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
                                                  <label for="specialite" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Specialite</label>
                                                  <br>
                                        </td>
                                        <td>
                                   <select  id="category">
                                             <option value="1">chirurgie</option>
                                             <option value="2">dentiste  </option>
                                             <option value="3">neurologue</option>
                                             <option value="4">generaliste   </option>
                                             <option value="5">psychiatre  </option>
                                             </select>
                                        </div>
                                        <br></td>
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
          </body>-->


                   
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