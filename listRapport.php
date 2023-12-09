<?php
include "../../controller/RapportR.php";

$rapportR = new RapportR();
$tab = $rapportR->listRapport();

?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Rapport</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet" href="../../asset/frontoffice/css/bootstrap.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/css/font-awesome.min.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/animate.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.carousel.css">
     <link rel="stylesheet" href="../../asset/frontoffice/css/owl.theme.default.min.css">
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

          .bouton {
            background: #b1fa07;
            border-radius: 3px;
            color: #1c1c1c;
            font-weight: 100;
            padding-top: 12px;
            padding-bottom: 12px;
            margin-top: 10px;
            align:center;
            }

            .bouton:hover {
            background: white;
             color: #1c1c1c !important;
            }

            .boutondel {
            background: red;
            border-radius: 3px;
            color: #1c1c1c;
            font-weight: 100;
            padding-top: 12px;
            padding-bottom: 12px;
            margin-top: 10px;
            align:center;
            }

          option , #etat{
            color: #b1fa07;
            background-color: #252525;
        }
        .background {
	background-image: url("../../asset/frontoffice/img/slider3.jpg") !important;
}

.styleTable{
      color:black;
      border-color: white !important;
    }
    .tableheader{
     color:white;
     background-color:black;
     border: 2px solid white;
    }
    #aa{
  color: #699f13;
}
#aa:hover{color:#b1fa07;
}

     </style>

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="../../asset/frontoffice/css/tooplate-style.css">

</head>



<body background="../../asset/frontoffice/img/pharmacien.jpg"  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

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
                         <img src="../../asset/frontoffice/img/logo.png" class="imglogo" alt="">
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

<br><br><br><br>
<center>
    <h1>Liste des Rapports</h1>
    <h2>
        <a href="addRapport.php" id="aa">Ajouter Rapport</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        
        <th>Seances Restantes</th>
        <th>Progrés</th>
        <th>satisfaction</th>
        
    </tr>


    <?php
    foreach ($tab as $rapport) {
    ?>




        <tr>
            <td><?= $rapport['idprogramme']; ?></td>
            <td><?= $rapport['seances_restantes']; ?></td>
            <td><?= $rapport['progres']; ?></td>
            <td><?= $programme['satisfaction']; ?></td>
            
            <td align="center">
                <form method="POST" action="updateRapport.php">
                <button style="width: 115.2px;color:green" class="bouton" id="up1"type="submit" name="update" value="Update">
                    <!--input type="submit" name="update" value="Update"-->
                    <input type="hidden" value=<?PHP echo $rapport['seances_restantes']; ?> name="seances_restantes">Mise a jour
                </button>
                </form>
            </td>
            <td>
    <form method="GET" action="deleteRapport.php">
        <input type="hidden" value="<?= $rapport['idprogramme']; ?>" name="id">
        <button style="width: 115.2px; color: black" class="boutondel" id="up1" type="submit" name="del" value="del">
            Delete
        </button>
    </form>
</td>

        </tr>
    <?php
    }
    ?>
</table>


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
<script src="../../asset/frontoffice/js/jquery.js"></script>
<script src="../../asset/controllerjs/bootstrap.min.js"></script>
<script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
<script src="../../asset/frontoffice/js/jquery.stellar.min.js"></script>
<script src="../../asset/frontoffice/js/jquery.sticky.js"></script>
<script src="../../asset/frontoffice/js/smoothscroll.js"></script>
<script src="../../asset/frontoffice/js/owl.carousel.min.js"></script>
<script src="../../asset/frontoffice/js/custom.js"></script>
<script src="../../asset/frontoffice/js/vehicule.js"></script>
<!--script src="../../asset/frontoffice/js/trajet.js"></script-->


</html>