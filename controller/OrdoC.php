<?php

require 'C:\xampp\htdocs\projetweb - Copie\config.php';

class OrdoC
{

    public function listOrdo()
    {
        $sql = "SELECT * FROM ordo";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addOrdo($ordo)
    {
        $sql = "INSERT INTO ordo (nommed, dosage, duree, rq) VALUES (:nommed, :dosage, :duree, :rq)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nommed' => $ordo->getnommed(),
                'dosage' => $ordo->getdosage(),
                'duree' => $ordo->getduree(),
                'rq' => $ordo->getrq()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleteOrdo($ide)
    {
        $sql = "DELETE FROM ordo WHERE idordo =:idordo";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idordo', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showOrdo($id)
    {
        $sql = "SELECT * from ordo where idordo = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $ordo = $query->fetch();
            return $ordo;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    function updateOrdo($ordo, $ide)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE ordo SET 
                    nommed = :nommed, 
                    dosage = :dosage, 
                    duree = :duree,
                    rq = :rq
                WHERE idordo = :id'
            );
            
            $query->execute([
                'id' => $ide,
                'nommed' => $ordo->getnommed(),
                'dosage' => $ordo->getdosage(),
                'duree' => $ordo->getduree(),
                'rq' => $ordo->getrq(),
            ]);
            
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
}
