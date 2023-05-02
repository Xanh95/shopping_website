<?php
// models/Empolyee.php 
require_once 'models/Model.php';
class Products extends Model
{
    public $name;
    public $status;
    public $guarantee;
    public $video;
    public $price;
    public $category_id;
    public $short_details;
    public $products_details;
    public $avatar_name;
    public $img_video_name;
    public $Products_id;
    public function insertProducts($name, $status, $guarantee, $video, $price, $category_id, $short_details, $products_details, $avatar_name, $img_video_name)
    {
        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO  products(`name`, `status`, `guarantee`, `video`, `price`, `category_id`, `short_details`, `details`, `avatar_products`, `img_video`)
        VALUES(:name, :status, :guarantee, :video, :price, :category_id, :short_details, :details, :avatar_products, :img_video)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':name' => $name,
            ':status' => $status,
            ':guarantee' => $guarantee,
            ':video' => $video,
            ':price' => $price,
            ':category_id' => $category_id,
            ':short_details' => $short_details,
            ':details' => $products_details,
            ':avatar_products' => $avatar_name,
            ':img_video' => $img_video_name,

        ];
        // B4: Thực thi

        try {
            $is_insert = $obj_insert->execute($inserts);
            $this->Products_id = $this->connection->lastInsertId();
            return $is_insert;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Tên Sản Phẩm đã tồn tại.";
            }
        }
    }
    public function getAll($page, $limit)
    {

        $sql_select_all = "SELECT * FROM products  ORDER BY created_at DESC LIMIT $page,$limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);



        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function search($name, $sortname, $sorttime, $category)
    {

        $sql_select_all = "SELECT * FROM products WHERE ";

        if (!empty($name) && !empty($category)) {
            $sql_select_all .= "  (name LIKE '%$name%' AND category_id = $category)";
        } else if (!empty($name)) {
            $sql_select_all .= "  name LIKE '%$name%'";
        } else if (!empty($category)) {
            $sql_select_all .= "  category_id = $category";
        }

        if (!empty($sortname) && !empty($sorttime)) {
            $sql_select_all .= " ORDER BY created_at $sorttime, name $sortname";
        } else if (!empty($sortname)) {
            $sql_select_all .= " ORDER BY name $sortname";
        } else if (!empty($sorttime)) {
            $sql_select_all .= " ORDER BY created_at $sorttime";
        }


        $obj_select_all = $this->connection->prepare($sql_select_all);


        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function searchName($name)
    {

        $sql_select_all = "SELECT * FROM products WHERE name LIKE '%$name%'";




        $obj_select_all = $this->connection->prepare($sql_select_all);


        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        $list_name = [];
        // lấy ra mảng chỉ có tên
        foreach ($products as $item) {
            $list_name[] = $item["name"];
        }



        // lọc tên trùng
        // $list_name = array_unique($list_name);
        return json_encode($list_name);
    }
    public function searchCategory($category)
    {

        $sql_select_all = "SELECT * FROM list_products WHERE  listproducts LIKE '%$category%'";




        $obj_select_all = $this->connection->prepare($sql_select_all);


        $obj_select_all->execute();
        $listproducts = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        $list_products = [];
        // lấy ra mảng chỉ có birthday
        foreach ($listproducts as $item) {
            $list_products[] = $item["listproducts"];
        }
        return json_encode($list_products);
    }



    public function getById($id)
    {
        $sql_select_one = "SELECT * FROM products WHERE id = :id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];

        $obj_select_one->execute($selects);
        $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    public function update($id)
    {
        $obj_update = $this->connection->prepare("UPDATE products SET `name` = :name,`guarantee` = :guarantee, `status` = :status, `video` = :video, `img_video` = :img_video, `avatar_products` = :avatar_products, `price` = :price, `short_details` = :short_details, `category_id` = :category_id, `details` = :details WHERE id = $id");

        $update = [
            ':name' => $this->name,
            ':guarantee' => $this->guarantee,
            ':status' => $this->status,
            ':video' => $this->video,
            ':img_video' => $this->img_video_name,
            ':avatar_products' => $this->avatar_name,
            ':price' => $this->price,
            ':short_details' => $this->short_details,
            ':category_id' => $this->category_id,
            ':details' => $this->products_details,
        ];

        try {
            $obj_update->execute($update);
            return $obj_update;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Tên Sản Phẩm đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM products WHERE id = $id");
        $is_delete = $obj_delete->execute();


        return $is_delete;
    }
    // đếm tổng số employee hiển thị
    public function countTotal()
    {
        $sql_select_all = "SELECT COUNT(*) FROM products ";
        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }
}
