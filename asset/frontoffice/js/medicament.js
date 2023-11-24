function ValiderMedicament() {
    var medicament = document.getElementById("medicament").value;
    var lien = document.getElementById("lien").value;

    if (!ValiderNomMedicament(medicament)) {
        alert("Le nom du médicament est incorrect");
        return false;
    }

    if (!Validerlien(lien)) {
        alert("Le lien est incorrect");
        return false;
    }

    return true;
    }

    function ValiderNomMedicament(medicament) {
        var pattern = /^[a-zA-Z0-9]+$/;
        return medicament.length > 2 && pattern.test(medicament);
    }


/*
    function Validerlien(lien) {
        var pattern =   /^[a-zA-Z0-9]+$/;
        return lien.length > 2 && pattern.test(lien);
    }
*/

  // PARTIE 2
  document.getElementById("form").addEventListener("submit", function (e) {
    if (!ValiderMedicament()) {
      e.preventDefault();
    }
  });

