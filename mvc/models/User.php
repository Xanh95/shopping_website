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
        $sql_update = "UPDATE user SET `name`= :name,`birthday`= :birthday,`phone` =:phone, `gender` =:gender WHERE id = $id AND role > 4";
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
    public function countTotal()
    {
        $sql_select_all = "SELECT COUNT(*) FROM user ";
        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }
    public function getAll($page, $limit)
    {

        $sql_select_all = "SELECT * FROM user WHERE role > 4  ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);


        $obj_select_all->execute();
        $users = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function getById($id)
    {
        $sql_select_one = "SELECT * FROM user WHERE id = :id AND role > 4";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];

        $obj_select_one->execute($selects);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function delete($id)
    {
        $sql_delete = "DELETE FROM user WHERE id = :id AND role > 4";
        $obj_delete = $this->connection->prepare($sql_delete);
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_deleted = $obj_delete->execute();

        return $is_deleted;
    }
    public function search($name, $birthday)
    {

        $sql_select_all = "SELECT * FROM user WHERE role > 4";

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


        $obj_select_all = $this->connection->prepare($sql_select_all);
        if (!empty($name) || !empty($birthday)) {
            $obj_select_all->execute($selects);
        } else {
            $obj_select_all->execute();
        }
        $users = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function searchUserName($name)
    {
        $sql_select_all = "SELECT * FROM user WHERE  role > 4 AND name LIKE :name";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $selects = [
            ':name' => "%$name%",
        ];
        $obj_select_all->execute($selects);
        $users = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        $list_name = [];
        // lấy ra mảng chỉ có tên
        foreach ($users as $item) {
            $list_name[] = $item["name"];
        }
        // lọc tên trùng
        $list_name = array_unique($list_name);
        return json_encode($list_name);
    }
    public function searchUserBirthDay($birthday)
    {

        $sql_select_all = "SELECT * FROM user WHERE  role > 4 AND birthday LIKE :birthday";




        $obj_select_all = $this->connection->prepare($sql_select_all);

        $selects = [
          
            ':birthday' => "%$birthday%",

        ];
        $obj_select_all->execute($selects);
        $users = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        $list_birthday = [];
        // lấy ra mảng chỉ có birthday
        foreach ($users as $item) {
            $list_birthday[] = $item["birthday"];
        }
        // lọc tên trùng
        $list_birthday = array_unique($list_birthday);
        return json_encode($list_birthday);
    }
}