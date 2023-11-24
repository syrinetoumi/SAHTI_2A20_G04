<?php
include '../../model/user.php';
include '../../Controller/userC.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userC = new userC();

if (
    isset($_POST["nom_u"]) &&
    isset($_POST["prenom_u"]) &&
    isset($_POST["cin_u"]) &&
    isset($_POST["tel_u"]) &&
    isset($_POST["email_u"]) &&  // Correction du nom du champ
    isset($_POST["role_u"]) &&
    isset($_POST["mdp_u"])
) {
    if (
        !empty($_POST["nom_u"]) &&
        !empty($_POST["prenom_u"]) &&
        !empty($_POST["cin_u"]) &&
        !empty($_POST["tel_u"]) &&
        !empty($_POST["email_u"]) &&  // Correction du nom du champ
        !empty($_POST["role_u"]) &&
        !empty($_POST["mdp_u"])
    ) {
        $user = new user(
            null,
            $_POST['nom_u'],
            $_POST['prenom_u'],
            $_POST['cin_u'],
            $_POST['tel_u'],
            $_POST['email_u'],  // Correction du nom du champ
            $_POST['role_u'],
            $_POST['mdp_u']
        );

        $userC->adduser($user);  // Correction du nom de la fonction

        //header('Location:listusser.php');
    } else {
        $error = "Information manquante";
    }
}
?>
