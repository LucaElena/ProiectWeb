<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaCalendar.css">
    <script src="https://kit.fontawesome.com/9ab9988c3d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="../images/favicon.png" />
    <title>CyMaT</title>
</head>

<body>
    <header>
        <ul>
            <?=$data['generalbar']?>
        </ul>
    </header>



    <main>
        <form action="/formular/<?=$data['username']?>" method="post" class="programari">
            <div class="programari__calendar">
                <div class="programari__calendar__month" id="selected_month">APRIL 2022</div>
                <!-- <button type="button" class="programari__calendar__left_month_btn" id="month_leftBtn">&#9668;</button>
                <button type="button" class="programari__calendar__left_week_btn" id="week_leftBtn">&#9668;</button> -->
                <button type="button" class="programari__calendar__left_month_btn" id="month_leftBtn">&#9668;</button>
                <button type="button" class="programari__calendar__left_week_btn" id="week_leftBtn">&#9668;</button>
                <button type="button" class="programari__calendar__left_day_btn" id="day_leftBtn">&#9668;</button>
                <div class="programari__calendar__inside">
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_0_programare">MON 04/04</div>
                    </div>
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_1_programare">TUE 05/04</div>
                    </div>
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_2_programare">WED 06/04</div>
                    </div>
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_3_programare">THU 07/04</div>
                    </div>
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_4_programare">FRI 08/04</div>
                    </div>
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_5_programare">SAT 09/04</div>
                    </div>
                    <div class="programari__calendar__inside__head">
                        <div class="programari__calendar__inside__day" id="day_6_programare">SUN 10/04</div>
                    </div>
                
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__closed" name="button_progrmare_ora" value="08:00" id="calendar_row1_col1"> 08:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__closed" name="button_progrmare_ora" value="08:00" id="calendar_row2_col1"> 08:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="08:00" id="calendar_row3_col1"> 08:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="08:00" id="calendar_row4_col1"> 08:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="08:00" id="calendar_row5_col1"> 08:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="08:00" id="calendar_row6_col1"> 08:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="08:00" id="calendar_row7_col1"> 08:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="09:00" id="calendar_row1_col2"> 09:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="09:00" id="calendar_row2_col2"> 09:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="09:00" id="calendar_row3_col2"> 09:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="09:00" id="calendar_row4_col2"> 09:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__closed" name="button_progrmare_ora" value="09:00" id="calendar_row5_col2">09:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="09:00" id="calendar_row6_col2"> 09:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="09:00" id="calendar_row7_col2"> 09:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="10:00" id="calendar_row1_col3"> 10:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="10:00" id="calendar_row2_col3"> 10:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="10:00" id="calendar_row3_col3"> 10:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="10:00" id="calendar_row4_col3"> 10:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="10:00" id="calendar_row5_col3"> 10:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="10:00" id="calendar_row6_col3"> 10:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="10:00" id="calendar_row7_col3"> 10:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="11:00" id="calendar_row1_col4"> 11:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="11:00" id="calendar_row2_col4"> 11:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="11:00" id="calendar_row3_col4"> 11:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="11:00" id="calendar_row4_col4"> 11:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="11:00" id="calendar_row5_col4"> 11:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="11:00" id="calendar_row6_col4"> 11:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="11:00" id="calendar_row7_col4"> 11:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="12:00" id="calendar_row1_col5"> 12:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="12:00" id="calendar_row2_col5"> 12:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="12:00" id="calendar_row3_col5"> 12:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="12:00" id="calendar_row4_col5"> 12:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="12:00" id="calendar_row5_col5"> 12:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="12:00" id="calendar_row6_col5"> 12:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="12:00" id="calendar_row7_col5"> 12:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="13:00" id="calendar_row1_col6"> 13:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="13:00" id="calendar_row2_col6"> 13:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="13:00" id="calendar_row3_col6"> 13:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="13:00" id="calendar_row4_col6"> 13:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="13:00" id="calendar_row5_col6"> 13:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="13:00" id="calendar_row6_col6"> 13:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="13:00" id="calendar_row7_col6"> 13:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="14:00" id="calendar_row1_col7"> 14:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="14:00" id="calendar_row2_col7"> 14:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="14:00" id="calendar_row3_col7"> 14:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="14:00" id="calendar_row4_col7"> 14:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="14:00" id="calendar_row5_col7"> 14:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="14:00" id="calendar_row6_col7"> 14:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="14:00" id="calendar_row7_col7"> 14:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="15:00" id="calendar_row1_col8"> 15:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="15:00" id="calendar_row2_col8"> 15:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="15:00" id="calendar_row3_col8"> 15:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="15:00" id="calendar_row4_col8"> 15:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="15:00" id="calendar_row5_col8"> 15:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="15:00" id="calendar_row6_col8"> 15:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="15:00" id="calendar_row7_col8"> 15:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="16:00" id="calendar_row1_col9"> 16:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="16:00" id="calendar_row2_col9"> 16:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="16:00" id="calendar_row3_col9"> 16:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="16:00" id="calendar_row4_col9"> 16:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="16:00" id="calendar_row5_col9"> 16:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="16:00" id="calendar_row6_col9"> 16:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="16:00" id="calendar_row7_col9"> 16:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="17:00" id="calendar_row1_col10"> 17:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="17:00" id="calendar_row2_col10"> 17:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="17:00" id="calendar_row3_col10"> 17:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="17:00" id="calendar_row4_col10"> 17:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="17:00" id="calendar_row5_col10"> 17:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="17:00" id="calendar_row6_col10"> 17:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="17:00" id="calendar_row7_col10"> 17:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="18:00" id="calendar_row1_col11"> 18:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="18:00" id="calendar_row2_col11"> 18:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="18:00" id="calendar_row3_col11"> 18:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="18:00" id="calendar_row4_col11"> 18:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="18:00" id="calendar_row5_col11"> 18:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="18:00" id="calendar_row6_col11"> 18:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="18:00" id="calendar_row7_col11"> 18:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="19:00" id="calendar_row1_col12"> 19:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="19:00" id="calendar_row2_col12"> 19:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="19:00" id="calendar_row3_col12"> 19:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="19:00" id="calendar_row4_col12"> 19:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="19:00" id="calendar_row5_col12"> 19:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="19:00" id="calendar_row6_col12"> 19:00</button>
                    </div>
                    <div class="programari__calendar__inside__hours_btn">
                        <button type="button" class="programari__calendar__inside__hours_btn__open" name="button_progrmare_ora" value="19:00" id="calendar_row7_col12"> 19:00</button>
                    </div>


                    <button type="button" class="programari__calendar__inside__down_btn" id="hours_downBtn">&#9660;</button>
                    <button type="button" class="programari__calendar__inside__up_btn" id="hours_upBtn">&#9650;</button>
                </div>
               
                <button type="button" class="programari__calendar__right_day_btn" id="day_rightBtn">&#9658;</button>
                <button type="button" class="programari__calendar__right_week_btn" id="week_rightBtn">&#9658;</button>
                <button type="button" class="programari__calendar__right_month_btn" id="month_rightBtn">&#9658;</button>
            </div>

            <div class="programari__btn">
                <button type="submit" class="programari__btn__btn1" id="programari__btn__book" name="calendar_action" value="Book"> Book</button>
            </div>
            <script src="../js/calendar.js"></script>
        </form>
    </main>



    <footer>
        <p>Cycling Maintenance Web Tool</p>
    </footer>


</body>

</html>
