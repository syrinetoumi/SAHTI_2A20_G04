<?php
include "../../Controller/MedicC.php";

$c = new MedicC();
$tab = $c->listMedic();

// Check if a search query is provided
if (isset($_GET['search'])) {
     $search = htmlspecialchars($_GET['search']);
     $tab = $c->searchMedic($search);
 } else {
     $tab = $c->listMedic();
 }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>medicamentspatient</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="../../asset/frontoffice/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/magnific-popup.css">

     <link rel="stylesheet" href="../../asset/frontoffice/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/animate.css">

     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.carousel.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.theme.default.min.css">

     
     <link rel="stylesheet" href="../../asset/frontoffice/css/rania.css"> 
     <link rel="stylesheet" href="../../asset/frontoffice/css/tablemed.css"> 


     
          

     
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
         <div class="spinner">

              <span class="spinner-rotate"></span>
              
         </div>
    </section>
    
    <section class="navbar navbar-default navbar-static-top" role="navigation" id="NAV">
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
                        <li><a href="#footer" class="smoothScroll">Contact</a></li>
                        <li class="appointment-btn"><a href="suiviemedecin.html">Acceuil</a></li>

                   </ul>
              </div>

         </div>
    </section>


    

<!-- Search Form -->
<section>
        <form method="GET" action="listMedic.php">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search for medicines" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
</section>




   
   <section class="ordonnance" >
          <center><div>
                 <h4 >Quelques médicaments</h4>
                 <p >Ajouter, Modifier et Supprimer !</p>
               </div></center>
               <br><br><br><br><br>
        <form id="form">
        <center><table class="dataTable" id="medicationTable">
            <thead>
                <tr class="col1">
                    <th>Id</th>
                    <th>Medicament</th>
                    <th>Photo</th>
                    <th>Lien</th>
                </tr>
            </thead>
            <tbody>
                    <?php
          foreach ($tab as $medic) {
          ?>

          <tr>
                    <td><?= $medic['idmed']; ?></td>
                    <td><?= $medic['medicament']; ?></td>
                    
                    <td>
                    <img src="../../asset/frontoffice/images/<?php echo $medic['photo']; ?>" class="imgmed">
                    </td>
          <td>
          <button class="bouton2" onclick="window.open('<?= $medic['lien']; ?>', '_blank')">Consulter</button>
          </td>
                    
                         </tr>
          <?php
          }
          ?>
                    </tbody>
               </table></center>
               <button type="button" class="bouton" onclick="location.href='addMedic.php';">Ajouter un médicament</button>
               <br><br><br><br><br>
               
         </form>
    </section>

    
     
     <footer data-stellar-background-ratio="5" id="footer">
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
     <script src="../../asset/frontoffice/js/jquery.magnific-popup.min.js"></script>
     <script src="../../asset/frontoffice/js/magnific-popup-options.js"></script>
     <script src="../../asset/frontoffice/js/wow.min.js"></script>
     <script src="../../asset/frontoffice/js/smoothscroll.js"></script>
     <script src="../../asset/frontoffice/js/owl.carousel.min.js"></script>
     <script src="../../asset/frontoffice/js/custom.js"></script>

</body>
</html>