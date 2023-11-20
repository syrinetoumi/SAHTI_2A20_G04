<?php
include '../Controller/medecinM.php';
include '../model/medecin.php';
$error = "";

// create medecin
$medecin = null;
// create an instance of the controller
$medecinM = new medecinM();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["nom_med"]) &&
        isset($_POST["prenom_med"]) &&
        isset($_POST["cin_med"]) &&
        isset($_POST["tel_med"]) &&
        isset($_POST["e_mail_med"]) &&
        isset($_POST["specialite_med"]) &&
        isset($_POST["mdp_med"])
    ) {
        if (
            !empty($_POST['nom_med']) &&
            !empty($_POST["prenom_med"]) &&
            !empty($_POST["cin_med"]) &&
            !empty($_POST["tel_med"]) &&
            !empty($_POST["e_mail_med"]) &&
            !empty($_POST["specialite_med"]) &&
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

            $medecinM->updatemed($medecin, $_POST['id_med']);
            
            // Add these lines for debugging
            echo "Update request processed.<br>";
            echo "ID: ".$_POST['id_med']."<br>";
            echo "Nom: ".$_POST['nom_med']."<br>";
            echo "Prenom: ".$_POST['prenom_med']."<br>";
            echo "CIN: ".$_POST['cin_med']."<br>";
            echo "EMAIL: ".$_POST['e_mail_med']."<br>";
            echo "TEL: ".$_POST['tel_med']."<br>";
            echo "SPECIALITE: ".$_POST['spe_med']."<br>";
            echo "MOT DE PASSE: ".$_POST['mdp_med']."<br>";


            // ...

            header('Location: listmed.php');
        } else {
            $error = "Missing information";
        }
    }
}
?>


<!-- Your HTML form goes here -->

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

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <td><label for="id_med">Id_med :</label></td>
                    <td>
                    <input type="text" id="id_med" name="id_med" value="<?php echo $_POST['id_med'] ?>" readonly />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_med">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_med" name="nom_med" value="<?php echo $medecin['nom_med'] ?>" />
                        <span id="erreurNom_med" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom_med">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom_med" name="prenom_med" value="<?php echo $medecin['prenom_med'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="cin_med">Cin :</label></td>
                    <td>
                        <input type="text" id="cin_med" name="cin_med" value="<?php echo $medecin['cin_med'] ?>" />
                        <span id="erreurcin" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="tel_med">Téléphone :</label></td>
                    <td>
                        <input type="text" id="tel_med" name="tel_med" value="<?php echo $medecin['tel_med'] ?>" />
                        <span id="erreurTel" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="e_mail_med">Email :</label></td>
                    <td>
                        <input type="email" id="e_mail_med" name="e_mail_med" value="<?php echo $medecin['e_mail_med'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="specialite_med">Specialite :</label></td>
                    <td>
                        <input type="text" id="specialite_med" name="specialite_med" value="<?php echo $medecin['specialite_med'] ?>" />
                        <span id="erreurspe" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mdp_med">Mot de passe :</label></td>
                    <td>
                        <input type="password" id="mdp_med" name="mdp_med" value="<?php echo $medecin['mdp_med'] ?>" />
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