<?php

	class Adaugacomanda extends Controller
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
                $this->view('errors/403.php', $info);
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
                        $info['comenziTableRow'] = "";

                        
                        $stoc = $this->model('stocModel');


                        // print_r($_POST);
                        // Daca $_POST este setat adaugam o noua comanda
                        // $_POST contine : Array ( [admin-add-comanda__select__brand] => Bmw [admin-add-comanda__select__categorie] => 17;Suspensii Moto [admin-add-comanda__select__piesa] => 17;Suspensie [admin-add-comanda__select__cantitate] => 1 [admin-add-comanda__select__add_button] => )
                        // am adaugat la numele piesei si al categoriei si id-ul categoriei pentru a face legatura intre el in js
                        // if( isset($_POST['admin-add-comanda__select__brand']) && isset($_POST['admin-add-comanda__select__categorie']) && isset($_POST['admin-add-comanda__select__piesa']) && isset($_POST['admin-add-comanda__select__cantitate']))
                        // {
                        //     //Datele extrase din POST:
                        //     $nume_brand_selectat = $_POST['admin-add-comanda__select__brand'];
                        //     $nume_categorie_selectata = explode (";", $_POST['admin-add-comanda__select__categorie'])[1];
                        //     $nume_piesa_selectata = explode (";", $_POST['admin-add-comanda__select__piesa'])[1];
                        //     $id_categorie_selectata = explode (";", $_POST['admin-add-comanda__select__piesa'])[0];
                        //     $cantitate_selectata = $_POST['admin-add-comanda__select__cantitate'];
                            
                        //     //Cautam id-ul piesei dupa numele piesei, al brandului si al categoriei:
                        //     $id_piesa_selectata = $stoc->getPiesaIdByNameBrandCategory($nume_piesa_selectata , $nume_brand_selectat , $nume_categorie_selectata);
                        //     print_r("Id piesa selectata = " . $id_piesa_selectata);

                            
                        //     //Adaugam comanda:
                        //     if ($id_piesa_selectata && $id_piesa_selectata != 0)
                        //     {
                        //         $stoc->addComanda( $id_piesa_selectata , $cantitate_selectata );
                        //     }
                        //     else
                        //     {//piese nu se afla in baza de date-> trebuie sa o inseram in piese stoc si sa ii facem o comanda
                                
                        //         print_r("Trebuie sa adaugam piesa intai");
                        //         $id_brand =  $stoc->getIdBrad($nume_brand_selectat);
                        //         print_r("Id brand = " . $id_brand);
                        //         $stoc->insertPiesa( $id_brand, $id_categorie_selectata, $nume_piesa_selectata);
                        //         $id_piesa_selectata = $stoc->getPiesaIdByNameBrandCategory($nume_piesa_selectata , $nume_brand_selectat , $nume_categorie_selectata);
                        //         print_r("Id piesa selectata = " . $id_piesa_selectata);
                        //         if ($id_piesa_selectata && $id_piesa_selectata != 0)
                        //         {
                        //             $stoc->addComanda( $id_piesa_selectata , $cantitate_selectata );
                        //         }

                        //     }
                        // }
                        
                        $brands = $stoc->getBrands();
                        $categorii = $stoc->getCategorii();
                        $piese = $stoc->getPiese();
                        $comenzi = $stoc->getComenzi();
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
                        foreach ($piese as $piesa)
                        {
                           #transmitem in plus si id-ul categoriei pentru a putea sa legam optiunile din categorie de cele din piese in js
                           $id_si_nume_piesa = explode (";", $piesa); 
                           $id_categorie = $id_si_nume_piesa[0];
                           $nume_piesa = $id_si_nume_piesa[1];
                           $info['pieseOptions'] = $info['pieseOptions'] .  ' <option value="' . $id_categorie . ';' . ucwords(strtolower($nume_piesa)) . '">' . ucwords(strtolower($nume_piesa)) . '</option>';
                        }

                        
                        //incarcam si tabelul cu lista de comenzi deja initiate 
                        $i = 1;
                        foreach (array_reverse($comenzi) as $comanda)
                        {
                            // print_r($comanda);
                            $status = "";
                            if($comanda['status'] == 0)
                            {
                                $status = "In asteptare";
                            }
                            else
                            {
                                $status = "Primit";
                            }

                            $date_piesa = $stoc->getDatePiesaById($comanda['id_part']);
                            $date_categorie = $stoc->getDateCategorieById($date_piesa['id_category']);
                            $date_brand = $stoc->getDateBrandById($date_piesa['id_brand']);

                            $info['comenziTableRow'] = $info['comenziTableRow'] .  
                                    ' 
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . ucwords(strtolower($date_brand['brand_name'])) . '</td>
                                        <td>' . ucwords(strtolower($date_categorie['category_name'])) . '</td>
                                        <td>' . ucwords(strtolower($date_piesa['name'])) . '</td>
                                        <td>' . $comanda['quantity'] . '</td>
                                        <td>' . $comanda['order_date'] . '</td>
                                        <td>' . $status . '</td>
                                    </tr>
                                    ';
                            $i++;
                        }

                        $this->view('adaugacomanda/index', $info);
                    }
                    else
                    {   //user nu este admin in baza de date -> neautorizat
                        $this->view('errors/403.php', $info);
                    }
                }
                else
                {   //user negasit in baza de date -> neautorizat
                    $this->view('errors/403.php', $info);
                }
            }   
        }

        public function  trimite()
        {
            $userName = "";
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }
            
            //Json pentru raspuns la request-ul AJAX de procesare a comenzii
            $raspuns =  array("insert" => 0 , "error" => "");
        
            
            if( isset($_POST['brandSelectat']) && isset($_POST['categorieSelectat']) && isset($_POST['piesaSelectata']) && isset($_POST['cantitateaSelectata']))
            {
                
                $stoc = $this->model('stocModel');
                //Datele extrase din POST:
                $nume_brand_selectat = $_POST['brandSelectat'];
                $nume_categorie_selectata = explode (";", $_POST['categorieSelectat'])[1];
                $nume_piesa_selectata = explode (";", $_POST['piesaSelectata'])[1];
                $id_categorie_selectata = explode (";", $_POST['piesaSelectata'])[0];
                $cantitate_selectata = $_POST['cantitateaSelectata'];
                
                //Cautam id-ul piesei dupa numele piesei, al brandului si al categoriei:
                $id_piesa_selectata = $stoc->getPiesaIdByNameBrandCategory($nume_piesa_selectata , $nume_brand_selectat , $nume_categorie_selectata);
                // print_r("Id piesa selectata = " . $id_piesa_selectata);

                
                //Adaugam comanda:
                if ($id_piesa_selectata && $id_piesa_selectata != 0)
                {
                    $stoc->addComanda( $id_piesa_selectata , $cantitate_selectata );
                    $raspuns["insert"] = 1;
                }
                else
                {//piese nu se afla in baza de date-> trebuie sa o inseram in piese stoc si sa ii facem o comanda
                    
                    // print_r("Trebuie sa adaugam piesa intai");
                    $id_brand =  $stoc->getIdBrad($nume_brand_selectat);
                    // print_r("Id brand = " . $id_brand);
                    $stoc->insertPiesa( $id_brand, $id_categorie_selectata, $nume_piesa_selectata);
                    $id_piesa_selectata = $stoc->getPiesaIdByNameBrandCategory($nume_piesa_selectata , $nume_brand_selectat , $nume_categorie_selectata);
                    // print_r("Id piesa selectata = " . $id_piesa_selectata);
                    if ($id_piesa_selectata && $id_piesa_selectata != 0)
                    {
                        $stoc->addComanda( $id_piesa_selectata , $cantitate_selectata );
                    }
                    else
                    {
                        $raspuns["error"] = "Piesa nu se afla in stoc si am primit erroare la inserarea ei";   
                    }
                    

                }
            }

            // Trimitem json-ul cu raspunsul
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($raspuns);
        }
    }
    
?>