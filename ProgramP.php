<?php

require '../../config.php';

class ProgramP
{

    public function listProgram()
    {
        $sql = "SELECT * FROM programme";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteProgram($idprogramme)
{
    $sql = "DELETE FROM programme WHERE idprogramme = :idprogramme";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':idprogramme', $idprogramme);

    try {
        $req->execute();
        header('Location:listProgram.php');
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}


    function addProgram($programme)
    {
        $sql = "INSERT INTO programme (nom,prenom,maladie,exercice,date_debut,date_fin,tel)
        VALUES (:nom,:prenom, :maladie,:exercice,:date_debut,:date_fin,:tel)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $programme->getNom(),
                'prenom' => $programme->getPrenom(),
                'maladie' => $programme->getMaladie(),
                'exercice' => $programme->getExercice(),
                'date_debut' => $programme->getDatedebut(),
                'date_fin' => $programme->getDatefin(),
                'tel' => $programme->getTel(),
            ]);
        } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            
        }
    }


    function showProgram($idprogramme)
{
    $sql = "SELECT * FROM programme WHERE idprogramme = :idprogramme";
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

function updateProgram($programme, $idprogramme)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE programme SET 
                nom = :nom, 
                prenom = :prenom, 
                maladie = :maladie,
                exercice = :exercice,
                date_debut = :date_debut,
                date_fin = :date_fin,
                tel = :tel
            WHERE idprogramme = :idprogramme' // Changed 'id' to 'idprogramme' in WHERE clause
        );
        
        $query->execute([
            'idprogramme' => $idprogramme,
            'nom' => $programme->getNom(),
            'prenom' => $programme->getPrenom(),
            'maladie' => $programme->getMaladie(),
            'exercice' => $programme->getExercice(),
            'date_debut' => $programme->getDatedebut(),
            'date_fin' => $programme->getDatefin(),
            'tel' => $programme->getTel(),
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
        header('Location: listProgram.php');
            exit;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Added 'echo' to display error message
    }
}
}
