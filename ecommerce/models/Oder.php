<?php
require_once 'models/Model.php';

class Oder extends Model
{
    public function insertOder($name, $city, $phone, $district, $address_recipient, $note, $status, $code_oder, $total_pay, $method_pay, $user_id)
    {
        $sql_insert = "INSERT INTO oder (`name`,`phone`,`city`,`district`,`address`,`note`,`status`,`code_oder`,`total_pay`,`method_pay`,`user_id`) VALUES (:name,:phone,:city,:district,:address,:note,:status,:code_oder,:total_pay,:method_pay,:user_id)";
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':name' => $name,
            ':city' => $city,
            ':phone' => $phone,
            ':district' => $district,
            ':address' => $address_recipient,
            ':note' => $note,
            ':status' => $status,
            ':code_oder' => $code_oder,
            ':total_pay' => $total_pay,
            ':method_pay' => $method_pay,
            ':user_id' => $user_id,
        ];
        // B4: Thực thi
        try {
            $is_insert = $obj_insert->execute($inserts);
            return $is_insert;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "đơn hàng đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function insertOderDetail($product_id, $quantity, $code_oder, $name_product, $price, $avatar)
    {
        $sql_insert = "INSERT INTO oder_detail (`product_id`,`code_oder`,`quantity`,`name_product`,`price`,`avatar`) VALUES (:product_id,:code_oder,:quantity,:name_product,:price,:avatar)";
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':product_id' => $product_id,
            ':quantity' => $quantity,
            ':code_oder' => $code_oder,
            ':name_product' => $name_product,
            ':price' => $price,
            ':avatar' => $avatar,
        ];
        // B4: Thực thi
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
    public function getAllOders($page, $limit)
    {
        $sql_select_all = "SELECT * FROM oder  ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $orders = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }
    public function countTotal()
    {
        $sql_select_all = "SELECT COUNT(*) FROM oder ";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }
    public function getOderById($id)
    {
        $sql_select_one = "SELECT * FROM oder WHERE id = :id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];
        $obj_select_one->execute($selects);
        $oder = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $oder;
    }
    public function getMyOderById($id)
    {
        $user_id = $_SESSION['id'];
        $sql_select_one = "SELECT * FROM oder WHERE id = :id AND user_id = $user_id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];
        $obj_select_one->execute($selects);
        $oder = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $oder;
    }
    public function getOderByCode($code)
    {
        $sql_select_all = "SELECT * FROM oder_detail WHERE code_oder = :code_oder";
        $obj_select_all = $this->connection
            ->prepare($sql_select_all);
        $selects = [
            ':code_oder' => $code
        ];
        $obj_select_all->execute($selects);
        $oder = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $oder;
    }
    public function findIDOder($code)
    {
        $sql_select_all = "SELECT * FROM oder WHERE code_oder = :code_oder";
        $obj_select_all = $this->connection
            ->prepare($sql_select_all);
        $selects = [
            ':code_oder' => $code
        ];

        $obj_select_all->execute($selects);
        $oder = $obj_select_all->fetch(PDO::FETCH_ASSOC);
        return $oder;
    }
    public function updateQuantity($quantity, $id)
    {
        $sql_update = "UPDATE oder_detail SET `quantity` = :quantity WHERE id = :id";
        $obj_update = $this->connection->prepare($sql_update);
        $update = [
            ':quantity' => $quantity,
            ':id' => $id
        ];
        $is_update = $obj_update->execute($update);
        return $is_update;
    }
    public function updateStatus($status, $id)
    {
        $sql_update = "UPDATE oder SET `status` = :status WHERE id = :id";
        $obj_update = $this->connection->prepare($sql_update);
        $update = [
            ':status' => $status,
            ':id' => $id
        ];
        $is_update = $obj_update->execute($update);
        return $is_update;
    }
    public function deleteProductOder($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM oder_detail WHERE id = :id");
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM oder WHERE id = :id");
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
    public function deleteMyOder($id)
    {
        $user_id = $_SESSION['id'];
        $obj_delete = $this->connection
            ->prepare("DELETE FROM oder WHERE id = :id AND user_id = $user_id");
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
    public function search($name, $code_oder, $status)
    {
        $sql_select_all = "SELECT * FROM oder  ";
        $selects = array();
        if (!empty($name) && !empty($code_oder) && !empty($status)) {
            $sql_select_all .= " WHERE (name LIKE :name AND code_oder = :code_oder AND status = :status)";
            $selects[':name'] = "%$name%";
            $selects[':code_oder'] = $code_oder;
            $selects[':status'] = $status;
        } else if (!empty($name)) {
            $sql_select_all .= " WHERE name LIKE :name";
            $selects[':name'] = "%$name%";
        } else if (!empty($code_oder)) {
            $sql_select_all .= " WHERE code_oder = :code_oder";
            $selects[':code_oder'] = $code_oder;
        } elseif (!empty($status)) {
            $sql_select_all .= " WHERE status = :status";
            $selects[':status'] = $status;
        }
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute($selects);
        $oders = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $oders;
    }
    public function searchCode($code)
    {
        $sql_select_all = "SELECT * FROM oder WHERE code_oder  LIKE :code_oder";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $selects = [
            ':code_oder' => "%$code%",
        ];
        $obj_select_all->execute($selects);
        $oders = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        $list_name = [];
        // lấy ra mảng chỉ có tên
        foreach ($oders as $item) {
            $list_name[] = $item["code_oder"];
        }
        return json_encode($list_name);
    }
    public function searchOderUserName($name)
    {
        $sql_select_all = "SELECT * FROM oder WHERE name  LIKE :name";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $selects = [
            ':name' => "%$name%",
        ];
        $obj_select_all->execute($selects);
        $oders = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        $list_name = [];
        // lấy ra mảng chỉ có tên
        foreach ($oders as $item) {
            $list_name[] = $item["name"];
        }
        // lọc tên trùng
        $list_name = array_unique($list_name);
        return json_encode($list_name);
    }
    public function findMyOder()
    {
        $user_id = $_SESSION['id'];
        $sql_select_all = "SELECT * FROM oder WHERE user_id = $user_id";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $oders = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $oders;
    }
}
