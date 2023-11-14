<?php

include '../Controller/medecinM.php';
include '../Model/medecin.php';

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
                <td><label for="id_med">ID :</label></td>
                <td>
                    <input type="number" id="id_med" name="id_med" />
                    <span id="erreurid" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nom_med">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom_med">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="cin_med">Cin :</label></td>
                <td>
                    <input type="text" id="cin" name="cin" />
                    <span id="erreurCin" style="color: red"></span>
                </td>
            </tr>
            
            <tr>
                <td><label for="tel_med">Téléphone :</label></td>
                <td>
                    <input type="text" id="telephone" name="tel" />
                    <span id="erreurTelephone" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="e_mail_med">Email :</label></td>
                <td>
                    <input type="email" id="email" name="email" />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="specialite_med">Specialite :</label></td>
                <td>
                    <input type="text" id="specialite" name="specialite" />
                    <span id="erreurspecialite" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="mdp_med">Mot de passe :</label></td>
                <td>
                    <input type="text" id="mdp" name="mdp" />
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