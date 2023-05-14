<?php
require_once 'controllers/Controller.php';
require_once 'models/Employee.php';
require_once 'models/Products.php';
require_once 'models/Listproducts.php';
require_once 'models/Post.php';
require_once 'models/Oder.php';
require_once 'models/User.php';
require_once 'models/Vnpay.php';

class AjaxController extends Controller
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
    public function searchEmployee()
    {

        $name = $_POST['name'];
        $sortname = $_POST['sortname'];
        $sorttime = $_POST['sorttime'];
        $birthday = $_POST['birthday'];

        if ($sorttime == 1) {

            $sorttime = "DESC";
        } elseif ($sorttime == 2) {
            $sorttime = "ASC";
        } else {
            $sorttime = "";
        }
        if ($sortname == 2) {

            $sortname = "DESC";
        } elseif ($sortname == 1) {
            $sortname = "ASC";
        } else {
            $sortname = "";
        }


        // -controller gọi models để lấy dữ liệu các bộ phận
        $employee_model = new Employee();
        $employees = $employee_model->search($name, $sortname, $sorttime, $birthday);

        //view
        $this->content =  $this->render('views/employee/search.php', ['employees' => $employees]);
        require_once 'views/layouts/result.php';
    }
    public function searchUser()
    {

        $name = $_POST['name'];

        $birthday = $_POST['birthday'];




        // -controller gọi models để lấy dữ liệu các bộ phận
        $user_model = new User();
        $users = $user_model->search($name, $birthday);

        //view
        $this->content =  $this->render('views/users/search.php', ['users' => $users]);
        require_once 'views/layouts/result.php';
    }
    public function searchProducts()
    {

        $name = $_POST['name'];
        $sortname = $_POST['sortname'];
        $sorttime = $_POST['sorttime'];
        $category = $_POST['category'];
        // -controller gọi models để lấy dữ liệu danh mục
        $listproducts_model = new Listproducts();
        $listproducts = $listproducts_model->getAll();


        foreach ($listproducts as $values) {
            if ($values['listproducts'] == $category) {
                $category = $values['id'];
                break;
            }
        }

        if ($sorttime == 1) {

            $sorttime = "DESC";
        } elseif ($sorttime == 2) {
            $sorttime = "ASC";
        } else {
            $sorttime = "";
        }
        if ($sortname == 2) {

            $sortname = "DESC";
        } elseif ($sortname == 1) {
            $sortname = "ASC";
        } else {
            $sortname = "";
        }


        // -controller gọi models để lấy dữ liệu các bộ phận
        $products_model = new Products();
        $products = $products_model->search($name, $sortname, $sorttime, $category);

        //view
        $this->content =  $this->render('views/products/search.php', ['products' => $products, 'listproducts' => $listproducts]);
        require_once 'views/layouts/result.php';
    }
    public function searchOders()
    {

        $code_oder = $_POST['code_oder'];
        $status = $_POST['status'];
        $name = $_POST['user_name'];

        // -controller gọi models để lấy dữ liệu các bộ phận
        $oder_model = new Oder();
        $orders = $oder_model->search($name, $code_oder, $status);

        //view
        $this->content =  $this->render('views/oder/search.php', ['orders' => $orders]);
        require_once 'views/layouts/result.php';
    }
    public function searchVnpay()
    {
        $code_oder = $_POST['code_oder'];
        // -controller gọi models để lấy dữ liệu các bộ phận
        $vnpay_model = new Vnpay();
        $vnpay = $vnpay_model->search($code_oder);

        //view
        $this->content =  $this->render('views/vnpay/search.php', ['vnpay' => $vnpay]);
        require_once 'views/layouts/result.php';
    }
    public function searchSales()
    {

        $name = $_POST['title'];
        $name = strval($name);
        $sortname = $_POST['sortname'];
        $sorttime = $_POST['sorttime'];

        if ($sorttime == 1) {

            $sorttime = "DESC";
        } elseif ($sorttime == 2) {
            $sorttime = "ASC";
        } else {
            $sorttime = "";
        }
        if ($sortname == 2) {

            $sortname = "DESC";
        } elseif ($sortname == 1) {
            $sortname = "ASC";
        } else {
            $sortname = "";
        }


        // -controller gọi models để lấy dữ liệu các bộ phận
        $posts_model = new Post();
        $posts = $posts_model->search($name, $sortname, $sorttime);

        //view
        $this->content =  $this->render('views/post/search.php', ['posts' => $posts]);
        require_once 'views/layouts/result.php';
    }
    public function searchAutoName()
    {

        $name = $_POST['name'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $employee_model = new Employee();
        $employees = $employee_model->searchName($name);

        print_r($employees);

        return json_encode($employees);
    }
    public function searchAutoUserName()
    {

        $name = $_POST['name'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $user_model = new User();
        $users = $user_model->searchUserName($name);

        print_r($users);

        return json_encode($users);
    }
    public function searchAutoCode()
    {

        $code = $_POST['code'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $oder_model = new Oder();
        $oders = $oder_model->searchCode($code);

        print_r($oders);

        return json_encode($oders);
    }
    public function searchAutoOderUserName()
    {

        $user_name = $_POST['name'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $oder_model = new Oder();
        $oders = $oder_model->searchOderUserName($user_name);

        print_r($oders);

        return json_encode($oders);
    }
    public function searchAutoTitle()
    {

        $name = $_POST['name'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $post_model = new Post();
        $posts = $post_model->searchTitle($name);

        print_r($posts);

        return json_encode($posts);
    }

    public function searchAutoBirthDay()
    {

        $birthday = $_POST['birthday'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $employee_model = new Employee();
        $employees = $employee_model->searchBirthDay($birthday);

        print_r($employees);

        return json_encode($employees);
    }
    public function searchAutoUserBirthDay()
    {

        $birthday = $_POST['birthday'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $user_model = new User();
        $users = $user_model->searchUserBirthDay($birthday);

        print_r($users);

        return json_encode($users);
    }
    public function searchAutoCategory()
    {

        $category = $_POST['category'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $categorys_model = new Listproducts();
        $categorys = $categorys_model->searchCategory($category);

        print_r($categorys);

        return json_encode($categorys);
    }
    public function findIDOder()
    {
        $code = $_POST['code'];
        $oder_model = new Oder();
        $oder = $oder_model->findIDOder($code);

        echo $oder['id'];
    }
}
