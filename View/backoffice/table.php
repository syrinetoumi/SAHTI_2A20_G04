



<?php
include "../../Controller/MedicC.php";

$c = new MedicC();
$tab = $c->listMedic();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../../asset/backoffice/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/tooplate.css">
    <link rel="stylesheet" href="../../asset/backoffice/css/tablemedback.css"> 
</head>

<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <div class="logo">
                            <img src="../../asset/backoffice/img/logo.png" class="imglogo" alt="">
                       </div>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="index.html">Yearly Report</a>
                                </div>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" href="products.html">Ordonnances</a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="#">Médicaments</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Settings
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Billing</a>
                                    <a class="dropdown-item" href="#">Customize</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.html">
                                    <div class="hov"> <i class="far fa-user mr-2 tm-logout-icon" id="c1"></i>
                                     <span id="log">Déconnecter</span></div>
                                 </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
                </div>
            
    

<section class="med" >
  <center><div>
         <h4 >Gérer les médicaments</h4>
       </div></center>
       <br><br><br><br><br>
<form id="form">
<center><table class="dataTable" id="medicationTable">
    <thead>
        <tr class="col1">
            <th>Id</th>
            <th>Medicament</th>
            <th>Photo</th>
            <th></th>
            <th>Actions</th>
            <th></th>
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
            <td align="center">
                 <form method="POST" action="updateMedicAdmin.php">
                      <button class="bouton2" type="submit" name="update" >Modifier</button>
                      <input type="hidden" value="<?= $medic['idmed']; ?>" name="id">
                 </form>
            </td>
            <td>
            <button class="bouton2" onclick="window.location.href='deleteMedicAdmin.php?idmed=<?= $medic['idmed']; ?>'">Supprimer</button>

            </td>
                 </tr>
  <?php
  }
  ?>
            </tbody>
       </table></center>
       <button type="button" class="bouton" onclick="location.href='addMedicAdmin.php';">Ajouter un médicament</button>
       <br><br><br><br><br>
       
 </form>
</section>




        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2023/2024 Esprit école sup privée
                </p>
            </div>
        </footer>
    </div>

    <script src="../../asset/backoffice/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../../asset/backoffice/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>