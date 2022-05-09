<?php
	class Adaugacomanda extends Controller
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
                        $info['categorieOptions'] = "";
                        $info['pieseOptions'] = "";


                        $stoc = $this->model('stocModel');

                        $brands = $stoc->getBrands();
                        $categorii = $stoc->getCategorii();
                        $piese = $stoc->getPiese();

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

                        
                        $this->view('adaugacomanda/index', $info);
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