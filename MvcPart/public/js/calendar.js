var today = new Date();
var day = today.getDay(); //ziua saptamanii 0 pana la 6
var currentYear = today.getFullYear();
var currentMonth = today.getMonth();
var currentDay = today.getDate(); //ziua lunii 0 pana la 31 // Setam ziua curent la prima zi a saptamanii
var currentStartHour = 8;
var startHour = 8;
var midHour = 14;
var noHoursPerRow = 12;

//Extragem data curenta din pagina si o suprascriem 
let pageSelectedYear = document.getElementById("selected_month");
let pageSelectedMonday = document.getElementById("day_0_programare");
if (pageSelectedYear && pageSelectedMonday)
{
    lunaAn = pageSelectedYear.innerHTML;
    ziLuna = pageSelectedMonday.innerHTML
    console.log("Anul curent = " +  lunaAn); 
    console.log("Ziua de luni curenta = " +  ziLuna); 
    // Arata asa si il spargem pentru a ne extrage bucatile an/zi/luna
    // Anul curent = FEB 2022
    // Ziua de luni curenta = MON 21/02
    currentYear = parseInt(lunaAn.split(" ")[1]);
    currentMonth = parseInt(ziLuna.split("/")[1])-1; // luna in obiectul Date javascript incepe de la 0 
    currentDay = parseInt(ziLuna.split("/")[0].split(" ")[1]);
}

var lastSelectedButtonId = 0;
var lastSelectedButtonClass = "programari__calendar__inside__hours_btn__open";
var lastSelectedButtonHtml = "";

console.log("Y=" + currentYear + " M=" + currentMonth + " D=" + currentDay + " H=" + currentStartHour);


var mounth_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var week_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];


//Adaugam evenimente de ascultare pe butoanele de stanga dreapta din calendar
let monthLeftBtn = document.getElementById("month_leftBtn");
let monthRightBtn = document.getElementById("month_rightBtn");
if (monthLeftBtn && monthRightBtn) {
    monthLeftBtn.addEventListener("click", function () { change_curent_month(-1) });
    monthRightBtn.addEventListener("click", function () { change_curent_month(1) });
    console.log("Add month buttons listener");
}

let weekLeftBtn = document.getElementById("week_leftBtn");
let weekRightBtn = document.getElementById("week_rightBtn");
if (weekLeftBtn && weekRightBtn) {
    weekLeftBtn.addEventListener("click", function () { change_curent_week(-1) });
    weekRightBtn.addEventListener("click", function () { change_curent_week(1) });
    console.log("Add week buttons listener");
}

let dayLeftBtn = document.getElementById("day_leftBtn");
let dayRightBtn = document.getElementById("day_rightBtn");
if (dayLeftBtn && dayRightBtn) {
    dayLeftBtn.addEventListener("click", function () { change_curent_day(-1) });
    dayRightBtn.addEventListener("click", function () { change_curent_day(1) });
    console.log("Add day buttons listener");
}

let hoursUpBtn = document.getElementById("hours_upBtn");
let hoursDownBtn = document.getElementById("hours_downBtn");
if (hoursUpBtn && hoursDownBtn) {
    hoursUpBtn.addEventListener("click", function () { change_curent_hours(-1) });
    hoursDownBtn.addEventListener("click", function () { change_curent_hours(1) });
    console.log("Add hour buttons listener");
}


let calendar_butoane = document.getElementsByClassName("programari__calendar__inside__hours_btn");
if (calendar_butoane) {
    console.log("calendar_butoane length " + calendar_butoane.length);
    let i = 0;
    
    //Asta itereaza prin toate buttoanele si adauga cate un EventListener pentru fiecare button in parte
    //TO DO: BUG: un button deja selectat nu mai poate fi reselectat deoarece EventListener-ul e sters pentru acel button 
    //Poate de readaugat EventListerul cumva dupa ce am consumat unul sau de cautat optiuni ce trebuie setate
    [].forEach.call(calendar_butoane, child => {
        // console.log(child);
        let calendar_buton = child.getElementsByTagName("button");
        let calendar_buton_id = calendar_buton[0].getAttribute("id");
        calendar_buton[0].addEventListener('click', function () { 
            buton_calendar_selected(calendar_buton_id) 
        });
        i++;
    });

}

function buton_calendar_selected(current_buton_id) {
    // console.log(current_buton_id);
    current_selected_buton = document.getElementById(current_buton_id);
    last_selected_buton = document.getElementById(lastSelectedButtonId);
    // console.log(lastSelectedButtonId);
    if (!(lastSelectedButtonId == 0)) {
        // daca am avut button selectat punem la loc vechea clasa si vechiul continut html
        last_selected_buton.parentNode.innerHTML = current_parent_selected_buton_html;
        //trebuie sa il luam inca o data din DOM pentru ca l-am modificat mai sus si dupa nu ii mai putem modifica clasa// Ramanea cu clasa selected 
        last_selected_buton = document.getElementById(lastSelectedButtonId);
        last_selected_buton.className = lastSelectedButtonClass;
        console.log("Resetam vechiul button selectat : " + lastSelectedButtonId + " cu valoarea=" + last_selected_buton.value );
    }
    if (current_selected_buton.className == "programari__calendar__inside__hours_btn__open") {
        lastSelectedButtonClass = current_selected_buton.className;
        lastSelectedButtonHtml = current_selected_buton.parentNode.innerHTML;
        lastSelectedButtonId = current_buton_id;
        //marcam ca selected buttonl primit
        current_selected_buton.className = "programari__calendar__inside__hours_btn__selected";
        current_parent_selected_buton_html = current_selected_buton.parentNode.innerHTML;
        //adaugam partea de input hidden pentru a transmite valoare prin POST
        current_selected_buton.parentNode.innerHTML = current_parent_selected_buton_html 
                + 
            '<input type="hidden" id="ascuns_selected_button" name="ascuns_selected_button" value="' + current_selected_buton.value + '">'
        // current_selected_buton_actualizat = document.getElementById(current_buton_id);
        // console.log(current_selected_buton_actualizat.parentNode.innerHTML);
        console.log("Marcam ca selected si ii adaugam input hidden pentru post buttonului : " + current_buton_id + " cu valoarea=" + current_selected_buton.value );
    }
}

//Functiile de pe butoanele de stanga dreapta din calendar
function change_curent_month(direction) {

    let current_day = new Date(currentYear, currentMonth, currentDay, 0, 0, 0, 0);
    // Adaugam/scadem aproximativ o luna la data la care suntem.
    let new_start_day = new Date(current_day.getTime() + direction * 30.4 * 24 * 60 * 60 * 1000);

    currentYear = new_start_day.getFullYear();
    currentMonth = new_start_day.getMonth();
    currentDay = new_start_day.getDate();
    currentStartHour = 8;
    console.log("Change current month");
    print_programare(2);
}

function change_curent_week(direction) {

    let current_day = new Date(currentYear, currentMonth, currentDay, 0, 0, 0, 0);
    let new_start_day = new Date(current_day.getTime() + direction * 7 * 24 * 60 * 60 * 1000);

    currentYear = new_start_day.getFullYear();
    currentMonth = new_start_day.getMonth();
    currentDay = new_start_day.getDate();
    currentStartHour = 8;
    console.log("Change current week");
    print_programare(1);
}

function change_curent_day(direction) {

    let current_day = new Date(currentYear, currentMonth, currentDay, 0, 0, 0, 0);
    let new_start_day = new Date(current_day.getTime() + direction * 1 * 24 * 60 * 60 * 1000);

    currentYear = new_start_day.getFullYear();
    currentMonth = new_start_day.getMonth();
    currentDay = new_start_day.getDate();
    currentStartHour = 8;
    console.log("Change current day");
    print_programare(0);
}




function change_curent_hours(direction) {
    //Avem doar 2 inceputuri 
    if (currentStartHour == 8) {
        currentStartHour = midHour;
    } else {
        currentStartHour = startHour;
    }
    console.log("Change current day hour=" + currentStartHour);
    print_programare(0);
}

function getMonday(d) {
    d = new Date(d);
    var day = d.getDay();
    
    diff = d.getDate() - day + (day == 0 ? -6 : 1); // adjust when day is sunday
    return new Date(d.setDate(diff));
}

function getFirstMonthDay(d) {
    date = new Date(d);
    firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    return firstDay;
}

//firstday = 0 -> Printam incepand cu ziua la care suntem
//firstday = 1 -> Printam incepand cu prima Luni din saptamana la care suntem
//firstday = 2 -> Printam incepand cu prima luni din luna la care suntem
//Aici probabil trebuie sa si interogam date din baza de date sau sa mutam codul in MVC
function print_programare(firstDay) {
    console.log("Y=" + currentYear + " M=" + currentMonth + " D=" + currentDay + " H=" + currentStartHour)
    let current_day = new Date(currentYear, currentMonth, currentDay, 0, 0, 0, 0);
    //setam luna/anul
    document.getElementById("selected_month").innerHTML = mounth_names[currentMonth].toUpperCase() + " " + currentYear;
    let current_monday = current_day
    if (firstDay == 2) {
        FirstMonthDay = getFirstMonthDay(current_day);
        current_monday = getMonday(FirstMonthDay);

    }
    if (firstDay == 1) {
        current_monday = getMonday(current_day)
    }

    //setam zile saptamanii
    for (var i = 0; i < 7; i++) {

        var loopDate = new Date(current_monday.getTime() + i * 24 * 60 * 60 * 1000);
        //setam zile saptamanii
        //console.log( parseInt(loopDate.getDay()) )
        document.getElementById("day_" + i + "_programare").innerHTML = week_names[parseInt(loopDate.getDay())].substring(0, 3).toUpperCase() + " " + ("0" + (loopDate.getDate())).slice(-2) + "/" + ("0" + (loopDate.getMonth() + 1)).slice(-2);

        for (var j = 0; j < noHoursPerRow; j++) {
            //calendar_row4_col5 
            if (currentStartHour == startHour) {
                var current_button = document.getElementById("calendar_row" + (parseInt(i) + 1) + "_col" + (parseInt(j) + 1))
                if ((currentStartHour + j) < 10) {
                    current_button.innerHTML = "0" + (currentStartHour + j) + ":00";
                } else {
                    current_button.innerHTML = (currentStartHour + j) + ":00";
                }

            } else { //printam si in jumatatea ascunsa la dimensiune mica
                //incepem de la 14 a doua jumate daca am inceput de la 8 in prima
                //incepem de la 8 in a doua jumate daca am inceput de la 14 in prima
                if (j < noHoursPerRow / 2) {
                    var current_button = document.getElementById("calendar_row" + (parseInt(i) + 1) + "_col" + (parseInt(j) + 1))
                    if ((currentStartHour + j) < 10) {
                        current_button.innerHTML = "0" + (currentStartHour + j) + ":00";
                    } else {
                        current_button.innerHTML = (currentStartHour + j) + ":00";
                    }
                } else {
                    var current_button = document.getElementById("calendar_row" + (parseInt(i) + 1) + "_col" + (parseInt(j) + 1))
                    current_button.innerHTML = (startHour + j - noHoursPerRow / 2) + ":00";
                    if ((startHour + j - noHoursPerRow / 2) < 10) {
                        current_button.innerHTML = "0" + (startHour + j - noHoursPerRow / 2) + ":00";
                    } else {
                        current_button.innerHTML = (startHour + j - noHoursPerRow / 2) + ":00";
                    }
                }
            }

            //current_button.setAttribute("class" , "programari__calendar__inside__hours_btn__bussy");
        }
    }
    ajaxUpdateStatusProgramari(current_day, firstDay);
}






//functie ce schimba statusul programarilor la apasarea buttoanelor stanga/dreapta din calendar
//facem un request AJAX catre server si la primirea raspunsului updatam calendarul
function ajaxUpdateStatusProgramari(current_day , firstDay)
{
    console.log("Trebuie sa preluam si status-ul nou al programarilor din saptamana curenta" + current_day.toLocaleDateString());
    //1) Preluam si pregatim datele 
    var params = {"currentDay": {}, "firstDay": {}};
    // params["currentDay"] = current_day.getFullYear() + '-' + current_day.getMonth() + '-' +  current_day.getDate(); 
    params["currentDay"] = current_day.toLocaleDateString();
    params["firstDay"] = firstDay;


    //2) Construim url-ul catre server
    currentUrl = document.URL;
    var urlUpdateStatusProgramari = currentUrl.replace("/programare", "/programare/updatestatus") + "/";
    console.log("Url update status programari din saptamana curenta = " + urlUpdateStatusProgramari);

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
        request.onreadystatechange = handleResponseUpdateStatusProgramari;
        // trimitem prin HTTP datele transformate in json cu metoda POST la url-ul controlerului de update stoc
        request.open("POST", urlUpdateStatusProgramari, true); 
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
function handleResponseUpdateStatusProgramari() {
    // verificam daca incarcarea s-a terminat cu succes
    if (request.readyState == 4) {
        // verificam daca am obtinut codul de stare '200 Ok'
        if (request.status == 200) {
            // procesam datele receptionate prin DOM
            // (preluam elementul radacina al documentului XML)
            var response = request.response;
            // var res = response.getElementsByTagName('result')[0].firstChild.data;
            var jsonRaspuns = JSON.parse(response);
            // console.log("Am primit raspuns status = " + jsonRaspuns.status + " and error = " + jsonRaspuns.error);
            if (jsonRaspuns.status == 1) {
                // actiune raspuns
                // console.log("Am primit raspunsul:" + jsonRaspuns.data);
                console.log("Am primit raspuns primit status = " + jsonRaspuns.status + " and error = " + jsonRaspuns.error);
                tabelProgramari = document.getElementsByClassName("programari__calendar__inside");
                //primim un json cu statusul la toate butoanele si cordonatele i j corespunzatoare 
                jsonRaspuns.data.forEach(
                    element => {
                            // console.log("i=" + element.i + " j=" + element.j + " status =" + element.status);
                            buttonCurentProgramare = document.getElementById("calendar_row" + element.i + "_col" + element.j);
                            buttonCurentProgramare.className = "programari__calendar__inside__hours_btn__" + element.status;
                            buttonCurentProgramare.innerHTML = buttonCurentProgramare.innerHTML + element.hover;
                        }
                    )
            }
            else {
                console.log("Am primit raspuns primit status = " + jsonRaspuns.status + " and error = " + jsonRaspuns.error);
            }


        }
        // eventual, se pot trata si alte coduri HTTP (404, 500 etc.)
        else { // semnalam eroarea in consola browser-ului...
            console.error("A problem occurred (XML data transfer):\n" +
                response.statusText);
        }
    } // final de if
}

