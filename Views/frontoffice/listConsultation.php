<?php
include '../../Controller/RDV_ConsultationC.php';

$c = new RDV_ConsultationC();
$tab = $c->displayRDV_Consultation();
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

     <link rel="stylesheet" href="../../asset/frontoffice/css/consultation.css"> 
     <link rel="stylesheet" href="../../asset/frontoffice/css/tooplate-style.css">

   
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
                        <img src="../../asset/frontoffice/img/logo.png" class="imglogo" alt="">
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
    <section class="ordonnance" >
        <form id="form">
        <center><table class="dataTable" id="medicationTable">
            <thead>
                <tr class="col1">
                <th >CIN</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Maladie</th>
                <th>Date RDV</th>
                <th>Nom Médecin</th>
                <th>Adresse Médecin</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
    foreach ($tab as $rdv) {
    ?>




        <tr>
        <td><?= $rdv['cin']; ?></td>
            <td><?= $rdv['nom']; ?></td>
            <td><?= $rdv['prenom']; ?></td>
            <td><?= $rdv['email']; ?></td>
            <td><?= $rdv['tel']; ?></td>
            <td><?= $rdv['maladie']; ?></td>
            <td><?= $rdv['dateRdv']; ?></td>
            <td><?= $rdv['nom_medecin']; ?></td>
            <td><?= $rdv['adresse_medecin']; ?></td>
            <td align="center">
                <form method="POST" action="updateconsultation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $rdv['cin']; ?>" name="cin">
                </form>
            </td>
            <td>
            <form method="POST" action="deleteconsultation.php">
                    <input type="submit" name="delete" value="Delete" style="height: 36px;width: 76px;">
                    <input type="hidden" value="<?= $rdv['cin']; ?>" name="cin">
                    <!-- Add similar hidden fields for other properties of RDV_Consultation -->
                </form>            </td>
        </tr>
    <?php
    }
    ?>
            </tbody>
         </table></center>
            </tbody>
         </table></center>
         <button type="button" class="bouton" onclick="location.href='addConsultation.php';">Prendre un rendez-vous</button>

        <br><br><br><br><br>

         </form>
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

