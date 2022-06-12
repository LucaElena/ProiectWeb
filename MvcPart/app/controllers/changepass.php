<?php
	class ChangePass extends Controller
	{   

        public function index()
		{
            $userName = "";
            $user_exist = 0;
            $user_type = 0;
            $pass_correct = 0;
            $user_id = "";
            $info['mesajEroare'] = "";
            $modelUser = $this->model('userModel');


            if(!empty($_SESSION['userName']))
            {
                $userName = $_SESSION['userName'];
            }

            $info['username'] =  $userName;

            if ($userName != "")
            {
                $user_exist = $modelUser->isDefined($userName);
                if ($user_exist)
                {
                    $user_id = $modelUser->getUserId($userName);
                    $user_type = $modelUser->getUserType($userName);
                }
            }

            

            if ($userName == "")
            {
                $this->view('errors/403.php', $info);
            }
            else
            {
				if ($user_exist)
				{
                    if ($user_type) # is admin
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_ADMIN_MOTO);
                    }
                    else
                    {
                        $info['generalbar'] = str_replace("GENERIC_USERNAME" , $userName , BARA_CLIENT_MOTO);
                    }
                }
                else
                {
                    $this->view('errors/403.php', $info);
                }
            }


            if (isset($_POST))
            {
                // Array ( [old_password] => 123456 [new_password] => 12345 [login_button] => Save )
                if(!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['login_button']))
                {
                    
                    $oldPass = $_POST['old_password'];
                    $newPass = $_POST['new_password'];
                    $login_button = $_POST['login_button'];

                    if($login_button == "Save")
                    {
                        
                        if ($user_exist)
                        {
                            $pass_correct = $modelUser->checkPassword($userName, $oldPass);
                            // print_r("Parola corecta : " . $pass_correct);
                            if($pass_correct)
                            {
                                // print_r("Parola veche corecta si schimbam parola " . $newPass);
                                $modelUser->changePassword($userName, $newPass);
                                header('Location: ' . URL . 'home'); 
                            }
                        }
                    }
                }
            }

           
            //default view
            $this->view('changepass/index', $info);
        }
    }
?>