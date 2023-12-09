<?php

include '../../Controller/ProgramP.php';
include '../../model/program.php';
$error = "";

// create client
$programme = null;
// create an instance of the controller
$ProgramP = new ProgramP();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["maladie"]) &&
    isset($_POST["exercice"]) &&
    isset($_POST["date_debut"]) &&
    isset($_POST["date_fin"]) &&
    isset($_POST["tel"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["maladie"]) &&
        !empty($_POST["exercice"]) &&
        !empty($_POST["date_debut"]) &&
        !empty($_POST["date_fin"]) &&
        !empty($_POST["tel"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $programme = new programme(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['maladie'],
            $_POST['exercice'],
            $_POST['date_debut'],
            $_POST['date_fin'],
            $_POST['tel']
        );
        var_dump($programme);
        
        $ProgramP->updateProgram($programme, $_POST['idprogramme']);

       header('Location:listProgram.php');
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
    <button><a href="listProgram.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idprogramme'])) {
        $programme = $ProgramP->showProgram($_POST['idprogramme']);
        
    ?>

        <form action="updateProgram.php" method="POST">
            <table>
            <tr>
                    <td><label for="idprogramme">IdProgram :</label></td>
                    <td>
                        <input type="text" id="idprogramme" name="idprogramme" value="<?php echo $_POST['idprogramme'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $programme['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $programme['prenom'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="maladie">maladie :</label></td>
                    <td>
                        <input type="text" id="maladie" name="maladie" value="<?php echo $programme['maladie'] ?>" />
                        <span id="erreurmaladie" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="exercice">Exercices :</label></td>
                    <td>
                        <input type="text" id="exercice" name="exercice" value="<?php echo $programme['exercice'] ?>" />
                        <span id="erreurexercice" style="color: red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="date_debut">Date Debut :</label></td>
                    <td>
                        <input type="date" id="date_debut" name="date_debut" value="<?php echo $programme['date_debut'] ?>" />
                        <span id="erreurdatedebut" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date_fin">Date Debut :</label></td>
                    <td>
                        <input type="date" id="date_fin" name="date_fin" value="<?php echo $programme['date_fin'] ?>" />
                        <span id="erreurdatefin" style="color: red"></span>
                    </td>
                </tr>
                    
                <tr>
                    <td><label for="tel">Téléphone :</label></td>
                    <td>
                        <input type="text" id="tel" name="tel" value="<?php echo $programme['tel'] ?>" />
                        <span id="erreurtel" style="color: red"></span>
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
    <?php
    }
    ?>
</body>

</html>