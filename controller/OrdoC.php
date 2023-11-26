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
        $sql = "DELETE FROM ordo WHERE numMedic =:numMedic";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':numMedic', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showOrdo($id)
    {
        $sql = "SELECT * FROM ordo WHERE numMedic = $id";
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
                WHERE numMedic = :id'
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
    
    public function truncateListOrdo() {
        $db = config::getConnexion();
        
        try {
            // Check if the histo table exists
            $archiveTableName = "histo";
            $sqlCheckTable = "SHOW TABLES LIKE :table";
            $queryCheckTable = $db->prepare($sqlCheckTable);
            $queryCheckTable->bindValue(':table', $archiveTableName);
            $queryCheckTable->execute();
    
            // Get the maximum idordo from histo table
            $sqlMaxIdOrdo = "SELECT MAX(idordo) AS max_idordo FROM $archiveTableName";
            $queryMaxIdOrdo = $db->query($sqlMaxIdOrdo);
            $maxIdOrdo = $queryMaxIdOrdo->fetchColumn();
    
            // Move data to the histo table
            $sqlMove = "INSERT INTO $archiveTableName (numMedic, nommed, dosage, duree, rq, idpat, idordo) SELECT numMedic, nommed, dosage, duree, rq, idpat, :idordo FROM ordo";
            $queryMove = $db->prepare($sqlMove);
            $queryMove->bindValue(':idordo', $maxIdOrdo + 1);
            $queryMove->execute();
            
            // Truncate the original table
            $sqlTruncate = "TRUNCATE TABLE ordo";
            $queryTruncate = $db->prepare($sqlTruncate);
            $queryTruncate->execute();
            
            // Optionally, you might want to handle any additional tasks after truncating the table.
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function getLedicOptions()
{
    $sql = "SELECT idmed, medicament FROM medic"; 
    $db = config::getConnexion();
    try {
        $options = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $options;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    
}
