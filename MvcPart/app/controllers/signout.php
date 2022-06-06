<?php
	class Signout extends Controller
	{
        public function index()
		{
            if(!empty($_SESSION['userName']))
            {
                session_destroy();
            }
            header('Location: ' . URL . 'home'); 
        }
    }
?>