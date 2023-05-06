<?php
// models/Empolyee.php 
require_once 'models/Model.php';
class Employee extends Model
{
    public $name;
    public $birthday;
    public $phone;
    public $password;
    public $address;
    public $hometown;
    public $email;
    public $gender;
    public $department;
    public $role;

    public function insertEmployee($name, $birthday, $phone, $password, $address, $hometown, $email, $gender, $department, $role)
    {
        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO  user(`name`, `birthday`, `phone`, `password`, `address`, `hometown`, `email`, `gender`, `department`, `role`)
        VALUES(:name, :birthday, :phone, :password, :address, :hometown, :email, :gender, :department, :role)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':name' => $name,
            ':birthday' => $birthday,
            ':phone' => $phone,
            ':password' => $password,
            ':address' => $address,
            ':hometown' => $hometown,
            ':email' => $email,
            ':gender' => $gender,
            ':department' => $department,
            ':role' => $role
        ];
        // B4: Thực thi

        try {
            $is_insert = $obj_insert->execute($inserts);
            return $is_insert;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "số điện thoại hoặc email đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function getAll($page, $limit)
    {
        $sql_select_all = "SELECT * FROM user WHERE role > :role AND role <= 4 ORDER BY created_at DESC LIMIT :page, :limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':role', $_SESSION['role'], PDO::PARAM_INT);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $employees;
    }

    public function search($name, $sortname, $sorttime, $birthday)
    {

        $sql_select_all = "SELECT * FROM user WHERE role > :role AND role <= 4";
        $selects = [
            ':role' => $_SESSION['role'],
        ];
        if (!empty($name) && !empty($birthday)) {
            $sql_select_all .= " AND (name LIKE :name AND birthday LIKE :birthday)";
            $selects[':name'] = "%$name%";
            $selects[':birthday'] = "%$birthday%";
        } else if (!empty($name)) {
            $sql_select_all .= " AND name LIKE :name";
            $selects[':name'] = "%$name%";
        } else if (!empty($birthday)) {
            $sql_select_all .= " AND birthday LIKE :birthday";
            $selects[':birthday'] = "%$birthday%";
        }

        if (!empty($sortname) && !empty($sorttime)) {
            $sql_select_all .= " ORDER BY created_at $sorttime, name $sortname";
        } else if (!empty($sortname)) {

            $sql_select_all .= " ORDER BY name $sortname";
        } else if (!empty($sorttime)) {
            $sql_select_all .= " ORDER BY created_at $sorttime";
        }
        

        $obj_select_all = $this->connection->prepare($sql_select_all);


        $obj_select_all->execute($selects);
        $employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $employees;
    }
    public function searchName($name)
    {

        $sql_select_all = "SELECT * FROM user WHERE role > :role AND role <= 4 AND name LIKE :name";




        $obj_select_all = $this->connection->prepare($sql_select_all);

        $selects = [
            ':role' => $_SESSION['role'],
            ':name' => "%$name%",

        ];
        $obj_select_all->execute($selects);
        $employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        $list_name = [];
        // lấy ra mảng chỉ có tên
        foreach ($employees as $item) {
            $list_name[] = $item["name"];
        }
        // lọc tên trùng
        $list_name = array_unique($list_name);
        return json_encode($list_name);
    }
    public function searchBirthDay($birthday)
    {

        $sql_select_all = "SELECT * FROM user WHERE role > :role AND role <= 4 AND birthday LIKE :birthday";




        $obj_select_all = $this->connection->prepare($sql_select_all);

        $selects = [
            ':role' => $_SESSION['role'],
            ':birthday' => "%$birthday%",

        ];
        $obj_select_all->execute($selects);
        $employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        $list_birthday = [];
        // lấy ra mảng chỉ có birthday
        foreach ($employees as $item) {
            $list_birthday[] = $item["birthday"];
        }
        // lọc tên trùng
        $list_birthday = array_unique($list_birthday);
        return json_encode($list_birthday);
    }



    public function getById($id)
    {
        $sql_select_one = "SELECT * FROM user WHERE id = :id AND role < 4";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];

        $obj_select_one->execute($selects);
        $employee = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $employee;
    }
    public function update($id)
    {
        $obj_update = $this->connection->prepare("UPDATE user SET `name` = :name,`birthday` = :birthday, `phone` = :phone, `password` = :password, `address` = :address, `hometown` = :hometown, `email` = :email, `gender` = :gender, `department` = :department, `role` = :role WHERE id = :id AND role <= 4");

        $update = [
            ':name' => $this->name,
            ':birthday' => $this->birthday,
            ':phone' => $this->phone,
            ':password' => $this->password,
            ':address' => $this->address,
            ':hometown' => $this->hometown,
            ':email' => $this->email,
            ':gender' => $this->gender,
            ':department' => $this->department,
            ':role' => $this->role,
            ':id' => $id,
        ];

        try {
            $obj_update->execute($update);
            return $obj_update;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Dữ liệu đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function updatePass($id)
    {
        $obj_update = $this->connection->prepare("UPDATE user SET `password` = :password WHERE id = :id AND role <= 4");

        $update = [

            ':password' => $this->password,

            ':id' => $id,
        ];

        $obj_update->execute($update);
        return $obj_update;
    }

    public function delete($id)
    {
        $sql_delete = "DELETE FROM user WHERE id = :id AND role <= 4";
        $obj_delete = $this->connection->prepare($sql_delete);
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_deleted = $obj_delete->execute();

        return $is_deleted;
    }
    // đếm tổng số employee hiển thị
    public function countTotal()
    {
        $sql_select_all = "SELECT COUNT(*) FROM user WHERE role > :role AND role <= 4";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $selects = [
            ':role' => $_SESSION['role']
        ];
        $obj_select_all->execute($selects);
        return $obj_select_all->fetchColumn();
    }
}
