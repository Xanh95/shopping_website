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


// + Phân tích url để lấy giá trị của controller và action
// index.php?controller=user&action=create
$controller = !empty($arr) ? $arr[0] :
    'administrator';
$action = isset($arr[1]) ? $arr[1] : 'congratulate';
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
    // header('Location: ../check/login');
    // exit();
    die('Trang bạn tìm không tồn tại - 404');
}
require_once "controllers/$controller.php";


if (!method_exists($controller, $action)) {
    // header('Location: ../../check/login');
    // exit();
    die("Phương thức $action ko tồn tại trong class $controller");
}

$obj = new $controller();
call_user_func_array([$obj, $action], $variables);