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
        $sql = "DELETE FROM vehicule WHERE vehicule_id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function ajouter($vehicule)
{
    $sql = "INSERT INTO vehicule  
    VALUES (:id, :marque, :modele, :annee, :planum)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id' => $vehicule->getvehicule_id(),
            'marque' => $vehicule->getmarque(),
            'modele' => $vehicule->getmodele(),
            'annee' => $vehicule->getannee(),
            'planum' => $vehicule->getplanum(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showVehicule($id)
    {
        $sql = "SELECT * FROM vehicule WHERE vehicule_id = $id";
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
                    planum = :planum
                WHERE vehicule_id = :idVehicule'
            );

            $query->execute([
                'idVehicule' => $id,
                'marque' => $vehicule->getmarque(),
                'modele' => $vehicule->getmodele(),
                'annee' => $vehicule->getannee(),
                'planum' => $vehicule->getplanum(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
