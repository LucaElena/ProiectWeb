var defaultNoRanduriTabel = 10;

let NoRanduriTabel = document.getElementById("admin-stoc__filtrare__numar-randuri");
let cautaPiesaFiltru = document.getElementById("admin-stoc__filtrare__cauta__piesa");



let stangaTabelBtn = document.getElementById("admin-stoc__tabel-button__stanga");
let dreaptaTabelBtn = document.getElementById("admin-stoc__tabel-button__dreapta");
if (stangaTabelBtn && dreaptaTabelBtn) {
    stangaTabelBtn.addEventListener("click", function() { schimba_randuri_tabel(-1) });
    dreaptaTabelBtn.addEventListener("click", function() { schimba_randuri_tabel(1) });
    console.log("Add tabel stanga-dreapta buttons listener");
}



//Functiile de pe butoanele de stanga dreapta din tabel stoc -> arata numai un numar X de randuri , restul le facem invizibile
function schimba_randuri_tabel(direction) 
{
    var numarRanduri = NoRanduriTabel.value;
    var filtruPiesa = cautaPiesaFiltru.value.toUpperCase();
    console.log("Schimba randuri tabel direction = " + direction + " numar randuri = " + numarRanduri + " filtru = " + filtruPiesa);

    
    
}





