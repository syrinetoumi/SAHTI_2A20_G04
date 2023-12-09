<?php
include '../../Controller/userC.php';
include '../../model/user.php';

$error = "";

// create user
$user = null;
// create an instance of the controller
$userC = new userC();
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["nom_u"]) &&
        isset($_POST["prenom_u"]) &&
        isset($_POST["cin_u"]) &&
        isset($_POST["tel_u"]) &&
        isset($_POST["email_u"]) && // Update to match the input name in the form
        isset($_POST["role_u"]) &&
        isset($_POST["mdp_u"])
    ) {
        if (
            !empty($_POST['nom_u']) &&
            !empty($_POST["prenom_u"]) &&
            !empty($_POST["cin_u"]) &&
            !empty($_POST["tel_u"]) &&
            !empty($_POST["email_u"]) && // Update to match the input name in the form
            !empty($_POST["role_u"]) &&
            !empty($_POST["mdp_u"])
        ) {
            // Update the following line to use the correct properties of the user object
            $user = new user(
                null,
                $_POST['nom_u'],
                $_POST['prenom_u'],
                $_POST['cin_u'],
                $_POST['tel_u'],
                $_POST['email_u'], // Update to match the input name in the form
                $_POST['role_u'],
                $_POST['mdp_u']
            );

            $userC->updateuser($user, $_POST['id_u']);

            echo "Update request processed.<br>";
            echo "ID: " . $_POST['id_u'] . "<br>";
            echo "Nom: " . $_POST['nom_u'] . "<br>";
            echo "Prenom: " . $_POST['prenom_u'] . "<br>";
            echo "CIN: " . $_POST['cin_u'] . "<br>";
            echo "EMAIL: " . $_POST['email_u'] . "<br>"; 
            echo "TEL: " . $_POST['tel_u'] . "<br>";
            echo "ROLE: " . $_POST['role_u'] . "<br>";
            echo "MOT DE PASSE: " . $_POST['mdp_u'] . "<br>";

            // ...

            header('Location: listuser.php');
            exit;
        } else {
            $error = "Missing information";
        }
    }
}*/


if ( isset($_POST["nom_u"]) &&
isset($_POST["prenom_u"]) &&
!empty($_POST["photo_u"]) &&
isset($_POST["cin_u"]) &&
isset($_POST["tel_u"]) &&
isset($_POST["email_u"]) && // Update to match the input name in the form
isset($_POST["role_u"]) &&
isset($_POST["mdp_u"])) {
    if (!empty($_POST["nom_u"]) &&
    !empty($_POST["prenom_u"]) &&
    !empty($_POST["photo_u"]) &&
    !empty($_POST["cin_u"]) &&
    !empty($_POST["tel_u"]) &&
    !empty($_POST["email_u"]) && // Update to match the input name in the form
    !empty($_POST["role_u"]) &&
    !empty($_POST["mdp_u"]))
    {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $user = new user(
            null,
            $_POST['nom_u'],
            $_POST['prenom_u'],
            $_POST['cin_u'],
            $_POST['tel_u'],
            $_POST['email_u'], // Update to match the input name in the form
            $_POST['role_u'],
            $_POST['mdp_u']
        );
        var_dump($user);
        
        $userC->updateuser($user, $_POST['id_u']);
        header('Location: listuser.php');
        exit();
    } else
        $error = "Missing information";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../../asset/backoffice/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../../asset/backoffice/css/tooplate.css">
</head>

<body class="bg02">
    
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="index.html">Yearly Report</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="products.html">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="accounts.html">Accounts</a>
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
                                     <span id="log">Logout</span></div>
                                 </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        <div id="error">
        <?php echo $error; ?>
    </div>
    
    <br><br><br><br><br>
    <section>
    <?php
    if (isset($_POST['id_u'])) {
        $user = $userC->showUserById($_POST['id_u']);
        ?>
        <form method="POST" enctype="multipart/form-data" id="form" > 
  <table>
      <thead>
          <tr class="thead">
          <th scope="col">Id_U </th>
          <th scope="col">Nom </th>
          <th scope="col">Préom </th>
          <th scope="col">Photo </th>
          <th scope="col">Cin </th>
          <th scope="col">Téléphone </th>
          <th scope="col">Email </th>
          <th scope="col">Role </th>
          <th scope="col">Mot de passe</th>
          <th scope="col"></th>
          </tr>
      </thead>
      <tbody>
          <tr>
          <td data-label="Name"> <input  id="id_u" name="id_u" type="text" value="<?php echo $_POST['id_u'] ?>" readonly></td>
          <td data-label="Name"> <input id="nom_u" name="nom_u"  type="text" value="<?php echo $user['nom_u'] ?>"></td>
          <td data-label="Title"><input type="text" id="prenom_u" name="prenom_u" value="<?php echo $user['prenom_u'] ?>" ></td>
          <td data-label="Website"> <input id="photo_u" name="photo_u" type="file" /></td>
          <td data-label="Name"> <input  id="cin_u" name="cin_u" type="text" value="<?php echo $_user['cin_u'] ?>" readonly></td>
          <td data-label="Name"> <input id="tel_u" name="tel_u"  type="text" value="<?php echo $user['tel_u'] ?>"></td>
          <td data-label="Title"><input type="text" id="email_u" name="email_u" value="<?php echo $user['email_u'] ?>" ></td>
          <td data-label="Title"><input type="text" id="role_u" name="role_u" value="<?php echo $user['role_u'] ?>" ></td>
          <td data-label="Title"><input type="text" id="mdp_u" name="mdp_u" value="<?php echo $user['mdp_u'] ?>" ></td>
          <td data-label="Role"> <button type="submit"  onclick="location.href='listuseradmin.php';">Modifier  </button></td>
          </tr>

      </tbody>
      </table>
</form>
    </section>
       <br><br><br><br><br>
                            <?php
                                        }
                                        ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2023/2024 Esprit école sup privée
                </p>
            </div>
        </footer>
    </div>

    <script src="../../asset/backoffice/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="../../asset/backoffice/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
     <script src="../../asset/frontoffice/js/medicament.js"></script>
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