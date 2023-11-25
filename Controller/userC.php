<?php
require 'C:\xampp\htdocs\projetweb\config.php';
require_once '../../model/user.php';


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

    public function deleteuser($id)
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

    public function adduser($user)
    {
        $sql = "INSERT INTO user  
                VALUES (:id, :nom_u, :prenom_u, :tel_u, :cin_u, :email_u, :mdp_u, :role_u)";
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
                'mdp_u' => $user->getmdp_u(),
                'role_u' => $user->getrole_u(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email_u = :email";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':email', $email);
            $query->execute();
            $userData = $query->fetch();

            if ($userData) {
                $user = new user();
                $user->setid_u($userData['id_u']);
                $user->setnom_u($userData['nom_u']);
                $user->setprenom_u($userData['prenom_u']);
                $user->setcin_u($userData['cin_u']);
                $user->settel_u($userData['tel_u']);
                $user->setemail_u($userData['email_u']);
                $user->setmdp_u($userData['mdp_u']);
                $user->setrole_u($userData['role_u']);

                return $user;
            } else {
                return null;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateuser($user, $id)
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
                'mdp_u' => $user->getmdp_u(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
