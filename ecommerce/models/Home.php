<?php
// models/Home.php  
require_once 'models/Model.php';
class Home extends Model
{
    public function getNewPcGaming()
    {
        $sql_select_all = "SELECT * FROM products WHERE category_id = 1  OR category_id = 2 ORDER BY created_at DESC LIMIT 0,4";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getNewLaptopGaming()
    {
        $sql_select_all = "SELECT * FROM products WHERE category_id = 6 OR category_id = 7 ORDER BY created_at DESC LIMIT 0,4";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getNewGear()
    {
        $sql_select_all = "(SELECT * FROM products WHERE category_id = 8 ORDER BY created_at DESC LIMIT 1)
                            UNION
                            (SELECT * FROM products WHERE category_id = 10 ORDER BY created_at DESC LIMIT 1)
                            UNION
                            (SELECT * FROM products WHERE category_id = 11 ORDER BY created_at DESC LIMIT 1)
                            ORDER BY created_at DESC LIMIT 0,4";

        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        $sql_select_one = "SELECT * FROM products WHERE category_id = 8 OR category_id = 10 OR category_id = 11
                            
                            ORDER BY created_at DESC LIMIT 1,1";

        $obj_select_one = $this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        $products[] = $product;
        return $products;
    }



    public function getNewSeen()
    {
        $sql_select_all = "SELECT * FROM products WHERE category_id = 9 ORDER BY created_at DESC LIMIT 0,4";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getNewPost()
    {
        $sql_select_all = "SELECT * FROM post  ORDER BY created_at DESC LIMIT 0,4";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $post = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $post;
    }
}
