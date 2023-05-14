<?php
//controllers/UserController.php
// Nhúng file đi từ file index gốc
require_once 'controllers/Controller.php';
require_once 'models/User.php';


class AdministratorController extends Controller
{
    //index.php?controller=administrator&action=congratulate
    public function __construct()
    {

        $controller = isset($_SESSION['controller']) ? $_SESSION['controller'] : 'category';
        $action = isset($_SESSION['action']) ? $_SESSION['action'] : 'index';
        if (isset($_SESSION['controller'])) {
            unset($_SESSION['controller']);
        }
        if (isset($_SESSION['action'])) {
            unset($_SESSION['action']);
        }

        if (!isset($_SESSION['user']) && $controller != 'check' && $action != 'login') {
            $_SESSION['error'] = 'Bạn cần đăng nhập';
            header('Location: ../check/login');
            exit();
        } elseif (!($_SESSION['role'] <= 4)) {
            $_SESSION['error'] = 'Bạn cần đăng nhập';
            header('Location: ../check/login');
            exit();
        }
    }
    public function congratulate()
    {

        $this->page_title = 'Trang Quản Lý Shop';
        $this->content =
            $this->render('views/system/congratulate.php');
        //        var_dump($this->content);
        // + Gọi layout để hiển thị các thông tin trên
        // Layout động
        require_once 'views/layouts/system.php';
    }
    public function logout()
    {

        //        session_destroy();
        $_SESSION = [];
        session_destroy();
        //        unset($_SESSION['user']);
        $_SESSION['success'] = 'Logout thành công';
        header('Location: ../check/login');
        exit();
    }
    public function editpass()
    {

        $id = $_SESSION['id'];
        $user_model = new User();
        if (isset($_POST['editpass'])) {

            $currentpass = $_POST['currentpass'];
            $newpass = $_POST['newpass'];
            $renewpass = $_POST['renewpass'];
            if (empty($currentpass)) {
                $this->error = 'Phải Nhập Mật Khẩu Hiện Tại';
            } elseif (empty($newpass)) {
                $this->error = 'Phải Nhập Mật Khẩu Mới';
            } elseif (strlen($newpass) < 8) {
                $this->error = 'Mật Khẩu Mới ít nhất 8 ký tự';
            } elseif ($newpass !== $renewpass) {
                $this->error = 'Nhập Lại Mật khẩu Mới Không Giống Nhau';
            }
            $is_same_password = password_verify($currentpass, $_SESSION['password']);

            if (!$is_same_password) {
                $this->error = 'Mật Khẩu hiện tại chưa đúng';
            }
            if (empty($this->error) && $is_same_password) {
                $newpass = password_hash($newpass, PASSWORD_BCRYPT);
                $user_model->password = $newpass;
                $is_edit = $user_model->editPass($id);
                if ($is_edit) {

                    header('Location: ../administrator/logout');
                    exit();
                }
                $this->error = 'Sửa mới thất bại';
            }
        }
        // -controller goi view
        $this->page_title = 'Trang Đổi Mật Khẩu';
        $this->content =
            $this->render('views/system/editpass.php');
        require_once 'views/layouts/system.php';
    }
}
