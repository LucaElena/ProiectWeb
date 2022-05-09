<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9ab9988c3d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="../images/favicon.png" />
    <title>CyMaT</title>
    <link rel="stylesheet" href="../css/PaginaClientIndex.css">
</head>

<body>
    <header>
        <ul>
            <?=$data['generalbar']?>
        </ul>
    </header>


    <main>
        <div class="client-welcome">
            <div class="client-welcome__titlu">
                <p>Bine ati venit pe site-ul nostru de reparatii motociclete CyMaT</p>
            </div>
            <div class="client-welcome__mesaj">
                <p>Puteti sa faceti direct o programare <a href="/programare/<?=$data['username']?>">aici</a> </p>
                <p>Sau sa va creati intai un cont <a href="/signup/<?=$data['username']?>">aici</a> sau sa va autentificati
                    <a href="/login/<?=$data['username']?>">aici</a>
                </p>
            </div>
            <div class="client-welcome__sfarsit">
                <p>Va multumim de alegere,<br>Echipa CyMaT</p>
            </div>
        </div>

    </main>



</body>

</html>