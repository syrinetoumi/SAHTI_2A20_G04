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
isset($_POST["cin_u"]) &&
isset($_POST["tel_u"]) &&
isset($_POST["email_u"]) && // Update to match the input name in the form
isset($_POST["role_u"]) &&
isset($_POST["mdp_u"])) {
    if (!empty($_POST['nom_u']) &&
    !empty($_POST["prenom_u"]) &&
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


<html lang="en">


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
        $user = $userC->showUserById($_POST['id_u']);
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <td><label for="id_u">Id_U :</label></td>
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
                        <span id="erreurspe" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mdp_u">Mot de passe :</label></td>
                    <td>
                        <input type="password" id="mdp_u" name="mdp_u" value="<?php echo $user['mdp_u'] ?>" />
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