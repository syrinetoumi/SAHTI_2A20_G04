<?php
include "../controller/OrdoC.php";

$c = new OrdoC();
$tab = $c->listOrdos();
?>

<html>
<center>
    <table class="dataTable" id="medicationTable" border="1">
            <thead>
                <tr class="col1">
                    <th>N°</th>
                    <th>Nom du médicament</th>
                    <th>Dosages</th>
                    <th>Durée du traitement</th>
                    <th>Remarques</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($tab as $ordo) {
                ?>

                    <tr>
                    <td><?= $ordo['Num']; ?></td>
                    <td><?= $ordo['nomMed']; ?></td>
                    <td><?= $ordo['Dosage']; ?></td>
                    <td><?= $ordo['Durée']; ?></td>
                    <td><?= $ordo['Rq']; ?></td>
                    <td align="center">
                        <form method="POST" action="updateOrdo.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value=<?PHP echo $ordo['Num']; ?> name="Num">
                        </form>
                    </td>
                    <td>
                        <a href="deleteOrdo.php?id=<?php echo $ordo['Num']; ?>">Delete</a>
                    </td>
                </tr>
    <?php } ?>
                <tr>
                    <td></td>
                    <td><span id="erreurNomMed"></span></td>
                    <td><span id="erreurDosage"></span></td>
                    <td><span id="erreurDurée"></span></td>
                    <td><span id="erreurRq"></span></td>
                    <td></td>
                </tr>
            </tbody>
         </table></center>
         <button type="button" class="bouton" onclick="location.href='addOrdo.php';">Ajouter un médicament</button>
</html>