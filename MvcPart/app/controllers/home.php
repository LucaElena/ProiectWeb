<?php
	class Home extends Controller
	{   

        public function index()
		{
            
            $userName = "";
            $info['mesajPrimire'] =  '<p>Puteti sa faceti direct o programare <a href="/programare/">aici</a> </p>
                                      <p>Sau sa va creati intai un cont <a href="/signup/">aici</a> sau sa va autentificati
                                      <a href="/login/">aici</a></p>';
            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
                $info['mesajPrimire'] =  '<p>' . ucfirst($userName) . ' poti sa faci o programare <a href="/programare/">aici</a> sau sa iti vezi istoricul <a href="/istoric/">aici</a></p>';
            }

            $info['username'] =  $userName;
            
            $user = $this->model('userModel');
            // echo("User : " . $userName . " !");

            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $this->view('home/index', $info);
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
                else
                {
                    $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                    $this->view('home/index', $info);
                }
            }   
        }
    }

?>