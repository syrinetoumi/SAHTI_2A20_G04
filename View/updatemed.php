<?php

include '../Controller/medecinM.php';
include '../Model/medecin.php';
$error = "";

// create medecin
$medecin = null;
// create an instance of the controller
$medecinM= new medecinM();


if (
    isset($_POST["nom_med"]) &&
    isset($_POST["prenom_med"]) &&
    isset($_POST["cin_med"]) &&
    isset($_POST["tel_med"])&&
    isset($_POST["e_mail_med"]) &&
    isset($_POST["specialite_med"])&&
    isset($_POST["mdp_med"])


) {
    if (
        !empty($_POST['nom_med']) &&
        !empty($_POST["prenom_med"]) &&
        !empty($_POST["cin_med"]) &&
        !empty($_POST["tel_med"])&&
        !empty($_POST["e_mail_med"])&&
        !empty($_POST["specialite_med"])&&
        !empty($_POST["mdp_med"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
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
        var_dump($medecin);
        
        $medecinM->updatemed($medecin, $_POST['id_med']);

        header('Location:listmed.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listmed.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_med'])) {
        $medecin = $medecinM->showmed($_POST['id_med']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom_med">Id_med :</label></td>
                    <td>
                        <input type="text" id="id_med" name="id_med" value="<?php echo $_POST['id_med'] ?>" readonly />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_med" name="nom_med" value="<?php echo $medecin['nom_med'] ?>" />
                        <span id="erreurNom_med" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $medecin['prenom_med'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="cin">Cin :</label></td>
                    <td>
                        <input type="text" id="tel" name="cin" value="<?php echo $medecin['cin_med'] ?>" />
                        <span id="erreurcin" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Téléphone :</label></td>
                    <td>
                        <input type="text" id="tel" name="tel" value="<?php echo $medecin['tel_med'] ?>" />
                        <span id="erreurTel" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="email" id="email" name="email" value="<?php echo $medecin['e_mail_med'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="specialite">Specialite :</label></td>
                    <td>
                        <input type="text" id="spe" name="spe" value="<?php echo $medecin['specialite_med'] ?>" />
                        <span id="erreurspe" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Mot de passe :</label></td>
                    <td>
                        <input type="password" id="mdp" name="mdp" value="<?php echo $medecin['mdp_med'] ?>" />
                        <span id="erreurmdp" style="color: red"></span>
                    </td>
                </tr>
               


                <td>
                    <input type="submit" value="enregistrer">
                </td>
                <td>
                    <input type="reset" value="annuler">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>