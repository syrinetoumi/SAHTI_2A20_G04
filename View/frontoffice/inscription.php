<?php
include '../../model/user.php';
include '../../Controller/userC.php';

$error = "";

$user = null;
$userC = new userC();

if (
    isset($_POST["nom_u"]) &&
    isset($_POST["prenom_u"]) &&
    isset($_POST["cin_u"]) &&
    isset($_POST["tel_u"]) &&
    isset($_POST["email_u"]) &&
    isset($_POST["role_u"]) &&
    isset($_POST["mdp_u"])
) {
    if (
        !empty($_POST["nom_u"]) &&
        !empty($_POST["prenom_u"]) &&
        !empty($_POST["cin_u"]) &&
        !empty($_POST["tel_u"]) &&
        !empty($_POST["email_u"]) &&
        !empty($_POST["role_u"]) &&
        !empty($_POST["mdp_u"])
    ) {
        $user = new user(
            null,
            $_POST['nom_u'],
            $_POST['prenom_u'],
            $_POST['cin_u'],
            $_POST['tel_u'],
            $_POST['email_u'],
            $_POST['role_u'],
            $_POST['mdp_u']
        );

        $userC->adduser($user);

        // Rediriger l'utilisateur en fonction du rôle sélectionné
        switch ($_POST['role_u']) {
            case 'medecin':
                header('Location: med.php');
                break;
            case 'Patient':
                // Rediriger vers patient.php ou une autre page appropriée
                header('Location: patient.php');
                break;
            case 'Coach':
                header('Location: coach.php');
                break;
            case 'Chauffeur':
                header('Location: chauffeur.php');
                break;
            default:
                header('Location: default.php');
                break;
        }
        exit(); 
    } else {
        $error = "Information manquante";
    }
}
?>

<link rel="stylesheet" href="../../asset/frontoffice/css/form_style.css">
<link rel="stylesheet" href="../../asset/frontoffice/css/formulaire.css">


<body>
    <div id="container">
        <header id="hea">Nouveau compte</header>
        <form method="post" name="f" onsubmit="return verifierChamps(event)">
        <fieldset>
                <br/>
                <input type="text" name="nom_u" id="nom_u" placeholder="Nom" ><br>
                <span id="erreurNom" style="color: red;"></span>
                <br/><br/>
                <input type="text" name="prenom_u" id="prenom_u" placeholder="Prenom"  ><br>
                <span id="erreurPrenom" style="color: red;"></span>
                <br/><br/>
                <input type="email" name="email_u" id="email_u" placeholder="E-mail"  ><br>
                <span id="erreurEmail" style="color: red;"></span>
                <br/><br/>
                <input type="tel" name="tel_u" id="tel_u" placeholder="Telephone"  ><br>
                <span id="erreurTel" style="color: red;"></span>
                <br/><br/>
                <input type="number" name="cin_u" id="cin_u" placeholder="Cin"  ><br>
                <span id="erreurCin" style="color: red;"></span>
                <br/><br/>
                <input type="password" name="mdp_u" id="mdp_u" placeholder="Mot de passe"  ><br>
                <span id="erreurMdp" style="color: red;"></span>
                <br/><br/>
                <input type="password" name="cmdp_u" id="cmdp_u" placeholder="Confirmer mot de passe"  ><br>
                <span id="erreurCmdp" style="color: red;"></span>
                <br/> <br/> <br/>
                <input type="radio" name="role_u" value="medecin">Medecin
                <input type="radio" name="role_u" value="Patient">Patient
                <br>
                <input type="radio" name="role_u" value="Coach">Coach
                <input type="radio" name="role_u" value="Chauffeur">Chauffeur
                <br>
                <span id="erreurRole" style="color: red;"></span>
                <label for="submit"></label>
                <input type="submit" name="submit" id="submit" value="Enregistrer">
            </fieldset>
        </form>
    </div>
</body>
     <script src="../../asset/frontoffice/js/valider.js"></script>