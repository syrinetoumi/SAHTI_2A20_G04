<?php
include '../controller/OrdoC.php';
include '../model/Ordo.php';

$error = "";
$ordo = null;
$ordoC = new OrdoC();

if (
    isset($_POST["nomMed"]) &&
    isset($_POST["dosage"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["rq"])
) {
    if (
        !empty($_POST['nomMed']) &&
        !empty($_POST["dosage"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["rq"])
    ) {
        $ordo = new Ordo(
            null,
            $_POST['nomMed'],
            $_POST['dosage'],
            $_POST['duree'],
            $_POST['rq']
        );
        $ordoC->addOrdo($ordo);
        header('Location:listOrdos.php');
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordo </title>
</head>

<body>
    <a href="listOrdos.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nomMed">Nommed :</label></td>
                <td>
                <input type="text" id="nomMed" name="nomMed" />
                <span id="erreurNomMed" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="dosage">dosage :</label></td>
                <td>
                <input type="text" id="dosage" name="dosage" />
                <span id="erreurDosage" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="duree">durée :</label></td>
                <td>
                <input type="text" id="duree" name="duree" />
                <span id="erreurDurée" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="rq">Rq :</label></td>
                <td>
                    <input type="text" id="rq" name="rq" />
                    <span id="erreurRq" style="color: red"></span>
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