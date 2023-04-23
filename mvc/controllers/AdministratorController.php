<?php
//controllers/UserController.php
// Nhúng file đi từ file index gốc
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class AdministratorController extends Controller
{
    //index.php?controller=user&action=create
    public function trangchu()
    {
        $this->page_title = 'Trang Quản Lý Shop';
        $this->content =
            $this->render('views/system/congratulate.php');
        //        var_dump($this->content);
        // + Gọi layout để hiển thị các thông tin trên
        // Layout động
        require_once 'views/layouts/system.php';
    }
}
