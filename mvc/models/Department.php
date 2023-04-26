<?php
//models/Department.php
require_once 'models/Model.php';

class Department extends Model
{
    public $department_name;
    public function insertDepartment($department)
    {
        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO  department(department)
        VALUES(:department)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':department' => $department,

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
        $sql_select_all = "SELECT * FROM department";
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
        $obj_update = $this->connection->prepare("UPDATE department SET `department` = :department
           WHERE id = $id");
        var_dump($this->department_name);
        $update = [
            ':department' => $this->department_name
        ];

        try {
            return $obj_update->execute($update);
            return $obj_update;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Dữ liệu đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function getById($id)
    {
        $sql_select_one = "SELECT * FROM department WHERE id = :id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];

        $obj_select_one->execute($selects);
        $department = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $department;
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM department WHERE id = $id");
        $is_delete = $obj_delete->execute();


        return $is_delete;
    }
}