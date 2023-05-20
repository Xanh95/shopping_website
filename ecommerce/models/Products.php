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
        $sql_select_all = "SELECT * FROM products  ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getAllProducts($page, $limit, $id_product)
    {
        $sql_select_all = "SELECT * FROM products WHERE category_id = $id_product ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getAllPcWork($page, $limit)
    {
        $sql_select_all = "SELECT * FROM products WHERE category_id = 2 ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getAllLaptopGaming($page, $limit)
    {
        $sql_select_all = "SELECT * FROM products WHERE category_id = 6 ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getAllProductsWithName($page, $limit, $product_name)
    {
        $sql_select_all = "SELECT * FROM products WHERE name LIKE :name OR short_details LIKE :name ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->bindValue(':name', '%' . (string)$product_name . '%', PDO::PARAM_STR);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getAllProductsSort($page, $limit)
    {
        if ($_SESSION['sort_price'] == 1) {
            $sort_price = "ASC";
        } else if ($_SESSION['sort_price'] == 2) {
            $sort_price = "DESC";
        } else {
            $sort_price = "";
        }

        if ($_SESSION['sort_products'] == 1) {
            $sort_products = "ASC";
        } else if ($_SESSION['sort_products'] == 2) {
            $sort_products = "DESC";
        } else {
            $sort_products = "";
        }
        $sql_select_all = "SELECT * FROM products WHERE category_id = :category_id  ";
        if ($_SESSION['range'] == 1) {
            $sql_select_all .= "AND price < 10000000";
        } elseif ($_SESSION['range'] == 2) {
            $sql_select_all .= " AND price BETWEEN 10000000 AND 20000000";
        } elseif ($_SESSION['range'] == 3) {
            $sql_select_all .= " AND price BETWEEN 20000000 AND 30000000";
        } elseif ($_SESSION['range'] == 4) {
            $sql_select_all .= " AND price BETWEEN 30000000 AND 40000000";
        } elseif ($_SESSION['range'] == 5) {
            $sql_select_all .= " AND price BETWEEN 40000000 AND 50000000";
        } elseif ($_SESSION['range'] == 6) {
            $sql_select_all .= "AND price >= 50000000";
        }
        if (!empty($sort_products) && !empty($sort_price)) {
            $sql_select_all .= " ORDER BY price $sort_price, created_at $sort_products LIMIT :page,:limit";
        } elseif (!empty($sort_products)) {
            $sql_select_all .= " ORDER BY created_at $sort_products LIMIT :page,:limit";
        } elseif (!empty($sort_price)) {
            $sql_select_all .= " ORDER BY price $sort_price LIMIT :page,:limit";
        } else {
            $sql_select_all .= " LIMIT :page,:limit";
        }

        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->bindValue(':category_id', (string)$_SESSION['id_category'], PDO::PARAM_STR);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function search($name, $sortname, $sorttime, $category)
    {
        $sql_select_all = "SELECT * FROM products  ";
        $selects = array();
        if (!empty($name) && !empty($category)) {
            $sql_select_all .= " WHERE (name LIKE :name AND category_id = :category)";
            $selects[':name'] = "%$name%";
            $selects[':category'] = $category;
        } else if (!empty($name)) {
            $sql_select_all .= " WHERE name LIKE :name";
            $selects[':name'] = "%$name%";
        } else if (!empty($category)) {
            $sql_select_all .= " WHERE category_id = :category";
            $selects[':category'] = $category;
        }
        if (!empty($sortname) && !empty($sorttime)) {
            $sql_select_all .= " ORDER BY  name $sortname, created_at $sorttime";
        } else if (!empty($sortname)) {
            $sql_select_all .= " ORDER BY name $sortname";
        } else if (!empty($sorttime)) {
            $sql_select_all .= " ORDER BY created_at $sorttime";
        }
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute($selects);
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function searchName($name)
    {
        $sql_select_all = "SELECT * FROM products WHERE name LIKE :name";
        $selects = [
            ':name' => "%$name%",
        ];
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute($selects);
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        $list_name = [];
        // lấy ra mảng chỉ có tên
        foreach ($products as $item) {
            $list_name[] = $item["name"];
        }
        return json_encode($list_name);
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
            return $obj_update->execute($update);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Tên Sản Phẩm đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM products WHERE id = :id");
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
    // đếm tổng số products hiển thị
    public function countTotal()
    {
        $sql_select_all = "SELECT COUNT(*) FROM products ";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }
    public function countTotalProducts($id_product)
    {
        $sql_select_all = "SELECT COUNT(*) FROM products WHERE category_id = $id_product";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }
    public function countTotalProductsWithName($name)
    {
        $sql_select_all = "SELECT COUNT(*) FROM products WHERE name LIKE :name OR short_details LIKE :name";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $name = [
            ':name' => "%$name%"
        ];
        $obj_select_all->execute($name);
        return $obj_select_all->fetchColumn();
    }
    public function countTotalProductsSort()
    {
        $sql_select_all = "SELECT COUNT(*) FROM products WHERE category_id = :category_id";
        $selects = [
            ':category_id' => $_SESSION['id_category']
        ];
        if ($_SESSION['range'] == 1) {
            $sql_select_all .= "AND price < 10000000";
        } elseif ($_SESSION['range'] == 2) {
            $sql_select_all .= " AND price BETWEEN 10000000 AND 20000000";
        } elseif ($_SESSION['range'] == 3) {
            $sql_select_all .= " AND price BETWEEN 20000000 AND 30000000";
        } elseif ($_SESSION['range'] == 4) {
            $sql_select_all .= " AND price BETWEEN 30000000 AND 40000000";
        } elseif ($_SESSION['range'] == 5) {
            $sql_select_all .= " AND price BETWEEN 40000000 AND 50000000";
        } elseif ($_SESSION['range'] == 6) {
            $sql_select_all .= "AND price >= 50000000";
        }
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute($selects);
        return $obj_select_all->fetchColumn();
    }
    public function findIDProduct($name)
    {
        $sql_select_all = "SELECT * FROM products WHERE name = :name";
        $obj_select_all = $this->connection
            ->prepare($sql_select_all);
        $selects = [
            ':name' => $name
        ];

        $obj_select_all->execute($selects);
        $oder = $obj_select_all->fetch(PDO::FETCH_ASSOC);
        return $oder;
    }
}
