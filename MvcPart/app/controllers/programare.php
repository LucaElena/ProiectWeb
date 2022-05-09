<?php
	class Programare extends Controller
	{   

        public function index($userName = "")
		{
            
            $info['username'] =  $userName;
            $user = $this->model('userModel');
            // echo("User : " . $userName . " !");

            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $this->view('programare/index', $info);
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
                        // header('Location: ' . URL . 'programare/'. $userName);
                        $this->view('programare/index', $info);
                    }
                    else
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                        // header('Location: ' . URL . 'programare/'. $userName);
                        $this->view('programare/index', $info);
                    }
                }
                else
                {
                    $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                    $this->view('programare/index', $info);
                }
            }   
        }
    }
    
?>