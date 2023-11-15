let rowNumber = 1; // Initialize row number

document.getElementById("addMedication").addEventListener("click", function() {
    const medicationTable = document.getElementById("medicationTable");
    const newRow = medicationTable.insertRow(medicationTable.rows.length - 1);

    // Create a cell for the auto-incremented row number
    const rowNumberCell = newRow.insertCell(0);
    const rowNumberText = document.createElement("div");
    rowNumberText.textContent = rowNumber;
    rowNumberCell.appendChild(rowNumberText);

    // Add the rest of the cells as before
    for (let i = 1; i < 5; i++) {
        const cell = newRow.insertCell(i);
        const text = document.createElement("div");
        text.textContent = ''; // You can set the text content here if needed
        cell.appendChild(text);
    }

    // Create a cell for the "Supprimer" button
    const deleteCell = newRow.insertCell(5);
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Supp";
    deleteButton.addEventListener("click", function() {
        // Handle row deletion here
        medicationTable.deleteRow(newRow.rowIndex);
        rowNumber--;
    });
    deleteCell.appendChild(deleteButton);

    rowNumber++; // Increment the row number for the next row
});



//////////////////////////////////////////////////////////////////////////////////////////////
function ValiderOrdonnance() {
    var nomMed = document.getElementById("nomMed").value;
    var dosage = document.getElementById("dosage").value;
    var durée = document.getElementById("durée").value;
    var rq = document.getElementById("rq").value;
    var idpat = document.getElementById("idpat").value;
    var diag = document.getElementById("diag").value;

    ValiderNomMedicament(nomMed);
    ValiderDosage(dosage);
    ValiderDurée(durée);
    ValiderRemarques(rq);
    ValiderIDpat(idpat);
    ValiderDiagnostic(diag);
}

    function ValiderNomMedicament(nomMed)
    {
        var erreurNom=document.getElementById("erreurNomMed");
        var pattern = /^[A-Za-z]+$/;
        if(nomMed.length>1&& pattern.test(nomMed))
        {
            erreurNom.innerHTML="Correct";
            erreurNom.style.color = "green";
        }
        else
        {
            erreurNom.innerHTML="incorrect";
            erreurNom.style.color = "red";
        }
    }

    function ValiderDosage(dosage)
    {
        var erreurNom=document.getElementById("erreurDosage");
        var pattern = /^[A-Za-z]+$/;
        if(dosage.length>1&& pattern.test(dosage))
        {
            erreurNom.innerHTML="Correct";
            erreurNom.style.color = "green";
        }
        else
        {
            erreurNom.innerHTML="incorrect";
            erreurNom.style.color = "red";
        }
    }

    function ValiderDurée(durée)
    {
        var erreurNom=document.getElementById("erreurDurée");
        var pattern = /^[A-Za-z]+$/;
        if(durée.length>1&& pattern.test(durée))
        {
            erreurNom.innerHTML="Correct";
            erreurNom.style.color = "green";
        }
        else
        {
            erreurNom.innerHTML="incorrect";
            erreurNom.style.color = "red";
        }
    }

    function ValiderRemarques(rq)
    {
        var erreurNom=document.getElementById("erreurRq");
        var pattern = /^[A-Za-z]+$/;
        if(rq.length>1&& pattern.test(rq))
        {
            erreurNom.innerHTML="Correct";
            erreurNom.style.color = "green";
        }
        else
        {
            erreurNom.innerHTML="incorrect";
            erreurNom.style.color = "red";
        }
    }

    function ValiderIDpat(idpat)
    {
        var erreurNom=document.getElementById("erreurIdpat");
        var pattern = /^[A-Za-z0-9._%+-]/;
        if(idpat.length>1&& pattern.test(idpat))
        {
            erreurNom.innerHTML="Correct";
            erreurNom.style.color = "green";
        }
        else
        {
            erreurNom.innerHTML="incorrect";
            erreurNom.style.color = "red";
        }
    }
    function ValiderDiagnostic(diag)
    {
        var erreurNom=document.getElementById("erreurDiag");
        var pattern = /^[A-Za-z]+$/;
        if(diag.length>1&& pattern.test(diag))
        {
            erreurNom.innerHTML="Correct";
            erreurNom.style.color = "green";
        }
        else
        {
            erreurNom.innerHTML="incorrect";
            erreurNom.style.color = "red";
        }
    }


    //PARTIE 2
document.getElementById("form").addEventListener("keyup", function (e) {
    e.preventDefault(); 
    ValiderOrdonnance();
});