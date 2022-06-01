<?php

class FormularModel extends Controller
{
  
    
    public function getIstoric ($user_id)
    {
        // SELECT * FROM `appointments` WHERE `date` >='2022-05-15 00:00:00' AND `date`<='2022-05-21 23:59:59'
        $sql = "SELECT * FROM forms WHERE date >=:startWeek AND date<=:endWeek";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":startWeek" => $startWeek , ":endWeek" => $endWeek ));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }


}

?>