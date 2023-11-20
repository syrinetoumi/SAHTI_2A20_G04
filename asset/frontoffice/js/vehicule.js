document.addEventListener("DOMContentLoaded", function () {
    const marqueInput = document.getElementById('marque');
    const modeleInput = document.getElementById('modele');
    const anneeVehiculeInput = document.getElementById('annee');
    const plaqueMatriculeInput = document.getElementById('plnum');
    const ajoutButtonVehicule = document.getElementById('misVehicule');
   


    const marqueValidationMessage = document.getElementById('vide_marque');
    const modeleValidationMessage = document.getElementById('vide_modele');
    const anneeVehiculeValidationMessage = document.getElementById('vide_anneeVehicule');
    const plaqueMatriculeValidationMessage = document.getElementById('vide_plaqueMatricule');
  
    ajoutButtonVehicule.addEventListener('click', function (event) {
        if (
            !validateMarque() ||
            !validateModele() ||
            !validateAnneeVehicule() ||
            !validatePlaqueMatricule()
        ) {
            alert('Veuillez remplir toutes les informations du Vehicule correctement.');
            event.preventDefault(); 
        }
    });
    
   
    function validateMarque() {
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

});
