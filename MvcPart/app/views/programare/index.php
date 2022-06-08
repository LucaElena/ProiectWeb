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
        <form action="/formular/" method="post" class="programari">
            <div class="programari__calendar">
                <?=$data['tabelLunaProgram']?>
                <!-- <button type="button" class="programari__calendar__left_month_btn" id="month_leftBtn">&#9668;</button>
                <button type="button" class="programari__calendar__left_week_btn" id="week_leftBtn">&#9668;</button> -->
                <button type="button" class="programari__calendar__left_month_btn" id="month_leftBtn">&#9668;</button>
                <button type="button" class="programari__calendar__left_week_btn" id="week_leftBtn">&#9668;</button>
                <button type="button" class="programari__calendar__left_day_btn" id="day_leftBtn">&#9668;</button>
                <div class="programari__calendar__inside">
                        <?=$data['tabelSaptamanaProgram']?>
                        <?=$data['tabelProgram']?>
                    <button type="button" class="programari__calendar__inside__down_btn" id="hours_downBtn">&#9660;</button>
                    <button type="button" class="programari__calendar__inside__up_btn" id="hours_upBtn">&#9650;</button>
                </div>
               
                <button type="button" class="programari__calendar__right_day_btn" id="day_rightBtn">&#9658;</button>
                <button type="button" class="programari__calendar__right_week_btn" id="week_rightBtn">&#9658;</button>
                <button type="button" class="programari__calendar__right_month_btn" id="month_rightBtn">&#9658;</button>
            </div>

            <div class="programari__btn">
                <?=$data['butoane']?>
            </div>
            <script src="../js/calendar.js"></script>
        </form>
    </main>



    <footer>
        <p>Cycling Maintenance Web Tool</p>
    </footer>


</body>

</html>
