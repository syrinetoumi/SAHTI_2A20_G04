<?php
include '../../controller/ProgramP.php';
include '../../model/program.php';

$error = "";

$programmeP = new ProgramP();

if (
   
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["maladie"]) &&
    isset($_POST["exercice"]) &&
    isset($_POST["date_debut"]) &&
    isset($_POST["date_fin"]) &&
    isset($_POST["tel"])
) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $maladie = $_POST['maladie'];
    $exercice = $_POST['exercice'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $tel = $_POST['tel'];

    if (
        !empty($nom) &&
        !empty($prenom) &&
        !empty($maladie) &&
        !empty($exercice) &&
        !empty($date_debut) &&
        !empty($date_fin) &&
        !empty($tel)
    ) {
        $programme = new programme(
            NULL,  // Fix the parameter here
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['maladie'],
            $_POST['exercice'],
            $_POST['date_debut'],
            $_POST['date_fin'],
            $_POST['tel']

        );
        
        $programmeP->addProgram($programme);
       header('Location: listProgram.php');
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
    <title>Program</title>
</head>
<body>
    <a href="listProgram.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="addProgram.php" method="POST">
        <table>
        <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="maladie">maladie :</label></td>
                <td>
                    <input type="text" id="maladie" name="maladie" />
                    <span id="erreurmaladie" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td><label for="exercice">exercices :</label></td>
                <td>
                    <input type="text" id="exercice" name="exercice" />
                    <span id="erreurexercice" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td><label for="date_debut">date debut :</label></td>
                <td>
                    <input type="date" id="date_debut" name="date_debut" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td><label for="date_fin">date fin :</label></td>
                <td>
                    <input type="date" id="date_fin" name="date_fin" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td><label for="tel">telephone :</label></td>
                <td>
                    <input type="number" id="tel" name="tel" />
                    <span id="erreurtel" style="color: red"></span>
                </td>
            </tr>
           

           
        </table>

        <input type="submit" value="Save">
        <input type="reset" value="Reset">
    </form>
</body>
</html>