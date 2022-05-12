<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaAdaugaComandaAdmin.css">
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

        <div class="admin-add-comanda">
            <div class="admin-add-comanda__titlu">
                <p>Pagina de adaugare comanda :</p>
            </div>
            <form action="/adaugacomanda/<?=$data['username']?>" method="post" class="admin-add-comanda__select">

                <select class="admin-add-comanda__select__brand" id="admin-add-comanda__select__brand" name="admin-add-comanda__select__brand" required>
                    <option value="Default"> Brand</option>
                    <?=$data['brandOptions']?>
                </select>

                <select class="admin-add-comanda__select__categorie" id="admin-add-comanda__select__categorie" name="admin-add-comanda__select__categorie" required>
                    <option value="Default"> Categorie</option>
                    <?=$data['categoriiOptions']?>
                </select>


                <select class="admin-add-comanda__select__piesa" id="admin-add-comanda__select__piesa" name="admin-add-comanda__select__piesa" required>
                    <option value="Default"> Piesa</option>
                    <?=$data['pieseOptions']?>
                </select>
                <input type="number" id="admin-add-comanda__select__cantitate"
                    class="admin-add-comanda__select__cantitate" name="admin-add-comanda__select__cantitate" min="1"
                    max="100" value="0" required>
                <button type="submit" class="admin-add-comanda__select__add_button" id="admin-add-comanda__select__add_button" name="admin-add-comanda__select__add_button">Add</button>
            </form>
            <div class="admin-add-comanda__tabel">
                <table id="admin-add-comanda__tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Brand</th>
                            <th>Categorie</th>
                            <th>Piesa</th>
                            <th>Cantitate</th>
                            <th>Data</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$data['comenziTableRow']?>
                    </tbody>
                </table>

                <div>
                </div>
            </div>
            <!-- <div class="admin-add-comanda__tabel-button">
                <button type="button" class="admin-add-comanda__tabel-button__stanga" id="admin-add-comanda__tabel-button__stanga"> &#10094; </button>
                <button type="button" class="admin-add-comanda__tabel-button__dreapta" id="admin-add-comanda__tabel-button__dreapta"> &#10095; </button>
            </div> -->
            <script src="../js/comenzi.js"></script>
        </div>


    </main>



</body>

</html>