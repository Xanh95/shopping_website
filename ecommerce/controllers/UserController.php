<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';


class UserController extends Controller
{
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
            header('Location: ../../check/login');
            exit();
        }
    }
    public function index($curent_page = 1)
    {

        $limit = 10;
        $page = $curent_page;


        // -controller gọi models để lấy dữ liệu 

        $user_model = new User();
        // lấy tổng số bản ghi
        $count_total = $user_model->countTotal();

        $total_page = ceil($count_total / $limit);
        if ($page < 1) {
            $page = 1;
        } elseif ($page > $total_page) {
            $page = $total_page;
        }
        $page = ($page - 1) * $limit;
        if ($page < 0) {
            $page = 0;
        }
        // lấy danh sách Sản Phẩm
        $users = $user_model->getAll($page, $limit);


        // - Controller gọi View
        $this->page_title = 'Trang Danh Sách Khách Hàng';
        $this->content =
            $this->render('views/users/index.php', [
                'users' => $users,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,

            ]);
        require_once 'views/layouts/system.php';
    }
    public function update($id = '')
    {
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Khách hàng không hợp lệ';
            header('Location: ../user/index');
            exit();
        }
        $user_id = $id;
        $user_model = new User();
        $user = $user_model->getById($user_id);

        if (empty($user)) {
            $_SESSION['error'] = 'Khách Hàng không tồn tại';
            header('Location: ../../user/index');
            exit();
        }
        // xử lý submit
        if (isset($_POST['update_user'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];

            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $password = $_POST['password'];
            if (empty($name)) {
                $this->error = 'phải nhập họ tên';
            } elseif (strlen($name) < 3) {
                $this->error = 'tên phải dài hơn 3 ký tự';
            } elseif (!empty($birthday)) {
                if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/\d{4}$/', $birthday)) {
                    $this->error = 'Ngày sinh không đúng định dạng ngày/tháng/năm dd/mm/yyyy.';
                }
            } elseif (empty($phone)) {
                $this->error = 'phải nhập số điện thoại';
            } elseif (strlen($phone) < 9) {
                $this->error = 'phải nhập số điện thoại ít nhất 9 số';
            } elseif (!empty($password)) {
                if (strlen($password) < 8) {
                    $this->error = 'mật khẩu ít nhất 8 ký tự';
                }
            } elseif (empty($gender)) {
                $this->error = 'phải chọn giới tính';
            }
            if (empty($this->error)) {
                $user_model = new User();
                $user_model->name = $name;
                $user_model->phone = $phone;
                $user_model->new_birthday = $birthday;
                $user_model->gender = $gender;
                $is_update = $user_model->upDateInfo($user_id);
                $is_edit_pass = true;
                if (!empty($password)) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $user_model->password = $password;
                    $is_edit_pass = $user_model->upDatePass($user_id);
                }
                if ($is_update && $is_edit_pass) {
                    $_SESSION['success'] = 'Sửa Thông Khách Hàng ' . $user['name'] . ' Thông Tin Thành Công';
                    header("Location: ../../user/update/$user_id");
                    exit();
                } else {
                    $this->error = 'Sửa Thông Khách Hàng ' . $user['name'] . ' Thông Tin Thất Bại';
                }
            }
        }
        // - Controller gọi View
        $this->page_title = 'Trang Sửa Thông Tin KH';
        $this->content =
            $this->render('views/users/update.php', ['users' => $user]);
        require_once 'views/layouts/system.php';
    }
    public function delete($id = "")
    {

        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Khách Hàng không hợp lệ';
            header('Location: ../user/index');
            exit();
        }

        $user_id = $id;
        $user_model = new User();
        $user = $user_model->getById($user_id);
        if ($_SESSION['role'] > 3) {
            $_SESSION['error'] = 'Bạn không có quyền xoá người này';
            header('Location: ../../administrator/congratulate');
            exit();
        }
        $is_delete = $user_model->delete($user_id);

        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: ../../user/index');
        exit();
    }
}
