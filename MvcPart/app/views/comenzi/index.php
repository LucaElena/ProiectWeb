<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaComenziAdmin.css">
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

        <div class="admin-comenzi">
            <div class="admin-comenzi__titlu">
                <p>Pagina administrare comenzi :</p>
            </div>
            <div class="admin-comenzi__filtrare">

                <select class="admin-comenzi__filtrare__brand" id="admin-comenzi__filtrare__brand">
                    <option value="Default"> Brand</option>
                    <?=$data['brandOptions']?>
                </select>

                <select class="admin-comenzi__filtrare__categorie" id="admin-comenzi__filtrare__categorie">
                    <option value="Default"> Categorie</option>
                    <?=$data['categoriiOptions']?>
                </select>


                <select class="admin-comenzi__filtrare__piesa" id="admin-comenzi__filtrare__piesa">
                    <option value="Default"> Piesa</option>
                    <?=$data['pieseOptions']?>
                </select>


                <select class="admin-comenzi__filtrare__numar-randuri" id="admin-comenzi__filtrare__numar-randuri">
                    <option value="5"> 5</option>
                    <option value="10" selected> 10</option>
                    <option value="15"> 15</option>
                    <option value="20"> 20</option>
                </select>

                <input type="search" class="admin-comenzi__filtrare__cauta__piesa"
                    id="admin-comenzi__filtrare__cauta__piesa"  placeholder=" Cauta piesa...">
                <!-- <div class="admin-comenzi__filtrare__reset"> -->
                <button type="button" class="admin-comenzi__filtrare__reset__button"
                    id="admin-comenzi__filtrare__reset__button">Reset</button>
                <!-- </div> -->
            </div>
            <!-- <form action="/comenzi/" class="admin-comenzi__tabel" method="post"> -->
            <div class="admin-comenzi__tabel">
                <table id="admin-comenzi__tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Brand</th>
                            <th>Categorie</th>
                            <th>Nume</th>
                            <th>Cantitate</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Actiune</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$data['comenziTableRow']?>
                    </tbody>
                </table>
                <div>
                </div>
            </div>
            <!-- </form> -->
            <div class="admin-comenzi__tabel-button">
                <button type="button" class="admin-comenzi__tabel-button__stanga"
                    id="admin-comenzi__tabel-button__stanga"> &#10094; </button>
                <button type="button" class="admin-comenzi__tabel-button__dreapta"
                    id="admin-comenzi__tabel-button__dreapta"> &#10095; </button>
            </div>
            <script src="../js/comenzi.js"></script>
        </div>


    </main>



</body>

</html>