<?php

include '../Controller/vehiculeC.php';
include '../model/vehicule.php';
$error = "";

// create vehicule
$vehicule = null;
// create an instance of the controller
$vehiculeC = new VehiculeC();

if (
    isset($_POST["marque"]) &&
    isset($_POST["modele"]) &&
    isset($_POST["annee"]) &&
    isset($_POST["plnum"])
) {
    if (
        !empty($_POST['marque']) &&
        !empty($_POST["modele"]) &&
        !empty($_POST["annee"]) &&
        !empty($_POST["plnum"])
    ) {
        $vehicule = new Vehicule(
            null,
            $_POST['marque'],
            $_POST['modele'],
            $_POST['annee'],
            $_POST['plnum']
        );

        $vehiculeC->updateVehicule($vehicule, $_POST['idVehicule']);

        // Redirect to listVehicules.php after successful update
        header('Location: listVehicules.php');
        exit; // Ensure no further code is executed after the redirection
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Display</title>
</head>

<body>
    <button><a href="listvehicules.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idVehicule'])) {
        $vehicule = $vehiculeC->showVehicule($_POST['idVehicule']);
    ?>

        <form action="uppdatevehicule.php" method="POST">
            <table>
                <tr>
                    <td><label for="idVehicule">Vehicle Id:</label></td>
                    <td>
                        <input type="text" id="idVehicule" name="idVehicule" value="<?php echo $_POST['idVehicule'] ?>" readonly />
                        <span id="erreurIdVehicule" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="marque">Marque :</label></td>
                    <td>
                        <input type="text" id="marque" name="marque" value="<?php echo $vehicule['marque'] ?>" />
                        <span id="erreurMarque" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="modele">Modèle :</label></td>
                    <td>
                        <input type="text" id="modele" name="modele" value="<?php echo $vehicule['modele'] ?>" />
                        <span id="erreurModele" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="annee">Année :</label></td>
                    <td>
                        <input type="text" id="annee" name="annee" value="<?php echo $vehicule['annee'] ?>" />
                        <span id="erreurAnnee" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="plnum">Planum :</label></td>
                    <td>
                        <input type="text" id="plnum" name="plnum" value="<?php echo $vehicule['plnum'] ?>" />
                        <span id="erreurPlanum" style="color: red"></span>
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
