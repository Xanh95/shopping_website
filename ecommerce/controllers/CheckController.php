<?php
//controllers/UserController.php
// Nhúng file đi từ file index gốc
require_once 'controllers/Controller.php';
require_once 'models/User.php';


class CheckController extends Controller
{

    public function login()
    {

        //nếu user đã đăng nhập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
        if (isset($_SESSION['user']) && ($_SESSION['role'] <= 4)) {
            header('Location: ../administrator/congratulate');
            exit();
        }

        if (isset($_POST['login-system'])) {
            //            die;
            $email = $_POST['email'];
            //do password đang lưu trong CSDL sử dụng cơ chế mã hóa nên cần phải thêm
            //            hàm  cho password
            $password = $_POST['password'];
            //validate
            if (empty($email) || empty($password)) {
                $this->error = 'Email hoặc password không được để trống';
            } elseif (strlen($password) < 8) {
                $this->error = 'Mật khẩu không ít hơn 8 ký tự';
            }

            $employee_model = new User();
            if (empty($this->error)) {
                $employee = $employee_model->getEmployee($email);
                if (empty($employee)) {
                    $this->error = 'Email ko tồn tại';
                } else {
                    // + Dùng hàm sau để kiểm tra xem mật
                    //khẩu mã hóa có đúng với mật khẩu từ
                    //form gửi lên hay ko
                    // Hàm này chỉ có tác dụng với các mật
                    //khẩu đc mã hóa bằng hàm password_hash

                    $is_same_password = password_verify($password, $employee['password']);
                    if ($is_same_password && ($employee['role'] <= 4)) {
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        //tạo session user để xác định user nào đang login
                        $_SESSION['user'] = $employee['name'];
                        $_SESSION['role'] = $employee['role'];
                        $_SESSION['id'] = $employee['id'];
                        $_SESSION['email'] = $employee['email'];
                        $_SESSION['password'] = $employee['password'];
                        if ($employee['role'] == 1) {
                            $_SESSION['role'] = 0;
                        }
                        header("Location: ../administrator/congratulate");
                        exit();
                    } else {
                        $this->error = 'Sai tài khoản hoặc mật khẩu';
                    }
                }
            }
        }
        $this->page_title = 'Trang Đăng Nhập Hệ Thống';

        require_once 'views/layouts/login-system.php';
    }
}