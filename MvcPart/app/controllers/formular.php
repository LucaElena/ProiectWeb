<?php
	class Formular extends Controller
	{   

        public function index($userName = "")
		{
            
            $info['username'] =  $userName;
            $info['oraSelectata'] =  "2022-05-18T09:00";
            $info['oraSelectataMin'] =  "2022-05-18T09:00";
            $info['oraSelectataMax'] =  "2023-05-18T19:00";
            $info['formularStatus'] =  "Editare";
            $info['mesajClient'] =  '
            <textarea name="new-messag-client" class="formular_programare__mesaj_client__txt"  cols="10" rows="3" placeholder="Mesaj client cu descrierea problemei" required autofocus></textarea>
            <input type="file" accept="video/*,image/*" multiple="multiple" class="formular_programare__mesaj_client__video" required>
            ';
            $info['mesajAdmin'] =  "";
            $user = $this->model('userModel');
            // echo("User : " . $userName . " !");

            if ($userName == "")
            {
                $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                $this->view('formular/index', $info);
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
                        // header('Location: ' . URL . 'formular/'. $userName);
                        $this->view('formular/index', $info);
                    }
                    else
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                        // header('Location: ' . URL . 'formular/'. $userName);
                        $this->view('formular/index', $info);
                    }
                }
                else
                {
                    $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
                    $this->view('formular/index', $info);
                }
            }   
        }
    }
    
?>