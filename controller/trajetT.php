<?php

require '../config.php';  // Assuming 'config.php' contains the database connection logic

class TrajetT
{
    public function listTrajet()
    {
        $sql = "SELECT * FROM trajet";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteTrajet($id)
    {
        $sql = "DELETE FROM trajet WHERE trajet_id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
            // Redirect to listtrajet.php after successful deletion
            header('Location: listtrajet.php');
            exit; // Ensure no further code is executed after the redirection
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function ajouter($trajet)
{
    $sql = "INSERT INTO trajet(etat, annee_exp, routes_pre, pref_veh, comp_spe)  
            VALUES (:etat, :annee_exp, :routes_pre, :pref_veh, :comp_spe)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
       // $query->bindValue(':etat', $trajet->getEtat());
        $query->bindValue(':annee_exp', $trajet->getAnnee_exp());
        $query->bindValue(':routes_pre', $trajet->getRoutesPreferees());
        $query->bindValue(':pref_veh', $trajet->getPreferenceVehicule());
        $query->bindValue(':comp_spe', $trajet->getCompetencesSpeciales());

        $query->execute();

        // Check for errors
        $errorInfo = $query->errorInfo();
        if ($errorInfo[0] !== '00000') {
            // Handle the error, log it, or print it for debugging
            echo 'Database Error: ' . $errorInfo[2];
            return;
        }

        // Output success message if needed
        echo "Record inserted successfully <br>";

        // Redirect to listtrajet.php after successful insertion
        header('Location: listtrajet.php');
        exit; // Ensure no further code is executed after the redirection
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}




    public function showTrajet($id)
    {
        $sql = "SELECT * FROM trajet WHERE trajet_id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $trajet = $query->fetch();
            return $trajet;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateTrajet($trajet, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE trajet SET 
                    etat = :etat, 
                    annee_exp = :annee_exp, 
                    routes_pre = :routes_pre, 
                    pref_veh = :pref_veh, 
                    comp_spe = :comp_spe
                WHERE trajet_id = :id'
            );

            $query->execute([
                'id' => $id,
                'etat' => $trajet->getEtat(),
                'annee_exp' => $trajet->getAnnee_exp(),
                'routes_pre' => $trajet->getRoutesPreferees(),
                'pref_veh' => $trajet->getPreferenceVehicule(),
                'comp_spe' => $trajet->getCompetencesSpeciales(),
            ]);

            // Output success message if needed
            echo $query->rowCount() . " records UPDATED successfully <br>";

            // Redirect to listtrajet.php after successful update
            header('Location: listtrajet.php');
            exit; // Ensure no further code is executed after the redirection
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
