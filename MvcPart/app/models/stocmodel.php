<?php

class StocModel extends Controller
{

    public function getBrands()
    {
        $sql_getBrands = "SELECT brand_name FROM brands";
        $query_getBrands = $this->conn->prepare($sql_getBrands);
        $query_getBrands->execute();
        $results = $query_getBrands->fetchAll(PDO::FETCH_ASSOC);
        $brands = array();
        foreach ($results as $brand)
        {
            // print_r($brand['brand_name']);
            array_push($brands, $brand['brand_name']);
        }
        return $brands;
    }

    public function getCategorii()
    {
        $sql_getCategorii = "SELECT category_name FROM categories";
        $query_getCategorii = $this->conn->prepare($sql_getCategorii);
        $query_getCategorii->execute();
        $results = $query_getCategorii->fetchAll(PDO::FETCH_ASSOC);
        $categorii = array();
        foreach ($results as $categorie)
        {
            // print_r($categorie['category_name']);
            array_push($categorii, $categorie['category_name']);
        }
        return $categorii;
    }

    public function getPiese()
    {
        $sql_getPiese = "SELECT name FROM parts";
        $query_getPiese = $this->conn->prepare($sql_getPiese);
        $query_getPiese->execute();
        $results = $query_getPiese->fetchAll(PDO::FETCH_ASSOC);
        $piese = array();
        foreach ($results as $piesa)
        {
            // print_r($piesa['name']);
            array_push($piese, $piesa['name']);
        }
        return array_unique($piese);
    }

    public function getComenzi()
    {
        $sql_getComenzi = "SELECT id_part, order_date, status, quantity FROM orders";
        $query_getComenzi = $this->conn->prepare($sql_getComenzi);
        $query_getComenzi->execute();
        $results = $query_getComenzi->fetchAll(PDO::FETCH_ASSOC);
       
        return $results;
    }
    

    public function getDatePiesaById($id_part)
    {
        $sql_getDatePiesaById = "SELECT * FROM parts WHERE id_part = :id_part";
        $query_getDatePiesaById = $this->conn->prepare($sql_getDatePiesaById);
        $query_getDatePiesaById->execute(array(":id_part" => $id_part));
        $results = $query_getDatePiesaById->fetch(PDO::FETCH_ASSOC);

        return $results;
    }

    public function getDateCategorieById($id_category)
    {
        $sql_getDateCategorieById = "SELECT * FROM categories WHERE id_category = :id_category";
        $query_getDateCategorieById = $this->conn->prepare($sql_getDateCategorieById);
        $query_getDateCategorieById->execute(array(":id_category" => $id_category));
        $results = $query_getDateCategorieById->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getDateBrandById($id_brand)
    {
        $sql_getDateBrandById = "SELECT * FROM brands WHERE id_brand = :id_brand";
        $query_getDateBrandById = $this->conn->prepare($sql_getDateBrandById);
        $query_getDateBrandById->execute(array(":id_brand" => $id_brand));
        $results = $query_getDateBrandById->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
    

    

    public function addComanda( $order_date, $id_part , $quantity )
    {
        // $sql_getComenzi = "SELECT id_part, order_date, status, quantity FROM orders";
        // $query_getComenzi = $this->conn->prepare($sql_getComenzi);
        // $query_getComenzi->execute();
        // $results = $query_getComenzi->fetchAll(PDO::FETCH_ASSOC);
       
        // return $results;
    }

}

?>