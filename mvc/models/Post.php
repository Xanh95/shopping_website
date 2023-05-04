<?php
// models/Post.php 
require_once 'models/Model.php';
class Post extends Model
{
    public $title;
    public $sale;
    public $avatar_name;
    public function insertPost($title, $sale, $avatar_name)
    {

        // B1: Viết truy vấn dạng tham số:
        $sql_insert = "INSERT INTO  post(`title`, `sale`, `avatar_sale`)
        VALUES(:title, :sale, :avatar_sale)";
        // B2: Cbi obj truy vấn:
        $obj_insert = $this->connection->prepare($sql_insert);
        // B3: Tạo mảng
        $inserts = [
            ':title' => $title,
            ':sale' => $sale,
            ':avatar_sale' => $avatar_name,

        ];
        // B4: Thực thi

        try {
            $is_insert = $obj_insert->execute($inserts);
            return $is_insert;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error'] = "Bài viết đã tồn tại trong cơ sở dữ liệu.";
            }
        }
    }
    // đếm tổng số employee hiển thị
    public function countTotal()
    {
        $sql_select_all = "SELECT COUNT(*) FROM post ";
        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();
        return $obj_select_all->fetchColumn();
    }
    public function getAll($page, $limit)
    {

        $sql_select_all = "SELECT * FROM post  ORDER BY created_at DESC LIMIT :page,:limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $obj_select_all->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $obj_select_all->execute();
        $posts = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    public function getById($id)
    {
        $sql_select_one = "SELECT * FROM post WHERE id = :id";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];

        $obj_select_one->execute($selects);
        $post = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $post;
    }
    public function update($id)
    {
        $obj_update = $this->connection->prepare("UPDATE post SET `title` = :title,`avatar_sale` = :avatar_name, `sale` = :sale WHERE id = :id");

        $update = [
            ':title' => $this->title,
            ':avatar_name' => $this->avatar_name,
            ':sale' => $this->sale,
            ':id' => $id,
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
            ->prepare("DELETE FROM post WHERE id = :id");
        $obj_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $is_delete = $obj_delete->execute();


        return $is_delete;
    }
    public function search($name, $sortname, $sorttime)
    {
        $name = strval($name);
        $sql_select_all = "SELECT * FROM post  ";
        $selects = array();
        if (!empty($name)) {
            $sql_select_all .= " WHERE title LIKE :name";
            $selects[':name'] = "%$name%";
        }

        if (!empty($sortname) && !empty($sorttime)) {
            $sql_select_all .= " ORDER BY created_at $sorttime, title $sortname";
        } else if (!empty($sortname)) {
            $sql_select_all .= " ORDER BY title $sortname";
        } else if (!empty($sorttime)) {
            $sql_select_all .= " ORDER BY created_at $sorttime";
        }


        $obj_select_all = $this->connection->prepare($sql_select_all);


        $obj_select_all->execute($selects);
        $posts = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    public function searchTitle($name)
    {

        $sql_select_all = "SELECT * FROM post WHERE  title LIKE :name";




        $obj_select_all = $this->connection->prepare($sql_select_all);

        $selects = [

            ':name' => "%$name%",

        ];
        $obj_select_all->execute($selects);
        $posts = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        $list_name = [];
        // lấy ra mảng chỉ có tên
        foreach ($posts as $item) {
            $list_name[] = $item["title"];
        }
        // lọc tên trùng
        $list_name = array_unique($list_name);
        return json_encode($list_name);
    }
}
