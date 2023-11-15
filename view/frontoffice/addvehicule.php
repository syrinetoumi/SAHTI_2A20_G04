<?php
include '../../Controller/vehiculeC.php';
include '../../model/vehicule.php';

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
            $vehicule_id,  // Fix the parameter here
            $_POST['marque'],
            $_POST['modele'],
            $_POST['annee'],
            $_POST['plnum']
        );
        
        $vehiculeC->ajouter($vehicule);
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
    <title>Vehicule</title>
</head>

<body>
    <a href="listvehicule.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="addvehicule.php" method="POST">
        <table>
            <tr>
                <td><label for="marque">Marque :</label></td>
                <td>
                    <input type="text" id="marque" name="marque" />
                    <span id="erreurMarque" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="modele">Modèle :</label></td>
                <td>
                    <input type="text" id="modele" name="modele" />
                    <span id="erreurModele" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="annee">Année :</label></td>
                <td>
                    <input type="text" id="annee" name="annee" />
                    <span id="erreurAnnee" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="planum">Planum :</label></td>
                <td>
                    <input type="text" id="planum" name="planum" />
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
</body>

</html>
