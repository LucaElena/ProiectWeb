var defaultNoRanduriTabel = 10;
var startRand = 0;

let NoRanduriTabel = document.getElementById("admin-stoc__filtrare__numar-randuri");
let cautaPiesaFiltru = document.getElementById("admin-stoc__filtrare__cauta__piesa");
let tabelStoc = document.getElementById("admin-stoc__tabel");


if (cautaPiesaFiltru) {
    cautaPiesaFiltru.addEventListener("input", function () { filtreaza_randuri_tabel() });
}

let stangaTabelBtn = document.getElementById("admin-stoc__tabel-button__stanga");
let dreaptaTabelBtn = document.getElementById("admin-stoc__tabel-button__dreapta");
if (stangaTabelBtn && dreaptaTabelBtn) {
    stangaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(-1) });
    dreaptaTabelBtn.addEventListener("click", function () { schimba_randuri_tabel(1) });
    console.log("Add tabel stanga-dreapta buttons listener");
}

//Functie cautat dupa nume piesa in tabelul de stoc
function filtreaza_randuri_tabel(direction) {
    var numarRanduri = NoRanduriTabel.value;
    var filtruPiesa = cautaPiesaFiltru.value.toUpperCase();
    console.log("Filtreaza continut tabel cu numar randuri = " + numarRanduri + " filtru = " + filtruPiesa);
    let tr = tabelStoc.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            numePiesa = td.textContent || td.innerText;
            if (numePiesa.toUpperCase().indexOf(filtruPiesa) < -1) {
                //nu am gasit sirul filtru in numele piesei -> facem invisibil randul cu piesa neselectata 
                tr[i].style.display = "none";
            } else {
                //numele piesei contine sirul de filtru -> scoatem filtru de invisibilitate in caz ca este pus
                tr[i].style.display = "";
            }
        }
    }
}

//Functiile de pe butoanele de stanga dreapta din tabel stoc -> arata numai un numar X de randuri , restul le facem invizibile
function schimba_randuri_tabel(direction) {
    var numarRanduri = NoRanduriTabel.value;
    var filtruPiesa = cautaPiesaFiltru.value.toUpperCase();
    console.log("Schimba randuri tabel direction = " + direction + " numar randuri = " + numarRanduri + " filtru = " + filtruPiesa);

}





