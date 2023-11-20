document.addEventListener("DOMContentLoaded", function () {
    const anneeInput = document.getElementById('annee_exp');
    const routeInput = document.getElementById('routes_pre');
    const preferenceInput = document.getElementById('pref_veh');
    const competenceInput = document.getElementById('comp_spe');
    const ajoutButtonTrajet = document.getElementById('misTrajet');

    const anneeValidationMessage = document.getElementById('vide_annee');
    const routeValidationMessage = document.getElementById('vide_route');
    const preferenceValidationMessage = document.getElementById('vide_preference');
    const competenceValidationMessage = document.getElementById('vide_competence');

    ajoutButtonTrajet.addEventListener('click', function (event) {
        if (
            !validateAnnee() ||
            !validateRoute() ||
            !validatePreference() ||
            !validateCompetence()
        ) {
            alert('Veuillez remplir toutes les informations du Trajet correctement.');
            event.preventDefault();
        } else {
            // Submit the form if validation passes
            document.getElementById('trajetForm').submit();
        }
    });

    function validateAnnee() {
        var annee = anneeInput.value;

        if (!isNaN(annee) && annee > 0) {
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
