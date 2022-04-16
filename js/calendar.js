var today = new Date();
var day = today.getDay(); //ziua saptamanii 0 pana la 6
var currentYear = today.getFullYear();
var currentMonth = today.getMonth();
var currentDay = today.getDate(); //ziua lunii 0 pana la 31 // Setam ziua curent la prima zi a saptamanii
var currentStartHour = 8;
var startHour = 8;
var midHour = 14;
var noHoursPerRow = 12;

var lastSelectedButtonId = 0;
var lastSelectedButtonClass = "programari__calendar__inside__hours_btn__open";

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
    var buttons = [];
    [].forEach.call(calendar_butoane, child => {
        // console.log(child);
        let calendar_buton = child.getElementsByTagName("button");
        let calendar_buton_id = calendar_buton[0].getAttribute("id");
        calendar_buton[0].addEventListener('click', function () { buton_calendar_selected(calendar_buton_id) });
        i++;
    });

}

function buton_calendar_selected(current_buton_id) {
    // console.log(current_buton_id);
    current_selected_buton = document.getElementById(current_buton_id);
    last_selected_buton = document.getElementById(lastSelectedButtonId);
    if (!(lastSelectedButtonId == 0)) {
        last_selected_buton.className = lastSelectedButtonClass;
    }
    if (current_selected_buton.className == "programari__calendar__inside__hours_btn__open") {
        lastSelectedButtonClass = current_selected_buton.className;
        lastSelectedButtonId = current_buton_id;
        current_selected_buton.className = "programari__calendar__inside__hours_btn__selected";
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
    var day = d.getDay(),
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
        FirstMonthDay = getFirstMonthDay(current_day)
        current_monday = getMonday(FirstMonthDay)
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
}











/*
 LeftBtn.addEventListener("mouseenter", setGreyBackground);
 LeftBtn.addEventListener("mouseleave", setWhiteBackground);
 rightBtn.addEventListener("mouseenter", setGreyBackground);
 rightBtn.addEventListener("mouseleave", setWhiteBackground);
 rightBtn.addEventListener("click", goTOnextMount);
function setGreyBackground(e){
    e.target.style.background= 'grey';
}
function setWhiteBackground(e){
    e.target.style.background= 'white';
}
function goTOnextMount()
{
    
    let months = document.getElementsByClassName("schedul__calendar__months");
    for(let i = 0;i < months.length; i++)
    {
        months[i].style.transform = 'translateX(-${(currentMonthIndex + 1) *100}%)';
    }
    currentMonthIndex++;
}
*/