<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaFormular.css">
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

        <form action="/formular/<?=$data['username']?>" method="post" class="formular_programare">
          

            <div class="formular_programare__status">
                <!-- Editare problema->In astepare raspuns->Programata*/ -->
                <p class="formular_programare__status__text">Status formular: </p>
                <p class="formular_programare__status__valoare"><?=$data['formularStatus']?></p>
           </div>

            <div class="formular_programare__data">
                <p class="formular_programare__data__mesaj">Ora programarii</p>
                <input type="datetime-local" class="formular_programare__data__valoare"
                    id="formular_programare__data__valoare" name="ora_programare" value="<?=$data['oraSelectata']?>"
                    min="<?=$data['oraSelectataMin']?>"
                    max="<?=$data['oraSelectataMax']?>"
                    step="3600">
               
            </div>

            

            <div class="formular_programare__mesaj_client">
                
                <?=$data['mesajClient']?>
                <!-- placeholder="Incarcati fisiere video sau cu imagini cu problema" da erroare -->
                              
            </div>

            <div class="formular_programare__mesaj_admin">
                
                <?=$data['mesajAdmin']?>
                <!-- placeholder="Incarcati fisiere video sau cu imagini cu problema" da erroare -->
                              
            </div>

            
            <div class="formular_programare__actiune">
                <!-- <button type="button" class="formular_programare__actiune__accepta_button">Accepta</button>
                <button type="button" class="formular_programare__actiune__respinge_button">Respinge</button> -->
                <!-- <button type="submit" class="formular_programare__actiune__trimite_button" name="formular_programare__actiune" value="Trmite" > Trimite</button> -->
                <?=$data['butoaneFormular']?>
               
            </div> 
            <div class="formular_programare__piese_necesare">
                <?=$data['selectPieseOptionAdmin']?>
            </div>   
            <div class="formular_programare__piese_selectate">
                <?=$data['tabelPieseSelectateAdmin']?>
            </div> 
        </form>
    </main>



</body>

</html>
