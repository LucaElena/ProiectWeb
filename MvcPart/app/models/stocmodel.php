<?php

class StocModel extends Controller
{

    public function getBrands()
    {
        $sql = "SELECT brand_name FROM brands";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
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
        $sql = "SELECT id_category,category_name FROM categories";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $categorii = array();
        foreach ($results as $categorie)
        {
            // print_r($categorie['category_name']);
            array_push($categorii, $categorie['id_category'].";".$categorie['category_name']);
        }
        return $categorii;
    }

    public function getPiese()
    {
        $sql = "SELECT name,id_category FROM parts";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $piese = array();
        foreach ($results as $piesa)
        {
            // print_r($piesa['name']);
            array_push($piese, $piesa['id_category'].";".$piesa['name']);
        }
        return array_unique($piese);
    }

    public function getAllPiese()
    {
        $sql = "SELECT * FROM parts";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }


    public function getComenzi()
    {
        $sql = "SELECT * FROM orders";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
       
        return $results;
    }
    

    public function getDatePiesaById($id_part)
    {
        $sql = "SELECT * FROM parts WHERE id_part = :id_part";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_part" => $id_part));
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return $results;
    }

    public function getDateCategorieById($id_category)
    {
        $sql = "SELECT * FROM categories WHERE id_category = :id_category";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_category" => $id_category));
        $results = $query->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getDateBrandById($id_brand)
    {
        $sql = "SELECT * FROM brands WHERE id_brand = :id_brand";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_brand" => $id_brand));
        $results = $query->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
    
    
    public function getPiesaIdByNameBrandCategory($part_name, $brand_name , $category_name)
    {
        $sql = "SELECT id_part FROM parts as p INNER JOIN brands as b ON p.id_brand=b.id_brand INNER join categories as c WHERE p.name=:part_name and b.brand_name=:brand_name and c.category_name=:category_name;";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":part_name" => $part_name , ":brand_name" => $brand_name , ":category_name" => $category_name ));
        $result = $query->fetch(PDO::FETCH_ASSOC);
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

        $data = date('Y-m-d', time());
        //INSERT INTO `orders` (`id_order`, `id_part`, `order_date`, `status`, `quantity`, `shipped_date`) VALUES (NULL, '26', '2022-05-06', '0', '2', NULL);
        $sql = "INSERT INTO orders (id_order, id_part, order_date, status, quantity, shipped_date) VALUES (NULL, :id_part, :data, 0, :quantity, NULL)";
        $stmt= $this->conn->prepare($sql); 
        $stmt->execute(array(":id_part" => $id_part , ":data" => $data , ":quantity" => $quantity ));
        // print_r(" Inseram comanda : ". $sql);
    }


    public function updateStatusComanda( $id_comanda )
    {
        // print_r("updateStatusComanda cu id:" . $id_comanda);
        $data = date('Y-m-d', time());
        $sql = "UPDATE orders SET status = '1', shipped_date=:data WHERE id_order = :id_comanda;";
        $stmt= $this->conn->prepare($sql); 
        $stmt->execute(array(":data" => $data , ":id_comanda" => $id_comanda ));
    }
    
    public function getComanda( $id_comanda )
    {
        $sql = "SELECT * FROM orders WHERE id_order=:id_comanda;";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_comanda" => $id_comanda));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getStocPiesa( $id_piesa )
    {
        $sql = "SELECT * FROM stoc WHERE id_stoc=:id_piesa;";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_piesa" => $id_piesa));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateCantitateStoc( $id_stoc , $cantitate_stoc_noua)
    {
        $sql = "UPDATE stoc SET cantitate_stoc = :cantitate_stoc_noua WHERE id_stoc = :id_stoc;";
        $stmt= $this->conn->prepare($sql); 
        $stmt->execute(array(":cantitate_stoc_noua" => $cantitate_stoc_noua , ":id_stoc" => $id_stoc ));
    }

    public function updateRezervatStoc( $id_stoc , $cantitate_rezervata_noua)
    {
        $sql_updateRezervatStoc = "UPDATE stoc SET cantitate_rezervata = :cantitate_rezervata_noua WHERE id_stoc = :id_stoc;";
        $stmt= $this->conn->prepare($sql_updateRezervatStoc); 
        $stmt->execute(array(":cantitate_rezervata_noua" => $cantitate_rezervata_noua , ":id_stoc" => $id_stoc ));
    }

    public function getIdBrad( $brand_name)
    {
        $sql = "SELECT id_brand FROM brands WHERE brand_name=:brand_name;";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":brand_name" => $brand_name));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['id_brand'];
    }
    
    public function getPret( $id_part)
    {
        $sql = "SELECT price FROM parts WHERE id_part=:id_part;";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_part" => $id_part));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['price'];
    }

    public function insertPiesa( $id_brand, $id_categorie_selectata, $nume_piesa_selectata)
    {
        // $sql = "INSERT INTO parts (name, id_category, id_brand, price, quantity, shipped_date) VALUES (NULL, :id_part, :data, 0, :quantity, NULL)";
        // $stmt= $this->conn->prepare($sql); 
        // $stmt->execute(array(":id_part" => $id_part , ":data" => $data , ":quantity" => $quantity ));
    }

    public function verifcaCantitateStoc( $id_piesa , $cantitate)
    {
        $sql = "SELECT * FROM stoc WHERE id_stoc=:id_piesa;";
        $query = $this->conn->prepare($sql);
        $query->execute(array(":id_piesa" => $id_piesa));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result['cantitate_stoc'] >= $cantitate)
        {
            return $result['cantitate_stoc'];
        }
        return 0;
    }

    





}

?>