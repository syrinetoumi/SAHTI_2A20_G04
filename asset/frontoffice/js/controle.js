
    const nom = document.getElementById('nom').value;
        const prenom = document.getElementById('pre').value;
        const email = document.getElementById('email').value;
        const telephone = document.getElementById('tel').value;
        const motdepasse = document.getElementById('password').value;
        const confirmermotdepasse = document.getElementById('motdepasse').value;
    function estAlphabetique(chaine) {
        return /^[A-Za-z]+$/.test(chaine);
    }

   /* function estAlphabetique(chaine) {
        for (let i = 0; i < chaine.length; i++) {
            const c= chaine.charAt(i);
            if (!((c >= 'a' && c <= 'z') || (c >= 'A' && c <= 'Z'))) {
                return false; 
            }
        }
        return true;
    }
*/
    // mot de passe 
    /*function motdepasseValide(motdepasse) {
        if (motdepasse.length < 6) {
            return false;
        }
    
        let min = false;
        let maj = false;
        let chif = false;
        let spe = false;
    
        for (let i = 0; i < motdepasse.length; i++) {
            const caractere = motdepasse.charAt(i);
            if (caractere >= 'a' && caractere <= 'z') {
                min = true;
            } else if (caractere >= 'A' && caractere <= 'Z') {
                maj = true;
            } else if (caractere >= '0' && caractere <= '9') {
                fhif = true;
            } else if ('@#$%^&+='.includes(caractere)) {
                spe = true;
            }
        }
        return maj && min && chif && spe;
    }*/
    
    function motdepasseValide(password) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=])(?=.{6,})/.test(password);
    }
    function verifierChamps(event) {
        
    
        if (!estAlphabetique(nom)) {
            alert('s il vous plait Le champ Nom doit contenir uniquement des lettres alphabétiques.');
            return false;
        } else if (!estAlphabetique(prenom)) {
            alert(' s il vous plait Le champ Prénom doit contenir uniquement des lettres alphabétiques.');
            return false;
        } else if (!email.includes('@') || !email.includes('.')) {
           alert(' s il vous plait Le champ Email doit contenir un "@" et un "." exemple foulen.benfoulen@esprit.tn');
            return false;}
         else if (isNaN(telephone) || (telephone.length !== 8)) {
            alert('s il vous plait Le champ Téléphone doit contenir 8 chiffres.');
            return false;
        } else if (!motdepasseValide(password)) {
            alert('Le champ Mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffres, un symbole et  une longueur minimale de 6 caracteres.');
            return false;
        } else if (motdepasse !== motdepasse) {
            alert(' s il vous plait les champs Mot de passe et Confirmer Mot de passe doivent être identique.');
            return false;
        }
    
        // ken les champs lkolhom s7a7 naba3thou les information du formulaire
        document.getElementById('f').submit();
    }
    

    