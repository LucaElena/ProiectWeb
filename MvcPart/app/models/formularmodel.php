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

    public function getFormular($formID)
    {
        $sql = "SELECT * FROM forms WHERE id_form >=:formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));
        $results = $query->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function updateMesajClient($formID, $mesajClient )
    {   //UPDATE `forms` SET `request_message` = 'test' WHERE `forms`.`id_form` = 107;
        $sql = 'UPDATE `forms` SET `request_message` = :mesajClient WHERE `forms`.`id_form` = :formID';
        $query = $this->conn->prepare($sql);
        $query->execute(array(":mesajClient" => $mesajClient , ":formID" => $formID ));
    }

    public function updateMesajAdmin($formID, $mesajAdmin )
    {   //UPDATE `forms` SET `response_message` = 'test' WHERE `forms`.`id_form` = 107;
        $sql = 'UPDATE `forms` SET `response_message` = :mesajAdmin WHERE `forms`.`id_form` = :formID';
        $query = $this->conn->prepare($sql);
        $query->execute(array(":mesajAdmin" => $mesajAdmin , ":formID" => $formID ));
    }

    public function updateListaPiese($formID, $jsonPieseCurente )
    {   //UPDATE `forms` SET `reserved_parts_list` = '{"2":"1"}' WHERE `forms`.`id_form` = 107;
        $sql = 'UPDATE `forms` SET `reserved_parts_list` = :reserved_parts_list WHERE `forms`.`id_form` = :formID';
        $query = $this->conn->prepare($sql);
        $query->execute(array(":reserved_parts_list" => $jsonPieseCurente , ":formID" => $formID ));
    }

    

    public function schimbaStatus($formID, $newStatus )
    {   //UPDATE `forms` SET `status` = '1' WHERE `forms`.`id_form` = 107;
        $sql = 'UPDATE `forms` SET `status` = :newStatus WHERE `forms`.`id_form` = :formID';
        $query = $this->conn->prepare($sql);
        $query->execute(array(":newStatus" => $newStatus , ":formID" => $formID ));
    }

    public function stergeDateProgramare( $formID)
    {
        //Stergem form-ul asociat:
        $sql = "DELETE FROM `forms` WHERE `forms`.`id_form` = :formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));

        //Stergem programarea:
        $sql = "DELETE FROM `appointments` WHERE `appointments`.`id_form` = :formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));

        //Stergem fisierele asociate:
        $sql = "DELETE FROM `files` WHERE `files`.`id_form` = :formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));
    }

}


?>