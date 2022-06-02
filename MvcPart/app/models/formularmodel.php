<?php

class FormularModel extends Controller
{
  
    
    public function getIstoric($user_id)
    {
        // SELECT * FROM `appointments` WHERE `date` >='2022-05-15 00:00:00' AND `date`<='2022-05-21 23:59:59'
        $sql = "SELECT * FROM forms WHERE date >=:startWeek AND date<=:endWeek";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":startWeek" => $startWeek , ":endWeek" => $endWeek ));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return sort($results);
    }

    public function insertFormular($id_form, $request_message , $response_message , $reserved_parts_list , $status)
    {
        $sql = "INSERT INTO `forms` (`id_form`, `request_message`, `response_message`, `reserved_parts_list`, `status`) VALUES (:id_form, :request_message, :response_message, :reserved_parts_list, :status)";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_form" => $id_form , ":request_message" => $request_message , ":response_message" => $response_message  , ":reserved_parts_list" => $reserved_parts_list  , ":status" => $status));
    }

    
}


?>