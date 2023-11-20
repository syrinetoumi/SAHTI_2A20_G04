<?php
include '../Controller/userC.php';
include '../model/user.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userC = new userC();
if (
    isset($_POST["nom_u"]) &&
    isset($_POST["prenom_u"]) &&
    isset($_POST["cin_u"]) &&
    isset($_POST["tel_u"])&&
    isset($_POST["email_u"])&&
    isset($_POST["role_u"])&&
    isset($_POST["mdp_u"])

) {
    if (
        !empty($_POST["nom_u"]) &&
        !empty($_POST["prenom_u"]) &&
        !empty($_POST["cin_u"]) &&
        !empty($_POST["tel_u"])&&
        !empty($_POST["email_u"])&&
        !empty($_POST["role_u"])&&
        !empty($_POST["mdp_u"])



    ) {
        $user = new user(
            null,
            $_POST['nom_u'],
            $_POST['prenom_u'],
            $_POST['cin_u'],
            $_POST['tel_u'],
            $_POST['email_u'],
            $_POST['role_u'],
            $_POST['mdp_u']


        );
        $userC->ajouter($user);
        //header('Location:listusser.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user </title>
</head>




    <link rel="stylesheet" href="../asset/frontoffice/css/form_style.css">
    <body>
        <div id="container">
           <header id="hea">Nouveau compte</header>
           <form method="post" name="f" onsubmit="return verifierChamps(event)">
              <fieldset>
                 <br/>
                 <input type="text" name="nom_u" id="nom" placeholder="Nom" >
                 <br/><br/>
                 <input type="text" name="prenom_u" id="pre" placeholder="Prenom"  >
                 <br/><br/>
                 <input type="email" name="email_u" id="email" placeholder="E-mail"  >
                 <br/><br/>
                 <input type="tel" name="tel_u" id="tel" placeholder="Telephone"  >
                 <br/><br/>
                 <input type="number" name="cin_u" id="cin" placeholder="Cin"  >
                 <br/><br/>
                 <input type="password" name="mdp_u" id="password" placeholder="Mot de passe"  >
                 <br/><br/>
                 <input type="password" name="cmdp_u" id="motdepasse" placeholder="confirmer mot de passe"  >
                 <br/> <br/> <br/>
                 <input type="radio" name="x" value="medecin">Medecin
                 <input type="radio" name="x" value="Patient">Patient<br>
                 <input type="radio" name="x" value="Coach">Coach
                 <input type="radio" name="x" value="Chauffeur">Chauffeur<br><br>

                 <label for="submit"></label>
                 <input type="submit" name="submit" id="submit" value="Enregistrer">
              </fieldset>
           </form>
        </div>
     </body>
    <script src="../asset/frontoffice/js/verification.js"></script>

