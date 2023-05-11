<?php
//controllers/HomeController.php
// Nhúng file đi từ file index gốc
require_once 'controllers/Controller.php';
require_once 'models/Listproducts.php';
require_once 'models/Home.php';
require_once 'models/Products.php';
require_once 'models/Imgproducts.php';
require_once 'models/Post.php';
require_once 'models/User.php';
require_once 'models/Oder.php';



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
    public function confirmCart()
    {
        $code_oder = "ĐH" . time();
        $_SESSION['code_oder'] = $code_oder;
        //- Controller gọi View
        $this->page_title = 'Trang Xác Nhận Giỏ Hàng';
        $this->content =
            $this->render('views/products/confirm_cart.php');
        require_once 'views/layouts/products.php';
    }
    public function confirmPay()
    {
        if (!isset($_SESSION['code_oder'])) {
            $_SESSION['error'] = "hãy chọn sản phẩm và xác nhận giỏ hàng";
            header("Location: ../home/index");
            exit();
        }
        if (empty($_SESSION['cart'])) {
            $_SESSION['error'] = "hãy chọn sản phẩm và xác nhận giỏ hàng";
            header("Location: ../home/index");
            exit();
        }
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['id'];
            $user_model = new User();
            $address = $user_model->getUserAdress($id);
        }
        $user_id = '';
        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
        }
        if (isset($_POST['confirm-pay'])) {
            if (!isset($_POST['method-pay'])) {
                $this->error = 'Phải Chọn Phương Thức Thanh Toán';
            }
            if (isset($_POST['method-pay'])) {
                $method_pay = $_POST['method-pay'];
            }
            if (!isset($_POST['ship-address'])) {
                $name = $_POST['input-name-recipient'];
                $phone = $_POST['input-phone-recipient'];
                $city = $_POST['input-city-recipient'];
                $district = $_POST['input-district-recipient'];
                $address_recipient = $_POST['input-address-recipient'];
                $note = $_POST['note'];
                if (empty($name)) {
                    $this->error = 'Phải nhập tên người nhận';
                } elseif (empty($phone)) {
                    $this->error = 'Phải Nhập số điện thoại';
                } elseif (strlen($phone) < 9) {
                    $this->error = 'Số Điện Thoại ít nhất 9 chữ số';
                } elseif (empty($city)) {
                    $this->error = 'Phải Nhập Tên Tỉnh/Thành Phố';
                } elseif (empty($district)) {
                    $this->error = 'Phải Nhập tên Quận/Huyện';
                } elseif (empty($address_recipient)) {
                    $this->error = 'Phải Nhập Địa Chỉ Người Nhận';
                }
                if (empty($this->error)) {
                    $Oder_model = new Oder();
                    $status = 1;
                    $code_oder = $_SESSION['code_oder'];
                    $total_pay = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $product_id = $item['id_products'];
                        $product_model = new Products;
                        $product = $product_model->getById($product_id);
                        $quantity = $item['quantity'];
                        $price = $product['price'];
                        $total_pay += ($quantity * $price);
                    }
                    $is_insert_oder_detail = false;
                    $is_insert = $Oder_model->insertOder($name, $city, $phone, $district, $address_recipient, $note, $status, $code_oder, $total_pay, $method_pay, $user_id);
                    foreach ($_SESSION['cart'] as $item) {
                        $product_id = $item['id_products'];
                        $product_model = new Products;
                        $product = $product_model->getById($product_id);
                        $name_product = $item['name'];
                        $quantity = $item['quantity'];
                        $price = $product['price'];
                        $avatar = $item['avatar'];
                        $total_pay += ($quantity * $price);
                        $is_insert_oder_detail = $Oder_model->insertOderDetail($product_id, $quantity, $code_oder, $name_product, $price, $avatar);
                    }

                    if ($is_insert && $is_insert_oder_detail) {
                        $_SESSION['success'] = 'Đặt hàng thành công. Cám Ơn Bạn Đã Ủng Hộ';
                        unset($_SESSION['cart']);
                        unset($_SESSION['total_quantity']);
                        unset($_SESSION['code_oder']);
                        unset($_SESSION['total_price']);
                        header('Location: ../home/thanks');
                        exit();
                    } else {
                        $this->error = 'Thêm mới thất bại';
                    }
                }
            }
            if (isset($_POST['ship-address'])) {
                $id_address = $_POST['ship-address'];
                $address_user_pick = $user_model->getUserAdressById($id_address);
                $name = $address_user_pick['name'];
                $city = $address_user_pick['city'];
                $phone = $address_user_pick['phone'];
                $district = $address_user_pick['district'];
                $address_recipient = $address_user_pick['address'];
                $note = $_POST['note'];
                if (empty($this->error)) {
                    $Oder_model = new Oder();
                    $status = 1;
                    $code_oder = $_SESSION['code_oder'];
                    $total_pay = $_SESSION['total_price'];
                    $is_insert = $Oder_model->insertOder($name, $city, $phone, $district, $address_recipient, $note, $status, $code_oder, $total_pay, $method_pay, $user_id);
                    $is_insert_oder_detail = false;
                    foreach ($_SESSION['cart'] as $item) {
                        $product_id = $item['id_products'];
                        $name_product = $item['name'];
                        $quantity = $item['quantity'];
                        $price = $item['price'];
                        $avatar = $item['avatar'];
                        $is_insert_oder_detail = $Oder_model->insertOderDetail($product_id, $quantity, $code_oder, $name_product, $price, $avatar);
                    }
                    if ($is_insert && $is_insert_oder_detail) {
                        $_SESSION['success'] = 'Đặt hàng thành công. Cám Ơn Bạn Đã Ủng Hộ';
                        unset($_SESSION['cart']);
                        unset($_SESSION['total_quantity']);
                        unset($_SESSION['code_oder']);
                        unset($_SESSION['total_price']);
                        header('Location: ../home/thanks');
                        exit();
                    } else {

                        $this->error = 'Thêm mới thất bại';
                    }
                }
            }
        }
        //- Controller gọi View
        $this->page_title = 'Trang Xác Nhận Thanh toán';
        if (isset($_SESSION['user'])) {
            $this->content =
                $this->render('views/products/confirm_pay.php', [
                    'address' => $address,
                ]);
        } else {
            $this->content =
                $this->render('views/products/confirm_pay.php');
        }

        require_once 'views/layouts/products.php';
    }
    public function thanks()
    {
        require_once 'views/layouts/products.php';
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
    public function findIDProduct()
    {
        $name = $_POST['name'];
        $product_model = new Products();
        $product = $product_model->findIDProduct($name);

        if (!empty($product)) {
            echo $product['id'];
        } else {
            echo "false";
        }
    }
    public function sanPhamTimThay($curent_page = 1)
    {

        $category = "Sản Phẩm Tìm Thấy";
        $limit = 16;
        $action = "sanPhamTimThay";
        $page = $curent_page;
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $_SESSION['name_seach_products'] = $name;
        }
        $product_name = $_SESSION['name_seach_products'];
        // model
        $products_model = new Products();
        $count_total = $products_model->countTotalProductsWithName($product_name);
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
        $products = $products_model->getAllProductsWithName($page, $limit, $product_name);

        // view
        $this->page_title = 'Trang Tìm kiếm sản phẩm';
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
}
