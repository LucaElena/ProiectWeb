<?php

	class Stoc extends Controller
	{   

        public function index()
		{
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            $info['username'] =  $userName;
            $user = $this->model('userModel');
            
            //TO DO : verificare si in sesion si pagina de Referer 
            //user empty -> neautorizat 
            if ($userName == "")
            {
                header('HTTP/1.0 403 Forbidden');
                $this->view('errors/error403.php', $info);
            }
            else
            {
                $user_exist = $user->isDefined($userName);
				if ($user_exist)
				{
                    // $user_id = $user->getUserId($userName);
                    $user_type = $user->getUserType($userName);

                    if ($user_type) # is admin
                    {   //user-ul este Administratorul -> access la functionalitate

                        //Setam pagina cu bara admin
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                        $info['brandOptions'] = "";
                        $info['categoriiOptions'] = "";
                        $info['pieseOptions'] = "";
                        $info['stocTableRow'] = "";

                        
                        $stoc = $this->model('stocModel');

                        
                        $brands = $stoc->getBrands();
                        $categorii = $stoc->getCategorii();
                        $piese = $stoc->getAllPiese();
                        $piese_unice = $stoc->getPiese();

                        

                        // $comenzi = $stoc->getComenzi();
                        //incarcam listele de optiuni : branduri, categorii, piese   
                        foreach ($brands as $brand)
                        {
                            $info['brandOptions'] = $info['brandOptions'] .  ' <option value="' . ucwords(strtolower($brand)) . '">' . ucwords(strtolower($brand)) . '</option>';
                        }
                        foreach ($categorii as $categorie)
                        {
                            #transmitem in plus si id-ul categoriei pentru a putea sa legam optiunile din categorie de cele din piese in js
                            $id_si_nume_categorie = explode (";", $categorie); 
                            $id_categorie = $id_si_nume_categorie[0];
                            $nume_categorie = $id_si_nume_categorie[1];
                            $info['categoriiOptions'] = $info['categoriiOptions'] .  ' <option value="'  . $id_categorie . ';' . ucwords(strtolower($nume_categorie)) . '">' . ucwords(strtolower($nume_categorie)) . '</option>';
                        }
                        
                        foreach ($piese_unice as $piesa)
                        {
                            #transmitem in plus si id-ul categoriei pentru a putea sa legam optiunile din categorie de cele din piese in js
                            $id_si_nume_piesa = explode (";", $piesa); 
                            $id_categorie = $id_si_nume_piesa[0];
                            $nume_piesa = $id_si_nume_piesa[1];
                            $info['pieseOptions'] = $info['pieseOptions'] .  ' <option value="' . $id_categorie . ';' . ucwords(strtolower($nume_piesa)) . '">' . ucwords(strtolower($nume_piesa)) . '</option>';
                        }

                        // print_r($_POST);
                        
                        //1) Incarcam si tabelul cu lista de comenzi deja initiate 
                        //2) Daca $_POST este setat si valoare din dictionarul primit e diferita de cea din tabel-> update baza date
                        // $_POST contine : dictionar cu cheie = id_piesa si valoare = cantitate_stoc ca mai jos:
                        // Array ( 
                        //     [admin-stoc__tabel__stoc-actiune_rand_stoc] => Array ( [1] => 18 [2] => 10 [3] => 19 [4] => 23 [5] => 18 [6] => 22 [7] => 7 [8] => 20 [9] => 17 [10] => 19 [11] => 9 [12] => 20 [13] => 0 [14] => 28 [15] => 6 [16] => 23 [17] => 2 [18] => 14 [19] => 6 [20] => 9 [21] => 6 [22] => 15 [23] => 13 [24] => 19 [25] => 11 [26] => 6 [27] => 9 [28] => 18 [29] => 1 [30] => 21 [31] => 14 [32] => 27 [33] => 27 [34] => 29 [35] => 20 [36] => 19 [37] => 20 [38] => 21 [39] => 3 [40] => 14 [41] => 8 [42] => 29 [43] => 13 [44] => 26 [45] => 19 [46] => 15 [47] => 24 [48] => 29 [49] => 11 [50] => 24 [51] => 25 [52] => 1 [53] => 11 [54] => 11 [55] => 7 [56] => 14 [57] => 17 [58] => 24 [59] => 2 [60] => 27 [61] => 29 [62] => 9 [63] => 0 [64] => 11 [65] => 6 [66] => 8 [67] => 4 [68] => 1 [69] => 11 [70] => 25 [71] => 19 [72] => 19 [73] => 7 [74] => 5 [75] => 22 [76] => 22 [77] => 22 [78] => 15 [79] => 18 [80] => 1 [81] => 15 [82] => 13 [83] => 3 [84] => 20 [85] => 21 [86] => 27 [87] => 9 [88] => 25 [89] => 23 [90] => 10 [91] => 15 [92] => 6 [93] => 8 [94] => 9 [95] => 5 [96] => 10 [97] => 20 [98] => 24 [99] => 14 [100] => 26 [101] => 18 [102] => 26 [103] => 15 [104] => 2 [105] => 7 [106] => 5 [107] => 25 [108] => 6 [109] => 2 [110] => 17 [111] => 28 [112] => 0 [113] => 25 [114] => 14 [115] => 0 [116] => 9 [117] => 20 [118] => 1 [119] => 13 [120] => 10 [121] => 1 [122] => 9 [123] => 25 [124] => 21 [125] => 14 [126] => 27 [127] => 29 [128] => 9 [129] => 14 [130] => 20 [131] => 13 [132] => 17 [133] => 5 [134] => 20 [135] => 6 [136] => 9 [137] => 5 [138] => 25 [139] => 16 [140] => 7 [141] => 17 [142] => 2 [143] => 16 [144] => 19 [145] => 24 [146] => 12 [147] => 1 [148] => 1 [149] => 17 [150] => 21 [151] => 14 [152] => 16 [153] => 22 [154] => 17 [155] => 5 [156] => 3 [157] => 29 [158] => 21 [159] => 19 [160] => 11 [161] => 22 [162] => 6 [163] => 18 [164] => 11 [165] => 21 [166] => 1 [167] => 25 [168] => 21 [169] => 14 [170] => 29 [171] => 19 [172] => 6 [173] => 29 [174] => 13 [175] => 29 [176] => 28 [177] => 14 [178] => 22 [179] => 27 [180] => 9 [181] => 16 [182] => 29 [183] => 20 [184] => 2 [185] => 13 [186] => 12 [187] => 16 [188] => 8 [189] => 22 [190] => 8 [191] => 9 [192] => 13 [193] => 24 [194] => 2 [195] => 8 [196] => 6 [197] => 8 [198] => 15 [199] => 4 [200] => 25 [201] => 27 [202] => 25 [203] => 26 [204] => 2 [205] => 13 [206] => 5 [207] => 25 [208] => 17 [209] => 7 [210] => 27 [211] => 1 [212] => 15 [213] => 14 [214] => 3 [215] => 6 [216] => 16 [217] => 19 [218] => 10 [219] => 2 [220] => 4 )
                        //     [admin-stoc__tabel__stoc-actiune_rand_rezervate] => Array ( [1] => 3 [2] => 2 [3] => 1 [4] => 1 [5] => 0 [6] => 3 [7] => 2 [8] => 2 [9] => 4 [10] => 1 [11] => 3 [12] => 3 [13] => 0 [14] => 0 [15] => 3 [16] => 3 [17] => 0 [18] => 0 [19] => 0 [20] => 3 [21] => 4 [22] => 3 [23] => 3 [24] => 2 [25] => 1 [26] => 3 [27] => 0 [28] => 3 [29] => 0 [30] => 4 [31] => 1 [32] => 4 [33] => 1 [34] => 0 [35] => 0 [36] => 1 [37] => 2 [38] => 0 [39] => 0 [40] => 1 [41] => 3 [42] => 4 [43] => 3 [44] => 1 [45] => 3 [46] => 0 [47] => 1 [48] => 2 [49] => 4 [50] => 0 [51] => 0 [52] => 0 [53] => 2 [54] => 0 [55] => 1 [56] => 1 [57] => 1 [58] => 1 [59] => 1 [60] => 2 [61] => 0 [62] => 1 [63] => 0 [64] => 3 [65] => 1 [66] => 1 [67] => 1 [68] => 0 [69] => 0 [70] => 3 [71] => 4 [72] => 3 [73] => 0 [74] => 2 [75] => 0 [76] => 2 [77] => 4 [78] => 2 [79] => 4 [80] => 0 [81] => 4 [82] => 3 [83] => 0 [84] => 2 [85] => 3 [86] => 2 [87] => 0 [88] => 2 [89] => 4 [90] => 4 [91] => 3 [92] => 4 [93] => 2 [94] => 4 [95] => 1 [96] => 4 [97] => 2 [98] => 3 [99] => 2 [100] => 4 [101] => 3 [102] => 3 [103] => 0 [104] => 0 [105] => 2 [106] => 0 [107] => 1 [108] => 3 [109] => 1 [110] => 3 [111] => 2 [112] => 0 [113] => 1 [114] => 4 [115] => 0 [116] => 2 [117] => 2 [118] => 0 [119] => 1 [120] => 2 [121] => 0 [122] => 0 [123] => 1 [124] => 3 [125] => 0 [126] => 0 [127] => 3 [128] => 3 [129] => 2 [130] => 1 [131] => 1 [132] => 1 [133] => 1 [134] => 1 [135] => 0 [136] => 1 [137] => 0 [138] => 3 [139] => 3 [140] => 1 [141] => 4 [142] => 0 [143] => 3 [144] => 4 [145] => 3 [146] => 2 [147] => 0 [148] => 0 [149] => 1 [150] => 0 [151] => 2 [152] => 0 [153] => 0 [154] => 1 [155] => 0 [156] => 0 [157] => 2 [158] => 2 [159] => 3 [160] => 4 [161] => 1 [162] => 0 [163] => 4 [164] => 4 [165] => 2 [166] => 0 [167] => 0 [168] => 2 [169] => 4 [170] => 2 [171] => 1 [172] => 1 [173] => 4 [174] => 4 [175] => 2 [176] => 2 [177] => 4 [178] => 3 [179] => 0 [180] => 2 [181] => 2 [182] => 2 [183] => 4 [184] => 0 [185] => 4 [186] => 0 [187] => 3 [188] => 3 [189] => 2 [190] => 0 [191] => 1 [192] => 3 [193] => 4 [194] => 0 [195] => 2 [196] => 0 [197] => 1 [198] => 4 [199] => 0 [200] => 3 [201] => 2 [202] => 4 [203] => 1 [204] => 0 [205] => 0 [206] => 3 [207] => 2 [208] => 2 [209] => 3 [210] => 2 [211] => 0 [212] => 0 [213] => 4 [214] => 0 [215] => 2 [216] => 3 [217] => 1 [218] => 4 [219] => 0 [220] => 1 ) 
                        // )
                        // $_POST['admin-stoc__tabel__stoc-actiune_rand_stoc']
                        // $_POST['admin-stoc__tabel__stoc-actiune_rand_rezervate']
                        $i = 1;

                        foreach ($piese as $piesa)
                        {
                            $id_piesa_curenta = $piesa['id_part'];

                            // $date_piesa = $stoc->getDatePiesaById($comanda['id_part']);
                            $date_categorie = $stoc->getDateCategorieById($piesa['id_category']);
                            $date_brand = $stoc->getDateBrandById($piesa['id_brand']);
                            $date_stoc = $stoc->getStocPiesa($id_piesa_curenta);

                            // if(isset($_POST['admin-stoc__tabel__stoc-actiune_rand_stoc']))
                            // {
                            //     //valoare din baza de date e diferita de cea primita prin POST -> update
                            //     if($date_stoc['cantitate_stoc'] != $_POST['admin-stoc__tabel__stoc-actiune_rand_stoc'][$id_piesa_curenta])
                            //     {
                            //         $date_stoc['cantitate_stoc']  = $_POST['admin-stoc__tabel__stoc-actiune_rand_stoc'][$id_piesa_curenta];
                            //         $stoc->updateCantitateStoc($id_piesa_curenta, $date_stoc['cantitate_stoc']);
                            //     }
                            //     if($date_stoc['cantitate_rezervata'] != $_POST['admin-stoc__tabel__stoc-actiune_rand_rezervate'][$id_piesa_curenta])
                            //     {
                            //         $date_stoc['cantitate_rezervata']  = $_POST['admin-stoc__tabel__stoc-actiune_rand_rezervate'][$id_piesa_curenta];
                            //         $stoc->updateRezervatStoc($id_piesa_curenta, $date_stoc['cantitate_rezervata']);
                            //     }
                            // }
                            //inputurile cu valorile number ale stocului le denumim cu nume[id_part] pentru a fi salvate intr-un dictionar id_part:valoare_stoc 
                            $info['stocTableRow'] = $info['stocTableRow'] .  
                                    ' 
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . ucwords(strtolower($date_brand['brand_name'])) . '</td>
                                        <td>' . ucwords(strtolower($date_categorie['category_name'])) . '</td>
                                        <td>' . ucwords(strtolower($piesa['name'])) . '</td>
                                        <td><input type="number" id="admin-stoc__tabel__stoc-actiune_rand_stoc[' . $id_piesa_curenta . ']"
                                                class="admin-stoc__tabel__stoc-actiune" name="admin-stoc__tabel__stoc-actiune_rand_stoc[' . $id_piesa_curenta . ']"
                                                min="0" max="100" value="' . $date_stoc['cantitate_stoc'] . '"></td>
                                        <td><input type="number" id="admin-stoc__tabel__rezervat-actiune_rand_rezervate[' . $id_piesa_curenta . ']"
                                                class="admin-stoc__tabel__rezervat-actiune" name="admin-stoc__tabel__stoc-actiune_rand_rezervate[' . $id_piesa_curenta . ']"
                                                min="0" max="100" value="' . $date_stoc['cantitate_rezervata'] . '"></td>
                                        <td>' . $piesa['price'] . '</td>

                                    </tr>
                                    ';

                            $i++;
                        }

                        $this->view('stoc/index', $info);
                    }
                    else
                    {   //user nu este admin in baza de date -> neautorizat
                        // header('HTTP/1.0 403 Forbidden');
                        $this->view('errors/error403.php', $info);
                    }
                }
                else
                {   //user negasit in baza de date -> neautorizat
                    header('HTTP/1.0 403 Forbidden');
                    $this->view('errors/error403.php', $info);
                }
            }   
        }

        public function update()
		{
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            
            //Json pentru raspuns la request-ul AJAX de procesare a comenzii
            $raspuns =  array("insert" => 0 , "error" => "");

            // if(isset($_POST))
           //Aparent $_POST nu este completat automat in cazul unui json-> trebuie sa il luam neprelucrat noi:
            $json = file_get_contents('php://input');
            $values = json_decode($json, true);
            if(isset($values["stoc"]) &&  isset($values["stoc-rezervate"]))
            {
                
                $stoc = $this->model('stocModel');
                $piese = $stoc->getAllPiese();
                foreach ($piese as $piesa)
                {
                    
                    $id_piesa_curenta = $piesa['id_part'];
                    $date_stoc = $stoc->getStocPiesa($id_piesa_curenta);
                    //valoare din baza de date e diferita de cea primita prin POST -> update
                    if($date_stoc['cantitate_stoc'] != $values["stoc"][$id_piesa_curenta])
                    {
                        $date_stoc['cantitate_stoc']  = $values["stoc"][$id_piesa_curenta];
                        $stoc->updateCantitateStoc($id_piesa_curenta, $date_stoc['cantitate_stoc']);
                        $raspuns["insert"] = 1;
                    }
                    if($date_stoc['cantitate_rezervata'] != $values["stoc-rezervate"][$id_piesa_curenta])
                    {
                        $date_stoc['cantitate_rezervata']  = $values["stoc-rezervate"][$id_piesa_curenta];
                        $stoc->updateRezervatStoc($id_piesa_curenta, $date_stoc['cantitate_rezervata']);
                        $raspuns["insert"] = 1;
                    }
                }
                
            }

            // Trimitem json-ul cu raspunsul
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($raspuns);

        }
    }
    
?>