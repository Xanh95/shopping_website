<?php
//models/User.php
require_once 'models/Model.php';

class User extends Model
{

    public $password;
    public function getUser($email)
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
}
