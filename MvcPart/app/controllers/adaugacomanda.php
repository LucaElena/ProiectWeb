<?php

	class Adaugacomanda extends Controller
	{   

        public function index($userName = "")
		{
            
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



                        // Daca $_POST este setat adaugam o noua comanda
                        // $_POST contine : ( [admin-add-comanda__select__brand] => Aprilia [admin-add-comanda__select__categorie] => Accesorii Si Piese [admin-add-comanda__select__piesa] => Bujii [admin-add-comanda__select__cantitate] => 1 [admin-add-comanda__select__add_button] => )
                        if( isset($_POST['admin-add-comanda__select__brand']) && isset($_POST['admin-add-comanda__select__categorie']) && isset($_POST['admin-add-comanda__select__piesa']) && isset($_POST['admin-add-comanda__select__cantitate']))
                        {
                            //Datele extrase din POST:
                            $nume_brand_selectat = $_POST['admin-add-comanda__select__brand'];
                            $nume_categorie_selectata = $_POST['admin-add-comanda__select__categorie'];
                            $nume_piesa_selectata = $_POST['admin-add-comanda__select__piesa'];
                            $cantitate_selectata = $_POST['admin-add-comanda__select__cantitate'];
                            
                            //Cautam id-ul piesei dupa numele piesei, al brandului si al categoriei:
                            $id_piesa_selectata = $stoc->getPiesaIdByNameBrandCategory($nume_piesa_selectata , $nume_brand_selectat , $nume_categorie_selectata);
                            print_r("Id piesa selectata = " . $id_piesa_selectata);

                            //Adaugam comanda:
                            if ($id_piesa_selectata && $id_piesa_selectata != 0)
                            {
                                $stoc->addComanda( $id_piesa_selectata , $cantitate_selectata );
                            }
                        }
                        
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
                            $info['categoriiOptions'] = $info['categoriiOptions'] .  ' <option value="' . ucwords(strtolower($categorie)) . '">' . ucwords(strtolower($categorie)) . '</option>';
                        }
                        foreach ($piese as $piesa)
                        {
                            $info['pieseOptions'] = $info['pieseOptions'] .  ' <option value="' . ucwords(strtolower($piesa)) . '">' . ucwords(strtolower($piesa)) . '</option>';
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
    }
    
?>