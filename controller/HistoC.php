<?php

require 'C:\xampp\htdocs\projetweb - Copie\config.php';

class HistoC
{

    public function listHisto()
    {
        $db = config::getConnexion();
        try {
            $sql = "SELECT DISTINCT idordo FROM histo";
            $distinctIdOrdo = $db->query($sql);
            
            $histoData = array();
            
            foreach ($distinctIdOrdo as $idOrdoRow) {
                $idOrdo = $idOrdoRow['idordo'];
                
                $sqlData = "SELECT * FROM histo WHERE idordo = $idOrdo";
                $histoData[$idOrdo] = $db->query($sqlData)->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return $histoData;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteHisto($ide)
    {
        $sql = "DELETE FROM histo WHERE idordo =:idordo";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idordo', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getHistoById($idOrdo)
    {
        $db = config::getConnexion();
        try {
            $sql = "SELECT * FROM histo WHERE idordo = :idOrdo";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':idOrdo', $idOrdo, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function searchOrdo($search) {
        $search = "%{$search}%";
        $sql = "SELECT * FROM ordo WHERE idpat LIKE :search";
    
        $db = config::getConnexion();
    
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':search', $search, PDO::PARAM_STR);
            $stmt->execute();
    
            $medicArray = array();
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $medicArray[] = $row;
            }
    
            return $medicArray;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return array(); // Return an empty array in case of an error
        }
    }
}
?>