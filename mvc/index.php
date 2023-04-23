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
$controller = isset($arr[0]) ? $arr[0] :
    'administrator';
$action = isset($arr[1]) ? $arr[1] : 'trangchu';
// create
//var_dump($controller); //user
//var_dump($action); //create
// + Biến đổi controller thành tên file controller tương ứng
// user -> UserController
$controller = ucfirst($controller); //User
$controller .= "Controller"; // UserController
//var_dump($controller); //UserController
// index.php?controller=user&action=create
// + Nhúng đường dẫn tới file controller tương ứng:
// Trong MVC luôn luôn phải tư duy đứng từ file index gốc để
//nhúng các file khác
$controller_path = "controllers/$controller.php";
//var_dump($controller_path); //controllers/UserController.php

if (!file_exists($controller_path)) {
    die('Trang bạn tìm không tồn tại - 404');
}
require_once $controller_path;
// + Do file controller chứa 1 class controller bên trong, nên
//cần khởi tạo đối tượng từ class trên
$obj = new $controller(); // $obj = new UserController()
// + Dùng obj trên truy cập phương thức $action tương ứng
// action trên url chính là tên phương thức tương ứng của class
// index.php?controller=user&action=create
if (!method_exists($obj, $action)) {
    die("Phương thức $action ko tồn tại trong class $controller");
}

$obj->$action();
