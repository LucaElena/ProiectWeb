<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaStocAdmin.css">
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
        <div class="admin-stoc">
            <div class="admin-stoc__titlu">
                <p>Pagina administrare stoc :</p>
            </div>
            <div class="admin-stoc__filtrare">

                <select class="admin-stoc__filtrare__brand" id="admin-stoc__filtrare__brand">
                    <option value="Default"> Brand</option>
                    <?=$data['brandOptions']?>
                </select>

                <select class="admin-stoc__filtrare__categorie" id="admin-stoc__filtrare__categorie">
                    <option value="Default"> Categorie</option>
                    <?=$data['categoriiOptions']?>
                </select>


                <select class="admin-stoc__filtrare__piesa" id="admin-stoc__filtrare__piesa">
                    <option value="Default"> Piesa</option>
                    <?=$data['pieseOptions']?>
                </select>


                <select class="admin-stoc__filtrare__numar-randuri" id="admin-stoc__filtrare__numar-randuri">
                    <option value="5"> 5</option>
                    <option value="10" selected> 10</option>
                    <option value="15"> 15</option>
                    <option value="20"> 20</option>
                </select>

                <input type="search" class="admin-stoc__filtrare__cauta__piesa"
                    id="admin-stoc__filtrare__cauta__piesa" " placeholder=" Cauta piesa...">
                <!-- <div class="admin-stoc__filtrare__reset"> -->
                <button type="button" class="admin-stoc__filtrare__reset__button"
                    id="admin-stoc__filtrare__reset__button">Reset</button>
                <!-- </div> -->
            </div>
            <form action="/stoc/<?=$data['username']?>" class="admin-stoc__tabel" method="post">
                <div class="admin-stoc__tabel">
                    
                        <table id="admin-stoc__tabel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Brand</th>
                                    <th>Categorie</th>
                                    <th>Nume</th>
                                    <th>Stoc</th>
                                    <th>Rezervate</th>
                                    <th>Pret</th>
                                    <!-- <th>Actiune stoc</th>
                                    <th>Actiune rezervate</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <?=$data['stocTableRow']?>
                            </tbody>
                        </table>
                </div>
                <div class="admin-stoc__tabel-button">
                    <button type="button" class="admin-stoc__tabel-button__stanga" id="admin-stoc__tabel-button__stanga">
                        &#10094; </button>
                    <button type="submit" class="admin-stoc__tabel-button__update" id="admin-stoc__tabel-button__update" value="Update">
                        Update
                    </button>
                    <button type="button" class="admin-stoc__tabel-button__dreapta" id="admin-stoc__tabel-button__dreapta">
                        &#10095; </button>
                </div>
            </form>
            <script src="../js/stoc.js"></script>
        </div>


    </main>



</body>

</html>