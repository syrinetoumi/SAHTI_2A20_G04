function verifierChamps() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('pre').value;
    var email = document.getElementById('email').value;
    var tel = document.getElementById('tel').value;
    var cin = document.getElementById('cin').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('motdepasse').value;

    var optionSelected = false;
    var options = document.getElementsByName('x');
    for (var i = 0; i < options.length; i++) {
      if (options[i].checked) {
        optionSelected = true;
        break;
      }
    }

    if (!/^[A-Za-z]+$/.test(nom) ) {
      alert('le nom doit etre alphabetique');
      return;
    }
    if( !/^[A-Za-z]+$/.test(prenom)){

      alert('le prenom doit etre alphabetique');
      return;
    }

    if (!/^\d{8}$/.test(tel) || !/^\d{8}$/.test(cin)) {
      alert('Le téléphone et le CIN doivent contenir 8 chiffres');
      return;
    }

    if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
      alert('Entrez une adresse email valide');
      return;
    }

    if (password !== confirmPassword) {
      alert('Les mots de passe ne correspondent pas');
      return;
    }

    if (!optionSelected) {
      alert('Choisissez une option');
      return;
    }

    // Si toutes les validations réussissent, vous pouvez soumettre le formulaire ici.
    document.querySelector('form[name="f"]').submit();
}