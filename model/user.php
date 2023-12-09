<?php

if (!class_exists('user')) {
    class user {
        private $id_u;
        private $nom_u;
        private $prenom_u;
        private $cin_u;
        private $tel_u;
        private $email_u;
        private $mdp_u;
        private $role_u;

        public static function getUserByEmail($email)
{
    $host = 'http://localhost/';
    $dbname = 'e-sahti';
    $username = 'root';
    $password = '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email_u = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $pdo = null;
        return $user;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
        return null;
    }
}
        public function getid_u()
        {
            return $this->id_u;
        }

        public function setid_u($id_u)
        {
            $this->id_u = $id_u;
        }

        public function getnom_u()
        {
            return $this->nom_u;
        }

        public function setnom_u($nom_u)
        {
            $this->nom_u = $nom_u;
        }

        public function getprenom_u()
        {
            return $this->prenom_u;
        }

        public function setprenom_u($prenom_u)
        {
            $this->prenom_u = $prenom_u;
        }

        public function getcin_u()
        {
            return $this->cin_u;
        }

        public function setcin_u($cin_u)
        {
            $this->cin_u = $cin_u;
        }

        public function gettel_u()
        {
            return $this->tel_u;
        }

        public function settel_u($tel_u)
        {
            $this->tel_u = $tel_u;
        }

        public function getemail_u()
        {
            return $this->email_u;
        }

        public function setemail_u($email_u)
        {
            $this->email_u = $email_u;
        }

        public function getmdp_u()
        {
            return $this->mdp_u;
        }

        public function setmdp_u($mdp_u)
        {
            $this->mdp_u = $mdp_u;
        }

        public function getrole_u()
        {
            return $this->role_u;
        }

        public function setrole_u($role_u)
        {
            $this->role_u = $role_u;
        }
    }
    
}

?>
