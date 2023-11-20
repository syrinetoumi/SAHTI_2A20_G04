<?php
include "../Controller/medecinM.php";

$c = new medecinM();
$tab = $c->listmed();

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

     <link rel="stylesheet" href="../asset/frontoffice/css/bootstrap.min.css">
     <link rel="stylesheet" href="../asset/frontoffice/css/magnific-popup.css">

     <link rel="stylesheet" href="../asset/frontoffice/css/font-awesome.min.css">
     <link rel="stylesheet" href="../asset/frontoffice/css/animate.css">

     <link rel="stylesheet" href="../asset/frontoffice/css/owl.carousel.css">
     <link rel="stylesheet" href="../asset/frontoffice/css/owl.theme.default.min.css">

     <link rel="stylesheet" href="../asset/frontoffice/css/ordoform.css"> 
     <link rel="stylesheet" href="../asset/frontoffice/css/rania.css">

   
</head>
<body background="../asset/frontoffice/images/pharmacien.jpg"  id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
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
                        <img src="../asset/frontoffice/images/logo.png" class="imglogo" alt="">
                   </div>
              </div>

              <div class="collapse navbar-collapse">
                   <ul class="nav navbar-nav navbar-right">
                        <li><a href="#footer" class="smoothScroll">Contact</a></li>
                        <li class="appointment-btn"><a href="acceuil.html">Acceuil</a></li>

                   </ul>
              </div>

         </div>
    </section>
    <section class="ordonnance" >
        <form id="form">
        <center><table class="dataTable" id="medicationTable">
            <thead>

            
                <tr class="col1">
                <th>Id_med</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Cin</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Specialite</th>
        <th>Mot de passe</th>
        <th>Mise a jour</th>
        <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
    foreach ($tab as $medecin) {
    ?>




        <tr>
        <td><?= $medecin['id_med']; ?></td>
            <td><?= $medecin['nom_med']; ?></td>
            <td><?= $medecin['prenom_med']; ?></td>
            <td><?= $medecin['cin_med']; ?></td>
            <td><?= $medecin['tel_med']; ?></td>
            <td><?= $medecin['e_mail_med']; ?></td>
            <td><?= $medecin['specialite_med']; ?></td>
            <td><?= $medecin['mdp_med']; ?></td>
           <td align="center">
                <form method="POST" action="updatemed.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $medecin['id_med']; ?> name="id_med">
                </form>
            </td>
            <td>
            <a href="deletemed.php?id_med=<?php echo $medecin['id_med']; ?>">Delete</a>
            </td>
        </tr> 
    <?php
    }
    ?>
            </tbody>
         </table></center>
            </tbody>
         </table></center>
    

        <br><br><br><br><br>

         </form>
    </section>

     

     <!-- SCRIPTS  <script src="../../asset/frontoffice/js/ordonnance.js"></script>-->
     <script src="../asset/frontoffice/js/jquery.js"></script>
     <script src="../asset/frontoffice/js/bootstrap.min.js"></script>
     <script src="../asset/frontoffice/js/jquery.sticky.js"></script>
     <script src="../asset/frontoffice/js/jquery.stellar.min.js"></script>
     <script src="../asset/frontoffice/js/jquery.magnific-popup.min.js"></script>
     <script src="../asset/frontoffice/js/magnific-popup-options.js"></script>
     <script src="../asset/frontoffice/js/wow.min.js"></script>
     <script src="../asset/frontoffice/js/smoothscroll.js"></script>
     <script src="../asset/frontoffice/js/owl.carousel.min.js"></script>
     <script src="../asset/frontoffice/js/custom.js"></script>

</body>
</html>