<?php

include '../controller/OrdoC.php';
include '../model/Ordo.php';
$error = "";

// create client
$ordo = null;
// create an instance of the controller
$ordoC = new OrdoC();


if (
    isset($_POST["NomMed"]) &&
    isset($_POST["Dosage"]) &&
    isset($_POST["Durée"]) &&
    isset($_POST["Rq"])
) {
    if (
        !empty($_POST["NomMed"]) &&
        !empty($_POST["Dosage"]) &&
        !empty($_POST["Durée"]) &&
        !empty($_POST["Rq"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $ordo = new Ordo(
            null,
            $_POST['NomMed'],
            $_POST['Dosage'],
            $_POST['Durée'],
            $_POST['Rq']
        );
        var_dump($ordo);
        
        $ordoC->updateOrdo($ordo, $_POST['Num']);

        header('Location:listOrdos.php');
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
    <button><a href="listOrdos.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['Num'])) {
        $ordo = $ordoC->showOrdo($_POST['Num']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Num :</label></td>
                    <td>
                        <input type="text" id="Num" name="Num" value="<?php echo $_POST['Num'] ?>" readonly />
                        <span id="erreurNum" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nomMed">Nommed :</label></td>
                    <td>
                        <input type="text" id="nomMed" name="nomMed" value="<?php echo $ordo['nomMed'] ?>"/>
                        <span id="erreurNomMed" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="dosage">Dosage :</label></td>
                    <td>
                        <input type="text" id="dosage" name="dosage" value="<?php echo $ordo['Dosage'] ?>"/>
                        <span id="erreurDosage" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="duree">Durée :</label></td>
                    <td>
                    <input type="text" id="duree" name="duree" value="<?php echo $ordo['Durée'] ?>"/>
                <span id="erreurDurée" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="rq">Rq :</label></td>
                    <td>
                    <input type="text" id="rq" name="rq" value="<?php echo $ordo['Rq'] ?>"/>
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
    <?php
    }
    ?>
</body>

</html>