<?php

class UserModel extends Controller
{
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
        $id_user = $result['id_user'];
        $this->id =  $id_user;
        $this->user_name = $username;
        #print_r($id_user);
        return $id_user;
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


}

?>