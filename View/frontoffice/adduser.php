<?php

include '../../Controller/userC.php';
include '../../model/user.php';

$error = "";

// create user
$user = null;

// create an instance of the controller
$userC = new userC();
if (
    isset($_POST["nom_u"]) &&
    isset($_POST["prenom_u"]) &&
    isset($_POST["cin_u"]) &&
    isset($_POST["tel_u"]) &&
    isset($_POST["email_u"]) &&
    isset($_POST["role_u"]) &&
    isset($_POST["mdp_u"])
) {
    if (
        !empty($_POST["nom_u"]) &&
        !empty($_POST["prenom_u"]) &&
        !empty($_POST["cin_u"]) &&
        !empty($_POST["tel_u"]) &&
        !empty($_POST["email_u"]) &&
        !empty($_POST["role_u"]) &&
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
        $userC->adduser($user);
        header('Location:listuser.php');
    } else {
        $error = "Missing information";
    }
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

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                <td><label for="email_u">Email :</label></td>
                <td>
                    <input type="email" id="email_u" name="email_u" />
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
                    <input type="password" id="mdp_u" name="mdp_u" />
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
