
var defaultNoRanduriTabel = 10;
var startRand = 1;
// var sfarsitRand = startRan
var filtruMemorieCauta = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemorieBrand = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemorieCategorie = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemoriePiesa = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul

var idCategorieSelectata = "";

const brandSelectat = document.getElementById("admin-add-comanda__select__brand");
const categorieSelectat = document.getElementById("admin-add-comanda__select__categorie");
const piesaSelectat = document.getElementById("admin-add-comanda__select__piesa");
const NoRanduriTabel = document.getElementById("admin-comenzi__filtrare__numar-randuri");
const cautaPiesaFiltru = document.getElementById("admin-comenzi__filtrare__cauta__piesa");
const resetFiltru = document.getElementById("admin-comenzi__filtrare__reset__button");
const tabelStoc = document.getElementById("admin-add-comanda__tabel_efectiv")
var tr = tabelStoc.getElementsByTagName("tr");

if (brandSelectat) {
    brandSelectat.addEventListener("input", function () { filtreaza_randuri_tabel() });
}
if (categorieSelectat) {
    categorieSelectat.addEventListener("input", function () { filtreaza_randuri_tabel() });
}
if (piesaSelectat) {
    piesaSelectat.addEventListener("input", function () { filtreaza_randuri_tabel() });
}

// if (cautaPiesaFiltru) {
//     cautaPiesaFiltru.addEventListener("input", function () { filtreaza_randuri_tabel() });
// }

// if (NoRanduriTabel) {
//     NoRanduriTabel.addEventListener("input", function () { filtreaza_randuri_tabel() });
// }

// if (resetFiltru) {
//     resetFiltru.addEventListener("click", function () { reseteaza_filtru() });
// }

const stangaTabelBtn = document.getElementById("admin-add-comanda__tabel-button__stanga");
const dreaptaTabelBtn = document.getElementById("admin-add-comanda__tabel-button__dreapta");



if (stangaTabelBtn && dreaptaTabelBtn) {
    console.log("Add tabel stanga-dreapta buttons listener");
    stangaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(-1) });
    dreaptaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(1) });
    
}

filtreaza_randuri_tabel(defaultNoRanduriTabel);


//Functiile de pe butoanele de stanga dreapta din tabel stoc -> arata numai un numar X de randuri , restul le facem invizibile
function schimba_randuri_tabel(direction) {
    // var numarRanduri = NoRanduriTabel.value;
    var numarRanduri = defaultNoRanduriTabel;
    var newStartRand = startRand + direction * numarRanduri;
    console.log("Schimba start rand:  initial = " + startRand + " new = " + newStartRand);

    //TO DO: newStartRand < tr.length da un bug cand avem un selector 
    if (newStartRand >= 1 && newStartRand < tr.length) {
        startRand = newStartRand;
    }

    filtreaza_randuri_tabel();
}
function reseteaza_filtru() {

    console.log("Functie reset filtru");
    console.log(brandSelectat);
    brandSelectat.value = "Default";
    categorieSelectat.value = "Default";
    piesaSelectat.value = "Default";
    NoRanduriTabel.value = "10";
    cautaPiesaFiltru.value = "";
    idCategorieSelectata = "";
    startRand = 1;
    //  = document.getElementById("admin-comenzi__filtrare__brand");
    // categorieSelectat = document.getElementById("admin-comenzi__filtrare__categorie");
    // piesaSelectat = document.getElementById("admin-comenzi__filtrare__piesa");
    filtreaza_randuri_tabel();

}

//Functie cautat dupa nume piesa in tabelul de stoc
function filtreaza_randuri_tabel(numarRanduriSetat) {

    var numarRanduri = defaultNoRanduriTabel;
    if (NoRanduriTabel) {
        numarRanduri = NoRanduriTabel.value;
    }


    //Daca deja avem ca parametru un numar de randuri -> il folosim pe acesta
    if (numarRanduriSetat) {
        numarRanduri = numarRanduriSetat;
    }
    //in caz ca schimbam numarul de Randuri cu butonul select trebuie sa facem si startul randului un multiplu de Numar Randuri selectat
    if (startRand % numarRanduri != 0) {
        startRand = startRand - (startRand % numarRanduri) + 1;
    }

    var valBrand = brandSelectat.value.toUpperCase();
    var valCategorie = categorieSelectat.value.toUpperCase();
    var valPiesa = piesaSelectat.value.toUpperCase();


    if (valBrand === "DEFAULT") {
        valBrand = "";
    }
    if (valCategorie === "DEFAULT") {
        valCategorie = "";
    }
    if (valPiesa === "DEFAULT") {
        valPiesa = "";
    }

    //Am adaugat si legatura prin id intre categorie-piesa pentru a avea doar un subset in optiuni cand selectam o categorie.
    if (valCategorie) {
        if (valCategorie.includes(";")) {
            const arrayIdCategorie = valCategorie.split(";");
            idCategorieSelectata = arrayIdCategorie[0];
            valCategorie = arrayIdCategorie[1];
        }
    }
    if (valPiesa) {
        if (valPiesa.includes(";")) {
            const arrayIdPiesa = valPiesa.split(";");
            idCategorieSelectata = arrayIdPiesa[0];
            valPiesa = arrayIdPiesa[1];

        }
    }
    console.log("Valoare brand = " + valBrand + " categorie= " + valCategorie + " piesa = " + valPiesa + " idCategorieSelectata=" + idCategorieSelectata)
    //Nu mai filtram in cazul acestei pagini
    valBrand = "";
    valCategorie = "";
    valPiesa = "";
    //Daca avem o categorie selectata -> updatam si optiunile disponibile din piese
    selectPiese = piesaSelectat.getElementsByTagName("option")
    if (idCategorieSelectata) {
        for (i = 0; i < selectPiese.length; i++) {

            if (selectPiese[i].value.includes(";")) {
                const arrayIdNumePiesa = selectPiese[i].value.split(";");
                idCategorieNumePiesa = arrayIdNumePiesa[0];
                numePiesa = arrayIdNumePiesa[1];

                if (idCategorieSelectata && idCategorieNumePiesa) {
                    if (idCategorieNumePiesa != idCategorieSelectata) {
                        //  console.log("Facem invisibila piesa : " + idCategorieNumePiesa)
                        selectPiese[i].style.display = "none"
                    }
                    else {   //cand schimbam categoria ramanem cu piese invisibila de la iteratia trecuta -> trebuie sa le facem vizibile pe restul
                        //  console.log("Facem visibila piesa : " + idCategorieNumePiesa)
                        selectPiese[i].style.display = ""
                    }
                }
            }
        }
    }
    else {   //La resetare (nu mai avem categorie selectata) -> trebuie sa facem toate piesele vizibile
        for (i = 0; i < selectPiese.length; i++) {
            selectPiese[i].style.display = ""
        }
    }

    var filtruCautaPiesa = "";
    if(cautaPiesaFiltru)
    {
        filtruCautaPiesa = cautaPiesaFiltru.value.toUpperCase();
    }

    //resetam startul in caz de filtru nou
    if (filtruMemorieCauta != filtruCautaPiesa) {
        startRand = 1;
        filtruMemorieCauta = filtruCautaPiesa;//actualizam memoria
    }

    console.log("Filtreaza continut tabel cu start rand = " + startRand + " numar randuri = " + numarRanduri + " numarar randuri setat = " + numarRanduriSetat + " filtru = " + filtruCautaPiesa);


    var k = 1; //numaram cu el doar randurile vizibile
    for (i = 0; i < tr.length; i++) {
        // console.log(tr[i]);
        tdNumeBrand = tr[i].getElementsByTagName("td")[1];
        tdNumeCategorie = tr[i].getElementsByTagName("td")[2];
        tdNumePiesa = tr[i].getElementsByTagName("td")[3];

        if (tdNumePiesa && tdNumeBrand && tdNumeCategorie) {
            numePiesa = tdNumePiesa.textContent || tdNumePiesa.innerText;
            numeBrand = tdNumeBrand.textContent || tdNumeBrand.innerText;
            numeCategorie = tdNumeCategorie.textContent || tdNumeCategorie.innerText;
            numeBrandCategoriePiesa = numeBrand + " " + numeCategorie + " " + numePiesa;
            // console.log(numeBrandCategoriePiesa)
            if (k - startRand < numarRanduri) {

                // console.log("Mai avem inca randuri de afisat");
                // console.log("Cautam " + filtruCautaPiesa + " in " + numeBrandCategoriePiesa.toUpperCase());
                if (numeBrand.toUpperCase().indexOf(valBrand) > -1 && numeCategorie.toUpperCase().indexOf(valCategorie) > -1 && numePiesa.toUpperCase().indexOf(valPiesa) > -1 && numeBrandCategoriePiesa.toUpperCase().indexOf(filtruCautaPiesa) > -1) {
                    //numele piesei contine sirul de filtru -> scoatem filtru de invisibilitate in caz ca este pus
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

                } else {
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



