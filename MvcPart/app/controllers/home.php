<?php
	class Home extends Controller
	{   

        public function index($userName = "")
		{
            
            $info['username'] =  $userName;

            echo("User : " . $userName . " !");

            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $this->view('home/index', $info);
            }
            else
            {
                if ($userName == "admin")
                {
                    $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                    // header('Location: ' . URL . 'home/'. $userName);
                    $this->view('home/index', $info);
                }
                else
                {
                    $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                    // header('Location: ' . URL . 'home/'. $userName);
                    $this->view('home/index', $info);
                }
            }   
        }

    }


	

?>