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
        $sql = "SELECT * FROM appointments ORDER BY date DESC";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getIstoricProgramari($userID)
    {
        $sql = "SELECT * FROM appointments WHERE id_user=:userID ORDER BY date DESC";
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

    public function checkProgramareByData($dataProgramare)
    {
        $sql = "SELECT * FROM appointments WHERE  date =:dataProgramare";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":dataProgramare" => $dataProgramare));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        // print_r($sql);
        if (!$result)
        {
            $result = -1;
        }

        return $result;
    }
    
    public function countProgramari()
    {
        $sql = "SELECT COUNT(date) FROM appointments";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result && array_key_exists('COUNT(date)', $result ))
        {
            $result = $result['COUNT(date)'];
        }
        else
        {
            $result = -1;
        }
        return $result;
    }

    public function insertProgramare($id_appointment, $date , $id_user , $id_form )
    {
        $sql = "INSERT INTO `appointments` (`id_appointment`, `date`, `id_user`, `id_form`) VALUES (:id_appointment, :date, :id_user, :id_form)";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_appointment" => $id_appointment , ":date" => $date  , ":id_user" => $id_user  , ":id_form" => $id_form));
    }
    
    public function exportProgramari()
    {
        $sql = "SELECT * FROM appointments as a INNER JOIN forms as f ON a.id_form=f.id_form";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getProgramare($formID)
    {
        $sql = "SELECT * FROM appointments WHERE id_form >=:formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));
        $results = $query->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    
    


}

?>