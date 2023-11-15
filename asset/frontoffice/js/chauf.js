document.addEventListener("DOMContentLoaded", function () {
    const marqueInput = document.getElementById('marque');
    const modeleInput = document.getElementById('modele');
    const anneeVehiculeInput = document.getElementById('anneeVehicule');
    const plaqueMatriculeInput = document.getElementById('plaqueMatricule');
    const anneeInput = document.getElementById('annee');
    const routeInput = document.getElementById('route');
    const preferenceInput = document.getElementById('preference');
    const competenceInput = document.getElementById('competence');
    const ajoutButton = document.getElementById('mis');

    const marqueValidationMessage = document.getElementById('vide_marque');
    const modeleValidationMessage = document.getElementById('vide_modele');
    const anneeVehiculeValidationMessage = document.getElementById('vide_anneeVehicule');
    const plaqueMatriculeValidationMessage = document.getElementById('vide_plaqueMatricule');
    const anneeValidationMessage = document.getElementById('vide_annee');
    const routeValidationMessage = document.getElementById('vide_route');
    const preferenceValidationMessage = document.getElementById('vide_preference');
    const competenceValidationMessage = document.getElementById('vide_competence');

    ajoutButton.addEventListener('click', function () {
        if (
            !validateMarque() ||
            !validateModele() ||
            !validateAnneeVehicule() ||
            !validatePlaqueMatricule() ||
            !validateAnnee() ||
            !validateRoute() ||
            !validatePreference() ||
            !validateCompetence()
        ) {
            alert('Veuillez remplir toutes les informations correctement.');
            return;
        }

        // If all conditions are met, you can proceed with adding the data
        // Example: Call a function to add data to your tables
        // addDataToTables();
    });

    function validateMarque() {
        // Validation logic for marque input
        var regex = /^[A-Za-z]+$/;
        var marque = marqueInput.value;

        if (regex.test(marque)) {
            marqueValidationMessage.textContent = "Marque valide";
            marqueValidationMessage.style.color = "green";
            return true;
        } else {
            marqueValidationMessage.textContent = "Veuillez saisir une marque valide (lettres uniquement)";
            marqueValidationMessage.style.color = "red";
            return false;
        }
    }

    function validateModele() {
        // Validation logic for modele input
        var modele = modeleInput.value;

        if (modele.length >= 3) {
            modeleValidationMessage.textContent = "Modèle valide";
            modeleValidationMessage.style.color = "green";
            return true;
        } else {
            modeleValidationMessage.textContent = "Veuillez saisir un modèle valide (au moins 3 caractères)";
            modeleValidationMessage.style.color = "red";
            return false;
        }
    }

    function validateAnneeVehicule() {
        // Validation logic for anneeVehicule input
        var anneeVehicule = anneeVehiculeInput.value;
        var currentYear = new Date().getFullYear();

        if (!isNaN(anneeVehicule) && anneeVehicule >= 1900 && anneeVehicule <= currentYear) {
            anneeVehiculeValidationMessage.textContent = "Année valide";
            anneeVehiculeValidationMessage.style.color = "green";
            return true;
        } else {
            anneeVehiculeValidationMessage.textContent = "Veuillez saisir une année valide";
            anneeVehiculeValidationMessage.style.color = "red";
            return false;
        }
    }

    function validatePlaqueMatricule() {
        // Validation logic for plaqueMatricule input
        var plaqueMatricule = plaqueMatriculeInput.value;

        if (plaqueMatricule.length >= 6) {
            plaqueMatriculeValidationMessage.textContent = "Plaque matricule valide";
            plaqueMatriculeValidationMessage.style.color = "green";
            return true;
        } else {
            plaqueMatriculeValidationMessage.textContent = "Veuillez saisir une plaque matricule valide (au moins 6 caractères)";
            plaqueMatriculeValidationMessage.style.color = "red";
            return false;
        }
    }

   
    

    function validateAnnee() {
        // Validation logic for annee input
        var annee = anneeInput.value;

        if (!isNaN(annee)) {
            anneeValidationMessage.textContent = "Année valide";
            anneeValidationMessage.style.color = "green";
            return true;
        } else {
            anneeValidationMessage.textContent = "Veuillez saisir une année valide";
            anneeValidationMessage.style.color = "red";
            return false;
        }
    }

    function validateRoute() {
        // Validation logic for route input
        var route = routeInput.value;

        if (route.length >= 5) {
            routeValidationMessage.textContent = "Route valide";
            routeValidationMessage.style.color = "green";
            return true;
        } else {
            routeValidationMessage.textContent = "Veuillez saisir une route valide (au moins 5 caractères)";
            routeValidationMessage.style.color = "red";
            return false;
        }
    }

    function validatePreference() {
        // Validation logic for preference input
        var preference = preferenceInput.value;

        if (preference.length >= 3) {
            preferenceValidationMessage.textContent = "Préférence valide";
            preferenceValidationMessage.style.color = "green";
            return true;
        } else {
            preferenceValidationMessage.textContent = "Veuillez saisir une préférence valide (au moins 3 caractères)";
            preferenceValidationMessage.style.color = "red";
            return false;
        }
    }

    function validateCompetence() {
        // Validation logic for competence input
        var competence = competenceInput.value;

        if (competence.length >= 3) {
            competenceValidationMessage.textContent = "Compétence valide";
            competenceValidationMessage.style.color = "green";
            return true;
        } else {
            competenceValidationMessage.textContent = "Veuillez saisir une compétence valide (au moins 3 caractères)";
            competenceValidationMessage.style.color = "red";
            return false;
        }
    }
});
