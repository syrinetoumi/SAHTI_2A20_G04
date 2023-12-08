<?php
include '../../Controller/RDV_analyse_imagerieC.php';
include_once '../../config.php';

$c = new RDV_analyse_imagerieC();
$tab = $c->displayRDV_analyse_imagerie();
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
     <link rel="stylesheet" href="../../asset/frontoffice/css/analyse.css"> 
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
                         <img src="../../asset/frontoffice/img/logo.png" class="imglogo" alt="">
                    </div>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.html">Accueil</a></li>
                         <li><a href="#rend" class="smoothScroll">Mes rendez-vous</a></li>
                         <li><a href="#cordonnee" class="smoothScroll">Mes cordonnée</a></li>
                         <li><a href="#profupdate" class="smoothScroll">Modifier mon profil</a></li>

                        <!-- <li class="appointment-btn"><a href="C:\Users\1cyri\OneDrive\Bureau\projet\View\upmed.html">Modifier mon profil  </a></li>-->
                         <li class="appointment-btn"><a href="../View/formulaire.html">se deconnecter</a></li>

                    </ul>
               </div>

          </div>
          
     </section>
     <br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
     <br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<br><br<br<br><br><br<br<br><br><br<br<br><br><br<br<br>
<!-- ... existing code ... -->
<section class="ordonnance" >
        <form id="form">
        <center><table class="dataTable" id="medicationTable">
            <thead>
                <tr class="col1">
                <th >ID</th>
                <th>Centre Analyse</th>
                <th>Imagerie</th>
                <th>Nom Radiologue</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
    foreach ($tab as $rdv) {
    ?>




        <tr>
        <td><?= $rdv['id']; ?></td>
            <td><?= $rdv['centre_analyse']; ?></td>
            <td><?= $rdv['imagerie']; ?></td>
            <td><?= $rdv['nom_radiologue']; ?></td>
            <td align="center">
                <form method="POST" action="updateAnalyse.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $rdv['id']; ?>" name="id">
                </form>
            </td>
            <td>
                <a href="deleteAnalyse.php?id=<?php echo $rdv['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
            </tbody>
         </table></center>
            </tbody>
         </table></center>
         <button type="button" class="bouton" onclick="location.href='addAnalyse.php';">Prendre un rendez-vous</button>

        <br><br><br><br><br>

         </form>
    </section>

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

     <!-- SCRIPTS -->
     <script src="../../asset/frontoffice/js/jquery.js"></script>
     <script src="../../asset/frontoffice/js/bootstrap.min.js"></script>
     <script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
     <script src="../asset/frontoffice/js/jquery.stellar.min.js"></script>
     <script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
     <script src="../../asset/frontoffice/js/smoothscroll.js"></script>
     <script src="../../asset/frontoffice/js/owl.carousel.min.js"></script>
     <script src="../../asset/frontoffice/js/custom.js"></script>

</html>