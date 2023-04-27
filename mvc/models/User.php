<?php
//models/User.php
require_once 'models/Model.php';

class User extends Model
{


    public function getUser($email)
    {
        $sql_select_one =
            "SELECT * FROM user WHERE email = :email";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':email' => $email
        ];
        $obj_select_one->execute($selects);
        $employee = $obj_select_one
            ->fetch(PDO::FETCH_ASSOC);
        return $employee;
    }
}
