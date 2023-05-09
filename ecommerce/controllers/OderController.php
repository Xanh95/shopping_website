<?php
require_once 'controllers/Controller.php';
require_once 'models/Oder.php';

class OderController extends Controller
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
            header('Location: ../check/login');
            exit();
        }
    }
    public function index($current_page = 1)
    {
        // -controller gọi models để lấy dữ liệu 
        $page = $current_page;
        $limit = 15;
        $oder_model = new Oder();

        // lấy tổng số bản ghi
        $count_total = $oder_model->countTotal();
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
        $orders = $oder_model->getAllOders($page, $limit);


        // views
        $this->content = $this->render('views/oder/index.php', [
            'orders' => $orders,
            'total_page' => $total_page,
            'page' => $current_page,
            'count_total' => $count_total,
            'limit' => $limit,

        ]);
        require_once 'views/layouts/system.php';
    }
    public function detail($id = "")
    {
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Đơn Hàng không hợp lệ';
            header('Location: ../../oder/index');
            exit();
        }

        // model lay thong tin chi tiet
        $oder_model = new Oder();
        $order = $oder_model->getOderById($id);
        $code = $order['code_oder'];
        $order_detail = $oder_model->getOderByCode($code);


        $detail = $id;
        if (isset($_POST['update_oder'])) {
            $status = $_POST['status'];

            foreach ($_POST as $key => $value) {
                $id = $key;
                $quantity = $value;
                if (is_numeric($id) && is_numeric($quantity)) {

                    if ($quantity < 0) {
                        $quantity = 1;
                    } elseif ($quantity > 99) {
                        $quantity = 99;
                    }
                    $is_update_quantity = $oder_model->updateQuantity($quantity, $id);
                }
            }
            if (empty($status)) {
                $this->error = 'tình trạng thanh toán đơn hàng chưa xác định';
            }

            if (empty($this->error)) {

                $is_update_status = $oder_model->updateStatus($status, $detail);
                if ($is_update_quantity && $is_update_status) {
                    $_SESSION['success'] = "Cập Nhật Đơn Hàng $code Thành Công";
                    header("Location: ../../oder/detail/$detail");
                    exit();
                } else {

                    $this->error = 'Cập Nhật Thất Bại';
                }
            }
        }
        // views
        $this->content = $this->render('views/oder/detail.php', [
            'order_detail' => $order_detail,
            'status' => $order['status'],
            'code_oder' => $code
        ]);
        require_once 'views/layouts/system.php';
    }
    public function deleteProduct($id)
    {
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Sản phẩm trong đơn hàng không hợp lệ';
            header('Location: ../../oder/index');
            exit();
        }
        $oder_model = new Oder();
        $is_delete = $oder_model->deleteProductOder($id);
        if ($is_delete) {
            $_SESSION['success'] = "Xoá Thành Công Sản Phẩm Khỏi Giỏ Hàng";
            header("Location: ../../oder/index");
            exit();
        }
    }
    public function delete($id)
    {
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID  đơn hàng không hợp lệ';
            header('Location: ../../oder/index');
            exit();
        }
        $oder_model = new Oder();
        $is_delete = $oder_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = "Xoá đơn hàng thành công";
            header("Location: ../../oder/index");
            exit();
        }
    }
}
