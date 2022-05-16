<?php
	class Comenzi extends Controller
	{   

        public function index($userName = "")
		{
            
            $info['username'] =  $userName;
            // $info['oraSelectata'] =  "2022-05-18T09:00";

            $user = $this->model('userModel');
            // echo("User : " . $userName . " !");

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
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                        $info['brandOptions'] = "";
                        $info['categoriiOptions'] = "";
                        $info['pieseOptions'] = "";
                        $info['comenziTableRow'] = "";
                        $stoc = $this->model('stocModel');
                        
                        // Daca $_POST este setat marcam ca primita comanda
                        // $_POST contine : Array ( [admin-comenzi__tabel__actiune__primit] => 23 )
                        // if( isset($_POST['admin-comenzi__tabel__actiune__primit']))
                        // {
                        //     //Datele extrase din POST:
                        //     $id_comanda = $_POST['admin-comenzi__tabel__actiune__primit'];
                        //     print_r("id comanda:".$id_comanda);
                             
                        //     if ($id_comanda && $id_comanda != 0)
                        //     {
                        //         //Marcam comanda ca primita:
                        //         $stoc->updateStatusComanda( $id_comanda );

                        //         //comanda actual este:
                        //         $date_comanda = $stoc->getComanda( $id_comanda );
                        //         // Array ( [id_order] => 16 [id_part] => 164 [order_date] => 2022-05-09 [status] => 1 [quantity] => 1 [shipped_date] => 2022-05-10 )
                        //         $id_piesa_comanda = $date_comanda['id_part'];
                        //         $stoc_de_adaugat_din_comanda = $date_comanda['quantity'];
                        //         $date_stoc = $stoc->getStocPiesa( $id_piesa_comanda );
                        //         $stoc_curent = $date_stoc['cantitate_stoc'];
                        //         $cantitate_stoc_noua = $stoc_curent + $stoc_de_adaugat_din_comanda;
                        //         $stoc->updateCantitateStoc( $id_piesa_comanda , $cantitate_stoc_noua);
                        //     }
                        // }

                        $brands = $stoc->getBrands();
                        $categorii = $stoc->getCategorii();
                        $piese = $stoc->getPiese();
                        $comenzi = $stoc->getComenzi();

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
                        
                        $i = 1;
                        foreach (array_reverse($comenzi) as $comanda)
                        {
                            // print_r($comanda);
                            $status = "";
                            $actiune = "";

                            $date_piesa = $stoc->getDatePiesaById($comanda['id_part']);
                            $date_categorie = $stoc->getDateCategorieById($date_piesa['id_category']);
                            $date_brand = $stoc->getDateBrandById($date_piesa['id_brand']);

                            if($comanda['status'] == 0)
                            {
                                $status = "In asteptare";
                                // print_r($date_piesa);
                                // print_r($date_categorie);

                                $actiune = '<button type="submit" class="admin-comenzi__tabel__actiune__primit" 
                                    id="admin-comenzi__tabel__actiune__primit" name="admin-comenzi__tabel__actiune__primit" 
                                    value=' . $comanda['id_order'] . '>Primit</button>';
                            }
                            else
                            {
                                $status = "Primit";
                            }
                            

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
                                        <td>' . $actiune . '</td>
                                    </tr>
                                    ';
                            $i++;
                        }

                        $this->view('comenzi/index', $info);
                    }
                    else
                    {
                        $this->view('errors/403.php', $info);
                    }
                }
                else
                {
                    $this->view('errors/403.php', $info);
                }
            }   
        }
        
        public function primit( $userName = "" , $idComanda = "")
		{
            //Json pentru raspuns la request-ul AJAX de procesare a comenzii
            $raspuns =  array("insert" => 0 , "error" => "");
            
            if( isset($idComanda))
            {

                if ($idComanda && $idComanda != 0)
                {
                    $stoc = $this->model('stocModel');
                    //Marcam comanda ca primita:
                    $stoc->updateStatusComanda( $idComanda );
                    //comanda actual este:
                    $date_comanda = $stoc->getComanda( $idComanda );
                    // Array ( [id_order] => 16 [id_part] => 164 [order_date] => 2022-05-09 [status] => 1 [quantity] => 1 [shipped_date] => 2022-05-10 )
                    $id_piesa_comanda = $date_comanda['id_part'];
                    $stoc_de_adaugat_din_comanda = $date_comanda['quantity'];
                    $date_stoc = $stoc->getStocPiesa( $id_piesa_comanda );
                    $stoc_curent = $date_stoc['cantitate_stoc'];
                    $cantitate_stoc_noua = $stoc_curent + $stoc_de_adaugat_din_comanda;
                    $stoc->updateCantitateStoc( $id_piesa_comanda , $cantitate_stoc_noua);
                    $raspuns['insert'] = 1;
                }
                else
                {
                    $raspuns['error'] = "Id commanda 0"; 
                }

            }
            else
            {
                $raspuns['error'] = "Id commanda lipsa";
            }
            
            // trimitem raspuns in format JSON inapoi pentru intrebare AJAX  
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($raspuns);

        }
    }
    
?>