<?php
//models/User.php
require_once 'models/Model.php';

class User extends Model
{
    public $name;
    public $phone;
    public $email;
    public $new_birthday;
    public $gender;
    public $password;
    public $city;
    public $district;
    public $address;
    public $address_type;
    public function getEmployee($email)
    {
        $sql_select_one =
            "SELECT * FROM user WHERE email = :email AND role <= :role";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':email' => $email,
            ':role' => 4
        ];
        $obj_select_one->execute($selects);
        $employee = $obj_select_one
            ->fetch(PDO::FETCH_ASSOC);
        return $employee;
    }
    public function getUser($email)
    {
        $sql_select_one =
            "SELECT * FROM user WHERE email = :email";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':email' => $email,

        ];
        $obj_select_one->execute($selects);
        $employee = $obj_select_one
            ->fetch(PDO::FETCH_ASSOC);
        return $employee;
    }
    public function getUserAdress($id)
    {
        $sql_select_all =
            "SELECT * FROM user_address WHERE user_id = $id";
        $obj_select_all = $this->connection
            ->prepare($sql_select_all);

        $obj_select_all->execute();
        $address = $obj_select_all
            ->fetchAll(PDO::FETCH_ASSOC);
        return $address;
    }
    public function editPass($id)
    {
        $obj_edit = $this->connection->prepare("UPDATE user SET `password` = :nepassword WHERE id = :id");
        $edit = [
            ':nepassword' => $this->password,
            ':id' => $id,
        ];
        $obj_edit->execute($edit);
        return $obj_edit;
    }
    public function regiser($name, $phone, $email, $password, $role)
    {
        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO  user(`name`, `phone`, `password`,  `email`,  `role`)
        VALUES(:name, :phone, :password,:email, :role)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':name' => $name,
            ':phone' => $phone,
            ':password' => $password,
            ':email' => $email,
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
    public function upDateInfo($id)
    {
        $sql_update = "UPDATE user SET `name`= :name,`birthday`= :birthday,`phone` =:phone, `gender` =:gender WHERE id = $id";
        $obj_update = $this->connection->prepare($sql_update);
        $update = [
            ':name' => $this->name,
            ':birthday' => $this->new_birthday,
            ':phone' => $this->phone,
            ':gender' => $this->gender,
        ];
        try {
            $is_update = $obj_update->execute($update);
            return $is_update;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "số điện thoại hoặc email đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function upDatePass($id)
    {
        $sql_update = "UPDATE user SET `password`= :password WHERE id = $id";
        $obj_update = $this->connection->prepare($sql_update);
        $update = [
            ':password' => $this->password,

        ];
        $is_update = $obj_update->execute($update);
        return $is_update;
    }
    public function createAddress($id)
    {
        $sql_insert = "INSERT INTO user_address(`name`, `phone`, `city`, `district`, `address`, `address_type`, `user_id`)
                        VALUES(:name, :phone, :city, :district, :address, :address_type, :user_id)";
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':name' => $this->name,
            ':phone' => $this->phone,
            ':city' => $this->city,
            ':district' => $this->district,
            ':address' => $this->address,
            ':address_type' => $this->address_type,
            ':user_id' => $id,
        ];
        // B4: Thực thi
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
    public function updateAddress($id_address)
    {
        $sql_update = "UPDATE user_address SET `name` = :name, `phone` = :phone, `city` = :city, `district` = :district, `address` = :address, `address_type` = :address_type WHERE `id` = :id";
        $obj_update = $this->connection->prepare($sql_update);
        // B3: Tạo mảng
        $updates = [
            ':name' => $this->name,
            ':phone' => $this->phone,
            ':city' => $this->city,
            ':district' => $this->district,
            ':address' => $this->address,
            ':address_type' => $this->address_type,
            ':id' => $id_address,
        ];
        // B4: Thực thi
        $is_update = $obj_update->execute($updates);
        return $is_update;
    }
    public function getUserAdressById($id_address)
    {
        $sql_select_one = "SELECT * FROM user_address WHERE id = $id_address";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $address = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $address;
    }
    public function deleteAddress($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM user_address WHERE id = :id");
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
}
