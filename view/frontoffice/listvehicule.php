<?php
include "../../controller/vehiculeC.php";

$c = new VehiculeC();
$tab = $c->listVehicule();

?>

<center>
    <h1>List of vehicles</h1>
    <h2>
        <a href="addvehicule.php">Add vehicle</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Vehicle Id</th>
        <th>Marque</th>
        <th>Modele</th>
        <th>Annee</th>
        <th>Planum</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($tab as $vehicule) {
    ?>

        <tr>
            <td><?= $vehicule['vehicle_id']; ?></td>
            <td><?= $vehicule['marque']; ?></td>
            <td><?= $vehicule['modele']; ?></td>
            <td><?= $vehicule['annee']; ?></td>
            <td><?= $vehicule['plnum']; ?></td>
            <td align="center">
                <form method="POST" action="updatevehicule.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $vehicule['vehicule_id']; ?>" name="idVehicule">
                </form>
            </td>
            <td>
                <a href="deletevehicule.php?id=<?= $vehicule['vehicule_id']; ?>">Delete</a>
            </td>
        </tr>

    <?php
    }
    ?>
</table>
