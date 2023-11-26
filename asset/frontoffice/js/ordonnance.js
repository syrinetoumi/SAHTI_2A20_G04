
/*function ValiderOrdonnance() {
    var nommed = document.getElementById("nommed").value;
    var dosage = document.getElementById("dosage").value;
    var duree = document.getElementById("duree").value;
   // var rq = document.getElementById("rq").value;

    ValiderNomMedicament(nommed);
    ValiderDosage(dosage);
    ValiderDurée(duree);
    //ValiderRemarques(rq);
}

function ValiderNomMedicament(nommed) {
    var erreurNom = document.getElementById("erreurnommed");
    var pattern =/^[a-zA-Z0-9]+$/;
    if (nommed.length > 2 && pattern.test(nommed)) {
        erreurNom.innerHTML = "Correct";
        erreurNom.style.color = "green";
    } else {
        erreurNom.innerHTML = "Incorrect";
        erreurNom.style.color = "red";
    }
}

function ValiderDosage(dosage) {
    var erreurDosage = document.getElementById("erreurdosage");
    var pattern = /^[a-zA-Z0-9]+$/;
    if (dosage.length > 2 && pattern.test(dosage)) {
        erreurDosage.innerHTML = "Correct";
        erreurDosage.style.color = "green";
    } else {
        erreurDosage.innerHTML = "Incorrect";
        erreurDosage.style.color = "red";
    }
}

function ValiderDurée(duree) {
    var erreurDuree = document.getElementById("erreurduree");
    var pattern =/^[a-zA-Z0-9]+$/;
    if (duree.length > 2 && pattern.test(duree)) {
        erreurDuree.innerHTML = "Correct";
        erreurDuree.style.color = "green";
    } else {
        erreurDuree.innerHTML = "Incorrect";
        erreurDuree.style.color = "red";
    }
}

// PARTIE 2
document.getElementById("form").addEventListener("submit", function (e) {
    e.preventDefault();
    ValiderOrdonnance();
});

*/
    function ValiderOrdonnance() {
    var dosage = document.getElementById("dosage").value;
    var duree = document.getElementById("duree").value;


    if (!ValiderDosage(dosage)) {
        alert("Le dosage est incorrect");
        return false;
    }

    if (!ValiderDurée(duree)) {
        alert("La durée du traitement est incorrecte");
        return false;
    }

    return true;
  }





  function ValiderDosage(dosage) {
    var pattern =   /^[a-zA-Z0-9]+$/;
    return dosage.length > 2 && pattern.test(dosage);
  }

  function ValiderDurée(duree) {
    var pattern =   /^[a-zA-Z0-9]+$/;
    return duree.length > 2 && pattern.test(duree);
  }

 
  // PARTIE 2
  document.getElementById("form").addEventListener("submit", function (e) {
    if (!ValiderOrdonnance()) {
      e.preventDefault();
    }
  });

