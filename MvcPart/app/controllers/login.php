<?php
	class Login extends Controller
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
            // print_r($_SESSION);

            $modelUser = $this->model('userModel');

            if (isset($_POST))
            {

                if(!empty($_POST['user_name']) && !empty($_POST['password']) && !empty($_POST['login_button']))
                {
                    $userName = $_POST['user_name'];
                    $password = $_POST['password'];
                    $login_button = $_POST['login_button'];

                    if($login_button == "Sign In")
                    {
                        if ($userName != "")
                        {
                            $user_exist = $modelUser->isDefined($userName);
                            if ($user_exist)
                            {   
                                $user_id = $modelUser->getUserId($userName);
                                $pass_correct = $modelUser->checkPassword($userName, $password);
                                if($pass_correct)
                                {
                                    
                                    $user_type = $modelUser->getUserType($userName);
                                    // $info['mesajEroare'] = "Correct password";
                                    //Salvam userName-ul  in sesiune si facem redirect la pagina de home
                                    $_SESSION['userName'] = $userName;
                                    // $_SESSION['userID'] = $user_id;
                                    header('Location: ' . URL . 'home'); 
                                    
                                }
                                else
                                {
                                    $info['mesajEroare'] = "Wrong password";
                                }
                            }
                            else
                            {
                                $info['mesajEroare'] = "User incorect";
                            }
                        }

                    }
                }
            }

            //default view
            $this->view('login/index', $info);
        }
    }
?>