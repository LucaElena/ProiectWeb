<?php

class UserModel extends Controller
{

    // check if user password is correct
    public function checkPassword($userName, $password)
    {
        $sql = "SELECT COUNT(user_name) FROM users where user_name = :username AND password = :password";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":username" => $userName , ":password" => $password));
        $results = $query->fetch(PDO::FETCH_ASSOC);

        
        if ($results['COUNT(user_name)'] > 0)
        {
            // $this->user_name = $userName;
            return true;
        }
        else
        {
            return false;
        }
    }

    // check if user exist in db
    public function isDefined($user_name)
    {
        $sql = "SELECT COUNT(user_name) FROM users where user_name = :username";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":username" => $user_name));
        $results = $query->fetch(PDO::FETCH_ASSOC);

        // print_r("<br>Suntem in UserModel isDefined and results:");
        // print_r($results);
        
        if ($results['COUNT(user_name)'] > 0)
        {
            $this->user_name = $user_name;
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getUserId($username)
    {
        $sql_getId= "SELECT id_user FROM users WHERE user_name = :username";
        $query_getId = $this->conn->prepare($sql_getId);
        $query_getId->execute(array(":username" => $username));
        $result = $query_getId->fetch(PDO::FETCH_ASSOC);
        if(!empty($result['id_user']))
        {
            return $result['id_user'];
        }
        return 0;
    }

    public function getUserType($username)
    {
        $sql_getUserType = "SELECT type FROM users WHERE user_name = :username";
        $query_getUserType = $this->conn->prepare($sql_getUserType);
        $query_getUserType->execute(array(":username" => $username));
        $result = $query_getUserType->fetch(PDO::FETCH_ASSOC);
        $userType = $result['type'];
        // print_r($userType);
        return $userType;
    }
    public function getUserData($userId)
    {
        $sql = "SELECT * FROM users WHERE id_user = :userId";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":userId" => $userId));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function newUser($userName, $phone, $email, $password)
    {
        $sql = "INSERT INTO `users` (`id_user`, `type`, `user_name`, `email`, `phone`, `password`) VALUES (NULL, '0', :userName, :email, :phone, :password);";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":userName" => $userName , ":phone" => $phone , ":email" => $email , ":password" => $password));
    }


}

?>