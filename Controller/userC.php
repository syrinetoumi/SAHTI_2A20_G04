<?php
require '../config.php';


class userC{

public function ajouter($user){
	$pdo=config::getConnexion();
	try {
		$query=$pdo->prepare(
			"INSERT INTO user (nom_u,prenom_u,cin_u,tel_u,email_u,mdp_u,role_u)
			VALUES ( :nom_u, :prenom_u, :cin_u, :tel_u, :email_u, :mdp_u, :role_u);"
		);
		$query->execute([
			'nom_u'=>$user->getnom_u(),
			'prenom_u'=>$user->getprenom_u(),
			'cin_u'=>$user->getcin_u(),
            'tel_u'=>$user->gettel_u(),
			'email_u'=>$user->getemail_u(),
			'mdp_u'=>$user->getmdp_u(),
			'role_u'=>$user->getrole_u(),

			
		]);
	}
	catch(PDOException $e) {
		$e->getMessage();
	}
}
/*function connexionUser($email,$mot_de_passe){
	$sql="SELECT * FROM user WHERE email='" . $email . "' and mot_de_passe = '". $mot_de_passe."'";
	$db = config::getConnexion();
	try{
		$query=$db->prepare($sql);
		$query->execute();
		$count=$query->rowCount();
		if($count==0) {
			$message = "pseudo ou le mot de passe est incorrect";
		} else {
			$x=$query->fetch();
			$message = $x['role_u'];
		}
	}
	catch (Exception $e){
			$message= " ".$e->getMessage();
	}
  return $message;
}*/

}

?>