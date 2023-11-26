document.addEventListener("DOMContentLoaded", function () {
    const marqueInput = document.getElementById('marque');
    const modeleInput = document.getElementById('modele');
    const anneeVehiculeInput = document.getElementById('annee');
    const plaqueMatriculeInput = document.getElementById('plnum');
    const updateButtonVehicule = document.getElementById('updateVehicule');

    const marqueValidationMessage = document.getElementById('erreurMarque');
    const modeleValidationMessage = document.getElementById('erreurModele');
    const anneeVehiculeValidationMessage = document.getElementById('erreurAnnee');
    const plaqueMatriculeValidationMessage = document.getElementById('erreurPlanum');

    updateButtonVehicule.addEventListener('click', function (event) {
        if (
            !validateMarque() ||
            !validateModele() ||
            !validateAnneeVehicule() ||
            !validatePlaqueMatricule()
        ) {
            event.preventDefault();
        }
    });

    function validateMarque() {
        var regex = /^[A-Za-z]+$/;
        var marque = marqueInput.value;

        if (regex.test(marque)) {
            marqueValidationMessage.textContent = "";
            return true;
        } else {
            marqueValidationMessage.textContent = "Veuillez saisir une marque valide (lettres uniquement)";
            return false;
        }
    }

    function validateModele() {
        var modele = modeleInput.value;

        if (modele.length >= 3) {
            modeleValidationMessage.textContent = "";
            return true;
        } else {
            modeleValidationMessage.textContent = "Veuillez saisir un modèle valide (au moins 3 caractères)";
            return false;
        }
    }

    function validateAnneeVehicule() {
        var anneeVehicule = anneeVehiculeInput.value;
        var currentYear = new Date().getFullYear();

        if (!isNaN(anneeVehicule) && anneeVehicule >= 1900 && anneeVehicule <= currentYear) {
            anneeVehiculeValidationMessage.textContent = "";
            return true;
        } else {
            anneeVehiculeValidationMessage.textContent = "Veuillez saisir une année valide";
            return false;
        }
    }

    function validatePlaqueMatricule() {
        var plaqueMatricule = plaqueMatriculeInput.value;

        if (plaqueMatricule.length >= 6) {
            plaqueMatriculeValidationMessage.textContent = "";
            return true;
        } else {
            plaqueMatriculeValidationMessage.textContent = "Veuillez saisir une plaque matricule valide (au moins 6 caractères)";
            return false;
        }
    }
});
