
<?php
require '../config.php';

class OrdoC
{
    public function listOrdos()
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

    // Add other methods for delete, update, show, etc., similar to the JoueurC class
    // ...

    function addOrdo($ordo)
    {
        $sql = "INSERT INTO ordo  
                VALUES (NULL, :nomMed, :dosage, :duree, :rq)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomMed' => $ordo->getNomMed(),
                'dosage' => $ordo->getDosage(),
                'duree' => $ordo->getDuree(),
                'rq' => $ordo->getRq(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showOrdo($numero)
{
    $sql = "SELECT * FROM ordo WHERE Num = :numero";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        //$query->bindValue(':numero', $numero, PDO::PARAM_INT); // Bind the parameter
        $query->execute();
        $ordo = $query->fetch();
        return $ordo;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


    
    function deleteOrdo($num)
    {
        $sql = "DELETE FROM ordo WHERE Num = :Num";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Num', $num);

        try {
            $req->execute();
            echo $req->rowCount() . " record deleted successfully";
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
    }
    

    function updateOrdo($ordo, $num)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE ordo SET 
                NomMed = :NomMed, 
                Dosage = :Dosage, 
                Durée = :Durée, 
                Rq = :Rq
            WHERE num = :Num'
        );
        
        $query->execute([
            'Num' => $num,
            'NomMed' => $ordo->getNomMed(),
            'Dosage' => $ordo->getDosage(),
            'Durée' => $ordo->getDuree(),
            'Rq' => $ordo->getRq()
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


}
?>
