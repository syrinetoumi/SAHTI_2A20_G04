document.addEventListener("DOMContentLoaded", function () {
    const cinInput = document.getElementById('cin');
    const nomInput = document.getElementById('nom');
    const prenomInput = document.getElementById('prenom');
    const emailInput = document.getElementById('email');
    const telInput = document.getElementById('tel');
    const maladieInput = document.getElementById('maladie');
    const dateRdvInput = document.getElementById('dateRdv');
    const nomMedecinInput = document.getElementById('nom_medecin');
    const adresseMedecinInput = document.getElementById('adresse_medecin');
    const addButtonConsultation = document.getElementById('mis');

    const cinValidationMessage = document.getElementById('erreurCIN');
    const nomValidationMessage = document.getElementById('erreurNom');
    const prenomValidationMessage = document.getElementById('erreurPrenom');
    const emailValidationMessage = document.getElementById('erreurEmail');
    const telValidationMessage = document.getElementById('erreurTel');
    const maladieValidationMessage = document.getElementById('erreurMaladie');
    const dateRdvValidationMessage = document.getElementById('erreurDateRdv');
    const nomMedecinValidationMessage = document.getElementById('erreurNomMedecin');
    const adresseMedecinValidationMessage = document.getElementById('erreurAdresseMedecin');

    addButtonConsultation.addEventListener('click', function (event) {
        if (
            !validateCIN() ||
            !validateNom() ||
            !validatePrenom() ||
            !validateEmail() ||
            !validateTel() ||
            !validateMaladie() ||
            !validateDateRdv() ||
            !validateNomMedecin() ||
            !validateAdresseMedecin()
        ) {
            event.preventDefault();
        }
    });

   /* function validateCIN() {
        // Validation logic for CIN input
        const regex = /^[0-9]{8}$/;
        const cin = cinInput.value;

        if (regex.test(cin)) {
            cinValidationMessage.textContent = "CIN valide";
            cinValidationMessage.style.color = "green";
            return true;
        } else {
            cinValidationMessage.textContent = "Veuillez saisir un CIN valide (8 chiffres)";
            cinValidationMessage.style.color = "red";
            return false;
        }
    }*/

    function validateNom() {
        // Validation logic for nom input
        const nom = nomInput.value;

        if (nom.length >= 3) {
            nomValidationMessage.textContent = "Nom valide";
            nomValidationMessage.style.color = "green";
            return true;
        } else {
            nomValidationMessage.textContent = "Veuillez saisir un nom valide (au moins 3 caractères)";
            nomValidationMessage.style.color = "red";
            return false;
        }
    }

    function validatePrenom() {
        // Validation logic for prenom input
        const prenom = prenomInput.value;
    
        if (prenom.length >= 3) {
            prenomValidationMessage.textContent = "Prenom valide";
            prenomValidationMessage.style.color = "green";
            return true;
        } else {
            prenomValidationMessage.textContent = "Veuillez saisir un prenom valide (au moins 3 caractères)";
            prenomValidationMessage.style.color = "red";
            return false;
        }
    }
    
    function validateEmail() {
        // Validation logic for email input
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const email = emailInput.value;
    
        if (regex.test(email)) {
            emailValidationMessage.textContent = "Email valide";
            emailValidationMessage.style.color = "green";
            return true;
        } else {
            emailValidationMessage.textContent = "Veuillez saisir un email valide";
            emailValidationMessage.style.color = "red";
            return false;
        }
    }
    
    function validateTel() {
        // Validation logic for tel input
        const regex = /^[0-9]{8,}$/;
        const tel = telInput.value;
    
        if (regex.test(tel)) {
            telValidationMessage.textContent = "Tel valide";
            telValidationMessage.style.color = "green";
            return true;
        } else {
            telValidationMessage.textContent = "Veuillez saisir un numéro de téléphone valide (au moins 8 chiffres)";
            telValidationMessage.style.color = "red";
            return false;
        }
    }
    
    function validateMaladie() {
        // Validation logic for maladie input
        const maladie = maladieInput.value;
    
        if (maladie.length >= 3) {
            maladieValidationMessage.textContent = "Maladie valide";
            maladieValidationMessage.style.color = "green";
            return true;
        } else {
            maladieValidationMessage.textContent = "Veuillez saisir une maladie valide (au moins 3 caractères)";
            maladieValidationMessage.style.color = "red";
            return false;
        }
    }
    
    /*function validateDateRdv() {
        // Validation logic for dateRdv input (assuming it's a date format validation)
        const dateRdv = dateRdvInput.value;
        const regex = /^\d{4}-\d{2}-\d{2}$/;
    
        if (regex.test(dateRdv)) {
            dateRdvValidationMessage.textContent = "Date RDV valide";
            dateRdvValidationMessage.style.color = "green";
            return true;
        } else {
            dateRdvValidationMessage.textContent = "Veuillez saisir une date RDV valide (format YYYY-MM-DD)";
            dateRdvValidationMessage.style.color = "red";
            return false;
        }
    }*/
    
    function validateNomMedecin() {
        // Validation logic for nomMedecin input
        const nomMedecin = nomMedecinInput.value;
    
        if (nomMedecin.length >= 3) {
            nomMedecinValidationMessage.textContent = "Nom Médecin valide";
            nomMedecinValidationMessage.style.color = "green";
            return true;
        } else {
            nomMedecinValidationMessage.textContent = "Veuillez saisir un nom de médecin valide (au moins 3 caractères)";
            nomMedecinValidationMessage.style.color = "red";
            return false;
        }
    }
    
    function validateAdresseMedecin() {
        // Validation logic for adresseMedecin input
        const adresseMedecin = adresseMedecinInput.value;
    
        if (adresseMedecin.length >= 5) {
            adresseMedecinValidationMessage.textContent = "Adresse Médecin valide";
            adresseMedecinValidationMessage.style.color = "green";
            return true;
        } else {
            adresseMedecinValidationMessage.textContent = "Veuillez saisir une adresse de médecin valide (au moins 5 caractères)";
            adresseMedecinValidationMessage.style.color = "red";
            return false;
        }
    }
    

});
