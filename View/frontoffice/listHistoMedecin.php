<?php
include "../../Controller/HistoC.php";

$histoC = new HistoC();
$histoData = $histoC->listHisto();
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>Health Template - News Page</title>

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
                        <li class="appointment-btn"><a href="suiviemedecin.html">Acceuil</a></li>

                   </ul>
              </div>

         </div>
    </section>
    <section class="ordonnance">
        <?php
        foreach ($histoData as $idOrdo => $data) {
        ?>
        <form id="form">
            <center>
                <table class="dataTable" id="medicationTable">
                    <thead>
                        <tr class="col1">
                            <th>N°</th>
                            <th>Nom du médicament</th>
                            <th>Dosages</th>
                            <th>Durée du traitement</th>
                            <th>Remarques</th>
                            <th>idpat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $row) {
                        ?>
                            <tr>
                                <td><?= $row['numMedic']; ?></td>
                                <td><?= $row['nommed']; ?></td>
                                <td><?= $row['dosage']; ?></td>
                                <td><?= $row['duree']; ?></td>
                                <td><?= $row['rq']; ?></td>
                                <td><?= $row['idpat']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </center>
            <button type="button" class="bouton"  onclick="location.href='deleteHisto.php?idordo=<?= $idOrdo ?>';">Effacer l'ordonnance</button>
            <br><br><br><br><br>
        </form>
        <?php
        }
        ?>
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
