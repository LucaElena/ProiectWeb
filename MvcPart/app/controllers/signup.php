<?php
	class SignUp extends Controller
	{   

        public function index()
		{

            $userName = "";
            $user_exist = 0;
            $user_type = 0;
            $pass_correct = 0;
            $user_id = "";

            $info['generalbar'] = str_replace("CLIENT_NELOGAT" , $userName , BARA_CLIENT_NELOGAT);
            $info['mesajEroare'] = "";
            // print_r($_POST);

            $modelUser = $this->model('userModel');

            if (isset($_POST))
            {
                // [user_name] => testtest [email] => test@dsdg.com [password] => 12345 [login_button] => Sign Up )
                if(!empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['login_button']))
                {
                    $userName = $_POST['user_name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $login_button = $_POST['login_button'];

                    if($login_button == "Sign Up")
                    {
                        
                        $modelUser->newUser($userName, $phone, $email, $password);
                        //verficam ca am introdus user-ul
                        $user_id = $modelUser->getUserId($userName);
                        if($user_id)
                        {
                            //Salvam userName-ul  in sesiune si facem redirect la pagina de home
                            $_SESSION['userName'] = $userName;
                            header('Location: ' . URL . 'home'); 
                        }
                        else
                        {
                            $info['mesajEroare'] = "Erroare creare user";
                        }
                    }
                }
            }

            //default view
            $this->view('signup/index', $info);
        }
    }
?>