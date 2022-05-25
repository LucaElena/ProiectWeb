// 1 ) Partea de filtrare a tabelului:
// Tabelul este incarcat tot in html si in functie de datele selectate in filtrare doar o anumita parte este vizibila

var defaultNoRanduriTabel = 10;
var startRand = 1;
// var sfarsitRand = startRan
var filtruMemorieCauta = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemorieBrand = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemorieCategorie = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul
var filtruMemoriePiesa = "";// stocam in el cuvantul cautat -> daca se modifica ar trebui sa resetam si startul

var idCategorieSelectata = "";

const brandSelectat = document.getElementById("admin-stoc__filtrare__brand");
const categorieSelectat = document.getElementById("admin-stoc__filtrare__categorie");
const piesaSelectat = document.getElementById("admin-stoc__filtrare__piesa");
const NoRanduriTabel = document.getElementById("admin-stoc__filtrare__numar-randuri");
const cautaPiesaFiltru = document.getElementById("admin-stoc__filtrare__cauta__piesa");
const resetFiltru = document.getElementById("admin-stoc__filtrare__reset__button");

var tabelStoc = document.getElementById("admin-stoc__tabel");
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

const stangaTabelBtn = document.getElementById("admin-stoc__tabel-button__stanga");
const dreaptaTabelBtn = document.getElementById("admin-stoc__tabel-button__dreapta");

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
    //  = document.getElementById("admin-stoc__filtrare__brand");
    // categorieSelectat = document.getElementById("admin-stoc__filtrare__categorie");
    // piesaSelectat = document.getElementById("admin-stoc__filtrare__piesa");
    filtreaza_randuri_tabel();

}

//Functie cautat dupa nume piesa in tabelul de stoc
function filtreaza_randuri_tabel(numarRanduriSetat) {
    var numarRanduri = NoRanduriTabel.value;


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
                        // console.log("Facem invisibila piesa : " + idCategorieNumePiesa)
                        selectPiese[i].style.display = "none"
                    }
                    else {   //cand schimbam categoria ramanem cu piese invisibila de la iteratia trecuta -> trebuie sa le facem vizibile pe restul
                        // console.log("Facem visibila piesa : " + idCategorieNumePiesa)
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
    else {   //La resetare (nu mai avem categorie selectata) -> trebuie sa facem toate piesele vizibile si invers categoriile 
        for (i = 0; i < selectPiese.length; i++) {
            selectPiese[i].style.display = ""
        }
        for (i = 0; i < selectCategorii.length; i++) {
            selectCategorii[i].style.display = ""
        }
    }



    var filtruCautaPiesa = cautaPiesaFiltru.value.toUpperCase();

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

const buttonUpdateStoc = document.getElementById("admin-stoc__tabel-button__update");


if (buttonUpdateStoc) {

    buttonUpdateStoc.addEventListener('click', (event) => {
        //oprim comportamentul default:
        event.preventDefault();
        //redirectam la functia noastra de procesare a event-ului
        ajaxUpdateStoc()
    });
}

function ajaxUpdateStoc() {

    console.log("Button de update apasat");
    //1) Preluam si pregatim datele 
    //trebuie sa preluam tabelul din DOM deoarece poate sa fie modificat si vrem varianta curenta
    tabelStoc = document.getElementById("admin-stoc__tabel");
    tr = tabelStoc.getElementsByTagName("tr");
    var params = {"stoc": {}, "stoc-rezervate" : {}};
    for (i = 0; i < tr.length; i++) {

        if(i >= 1){

            stocDom = tr[i].getElementsByClassName("admin-stoc__tabel__stoc-actiune")[0]
            stocRezervatDom = tr[i].getElementsByClassName("admin-stoc__tabel__rezervat-actiune")[0]
            idPiesaStoc = stocDom.id.split("[")[1].split("]")[0];//Arata asa admin-stoc__tabel__stoc-actiune_rand_stoc[1] si ii extragem id-ul
            valoareStoc = stocDom.value;
            valoareStocRezervat = stocRezervatDom.value;
            // console.log(i + " Rand curent : id piesa = " + idPiesaStoc + " valoare stoc = " + valoareStoc + " valoare stoc rezervat =" + valoareStocRezervat);
            params["stoc"][idPiesaStoc] = valoareStoc; 
            params["stoc-rezervate"][idPiesaStoc] = valoareStocRezervat; 
        }
        
    }
    // console.log(params);

    //2) Construim url-ul catre server
    currentUrl = document.URL;
    var urlUpdateStoc = currentUrl.replace("/stoc", "/stoc/update") + "/";
    console.log("Url update stoc = " + urlUpdateStoc);

    //Cod adaptat din suport-ul de curs . 
    //3)  trimitem datele prin HTTP catre server
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
        request.onreadystatechange = handleResponseUpdateStoc;
        // trimitem prin HTTP datele transformate in json cu metoda POST la url-ul controlerului de update stoc
        request.open("POST", urlUpdateStoc, true); 
        request.setRequestHeader("Content-Type", "application/json");
        request.send(JSON.stringify(params));

    } else {
        // nu exista suport pentru Ajax
        console.error('No Ajax support :(');
    }
}

//Cod adaptat din suport-ul de curs:
// functia de tratare a schimbarii de stare a cererii
// daca e ok modifica pagina (scoate buttonul)
function handleResponseUpdateStoc() {
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
            if (jsonRaspuns.insert == 1) {
                // actiune raspuns
                console.log("Am updatat stoc-ul cu succes ");
                // var tabelComenzi = document.getElementById("admin-add-comanda__tabel_efectiv");

                // var randNou = tabelComenzi.insertRow(1);

                // var numar = randNou.insertCell(0);
                // var brand = randNou.insertCell(1);
                // var categorie = randNou.insertCell(2);
                // var piesa = randNou.insertCell(3);
                // var cantitate = randNou.insertCell(4);
                // var dataComanda = randNou.insertCell(5);
                // var status = randNou.insertCell(6);

                // numar.innerText = "Noua";
                // brand.innerText = brandSelectat.value;
                // categorie.innerText = categorieSelectat.value.split(";")[1];
                // piesa.innerText = piesaSelectata.value.split(";")[1];
                // cantitate.innerText = cantitateaSelectata.value;
                // dataComanda.innerText = "Noua: Astazi";
                // status.innerText = "In asteptare"

                // reseteaza_filtru();
            }
            else {
                console.log("Am primit raspuns primit insert = " + jsonRaspuns.insert + " and error = " + jsonRaspuns.error);
            }


        }
        // eventual, se pot trata si alte coduri HTTP (404, 500 etc.)
        else { // semnalam eroarea in consola browser-ului...
            console.error("A problem occurred (XML data transfer):\n" +
                response.statusText);
        }
    } // final de if
}





