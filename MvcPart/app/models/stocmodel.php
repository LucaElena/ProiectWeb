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
        $sql_getComenzi = "SELECT * FROM orders";
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
    

    public function getPiesaIdByNameBrandCategory($part_name, $brand_name , $category_name)
    {
        $sql_getPiesaIdByNameBrandCategory = "SELECT id_part FROM parts as p INNER JOIN brands as b ON p.id_brand=b.id_brand INNER join categories as c WHERE p.name=:part_name and b.brand_name=:brand_name and c.category_name=:category_name;";
        $query_getPiesaIdByNameBrandCategory = $this->conn->prepare($sql_getPiesaIdByNameBrandCategory);
        $query_getPiesaIdByNameBrandCategory->execute(array(":part_name" => $part_name , ":brand_name" => $brand_name , ":category_name" => $category_name ));
        $result = $query_getPiesaIdByNameBrandCategory->fetch(PDO::FETCH_ASSOC);
        if ($result)
        {   //am gasit id-ul piesei cautate
            $id_piesa = $result['id_part'];
            // print_r("ID piesa = " . $id_piesa);
            return $id_piesa;
        }
        return 0;
        
    }
    

    public function addComanda( $id_part , $quantity )
    {
        if ($id_part && $id_part != 0)
        {
            $data = date('Y-m-d', time());
            //INSERT INTO `orders` (`id_order`, `id_part`, `order_date`, `status`, `quantity`, `shipped_date`) VALUES (NULL, '26', '2022-05-06', '0', '2', NULL);
            $sql_addComanda = "INSERT INTO orders (id_order, id_part, order_date, status, quantity, shipped_date) VALUES (NULL, :id_part, :data, 0, :quantity, NULL)";
            $stmt= $this->conn->prepare($sql_addComanda); 
            $stmt->execute(array(":id_part" => $id_part , ":data" => $data , ":quantity" => $quantity ));
            // print_r(" Inseram comanda : ". $sql_addComanda);
        }
    }

    public function comandaPrimita( $id_comanda )
    {
        print_r("Comanda primita cu id:" . $id_comanda);
        $data = date('Y-m-d', time());
        $sql_comandaPrimita = "UPDATE orders SET status = '1', shipped_date=:data WHERE id_order = :id_comanda;";
        $stmt= $this->conn->prepare($sql_comandaPrimita); 
        $stmt->execute(array(":data" => $data , ":id_comanda" => $id_comanda ));

    }

}

?>