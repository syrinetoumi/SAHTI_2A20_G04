<?php

require '../../config.php';  // Assuming 'config.php' contains the database connection logic

class VehiculeC
{
    public function listVehicule()
    {
        $sql = "SELECT * FROM vehicule";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listVehiculeuser()
    {
        $sql = "SELECT * FROM vehicule where user = 0";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteVehicule($id)
{
    $sql = "DELETE FROM vehicule WHERE vehicle_id = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);

    try {
        $req->execute();
        // Redirect to listvehicule.php after successful deletion
        header('Location: listvehicule.php');
        exit; // Ensure no further code is executed after the redirection
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

function ajouter($vehicule)
{
    $sql = "INSERT INTO vehicule(marque, modele, annee, plnum)  
            VALUES (:marque, :modele, :annee, :plnum)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'marque' => $vehicule->getmarque(),
            'modele' => $vehicule->getmodele(),
            'annee' => $vehicule->getannee(),
            'plnum' => $vehicule->getplanum(),
        ]);

        // Output success message if needed
        echo "Record inserted successfully <br>";

        // Redirect to listvehicule.php after successful insertion
        header('Location: listvehicule.php');
        exit; // Ensure no further code is executed after the redirection
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}




    function showVehicule($id)
    {
        $sql = "SELECT * FROM vehicule WHERE vehicle_id = $id ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $vehicule = $query->fetch();
            return $vehicule;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    

    function updateVehicule($vehicule, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE vehicule SET 
                    marque = :marque, 
                    modele = :modele, 
                    annee = :annee, 
                    plnum = :plnum
                WHERE vehicle_id = :idVehicule'
            );

            $query->execute([
                'idVehicule' => $id,  // Fix the parameter name here
                'marque' => $vehicule->getmarque(),
                'modele' => $vehicule->getmodele(),
                'annee' => $vehicule->getannee(),
                'plnum' => $vehicule->getplanum(),
            ]);

            // Output success message if needed
            echo $query->rowCount() . " records UPDATED successfully <br>";

            // Redirect to listvehicule.php after successful update
            header('Location: listvehicule.php');
            exit; // Ensure no further code is executed after the redirection
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function searchvehiculle($modele)
    {
       
        $sql = "SELECT *FROM vehicule WHERE modele = :modele";
        $db = config::getConnexion();
        try {
            $query = $db->prepare("SELECT *FROM vehicule WHERE modele LIKE :modele");
            $query->execute(['modele' => '%' . $modele . '%']);
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function listvehiculeclient($id)
    {
        $db = config::getConnexion();
        try {
            $query = $db->prepare("SELECT * FROM vehicule where vehicle_id = :idVehicule");
            $query->bindParam(':idVehicule', $id);  // Bind the parameter
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addToFavorites($id)
    {
        $db = config::getConnexion();
    
        try {
            $db->beginTransaction();
    
            // Check if the vehicle_id exists in vehicule table
            // You may want to enhance this check based on your application logic
            $checkQuery = $db->prepare("SELECT COUNT(*) FROM vehicule WHERE vehicle_id = :id");
            $checkQuery->execute(['id' => $id]);
            $count = $checkQuery->fetchColumn();
    
            if ($count > 0) {
                // Vehicle exists, proceed with the insertion
                $insertQuery = $db->prepare("INSERT INTO favoris (vehicule_id,user_id) VALUES (:id,1)");
                $insertQuery->execute(['id' => $id]);
    
                $db->commit();
    
                // Return a success message
                header('Location: listvehiculeclient.php');
                                exit();
            } else {
                // Vehicle does not exist, rollback the transaction
                $db->rollBack();
                
                echo json_encode(['success' => false, 'message' => 'Error adding vehicle to favorites. Vehicle not found.']);
                exit();
            }
        } catch (Exception $e) {
            // Return an error message if any exception occurs
            $db->rollBack();
            echo json_encode(['success' => false, 'message' => 'Error adding vehicle to favorites. ' . $e->getMessage()]);
            exit();
        }
    }
    


    public function listFav()
    {
        $sql = "SELECT v.* FROM vehicule v JOIN favoris f ON v.vehicle_id = f.vehicule_id where user_id=1";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();

            $favorites = $query->fetchAll(PDO::FETCH_ASSOC);

            return $favorites;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return array(); // Return an empty array in case of an error
        }
    }
    



}
?>