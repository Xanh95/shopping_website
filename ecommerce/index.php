<?php

session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');


function UrlProcess()
{
    if (isset($_GET["url"])) {
        return explode("/", filter_var(trim($_GET["url"], "/")));
    }
}
$arr = UrlProcess();
if (isset($_GET['vnp_Amount'])) {
    $vnpay = [
        'vnp_Amount' => $_GET['vnp_Amount'],
        'vnp_BankCode' => $_GET['vnp_BankCode'],
        'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
        'vnp_CardType' => $_GET['vnp_CardType'],
        'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
        'vnp_PayDate' => $_GET['vnp_PayDate'],
        'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
        'vnp_TmnCode' => $_GET['vnp_TmnCode'],
        'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
        'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
        'vnp_TxnRef' => $_GET['vnp_TxnRef'],
        'vnp_SecureHash' => $_GET['vnp_SecureHash'],
    ];
    require_once "controllers/HomeController.php";
    $obj = new HomeController();
    $obj_action = $obj->order_paid($vnpay);
};


// + Phân tích url để lấy giá trị của controller và action
// index.php?controller=user&action=create
$controller = !empty($arr) ? $arr[0] :
    'home';
$action = isset($arr[1]) ? $arr[1] : 'index';
if (isset($arr[0])) {
    $_SESSION['controller'] = $arr[0];
}
if (isset($arr[1])) {
    $_SESSION['action'] = $arr[1];
}




// unset

unset($arr[0]);
unset($arr[1]);
$variables = $arr ? array_values($arr) : [];


// + Biến đổi controller thành tên file controller tương ứng

$controller = ucfirst($controller);
$controller .= "Controller";

// index.php?controller=user&action=create
// + Nhúng đường dẫn tới file controller tương ứng:

$controller_path = "controllers/$controller.php";
//var_dump($controller_path); //controllers/AdministratorController.php

if (!file_exists($controller_path)) {
    $controller = "HomeController";
    // die('Trang bạn tìm không tồn tại - 404');
}
require_once "controllers/$controller.php";


if (!method_exists($controller, $action)) {
    $controller = "HomeController";
    require_once "controllers/$controller.php";
    $action = "index";
    // die("Phương thức $action ko tồn tại trong class $controller");
}

$obj = new $controller();
call_user_func_array([$obj, $action], $variables);
