<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaIstoric.css">
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

        <div class="istoric_programari">
            <p class="istoric_programari__lista__text"><?=$data['mesaj']?></p>

            <select class="istoric_programari__fitru_status" id="istoric_programari__fitru_status">
                <option value="Default" selected> Status</option>
                <option value="Editare">Editare</option>
                <option value="Astepare admin">Astepare admin</option>
                <option value="Astepare client">Astepare client</option>
                <option value="Programat">Programat</option>
                <option value="Refuzat">Refuzat</option>
                <option value="Terminat">Terminat</option>
                <option value="Lipsa formular">Lipsa formular</option>
            </select>

            <div class="istoric_programari__lista">
                <table id="istoric_programari__tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Data</th>
                            <th>Ora</th>
                            <th>Status</th>
                            <th>Pret</th>
                            <th>Actiune</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>2</td>
                            <td>2022-04-18</td>
                            <td>14:00</td>
                            <td>Programat</td>
                            <td>450</td>
                            <td class="istoric_programari__lista__actiune"><a
                                    href="./PaginaFormularAdmin_terminat.html">Editare</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2022-01-12</td>
                            <td>15:00</td>
                            <td>Terminat</td>
                            <td>350</td>
                            <td></td>
                        </tr> -->
                        <?=$data['tabelIstoric']?>
                    </tbody>
                </table>

            </div>
            <div class="istoric_programari__buttons">
                <button type="button" class="istoric_programari__buttons__stanga" id="istoric_programari__buttons__stanga">
                    &#10094; </button>
                <button type="button" class="istoric_programari__buttons__dreapta" id="istoric_programari__buttons__dreapta">
                    &#10095; </button>
            </div>

        </div>
        <script src="../js/istoric.js"></script>
    </main>



</body>

</html>