<?php

require '../../config.php';

class RapportR
{

    public function listRapport()
    {
        $sql = "SELECT * FROM rapport";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteRapport($idprogramme)
{
    $sql = "DELETE FROM rapport WHERE idprogramme = :idprogramme";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':idprogramme', $idprogramme);

    try {
        $req->execute();
        header('Location:listRapport.php');
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}


    function addRapport($rapport)
    {
        $sql = "INSERT INTO rapport (seances_restantes,progres,satisfaction)
        VALUES (:seances_restantes,:progres, :satisfaction)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'seances_restantes' => $rapport->getSeancesRestantes(),
                'progres' => $rapport->getProgres(),
                'satisfaction' => $rapport->getSatisfaction(),
                
            ]);
        } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            
        }
    }


    function showRapport($idprogramme)
{
    $sql = "SELECT * FROM rapport WHERE idprogramme = :idprogramme";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(':idprogramme', $idprogramme);
        $query->execute();
        $program = $query->fetch();
        return $program; // Corrected variable name from $programme to $program
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function updateRapport($rapport, $idprogramme)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE rapport SET 
                seances_restantes = :seances_restantes, 
                progres = :progres, 
                satisfaction = :satisfaction,
                
            WHERE idprogramme = :idprogramme' 
        );
        
        $query->execute([
            'idprogramme' => $idprogramme,
            'seances_restantes' => $rapport->getSeancesRestantes(),
            'progres' => $rapport->getProgres(),
            'satisfaction' => $rapport->getSatisfaction(),
            
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
        header('Location: listRapport.php');
            exit;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); 
    }
}
}
