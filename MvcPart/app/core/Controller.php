<?php
    class Controller
    {

        public $conn = null;

        private $dbType = DB_TYPE;
        private $dbHost = DB_HOST;
        private $dbUser = DB_USER;
        private $dbPass = DB_PASS;
        private $dbName = DB_NAME;

        private $error;
        private $statement;
        private $dbHandler;

        public function __construct()
        {
            try
            {
                $this->openSqlConnection();
            }
            catch (PDOException $e) 
            {
                $this->error = $e->getMessage();
                exit('Sql connection error : ' . $this->error);
            }
            // print_r("Salut din constructor Controller");
            
            //am pus start-ul la sesiune in constructor sa inceapa la inceput-ul aplicatiei
            if(!isset($_SESSION)) 
            {
                session_start();
            }
        }
        
        //Deschidem conexiunea sql
        private function openSqlConnection()
        {
            // sql connection with PDO connector http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
            $conn = $this->dbType . ':host=' . $this->dbHost . ';dbname=' . $this->dbName;
            $options = array(
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::ATTR_PERSISTENT, true,
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            $this->conn = new PDO($conn , $this->dbUser, $this->dbPass, $options);
            //$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        
        public function model($model)
        {
            require_once __DIR__ . '/../models/' . $model . '.php';
            return new $model;
        }
        
        # Incarca view-ul si verifica daca exista 
        public function view($view, $data = [])
        {
            if(file_exists(__DIR__ . '/../views/' . $view . '.php'))
            {
                require_once __DIR__ . '/../views/' . $view . '.php';
            }
            else
            {
                die('View does not exist');
            }
        }

    }

?>