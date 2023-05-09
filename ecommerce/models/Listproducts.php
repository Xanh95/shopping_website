<?php
//models/Department.php
require_once 'models/Model.php';

class Listproducts extends Model
{
    public $listproducts_name;
    public function insertDepartment($listproducts)
    {
        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO  list_products(listproducts)
        VALUES(:listproducts)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':listproducts' => $listproducts,
        ];
        // B4: Thực thi
        try {
            $is_insert = $obj_insert->execute($inserts);
            return $is_insert;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Dữ liệu đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function getAll()
    {
        //B1:
        $sql_select_all = "SELECT * FROM list_products ORDER BY id ASC";
        //B2:
        $obj_select_all = $this->connection->prepare($sql_select_all);
        //B3:
        //B4:
        $obj_select_all->execute();
        //B5:
        $departments = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $departments;
    }
    public function update($id)
    {
        $obj_update = $this->connection->prepare("UPDATE list_products SET `listproducts` = :listproducts
           WHERE id = :id");
        var_dump($this->listproducts_name);
        $update = [
            ':listproducts' => $this->listproducts_name,
            ':id' => $id,
        ];

        try {
            return $obj_update->execute($update);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Dữ liệu đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function getById($id)
    {
        $sql_select_one = "SELECT * FROM list_products WHERE id = :id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];

        $obj_select_one->execute($selects);
        $listproducts = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $listproducts;
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM list_products WHERE id = :id");
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
    public function searchCategory($category)
    {
        $sql_select_all = "SELECT * FROM list_products WHERE  listproducts LIKE :category";
        $selects = [':category' => "%$category%",];
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute($selects);
        $listproducts = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        $list_products = [];
        // lấy ra mảng chỉ có birthday
        foreach ($listproducts as $item) {
            $list_products[] = $item["listproducts"];
        }
        return json_encode($list_products);
    }
}
