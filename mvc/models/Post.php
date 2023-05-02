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

        $sql_select_all = "SELECT * FROM post  ORDER BY created_at DESC LIMIT $page,$limit";
        $obj_select_all = $this->connection->prepare($sql_select_all);



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
        $obj_update = $this->connection->prepare("UPDATE post SET `title` = :title,`avatar_sale` = :avatar_name, `sale` = :sale WHERE id = $id");

        $update = [
            ':title' => $this->title,
            ':avatar_name' => $this->avatar_name,
            ':sale' => $this->sale
            
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
            ->prepare("DELETE FROM post WHERE id = $id");
        $is_delete = $obj_delete->execute();


        return $is_delete;
    }
}