<?php
include '../../model/user.php';
include '../../Controller/userC.php';

$error = "";

$user = null;
$userC = new userC();

if (
    isset($_POST["nom_u"]) &&
    isset($_POST["prenom_u"]) &&
    isset($_POST["cin_u"]) &&
    isset($_POST["tel_u"]) &&
    isset($_POST["email_u"]) &&  
    isset($_POST["role_u"]) &&
    isset($_POST["mdp_u"])&&
    isset($_POST["photo_u"])

) {
    if (
        !empty($_POST["nom_u"]) &&
        !empty($_POST["prenom_u"]) &&
        !empty($_POST["cin_u"]) &&
        !empty($_POST["tel_u"]) &&
        !empty($_POST["email_u"]) &&  
        !empty($_POST["role_u"]) &&
        !empty($_POST["mdp_u"])&&
        !empty($_POST["photo_u"]["name"])

    ) {
        $filename = $_FILES["photo_u"]["name"];
        $tempname = $_FILES["photo_u"]["tmp_name"];
        $folder = "../../asset/frontoffice/images/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            // Image uploaded successfully, create Medic object
            $user = new user(
                null,
                $_POST['nom_u'],
                $_POST['prenom_u'],
                $_POST['cin_u'],
                $_POST['tel_u'],
                $_POST['email_u'],  
                $_POST['role_u'],
                $_POST['mdp_u'],
                $filename
            );

        $userC->adduser($user);  

        header('Location:listuser.php');
        } 
        else {
            $error = "Failed to upload image!";
        }
    } else {
        $error = "Information manquante";
    }
}

?>

<link rel="stylesheet" href="../../asset/frontoffice/css/form_style.css">

<body>
    <div id="container">
        <header id="hea">Nouveau compte</header>
        <form method="post" name="f" onsubmit="return verifierChamps(event)" enctype="multipart/form-data">
        <fieldset>
                <br/>
                <input type="text" name="nom_u" id="nom_u" placeholder="Nom" ><br>
                <span id="erreurNom" style="color: red;"></span>
                <br/><br/>
                <input type="text" name="prenom_u" id="prenom_u" placeholder="Prenom"  ><br>
                <span id="erreurPrenom" style="color: red;"></span>
                <br/><br/>
                <input type="email" name="email_u" id="email_u" placeholder="E-mail"  ><br>
                <span id="erreurEmail" style="color: red;"></span>
                <br/><br/>
                <input type="tel" name="tel_u" id="tel_u" placeholder="Telephone"  ><br>
                <span id="erreurTel" style="color: red;"></span>
                <br/><br/>
                <input type="number" name="cin_u" id="cin_u" placeholder="Cin"  ><br>
                <span id="erreurCin" style="color: red;"></span>
                <br/><br/>
                <input type="password" name="mdp_u" id="mdp_u" placeholder="Mot de passe"  ><br>
                <span id="erreurMdp" style="color: red;"></span>
                <br/><br/>
                <input type="password" name="cmdp_u" id="cmdp_u" placeholder="Confirmer mot de passe"  ><br>
                <span id="erreurCmdp" style="color: red;"></span>
                <br/> <br/> <br/>
                <input type="radio" name="role_u" value="medecin">Medecin
                <input type="radio" name="role_u" value="Patient">Patient
                <br>
                <input type="radio" name="role_u" value="Coach">Coach
                <input type="radio" name="role_u" value="Chauffeur">Chauffeur
                <br>
                <input type="file" name="photo_u" id="photo_u">
                <span id="erreurRole" style="color: red;"></span>
                <label for="submit"></label>
                <input type="submit" name="submit" id="submit" value="Enregistrer">
            </fieldset>
        </form>
    </div>
</body>
     <script src="../../asset/frontoffice/js/valider.js"></script>

     <!---
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600');

.erreur {
    color: red;
    font-size: 14px;
    margin-top: 5px;
    display: block;
}

html {
    height: 100%;
    width: 100%;
}
.imglogo{
    height: 100px;
    width: 200px;
    position: relative; 
    top: -20px;
    right: 20px;
    margin-top: 25px;
}
body {
    background: url("https://img.freepik.com/photos-gratuite/equipe-jeunes-medecins-specialistes-debout-dans-couloir-hopital_1303-21204.jpg?w=996&t=st=1699438203~exp=1699438803~hmac=c36a718c7f0ca646c78cbf8fe348cd517abc4a063a6cb27f0276559d6be9e27a") no-repeat center center fixed;
    background-size: cover;
    font-family: 'Droid Serif', serif;
}

#container {
    background: rgba(61, 61, 63, 0.5);
    width: 25.75rem;
    height: 35rem;
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}
.inscri {
    background: rgba(61, 61, 63, 0.5);
    width: 20.75rem;
    height: 20rem;
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}


header {
    text-align: center;
    vertical-align: middle;
    line-height: 3rem;
    height: 3rem;
    background: #1c1c1c;
    font-size: 20;
    color: white;
    width: 20.75rem;
}
#hea {
    text-align: center;
    vertical-align: middle;
    line-height: 3rem;
    height: 3rem;
    background: #1c1c1c;
    font-size: 15;
    color: white;
    width: 25.75rem;
}

fieldset {
    border: 0;
    text-align: center;

}

input[type="submit"] {
    background: rgb(153, 235, 30);
    border: 0;
    display: block;
    width: 70%;
    margin: 0 auto;
    color: rgb(33, 32, 32);
    padding: 0.7rem;
    cursor: pointer;
}

input {
    background: transparent;
    border: 0;
    border-left: 4px solid;
    border-color: #7bff00;
    padding: 10px;
    color:#1c1c1c;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus ,
input[type="tel"]:focus,
input[type="radio"]:focus{
    outline: 0;
    background: rgb(153, 235, 30);
    border-radius: 1.2rem;
    border-color: transparent;
}

::placeholder {
    color: #1c1c1c;
}

/*Media queries */

@media all and (min-width: 481px) and (max-width: 568px) {
    #container {
        margin-top: 10%;
        margin-bottom: 10%;
    }
}
    @media all and (min-width: 569px) and (max-width: 768px) {
        #container {
            margin-top: 5%;
            margin-bottom: 5%;
        }
    }--> 