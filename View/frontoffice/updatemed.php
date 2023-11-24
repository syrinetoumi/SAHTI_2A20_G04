<?php
include '../../Controller/medecinM.php';
include '../../model/medecin.php';

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
    <button><a href="listuser.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_u'])) {
        $user = $userC->showuser($_POST['id_u']);
    ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <td><label for="id_u">Id_user :</label></td>
                    <td>
                        <input type="text" id="id_u" name="id_u" value="<?php echo $_POST['id_u'] ?>" readonly />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_u">Nom :</label></td>
                    <td>
                        <input type="text" id="nom_u" name="nom_u" value="<?php echo $user['nom_u'] ?>" />
                        <span id="erreurNom_u" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom_u">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom_u" name="prenom_u" value="<?php echo $user['prenom_u'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="cin_u">Cin :</label></td>
                    <td>
                        <input type="text" id="cin_u" name="cin_u" value="<?php echo $user['cin_u'] ?>" />
                        <span id="erreurcin" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="tel_u">Téléphone :</label></td>
                    <td>
                        <input type="text" id="tel_u" name="tel_u" value="<?php echo $user['tel_u'] ?>" />
                        <span id="erreurTel" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email_u">Email :</label></td>
                    <td>
                        <input type="email" id="email_u" name="email_u" value="<?php echo $user['email_u'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="role_u">Role :</label></td>
                    <td>
                    <input type="text" id="role_u" name="role_u" value="<?php echo $user['role_u'] ?>" />
                        <span id="erreurRole" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mdp_u">Mot de passe :</label></td>
                    <td>
                        <input type="password" id="mdp_u" name="mdp_u" value="<?php echo $user['mdp_u'] ?>" />
                        <span id="erreurMdp" style="color: red"></span>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Enregistrer">
                </td>
                <td>
                    <input type="reset" value="Annuler">
                </td>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>