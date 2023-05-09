<?php
// models/Imgproduct.php 
require_once 'models/Model.php';
class Imgproducts extends Model
{
    public function insertImgProducts($filename, $products_id)
    {
        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO  img_products(`img`, `product_id`)
        VALUES(:img, :product_id)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':img' => $filename,
            ':product_id' => $products_id,
        ];
        // B4: Thực thi
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
    public function getAll($product_id)
    {
        $sql_select_all = "SELECT * FROM img_products WHERE product_id = :product_id ORDER BY created_at DESC ";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $selects = [
            ':product_id' => $product_id,
        ];
        $obj_select_all->execute($selects);
        $imgs_product = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $imgs_product;
    }
    public function delete($product_id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM img_products WHERE product_id = :product_id");
        $obj_delete->bindValue(':product_id', $product_id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
}
