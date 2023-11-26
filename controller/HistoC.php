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
}
?>