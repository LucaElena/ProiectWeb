<?php

class FisierModel extends Controller
{
  
    public function getFisiere($formID)
    {
        $sql = "SELECT * FROM files WHERE id_form >=:formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    
}


?>