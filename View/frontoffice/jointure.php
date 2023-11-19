
<?php
include '../../controller/MedicC.php';

$medicC = new MedicC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['medicament']) && isset($_POST['search'])) {
        $idMedicament = filter_var($_POST['medicament'], FILTER_VALIDATE_INT);
        if ($idMedicament !== false) {
            $list = $medicC->afficheOrdos($idMedicament);
        }
    }
}

$medicaments = $medicC->afficheMedics();
?>

<html>
<head>
    <title>Recherche d'ordonnances par médicament</title>
</head>
<body>
    <h1>Recherche d'ordonnances par médicament</h1>
    <form action="" method="POST">
        <label for="medicament">Sélectionnez un médicament :</label>
        <select name="medicament" id="medicament" required>
            <?php foreach ($medicaments as $medicament) { 
                echo '<option value="' . $medicament['idmed'] . '">' . $medicament['medicament'] . '</option>';
            } ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>

    <?php if (isset($list)) { ?>
        <br>
        <h2>Ordonnances correspondantes au médicament sélectionné :</h2>
        <ul>
            <?php foreach ($list as $ordo) { ?>
                <li><?= $ordo['nommed'] ?> - <?= $ordo['dosage'] ?> - <?= $ordo['duree'] ?> - <?= $ordo['rq'] ?> - <?= $ordo['genre'] ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>

