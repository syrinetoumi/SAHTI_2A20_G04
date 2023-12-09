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
        $sql = "INSERT INTO user VALUES (NULL, :nom_u, :prenom_u, :cin_u, :tel_u, :email_u, :mdp_u, :role_u, NULL, NULL)";
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':nom_u', $user->getnom_u());
            $query->bindParam(':prenom_u', $user->getprenom_u());
            $query->bindParam(':cin_u', $user->getcin_u());
            $query->bindParam(':tel_u', $user->gettel_u());
            $query->bindParam(':email_u', $user->getemail_u());
            $query->bindParam(':mdp_u', $user->getmdp_u());
            $query->bindParam(':role_u', $user->getrole_u());
    
            if ($query->execute()) {
                echo "Utilisateur ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'utilisateur.";
            }
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
    function showUserById($id)
    {
        $sql = "SELECT * FROM user WHERE id_u = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
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
            WHERE id_u = :id_u'
            );

            $query->execute([
                'id_u' => $id,
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
    public function searchUser($search) {
    $search = "%{$search}%";
    $sql = "SELECT * FROM user WHERE nom_u LIKE :search";

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

public function getRoleStatistics()
{
    $sql = "SELECT role_u, COUNT(*) as count FROM user GROUP BY role_u";
    $db = config::getConnexion();

    try {
        $result = $db->query($sql);
        $totalUsers = $result->rowCount();
        $percentageData = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $role = $row['role_u'];
            $count = $row['count'];
            $percentage = ($count / $totalUsers) * 100;

            $percentageData[$role] = $percentage;
        }

        return $percentageData;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return array(); // Return an empty array in case of an error
    }
}

//
}
?>
