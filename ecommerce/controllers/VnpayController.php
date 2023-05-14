<?php
require_once 'controllers/Controller.php';
require_once 'models/Vnpay.php';

class VnpayController extends Controller
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
    public function index($curent_page = 1)
    {
        $limit = 10;
        $page = $curent_page;
        // -controller gọi models để lấy dữ liệu 
        $vnpay_model = new Vnpay();
        // lấy tổng số bản ghi
        $count_total = $vnpay_model->countTotal();
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
        // lấy danh sách vnpay
        $vnpay = $vnpay_model->getAll($page, $limit);


        // - Controller gọi View
        $this->page_title = 'Trang Danh Sách Sản Phẩm';
        $this->content =
            $this->render('views/vnpay/index.php', [
                'vnpay' => $vnpay,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,

            ]);
        require_once 'views/layouts/system.php';
    }
}
