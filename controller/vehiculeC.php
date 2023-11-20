<?php

require '../config.php';  // Assuming 'config.php' contains the database connection logic

class VehiculeC
{
    public function listVehicule()
    {
        $sql = "SELECT * FROM vehicule";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteVehicule($id)
{
    $sql = "DELETE FROM vehicule WHERE vehicle_id = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);

    try {
        $req->execute();
        // Redirect to listvehicule.php after successful deletion
        header('Location: listvehicule.php');
        exit; // Ensure no further code is executed after the redirection
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

function ajouter($vehicule)
{
    $sql = "INSERT INTO vehicule(marque, modele, annee, plnum)  
            VALUES (:marque, :modele, :annee, :plnum)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'marque' => $vehicule->getmarque(),
            'modele' => $vehicule->getmodele(),
            'annee' => $vehicule->getannee(),
            'plnum' => $vehicule->getplanum(),
        ]);

        // Output success message if needed
        echo "Record inserted successfully <br>";

        // Redirect to listvehicule.php after successful insertion
        header('Location: listvehicule.php');
        exit; // Ensure no further code is executed after the redirection
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}




    function showVehicule($id)
    {
        $sql = "SELECT * FROM vehicule WHERE vehicle_id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $vehicule = $query->fetch();
            return $vehicule;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateVehicule($vehicule, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE vehicule SET 
                    marque = :marque, 
                    modele = :modele, 
                    annee = :annee, 
                    plnum = :plnum
                WHERE vehicle_id = :idVehicule'
            );

            $query->execute([
                'idVehicule' => $id,  // Fix the parameter name here
                'marque' => $vehicule->getmarque(),
                'modele' => $vehicule->getmodele(),
                'annee' => $vehicule->getannee(),
                'plnum' => $vehicule->getplanum(),
            ]);

            // Output success message if needed
            echo $query->rowCount() . " records UPDATED successfully <br>";

            // Redirect to listvehicule.php after successful update
            header('Location: listvehicule.php');
            exit; // Ensure no further code is executed after the redirection
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>