<?php


require '../config.php';


class medecinM
{

    public function listmed()
    {
        $sql = "SELECT * FROM medecin";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletemedecin($id)
    {
        $sql = "DELETE FROM medecin WHERE id_med = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addmedecin($medecin)
    {
        $sql = "INSERT INTO medecin  
        VALUES (:id, :nom_med,:prenom_med,:tel_med, :cin_med,:e_mail_med,:specialite_med,:mdp_med)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $medecin->getId_med(),
                'nom_med' => $medecin->getNom_med(),
                'prenom_med' => $medecin->getPrenom_med(),
                'tel_med' => $medecin->getTel_med(),
                'cin_med' => $medecin->getcin_med(),
                'e_mail_med' => $medecin->getmail_med(),
                'specialite_med' => $medecin->getspe_med(),
                'mdp_med' => $medecin->getmdp_med()


            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showmed($id)
{
    $sql = "SELECT * FROM medecin WHERE id_med = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $medecin = $query->fetch();
        return $medecin;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    function updatemed($medecin, $id)
    {   
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE medecin SET 
                    nom_med = :nom_med, 
                    prenom_med = :prenom_med, 
                    cin_med = :cin_med, 
                    tel_med = :tel_med,
                    e_mail_med = :e_mail_med,
                    specialite_med = :specialite_med,
                    mdp_med = :mdp_med
                WHERE id_med = :id'
            );
            
            $query->execute([
                'id' => $id,
                'nom_med' => $medecin->getNom_med(),
                'prenom_med' => $medecin->getPrenom_med(),
                'tel_med' => $medecin->gettel_med(),
                'cin_med' => $medecin->getcin_med(),
                'e_mail_med' => $medecin->getmail_med(),
                'specialite_med' => $medecin->getspe_med(),
                'mdp_med' => $medecin->getmdp_med()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}
?>
