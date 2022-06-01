<?php

class ProgramareModel extends Controller
{
  
    
    public function getProgramari($startWeek, $endWeek)
    {
        // SELECT * FROM `appointments` WHERE `date` >='2022-05-15 00:00:00' AND `date`<='2022-05-21 23:59:59'
        $sql = "SELECT * FROM appointments WHERE date >=:startWeek AND date<=:endWeek";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":startWeek" => $startWeek , ":endWeek" => $endWeek ));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function getAllIstoricProgramari()
    {
        $sql = "SELECT * FROM appointments";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getIstoricProgramari($userID)
    {
        $sql = "SELECT * FROM appointments WHERE id_user=:userID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":userID" => $userID));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getPieseUtilizate($formID)
    {
        $sql = "SELECT reserved_parts_list FROM forms WHERE id_form=:formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result && array_key_exists('reserved_parts_list', $result ))
        {
            $result = $result['reserved_parts_list'];
        }
        else
        {
            $result = "{}";
        }

        return $result;
    }
    
    public function getStatus($formID)
    {
        $sql = "SELECT status FROM forms WHERE id_form=:formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result && array_key_exists('status', $result ))
        {
            $result = $result['status'];
        }
        else
        {
            $result = -1;
        }

        return $result;
    }

    


}

?>