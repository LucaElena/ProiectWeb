<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaExportImportDateAdmin.css">
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
        <div class="admin-date">
            <form action="/exportimport/<?=$data['username']?>" method="post" class="admin-date__import" enctype="multipart/form-data">
                <div class="admin-date__import__txt">
                    <h1>Importa date</h1>
                </div>

                <div class="admin-date__import__categorie">
                    <select id="admin-date__import__categorie" name="admin-date__import__categorie" required>
                        <option value="" selected>Categorie</option>
                        <!-- <option value="General">General</option> -->
                        <option value="Programari">Programari</option>
                        <option value="Stoc">Stoc</option>
                        <option value="Comenzi">Comenzi</option>
                    </select>
                </div>
                <div class="admin-date__import__format">
                    <select id="admin-date__import__format" name="admin-date__import__format" required>
                        <option value="" selected>Format</option>
                        <option value="JSON">JSON</option>
                        <option value="CSV">CSV</option>
                    </select>
                </div>
                <div class="admin-date__import__file">
                    <input type="file" accept=".csv, .json" id="admin-date__import__file" name="fisier_import" required>
                </div>
                <div class="admin-date__import__button">
                    <button type="submit" id="admin-date__import__button" name="actiune" formaction=/exportimport/importa/<?=$data['username']?> value="Importa">Importa</button>
                </div>

            </form>

            <form action="/exportimport/<?=$data['username']?>" method="post" class="admin-date__export">
                <div class="admin-date__export__txt">
                    <h1>Exporta date </h1>
                </div>

                <div class="admin-date__export__categorie">
                    <select id="admin-date__export__categorie" name="admin-date__export__categorie" required>
                        <option value="" selected>Categorie</option>
                        <!-- <option value="General">General</option> -->
                        <option value="Programari">Programari</option>
                        <option value="Stoc">Stoc</option>
                        <option value="Comenzi">Comenzi</option>
                    </select>
                </div>

                <div class="admin-date__export__format">
                    <select id="admin-date__export__format" name="admin-date__export__format" required>
                        <option value="" selected>Format</option>
                        <option value="JSON">JSON</option>
                        <option value="CSV">CSV</option>
                        <option value="PDF">PDF</option>
                    </select>
                </div>
                <div class="admin-date__export__button">
                    <button type="submit" id="admin-date__export__button" name="actiune" formaction=/exportimport/exporta/<?=$data['username']?> value="Exporta">Exporta</button>
                </div>
            </form>


        </div>

    </main>



</body>

</html>