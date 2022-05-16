
// 1 ) Partea de filtrare a tabelului:
// Tabelul este incarcat tot in html si in functie de datele selectate in filtrare doar o anumita parte este vizibila

var defaultNoRanduriTabel = 10;
var startRand = 1;
var filtruMemorieCauta = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemorieBrand = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemorieCategorie = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemoriePiesa = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul

var idCategorieSelectata = "";

const brandSelectat = document.getElementById("admin-comenzi__filtrare__brand");
const categorieSelectat = document.getElementById("admin-comenzi__filtrare__categorie");
const piesaSelectat = document.getElementById("admin-comenzi__filtrare__piesa");
const NoRanduriTabel = document.getElementById("admin-comenzi__filtrare__numar-randuri");
const cautaPiesaFiltru = document.getElementById("admin-comenzi__filtrare__cauta__piesa");
const resetFiltru = document.getElementById("admin-comenzi__filtrare__reset__button");
const tabelStoc = document.getElementById("admin-comenzi__tabel");






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

if (cautaPiesaFiltru) {
    cautaPiesaFiltru.addEventListener("input", function () { filtreaza_randuri_tabel() });
}

if (NoRanduriTabel) {
    NoRanduriTabel.addEventListener("input", function () { filtreaza_randuri_tabel() });
}

if (resetFiltru) {
    resetFiltru.addEventListener("click", function () { reseteaza_filtru() });
}

const stangaTabelBtn = document.getElementById("admin-comenzi__tabel-button__stanga");
const dreaptaTabelBtn = document.getElementById("admin-comenzi__tabel-button__dreapta");

if (stangaTabelBtn && dreaptaTabelBtn) {
    stangaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(-1) });
    dreaptaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(1) });
    console.log("Add tabel stanga-dreapta buttons listener");
}

filtreaza_randuri_tabel(defaultNoRanduriTabel);


//Functiile de pe butoanele de stanga dreapta din tabel stoc -> arata numai un numar X de randuri , restul le facem invizibile
function schimba_randuri_tabel(direction) {
    var numarRanduri = NoRanduriTabel.value;
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

    var numarRanduri = "";
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

    //Daca avem o categorie selectata -> updatam si optiunile disponibile din piese dar si Invers de la piesa la categorie
    selectPiese = piesaSelectat.getElementsByTagName("option")
    selectCategorii = categorieSelectat.getElementsByTagName("option")
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
        for (i = 0; i < selectCategorii.length; i++) {

            if (selectCategorii[i].value.includes(";")) {
                const arrayIdCategorie = selectCategorii[i].value.split(";");
                idCategorie = arrayIdCategorie[0];
                categorie = arrayIdCategorie[1];

                if (idCategorieSelectata && idCategorie) {
                    if (idCategorie != idCategorieSelectata) {
                        //  console.log("Facem invisibila piesa : " + idCategorieNumePiesa)
                        selectCategorii[i].style.display = "none"
                    }
                    else {   //cand schimbam categoria ramanem cu piese invisibila de la iteratia trecuta -> trebuie sa le facem vizibile pe restul
                        //  console.log("Facem visibila piesa : " + idCategorieNumePiesa)
                        selectCategorii[i].style.display = ""
                    }
                }
            }
        }
    }
    else {   //La resetare (nu mai avem categorie selectata) -> trebuie sa facem toate piesele vizibile si categoriile
        for (i = 0; i < selectPiese.length; i++) {
            selectPiese[i].style.display = ""
        }
        for (i = 0; i < selectCategorii.length; i++) {
            selectCategorii[i].style.display = ""
        }
    }

    var filtruCautaPiesa = "";
    if (cautaPiesaFiltru) {
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



//Partea de procesare actiuni AJAX
//Pentru a nu reincarca paginile prindem actiunile clientului si le trimitem noi direct catre server si introducem raspunsul in aceiasi pagina
// var buttonPrimitComanda = document.getElementById("admin-comenzi__tabel__actiune__primit");
var butoanePrimitComanda = document.querySelectorAll("[id='admin-comenzi__tabel__actiune__primit']");

var request;
var indexButon;
if (butoanePrimitComanda) {
    // buttonPrimitComanda.addEventListener("click", function () { ajaxPrimitComanda() });

    for (var i = 0; i < butoanePrimitComanda.length; i++) {
        (function(index) {
            butoanePrimitComanda[index].addEventListener("click", function() {
                console.log("Ai apasat buttonul de primit cu index-ul=" + index);
                indexButon = index;
                ajaxPrimitComanda()
              })
        })(i);
     }


}

//Functie ce preia ID-ul comandei primite si il trimite prin HTTP catre server pentru a fi marcata ca primita
function ajaxPrimitComanda() {
    idComanda = butoanePrimitComanda[indexButon].value;
    currentUrl = document.URL
    console.log("Button Primit Comanda cu id_comanda = " + idComanda + " din url pagina = " + currentUrl);
    urlPrimitComanda = currentUrl.replace("/comenzi", "/comenzi/primit") + "/" + idComanda;
    console.log("Url pagina primit= " + urlPrimitComanda);

    //Cod adaptat din suport-ul de curs:
    if (window.XMLHttpRequest) {
        // exista suport nativ
        request = new XMLHttpRequest();
    }
    else
        if (window.ActiveXObject) {
            // se poate folosi obiectul ActiveX din vechiul MSIE
            request = new ActiveXObject("Microsoft.XMLHTTP");
        }

    if (request) {
        // stabilim functia de tratare a starii incarcarii
        request.onreadystatechange = handleResponsePrimitComanda;
        // preluam documentul prin metoda GET
        request.open("GET", urlPrimitComanda, true);
        request.send(null);
    } else {
        // nu exista suport pentru Ajax
        console.error('No Ajax support :(');
    }
}

//Cod adaptat din suport-ul de curs:
// functia de tratare a schimbarii de stare a cererii
// daca e ok modifica pagina (scoate buttonul)
function handleResponsePrimitComanda() {
    // verificam daca incarcarea s-a terminat cu succes
    if (request.readyState == 4) {
        // verificam daca am obtinut codul de stare '200 Ok'
        if (request.status == 200) {
            // procesam datele receptionate prin DOM
            // (preluam elementul radacina al documentului XML)
            var response = request.response;
            // var res = response.getElementsByTagName('result')[0].firstChild.data;
            var jsonRaspuns = JSON.parse(response);
            // console.log("Am primit raspuns insert = " + jsonRaspuns.insert + " and error = " + jsonRaspuns.error);
            if (jsonRaspuns.insert == 1)
            {

                //ar trebui sa modificam si statusul in tabel:
                var status = butoanePrimitComanda[indexButon].parentNode.parentNode.cells[6];
                status.innerText = "Primit";
                // stergem buttonul pentru comanda current din pagina
                butoanePrimitComanda[indexButon].parentNode.removeChild(butoanePrimitComanda[indexButon]);
                console.log("Am sters buttonul pentru comanda curenta primita");

                // adaugam iar un listener pe butoanele de primit
                // buttonPrimitComanda = document.getElementById("admin-comenzi__tabel__actiune__primit");
                // if (buttonPrimitComanda) {
                //     buttonPrimitComanda.addEventListener("click", function () { ajaxPrimitComanda() });
                // }
            }
            else
            {
                console.log("Am primit raspuns primit comanda = " + jsonRaspuns.insert + " and error = " + jsonRaspuns.error);
            }

            
        }
        // eventual, se pot trata si alte coduri HTTP (404, 500 etc.)
        else { // semnalam eroarea in consola browser-ului...
            console.error("A problem occurred (XML data transfer):\n" +
                response.statusText);
        }
    } // final de if
}