<?php
include '../Controller/vehiculeC.php';

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
            <form method="POST" action="uppdatevehicule.php">
                <input type="submit" name="update" value="Update">
                    <input type="hidden" value="<?= $vehicule['vehicle_id']; ?>" name="idVehicule">
                </form>
            </td>
            <td>
            <form method="GET" action="deletevehicule.php">
                <a href="deletevehicule.php?id=<?= $vehicule['vehicle_id']; ?>">Delete</a>
            </form>
            </td>
        </tr>

    <?php
    }
    ?>
</table>
