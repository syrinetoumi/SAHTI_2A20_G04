document.addEventListener("DOMContentLoaded", function () {
    const etatSelect = document.getElementById('etat');
    const anneeExpInput = document.getElementById('annee_exp');
    const routesPreInput = document.getElementById('routes_pre');
    const prefVehInput = document.getElementById('pref_veh');
    const compSpeInput = document.getElementById('comp_spe');
    const updateButtonTrajet = document.getElementById('updateTrajet');

    const anneeExpValidationMessage = document.getElementById('erreurAnneeExp');
    const routesPreValidationMessage = document.getElementById('erreurRoutesPre');
    const prefVehValidationMessage = document.getElementById('erreurPrefVeh');
    const compSpeValidationMessage = document.getElementById('erreurCompSpe');

    updateButtonTrajet.addEventListener('click', function (event) {
        if (
            !validateAnneeExp() ||
            !validateRoutesPre() ||
            !validatePrefVeh() ||
            !validateCompSpe()
        ) {
            event.preventDefault();
        }
    });

    function validateAnneeExp() {
        var anneeExp = anneeExpInput.value;

        if (!isNaN(anneeExp) && anneeExp >= 0) {
            anneeExpValidationMessage.textContent = "";
            return true;
        } else {
            anneeExpValidationMessage.textContent = "Veuillez saisir une année d'expérience valide";
            return false;
        }
    }

    function validateRoutesPre() {
        var routesPre = routesPreInput.value;

        if (routesPre.length >= 3) {
            routesPreValidationMessage.textContent = "";
            return true;
        } else {
            routesPreValidationMessage.textContent = "Veuillez saisir des routes préférées valides (au moins 3 caractères)";
            return false;
        }
    }

    function validatePrefVeh() {
        var prefVeh = prefVehInput.value;

        // Add your validation logic for preference vehicle field if needed

        // Example validation (length check)
        if (prefVeh.length >= 3) {
            prefVehValidationMessage.textContent = "";
            return true;
        } else {
            prefVehValidationMessage.textContent = "Veuillez saisir une préférence de véhicule valide (au moins 3 caractères)";
            return false;
        }
    }

    function validateCompSpe() {
        var compSpe = compSpeInput.value;

        // Add your validation logic for special competences field if needed

        // Example validation (length check)
        if (compSpe.length >= 3) {
            compSpeValidationMessage.textContent = "";
            return true;
        } else {
            compSpeValidationMessage.textContent = "Veuillez saisir des compétences spéciales valides (au moins 3 caractères)";
            return false;
        }
    }
});
