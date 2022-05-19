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


}

?>