function verifierChamps(event) {
    // Réinitialiser les messages d'erreur
    document.getElementById("erreurNom").innerHTML = "";
    document.getElementById("erreurPrenom").innerHTML = "";
    document.getElementById("erreurEmail").innerHTML = "";
    document.getElementById("erreurTel").innerHTML = "";
    document.getElementById("erreurCin").innerHTML = "";
    document.getElementById("erreurMdp").innerHTML = "";
    document.getElementById("erreurCmdp").innerHTML = "";
    document.getElementById("erreurRole").innerHTML = "";

    // Valider le nom (doit être une chaîne alphabétique)
    var nom = document.forms["f"]["nom_u"].value;
    if (!/^[a-zA-Z]+$/.test(nom)) {
        document.getElementById("erreurNom").innerHTML = "Le nom doit contenir uniquement des lettres.";
        event.preventDefault();
    }

    // Valider le prénom (doit être une chaîne alphabétique)
    var prenom = document.forms["f"]["prenom_u"].value;
    if (!/^[a-zA-Z]+$/.test(prenom)) {
        document.getElementById("erreurPrenom").innerHTML = "Le prénom doit contenir uniquement des lettres.";
        event.preventDefault();
    }

    // Valider l'email (doit contenir @ et .)
    var email = document.forms["f"]["email_u"].value;
    if (!/^\S+@\S+\.\S+$/.test(email)) {
        document.getElementById("erreurEmail").innerHTML = "L'adresse e-mail doit être valide.";
        event.preventDefault();
    }

    // Valider le téléphone (doit être numérique et de 8 chiffres)
    var tel = document.forms["f"]["tel_u"].value;
    if (!/^\d{8}$/.test(tel)) {
        document.getElementById("erreurTel").innerHTML = "Le numéro de téléphone doit contenir 8 chiffres.";
        event.preventDefault();
    }

    // Valider le cin (doit être numérique et de 8 chiffres)
    var cin = document.forms["f"]["cin_u"].value;
    if (!/^\d{8}$/.test(cin)) {
        document.getElementById("erreurCin").innerHTML = "Le numéro Cin doit contenir 8 chiffres.";
        event.preventDefault();
    }

    // Valider le mot de passe et le confirmer mot de passe (doivent être identiques)
    var mdp = document.forms["f"]["mdp_u"].value;
    var cmdp = document.forms["f"]["cmdp_u"].value;
    if (mdp !== cmdp) {
        document.getElementById("erreurMdp").innerHTML = "Les mots de passe ne correspondent pas.";
        event.preventDefault();
    }

    // Valider le choix du rôle
    var role = document.querySelector('input[name="x"]:checked');
    if (!role) {
        document.getElementById("erreurRole").innerHTML = "Veuillez choisir un rôle.";
        event.preventDefault();
    }
}
