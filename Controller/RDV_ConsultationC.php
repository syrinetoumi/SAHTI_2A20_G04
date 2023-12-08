<?php
require 'C:\xampp\htdocs\projet-f - Copie\config.php';

class RDV_ConsultationC
{
    public function getConsultation($cin)
    {
        $sql = 'SELECT * FROM RDV_Consultation WHERE cin = :cin';
        $db = config::getconnexion();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':cin', $cin);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Erreur" . $e->getMessage());
        }
    }

    public function displayRDV_Consultation()
    {
        $sql = 'SELECT * FROM RDV_Consultation';
        $db = config::getconnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die("Erreur" . $e->getMessage());
        }
    }

    public function deleteRDV_Consultation($cin)
    {
        $sql = "DELETE FROM RDV_Consultation WHERE cin=:cin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $cin);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addRDV_Consultation($RDV_Consultation)
    {
        $sql = "INSERT INTO RDV_Consultation VALUES (:cin, :nom, :prenom, :email, :tel, :maladie, :daterdv, :nom_medecin, :adresse_medecin)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $RDV_Consultation->getCin(),
                'nom' => $RDV_Consultation->getNom(),
                'prenom' => $RDV_Consultation->getPrenom(),
                'email' => $RDV_Consultation->getEmail(),
                'tel' => $RDV_Consultation->getTel(),
                'maladie' => $RDV_Consultation->getMaladie(),
                'daterdv' => $RDV_Consultation->getDateRdv(),
                'nom_medecin' => $RDV_Consultation->getNom_medecin(),
                'adresse_medecin' => $RDV_Consultation->getAdresse_medecin(),
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateRDV_Consultation($RDV_Consultation)
    {
        $sql = "UPDATE RDV_Consultation SET nom=:nom, prenom=:prenom, email=:email, tel=:tel, maladie=:maladie, dateRdv=:dateRdv, nom_medecin=:nom_medecin, adresse_medecin=:adresse_medecin WHERE cin=:cin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $RDV_Consultation->getCin());
        $req->bindValue(':nom', $RDV_Consultation->getNom());
        $req->bindValue(':prenom', $RDV_Consultation->getPrenom());
        $req->bindValue(':email', $RDV_Consultation->getEmail());
        $req->bindValue(':tel', $RDV_Consultation->getTel());
        $req->bindValue(':maladie', $RDV_Consultation->getMaladie());
        $req->bindValue(':dateRdv', $RDV_Consultation->getDateRdv());
        $req->bindValue(':nom_medecin', $RDV_Consultation->getNom_medecin());
        $req->bindValue(':adresse_medecin', $RDV_Consultation->getAdresse_medecin());

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
?>
