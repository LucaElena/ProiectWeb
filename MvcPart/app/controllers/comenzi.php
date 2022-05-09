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
                        if( isset($_POST['admin-comenzi__tabel__actiune__primit']))
                        {
                            //Datele extrase din POST:
                            $id_comanda = $_POST['admin-comenzi__tabel__actiune__primit'];
                            print_r("id comanda:".$id_comanda);
                             
                            if ($id_comanda && $id_comanda != 0)
                            {
                                //Marcam comanda ca primita:
                                $stoc->comandaPrimita( $id_comanda );

                                //Si inseram datele din comanda in stoc:
                                // $stoc->processComanda( $id_comanda );
                            }
                        }

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
                            $info['categoriiOptions'] = $info['categoriiOptions'] .  ' <option value="' . ucwords(strtolower($categorie)) . '">' . ucwords(strtolower($categorie)) . '</option>';
                        }
                        foreach ($piese as $piesa)
                        {
                            $info['pieseOptions'] = $info['pieseOptions'] .  ' <option value="' . ucwords(strtolower($piesa)) . '">' . ucwords(strtolower($piesa)) . '</option>';
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
    }
    
?>