<?php

require 'C:\xampp\htdocs\projetweb - Copie\config.php';

class MedicC
{

    public function listMedic()
    {
        $sql = "SELECT * FROM medic";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addMedic($medic)
    {
        $sql = "INSERT INTO medic (medicament, photo, lien) VALUES (:medicament, :photo, :lien)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'medicament' => $medic->getmedicament(),
                'photo' => $medic->getphoto(), 
                'lien' => $medic->getlien()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function deleteMedic($ide)
    {
        $sql = "DELETE FROM medic WHERE idmed =:idmed";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idmed', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showMedic($id)
    {
        $sql = "SELECT * from medic where idmed = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $medic = $query->fetch();
            return $medic;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    function updateMedic($medic, $ide)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE medic SET 
                    medicament = :medicament, 
                    photo = :photo, 
                    lien = :lien
                WHERE idmed = :id'
            );
            
            $query->execute([
                'id' => $ide,
                'medicament' => $medic->getmedicament(),
                'photo' => $medic->getphoto(),
                'lien' => $medic->getlien(),
            ]);
            
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function afficheOrdos($idmed)
    {
        try{
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM ordo WHERE genre = :id");
            $query->execute(['id' => $idmed]);
            return $query->fetchAll();
        }catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function afficheMedics()
    {
        try{
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM medic");
            $query->execute();
            return $query->fetchAll();
        }catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function searchMedic($search) {
        $search = "%{$search}%";
        $sql = "SELECT * FROM medic WHERE medicament LIKE :search";
    
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

