
<?php
/*
include '../../Controller/medecinM.php';
include '../../model/medecin.php';

$error = "";

// create client
$medecin = null;

// create an instance of the controller
$medecinM = new medecinM();
if (
    isset($_POST["nom_med"]) &&
    isset($_POST["prenom_med"]) &&
    isset($_POST["cin_med"]) &&
    isset($_POST["tel_med"])&&
    isset($_POST["e_mail_med"])&&
    isset($_POST["specialite_med"])&&
    isset($_POST["mdp_med"])

) {
    if (
        !empty($_POST["nom_med"]) &&
        !empty($_POST["prenom_med"]) &&
        !empty($_POST["cin_med"]) &&
        !empty($_POST["tel_med"])&&
        !empty($_POST["e_mail_med"])&&
        !empty($_POST["specialite_med"])&&
        !empty($_POST["mdp_med"])



    ) {
        $medecin = new medecin(
            null,
            $_POST['nom_med'],
            $_POST['prenom_med'],
            $_POST['cin_med'],
            $_POST['tel_med'],
            $_POST['e_mail_med'],
            $_POST['specialite_med'],
            $_POST['mdp_med']


        );
        $medecinM->addmedecin($medecin);
        header('Location:listmed.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medecin </title>
</head>

<body>
    <a href="listmed.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
    <table>
        <tr>
            <td><label for="nom_med">Nom :</label></td>
            <td>
                <input type="text" id="nom_med" name="nom_med" />
                <span id="erreurNom" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="prenom_med">Prénom :</label></td>
            <td>
                <input type="text" id="prenom_med" name="prenom_med" />
                <span id="erreurPrenom" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="cin_med">Cin :</label></td>
            <td>
                <input type="text" id="cin_med" name="cin_med" />
                <span id="erreurCin" style="color: red"></span>
            </td>
        </tr>

        <tr>
            <td><label for="tel_med">Téléphone :</label></td>
            <td>
                <input type="text" id="tel_med" name="tel_med" />
                <span id="erreurTelephone" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="e_mail_med">Email :</label></td>
            <td>
                <input type="email" id="e_mail_med" name="e_mail_med" />
                <span id="erreurEmail" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="specialite_med">Specialite :</label></td>
            <td>
                <input type="text" id="specialite_med" name="specialite_med" />
                <span id="erreurspecialite" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="mdp_med">Mot de passe :</label></td>
            <td>
                <input type="text" id="mdp_med" name="mdp_med" />
                <span id="erreurmdp" style="color: red"></span>
            </td>
        </tr>

        <td>
            <input type="submit" value="Save">
        </td>
        <td>
            <input type="reset" value="Reset">
        </td>
    </table>
</form>

</body>

</html> */


include '../../Controller/userC.php';
include '../../model/user.php';

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
    isset($_POST["e_mail_u"])&&
    isset($_POST["role_u"])&&
    isset($_POST["mdp_u"])

) {
    if (
        !empty($_POST["nom_u"]) &&
        !empty($_POST["prenom_u"]) &&
        !empty($_POST["cin_u"]) &&
        !empty($_POST["tel_u"])&&
        !empty($_POST["e_mail_u"])&&
        !empty($_POST["role_u"])&&
        !empty($_POST["mdp_u"])



    ) {
        $user = new user(
            null,
            $_POST['nom_u'],
            $_POST['prenom_u'],
            $_POST['cin_u'],
            $_POST['tel_u'],
            $_POST['e_mail_u'],
            $_POST['role_u'],
            $_POST['mdp_u']


        );
        $userC->adduser($user);
        header('Location:listuser.php');
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

<body>
    <a href="listuser.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
    <table>
        <tr>
            <td><label for="nom_u">Nom :</label></td>
            <td>
                <input type="text" id="nom_u" name="nom_u" />
                <span id="erreurNom" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="prenom_u">Prénom :</label></td>
            <td>
                <input type="text" id="prenom_u" name="prenom_u" />
                <span id="erreurPrenom" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="cin_u">Cin :</label></td>
            <td>
                <input type="text" id="cin_u" name="cin_u" />
                <span id="erreurCin" style="color: red"></span>
            </td>
        </tr>

        <tr>
            <td><label for="tel_u">Téléphone :</label></td>
            <td>
                <input type="text" id="tel_u" name="tel_u" />
                <span id="erreurTelephone" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="e_mail_u">Email :</label></td>
            <td>
                <input type="email" id="e_mail_u" name="e_mail_u" />
                <span id="erreurEmail" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="role_u">Role :</label></td>
            <td>
                <input type="text" id="role_u" name="role_u" />
                <span id="erreurspecialite" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="mdp_u">Mot de passe :</label></td>
            <td>
                <input type="text" id="mdp_u" name="mdp_u" />
                <span id="erreurmdp" style="color: red"></span>
            </td>
        </tr>

        <td>
            <input type="submit" value="Save">
        </td>
        <td>
            <input type="reset" value="Reset">
        </td>
    </table>
</form>

</body>

</html>