<?php
require 'C:\xampp\htdocs\projet-f - Copie\config.php';

class RDV_analyse_imagerieC
{
    public function getAnalyseImagerie($id)
    {
        $sql = 'SELECT * FROM RDV_analyse_imagerie WHERE id = :id';
        $db = config::getconnexion();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Erreur" . $e->getMessage());
        }
    }

    public function displayRDV_analyse_imagerie()
    {
        $sql = 'SELECT * FROM RDV_analyse_imagerie';
        $db = config::getconnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die("Erreur" . $e->getMessage());
        }
    }

    public function deleteRDV_analyse_imagerie($id)
    {
        $sql = "DELETE FROM RDV_analyse_imagerie WHERE id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addRDV_analyse_imagerie($RDV_analyse_imagerie)
    {
        $sql = "INSERT INTO RDV_analyse_imagerie VALUES (:id, :centre_analyse, :imagerie, :nom_radiologue)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $RDV_analyse_imagerie->getId(),
                'centre_analyse' => $RDV_analyse_imagerie->getCentre_analyse(),
                'imagerie' => $RDV_analyse_imagerie->getImagerie(),
                'nom_radiologue' => $RDV_analyse_imagerie->getNom_radiologue(),
            ]);

            // Output success message if needed
            echo "Record inserted successfully <br>";

            // Redirect to listAnalyseImagerie.php after successful insertion
            header('Location: listAnalyse.php');
            exit; // Ensure no further code is executed after the redirection
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateRDV_analyse_imagerie($RDV_analyse_imagerie)
    {
        $sql = "UPDATE RDV_analyse_imagerie SET centre_analyse=:centre_analyse, imagerie=:imagerie, nom_radiologue=:nom_radiologue WHERE id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $RDV_analyse_imagerie->getId());
        $req->bindValue(':centre_analyse', $RDV_analyse_imagerie->getCentre_analyse());
        $req->bindValue(':imagerie', $RDV_analyse_imagerie->getImagerie());
        $req->bindValue(':nom_radiologue', $RDV_analyse_imagerie->getNom_radiologue());

        try {
            $req->execute();
            header('Location: listAnalyse.php');
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
?>
