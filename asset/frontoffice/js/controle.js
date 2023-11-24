
  function verifierFormulaire(event) {
    // Réinitialiser les messages d'erreur
    document.getElementById('erreurEmail').innerText = '';
    document.getElementById('erreurPassword').innerText = '';

    // Récupérer les valeurs des champs
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Valider l'email
    if (!isValidEmail(email)) {
      document.getElementById('erreurEmail').innerText = 'Veuillez entrer une adresse e-mail valide.';
      event.preventDefault(); // Empêcher la soumission du formulaire
    }

    // Valider le mot de passe (ajoutez des conditions selon vos besoins)
    if (password.length < 6) {
      document.getElementById('erreurPassword').innerText = 'Le mot de passe doit contenir au moins 6 caractères.';
      event.preventDefault(); // Empêcher la soumission du formulaire
    }
  }

  // Fonction de validation d'email simple (vous pouvez améliorer selon vos besoins)
  function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

