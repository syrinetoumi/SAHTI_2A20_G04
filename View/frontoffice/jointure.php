
<?php
include '../../controller/MedicC.php';

$medicC = new MedicC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['medicament']) && isset($_POST['search'])) {
        $idMedicament = filter_var($_POST['medicament'], FILTER_VALIDATE_INT);
        if ($idMedicament !== false) {
            $list = $medicC->afficheOrdos($idMedicament);
        }
    }
}

$medicaments = $medicC->afficheMedics();
?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>Recherche d'ordonnances par médicament</title>

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

     <link rel="stylesheet" href="../../asset/frontoffice/css/ordoform.css"> 
     <link rel="stylesheet" href="../../asset/frontoffice/css/rania.css">

   
</head>
<body background="../../asset/frontoffice/images/pharmacien.jpg"  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <!-- PRE LOADER -->
    <section class="preloader">
         <div class="spinner">

              <span class="spinner-rotate"></span>
              
         </div>
    </section>


    
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
                        <li><a href="#footer" class="smoothScroll">Contact</a></li>
                        <li class="appointment-btn"><a href="indexmedecin.html">Acceuil</a></li>

                   </ul>
              </div>

         </div>
    </section>
<section>
    <h4>Recherche d'ordonnances par médicament</h4>
    <form action="" method="POST">
        <label for="medicament">Sélectionnez un médicament :</label>
        <select name="medicament" id="medicament" required>
            <?php foreach ($medicaments as $medicament) { 
                echo '<option value="' . $medicament['idmed'] . '">' . $medicament['medicament'] . '</option>';
            } ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>

    <?php if (isset($list)) { ?>
        <br>
        <h4>Ordonnances correspondantes au médicament sélectionné :</h4>
        <ul>
            <?php foreach ($list as $ordo) { ?>
                <li><?= $ordo['nommed'] ?> - <?= $ordo['dosage'] ?> - <?= $ordo['duree'] ?> - <?= $ordo['rq'] ?> - <?= $ordo['genre'] ?></li>
            <?php } ?>
        </ul>
    <?php } ?>

</section>
 <!-- SCRIPTS  <script src="../../asset/frontoffice/js/ordonnance.js"></script>-->
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

