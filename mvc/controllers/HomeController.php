<?php
//controllers/HomeController.php
// Nhúng file đi từ file index gốc
require_once 'controllers/Controller.php';
require_once 'models/Listproducts.php';
require_once 'models/Home.php';
require_once 'models/Products.php';
require_once 'models/Imgproducts.php';
require_once 'models/Post.php';



class HomeController extends Controller
{
    public function index()
    {
        // -controller goij Models
        $home_models = new Home();
        $pc_gaming = $home_models->getNewPcGaming();
        $laptop_gaming = $home_models->getNewLaptopGaming();
        $gear = $home_models->getNewGear();
        $seen = $home_models->getNewSeen();
        $post = $home_models->getNewPost();

        // -controller goi view
        $this->page_title = 'Trang Chủ Green Home';
        $this->content =
            $this->render('views/home/index.php', [
                'pc_gaming' => $pc_gaming,
                'laptop_gaming' => $laptop_gaming,
                'gear' => $gear,
                'seen' => $seen,
                'post' => $post,
            ]);
        require_once 'views/layouts/home.php';
    }
    public function product($id = "")
    {
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Sản phẩm không hợp lệ';
            header('Location: ../../home/index');
            exit();
        }
        $product_model = new Products();
        $product = $product_model->getById($id);

        if (!$product) {
            $_SESSION['error'] = 'ID Sản phẩm không Tồn tại';
            header('Location: ../../home/index');
            exit();
        }
        $imgs_product_model = new Imgproducts();
        $imgs_product = $imgs_product_model->getAll($id);
        // echo "<pre>";
        // print_r($imgs_product);
        // print_r($product);


        // echo "</pre>";
        // -controller goi view
        $this->page_title = 'Trang Chi Tiết Sản Phẩm ';
        $this->content =
            $this->render('views/products/info-product.php', [
                'product' => $product,
                'imgs_product' => $imgs_product
            ]);
        require_once 'views/layouts/products.php';
    }
    public function khuyenmai($id = "")
    {
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Bài Viết không hợp lệ';
            header('Location: ../home/index');
            exit();
        }
        $post_model = new Post();
        $post = $post_model->getById($id);

        if (!$post) {
            $_SESSION['error'] = 'ID Bài Viết không Tồn tại';
            header('Location: ../../home/index');
            exit();
        }


        // -controller goi view
        $this->page_title = 'Trang Chi Tiết Sản Phẩm ';
        $this->content =
            $this->render('views/post/info-post.php', [
                'post' => $post,

            ]);
        require_once 'views/layouts/products.php';
    }
    public function pcgaming($curent_page = 1)
    {
        $id_product = 1;
        $action = "pcgaming";
        $category = "PC Gaming";
        $limit = 16;
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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

        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Pc Gaming ';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function pcwork($curent_page = 1)
    {
        $id_product = 2;
        $category = "PC Đồ Hoạ";
        $limit = 16;
        $action = "pcwork";
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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
        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Pc Đồ Hoạ';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function laptopgaming($curent_page = 1)
    {
        $id_product = 6;
        $category = "Laptop Gaming";
        $limit = 16;
        $action = "laptopgaming";
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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
        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Laptop Gaming';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function laptopvp($curent_page = 1)
    {
        $id_product = 7;
        $category = "Laptop Văn Phòng";
        $limit = 16;
        $action = "laptopvp";
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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
        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Laptop Văn Phòng ';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function banphim($curent_page = 1)
    {
        $id_product = 8;
        $category = "Bàn Phím";
        $limit = 16;
        $action = "banphim";
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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
        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Bàn Phím';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function manhinh($curent_page = 1)
    {
        $id_product = 9;
        $category = "Màn Hình";
        $limit = 16;
        $action = "manhinh";
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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
        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Màn Hình';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function chuot($curent_page = 1)
    {
        $id_product = 10;
        $category = "Chuột Gaming";
        $limit = 16;
        $action = "chuot";
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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
        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Chuột Gaming';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function ghe($curent_page = 1)
    {
        $id_product = 11;
        $category = "Ghế Gaming";
        $limit = 16;
        $action = "ghe";
        $page = $curent_page;
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProducts($id_product);

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
        $products = $products_model->getAllProducts($page, $limit, $id_product);

        // view
        $this->page_title = 'Trang Ghế Gaming';
        $this->content =
            $this->render('views/products/showproducts.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
    public function sale($curent_page = 1)
    {

        $category = "Khuyến Mãi";
        $limit = 16;
        $action = "sale";
        $page = $curent_page;
        // model
        $post_model = new Post();
        $count_total = $post_model->countTotal();

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
        $posts = $post_model->getAll($page, $limit);

        // view
        $this->page_title = 'Trang Khuyến Mãi';
        $this->content =
            $this->render('views/post/showpost.php', [
                'post' => $posts,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'category' => $category,
                'action' => $action

            ]);
        require_once 'views/layouts/products.php';
    }
}
