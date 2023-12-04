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
    <link rel="stylesheet" href="../../asset/frontoffice/css/search.css">  
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
                                <a class="nav-link" href="listOrdoAdmin.php">Ordonnances</a>
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
            
    <br><br><br><br><br>
    <section>
     <div class="wrapper">
                         <div class="SEARCHcontainer">
                              <form role="search" method="get" action="listMedicAdmin.php" class="search-form form">
                              <label>
                                   <span class="screen-reader-text">Search for...</span>
                                   <input type="search" class="search-field" placeholder="Trouver des médicaments..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" name="search" title="" />
                              </label>
                              <input type="submit" class="search-submit button" value="&#xf002" />
                         </form>
                         </div>
                         </div>
</section>
<br><br><br>
<section>
  <table>
      <thead>
          <tr class="thead">
          <th scope="col">Id</th>
          <th scope="col">Medicament</th>
          <th scope="col">Photo</th>
          <th scope="col">Lire</th>
          <th scope="col">Modifier</th>
          <th scope="col">Supp</th>
          
          </tr>
      </thead>
      <tbody>
      <?php
foreach ($tab as $medic) {
?>

          <tr>
          <td data-label="Name"><?= $medic['idmed']; ?></td>
          <td data-label="Title"><?= $medic['medicament']; ?></td>
          <td data-label="Website"> <img src="../../asset/frontoffice/images/<?php echo $medic['photo']; ?>" class="imgmed"></td>
          <td data-label="Role"><button  onclick="window.open('<?= $medic['lien']; ?>', '_blank')">Consulter</button></td>
          <td data-label="Role">
          <form method="POST" action="updateMedicAdmin.php">
                      <button  type="submit" name="update" >Modifier</button>
                      <input type="hidden" value="<?= $medic['idmed']; ?>" name="id">
                 </form>
          </td>
          <td data-label="Role"> <button onclick="window.location.href='deleteMedicAdmin.php?idmed=<?= $medic['idmed']; ?>'">Supprimer</button></td>
          
          </tr>
<?php
}
?>
      </tbody>
      </table>
      <button type="button"  onclick="location.href='addMedicAdmin.php';">Ajouter un médicament</button>
       <br><br><br><br><br>
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

<style>
    
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;600;700&display=swap');
  *{
      font-family: 'Ubuntu', sans-serif;
  
  }
  
  .imgmed{
      width: 100px;
      height: 80px;
    }
  table {
  /*   border: 1px solid #ccc; */
    border-collapse: collapse;
    margin: 0 auto;
    padding: 0;
    width: 80%;
    table-layout: fixed;
  }
  
  table caption {
      font-family: 'Ubuntu', sans-serif;
    font-size: 55px;
    font-weight:700;
    color:#00000090;
    padding: 15px;
  }
  
  table tr {
    background-color: #ffffff90;
    border: 1px solid #ddd;
    padding: 10px;
  }
  .thead{
    background-color: rgba(0, 0, 0, 0.5);;
    color:#fff;
  }
  
  table th,
  table td {
    padding: 20px;
    text-align: center;
  }
  
  table th {
    font-size: 20px;
    letter-spacing: .1em;
    text-transform: capitalize;
  }
  
  @media screen and (max-width: 600px) {
    table {
      border: 0;
    }
    .thead{
    background-color: rgb(67 56 202);
    color:#fff;
  }
  
    table caption {
    font-size: 35px;
    font-weight:700;
    color:#00000090;
    }
    
    table thead {
      border: none;
      clip: rect(0 0 0 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      padding: 0;
      position: absolute;
      width: 1px;
    }
    
    table tr {
      border-bottom: 3px solid #ddd;
      display: block;
      margin-bottom: .625em;
    }
    
    table td {
      border-bottom: 1px solid #ddd;
      display: block;
      font-size: .8em;
      text-align: right;
    }
    
    table td::before {
      /*
      * aria-label has no advantage, it won't be read inside a table
      content: attr(aria-label);
      */
      content: attr(data-label);
      float: left;
      font-weight: bold;
      text-transform: uppercase;
    }
    
    table td:last-child {
      border-bottom: 0;
    }
  }
</style>

