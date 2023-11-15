<?php
include "../Controller/medecinM.php";

$c = new medecinM();
$tab = $c->listmed();

?>

<center>
    <h1>Liste des medecins</h1>
    <h2>
        <a href="addJoueur.php">ajouter medecin </a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id_med</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Cin</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Specialite</th>
        <th>Mot de passe</th>
        <th>Mise a jour</th>
        <th>Supprimer</th>
    </tr>


    <?php
    foreach ($tab as $medecin) {
    ?>




        <tr>
            <td><?= $medecin['id_med']; ?></td>
            <td><?= $medecin['nom_med']; ?></td>
            <td><?= $medecin['prenom_med']; ?></td>
            <td><?= $medecin['cin_med']; ?></td>
            <td><?= $medecin['tel_med']; ?></td>
            <td><?= $medecin['e_mail_med']; ?></td>
            <td><?= $medecin['specialite_med']; ?></td>
            <td><?= $medecin['mdp_med']; ?></td>



            <td align="center">
                <form method="POST" action="updatemed.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $medecin['id_med']; ?> name="id_med">
                </form>
            </td>
            <td>
                <a href="deletemed.php?id=<?php echo $medecin['id_med']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>