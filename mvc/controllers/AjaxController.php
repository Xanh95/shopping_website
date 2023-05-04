<?php
require_once 'controllers/Controller.php';
require_once 'models/Employee.php';
require_once 'models/Products.php';
require_once 'models/Listproducts.php';
require_once 'models/Post.php';

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
    public function searchAutoTitle()
    {

        $name = $_POST['name'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $post_model = new Post();
        $posts = $post_model->searchTitle($name);

        print_r($posts);

        return json_encode($posts);
    }
    public function searchAutoNameProduct()
    {

        $name = $_POST['name_product'];




        // -controller gọi models để lấy dữ liệu các bộ phận
        $products_model = new Products();
        $products = $products_model->searchName($name);
        print_r($products);



        return json_encode($products);
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
    public function searchAutoCategory()
    {

        $category = $_POST['category'];



        // -controller gọi models để lấy dữ liệu các bộ phận
        $categorys_model = new Listproducts();
        $categorys = $categorys_model->searchCategory($category);

        print_r($categorys);

        return json_encode($categorys);
    }
}
