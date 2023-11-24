<?php

require 'C:\xampp\htdocs\projetweb\config.php';

class userC
{

    public function listuser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($id)
    {
        $sql = "DELETE FROM user WHERE id_u = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function adduser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (:id, :nom_u,:prenom_u,:tel_u, :cin_u,:email_u,:role_u,:mdp_u)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $user->getid_u(),
                'nom_u' => $user->getnom_u(),
                'prenom_u' => $user->getprenom_u(),
                'tel_u' => $user->gettel_u(),
                'cin_u' => $user->getcin_u(),
                'email_u' => $user->getemail_u(),
                'role_u' => $user->getrole_u(),
                'mdp_u' => $user->getmdp_u()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showuser($id)
    {
        $sql = "SELECT * FROM user WHERE id_u = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateuser($user, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                nom_u = :nom_u, 
                prenom_u = :prenom_u, 
                cin_u = :cin_u, 
                tel_u = :tel_u,
                email_u = :email_u,
                role_u = :role_u,
                mdp_u = :mdp_u
            WHERE id_u = :id'
            );

            $query->execute([
                'id' => $id,
                'nom_u' => $user->getnom_u(),
                'prenom_u' => $user->getprenom_u(),
                'tel_u' => $user->gettel_u(),
                'cin_u' => $user->getcin_u(),
                'email_u' => $user->getemail_u(),
                'role_u' => $user->getrole_u(),
                'mdp_u' => $user->getmdp_u()
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
