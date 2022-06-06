<?php

class FisierModel extends Controller
{
  
    public function getFisiere($formID)
    {
        $sql = "SELECT * FROM files WHERE id_form =:formID";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":formID" => $formID));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function insertFisier( $caleFisier , $formID , $tipFisier)
    {
        $blobFisier = fopen($caleFisier, 'rb');
        $sql = "INSERT INTO `files` (`id_file`, `type`, `file`, `id_form`) VALUES (NULL, :tipFisier , :blobFisier , :formID)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':tipFisier', $tipFisier);
        $query->bindParam(':blobFisier', $blobFisier, PDO::PARAM_LOB);
        $query->bindParam(':formID', $formID);
        $query->execute();

    }

    
}


?>