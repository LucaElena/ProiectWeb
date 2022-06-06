// 1 ) Partea de procesare a tabelului:
// Tabelul este incarcat tot in html si in functie de butoanele stanga dreapta doar o anumita parte este vizibila

var defaultNoRanduriTabel = 10;
var startRand = 1;

var istoricProgramari = document.getElementById("istoric_programari__tabel");
var tr = istoricProgramari.getElementsByTagName("tr");



const statusSelectat = document.getElementById("istoric_programari__fitru_status");
if (statusSelectat) {
    statusSelectat.addEventListener("input", function () { filtreaza_randuri_tabel() });
}

const stangaTabelBtn = document.getElementById("istoric_programari__buttons__stanga");
const dreaptaTabelBtn = document.getElementById("istoric_programari__buttons__dreapta");


if (stangaTabelBtn && dreaptaTabelBtn) {
    stangaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(-1) });
    dreaptaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(1) });
    console.log("Add tabel stanga-dreapta buttons listener");
}

filtreaza_randuri_tabel(defaultNoRanduriTabel);


//Functiile de pe butoanele de stanga dreapta din tabel stoc -> arata numai un numar X de randuri , restul le facem invizibile
function schimba_randuri_tabel(direction) {
    var numarRanduri = defaultNoRanduriTabel;
    var newStartRand = startRand + direction * numarRanduri;
    console.log("Schimba start rand:  initial = " + startRand + " new = " + newStartRand);

    //TO DO: newStartRand < tr.length da un bug cand avem un selector 
    if (newStartRand >= 1 && newStartRand < tr.length) {
        startRand = newStartRand;
    }

    filtreaza_randuri_tabel();
}



//Functie cautat dupa nume piesa in tabelul de stoc
function filtreaza_randuri_tabel(numarRanduriSetat) {

    var numarRanduri = defaultNoRanduriTabel;

    var valStatus = statusSelectat.value.toUpperCase();
    if (valStatus === "DEFAULT") {
        valStatus = "";
    }

    var k = 1; //numaram cu el doar randurile vizibile
    for (i = 0; i < tr.length; i++) {
        // console.log(tr[i]);
        tdNumeStatus = tr[i].getElementsByTagName("td")[3];
        if (tdNumeStatus) {
            numeStatus = tdNumeStatus.textContent || tdNumeStatus.innerText;
            if (k - startRand < numarRanduri) {
                //filtram dupa status
                if (numeStatus.toUpperCase().indexOf(valStatus) > -1) {
                    // console.log("Mai avem inca randuri de afisat");
                    tr[i].style.display = "";
                    tr[i].getElementsByTagName("td")[0].innerText = k;
                    // console.log("Am gasit filtru in sirul cautat numar rand curent" + k);
                    //ignoram randurile anterioare start Rand si cele peste start Rand + numar de randuri setat vizibil
                    if (k >= startRand && k < startRand + numarRanduri) {
                        //setam culoarea alternativ impar par
                        if (k % 2 == 0) {
                            tr[i].style.backgroundColor = "#a8dadc";

                        }
                        else {
                            tr[i].style.backgroundColor = "#f1faee";
                        }

                    }
                    else {// randuri ce ar trebuii sa fie vizibile dar nu sunt pe randul > startRand so < startRand+NUmarRanduri
                        tr[i].style.display = "none";
                    }
                    k++;
                }
                else {
                    //nu am gasit sirul filtru in numele piesei -> facem invisibil randul cu piesa neselectata 
                    tr[i].style.display = "none";
                }
            }
            else {
                tr[i].style.display = "none";
            }
        }

    }
}