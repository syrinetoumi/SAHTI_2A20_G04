<?php
include "../../Controller/MedicC.php";

$c = new MedicC();
$tab = $c->listFav();

// Check if a search query is provided
if (isset($_GET['search'])) {
     $search = htmlspecialchars($_GET['search']);
     $tab = $c->searchFav($search);
 } else {
     $tab = $c->listFav();
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
     <link rel="stylesheet" href="../../asset/frontoffice/css/shop.css"> 

     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../../asset/frontoffice/css/search.css"> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
     
          

     
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


<br><br><br><br>
<section>
     <div class="wrapper">
                         <div class="SEARCHcontainer">
                              <form role="search" method="get" action="listFav.php" class="search-form form">
                              <label>
                                   <span class="screen-reader-text">Search for...</span>
                                   <input type="search" class="search-field" placeholder="Trouver des médicaments..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" name="search" title="" />
                              </label>
                              <input type="submit" class="search-submit button" value="&#xf002" />
                         </form>
                         </div>
                         </div>
</section>
<br><br><br><br>
<section class="meds">
    <div class="responsive-container">
        <div class="grid">
            <?php foreach ($tab as $medic) { ?>
                <div class="grid-column">
                    <div class="product">
                        <div class="product-image">
                            <img src="../../asset/frontoffice/images/<?php echo $medic['photo']; ?>" class="imgmed" width="300px" height="250px">
                        </div>
                        <div class="product-content">
                            <div class="product-info">
                                <center><p class="product-title"><?= $medic['medicament']; ?></p></center>
                              <button class="bouton2" onclick="window.open('<?= $medic['lien']; ?>', '_blank')">Consulter</button>
                              <button class="bouton3">Supp</button>
                            </div>
                          
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <br><br><br><br><br>
</section>



   
   
<br><br><br><br>

    
     
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
     <script src="../../asset/frontoffice/js/cartanimation.js"></script>

</body>
</html>