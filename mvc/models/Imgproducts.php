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
    // public function search($name, $sortname, $sorttime, $birthday)
    // {

    //     $sql_select_all = "SELECT * FROM user WHERE role > :role";

    //     if (!empty($name) && !empty($birthday)) {
    //         $sql_select_all .= " AND (name LIKE '%$name%' OR birthday LIKE '%$birthday%')";
    //     } else if (!empty($name)) {
    //         $sql_select_all .= " AND name LIKE '%$name%'";
    //     } else if (!empty($birthday)) {
    //         $sql_select_all .= " AND birthday LIKE '%$birthday%'";
    //     }

    //     if (!empty($sortname) && !empty($sorttime)) {
    //         $sql_select_all .= " ORDER BY created_at $sorttime, name $sortname";
    //     } else if (!empty($sortname)) {
    //         $sql_select_all .= " ORDER BY name $sortname";
    //     } else if (!empty($sorttime)) {
    //         $sql_select_all .= " ORDER BY created_at $sorttime";
    //     }


    //     $obj_select_all = $this->connection->prepare($sql_select_all);

    //     $selects = [
    //         ':role' => $_SESSION['role'],
    //     ];
    //     $obj_select_all->execute($selects);
    //     $employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    //     return $employees;
    // }
    // public function searchName($name)
    // {

    //     $sql_select_all = "SELECT * FROM user WHERE role > :role AND name LIKE '%$name%'";




    //     $obj_select_all = $this->connection->prepare($sql_select_all);

    // $selects = [
    //     ':role' => $_SESSION['role'],

    // ];
    //     $obj_select_all->execute($selects);
    //     $employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

    //     $list_name = [];
    //     // lấy ra mảng chỉ có tên
    //     foreach ($employees as $item) {
    //         $list_name[] = $item["name"];
    //     }
    //     // lọc tên trùng
    //     $list_name = array_unique($list_name);
    //     return json_encode($list_name);
    // }
    // public function searchBirthDay($birthday)
    // {

    //     $sql_select_all = "SELECT * FROM user WHERE role > :role AND birthday LIKE '%$birthday%'";




    //     $obj_select_all = $this->connection->prepare($sql_select_all);

    //     $selects = [
    //         ':role' => $_SESSION['role'],

    //     ];
    //     $obj_select_all->execute($selects);
    //     $employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

    //     $list_birthday = [];
    //     // lấy ra mảng chỉ có birthday
    //     foreach ($employees as $item) {
    //         $list_birthday[] = $item["birthday"];
    //     }
    //     // lọc tên trùng
    //     $list_birthday = array_unique($list_birthday);
    //     return json_encode($list_birthday);
    // }



    // public function getById($id)
    // {
    //     $sql_select_one = "SELECT * FROM img_products WHERE id = :id";
    //     $obj_select_one = $this->connection
    //         ->prepare($sql_select_one);
    //     $selects = [
    //         ':id' => $id
    //     ];

    //     $obj_select_one->execute($selects);
    //     $imgs_product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    //     return $imgs_product;
    // }
    // public function update($id)
    // {
    //     $obj_update = $this->connection->prepare("UPDATE user SET `name` = :name,`birthday` = :birthday, `phone` = :phone, `password` = :password, `address` = :address, `hometown` = :hometown, `email` = :email, `gender` = :gender, `department` = :department, `role` = :role WHERE id = $id");

    //     $update = [
    //         ':name' => $this->name,
    //         ':birthday' => $this->birthday,
    //         ':phone' => $this->phone,
    //         ':password' => $this->password,
    //         ':address' => $this->address,
    //         ':hometown' => $this->hometown,
    //         ':email' => $this->email,
    //         ':gender' => $this->gender,
    //         ':department' => $this->department,
    //         ':role' => $this->role,
    //     ];

    //     try {
    //         $obj_update->execute($update);
    //         return $obj_update;
    //     } catch (PDOException $e) {
    //         if ($e->getCode() == 23000) {
    //             $_SESSION['error'] = "Dữ liệu đã tồn tại trong cơ sở dữ liệu.";
    //         }
    //     }
    // }
    public function delete($product_id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM img_products WHERE product_id = $product_id");
        $is_delete = $obj_delete->execute();


        return $is_delete;
    }
    // đếm tổng số employee hiển thị
    // public function countTotal()
    // {
    //     $sql_select_all = "SELECT COUNT(*) FROM user WHERE role > :role";
    //     $obj_select_all = $this->connection->prepare($sql_select_all);
    //     $selects = [
    //         ':role' => $_SESSION['role']
    //     ];
    //     $obj_select_all->execute($selects);
    //     return $obj_select_all->fetchColumn();
    // }
}