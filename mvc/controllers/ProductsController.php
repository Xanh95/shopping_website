<?php
require_once 'controllers/Controller.php';
require_once 'models/Products.php';
require_once 'models/Listproducts.php';
require_once 'models/Imgproducts.php';

class ProductsController extends Controller
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
    //index.php?controller=products&action=create
    public function create()
    {
        $post = "";
        if (isset($_POST['create_products'])) {
            $name = $_POST['products_name'];
            $status = $_POST['products_status'];
            $guarantee = $_POST['products_guarantee'];
            $video = $_POST['video'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $short_details = $_POST['products_short_details'];
            $products_details = $_POST['products_details'];
            $post = $_POST;
            if (empty($name)) {
                $this->error = 'Phải nhập tên sản phẩm';
            } elseif (empty($guarantee)) {
                $this->error = 'Phải nhập kiểu bảo hành';
            } elseif (empty($price)) {
                $this->error = 'Phải nhập giá của sản phẩm';
            } elseif (empty($short_details)) {
                $this->error = 'Phải nhập mô tả ngắn gọn';
            }
            if (!empty($video)) {
                if (strpos($video, 'watch?v=')) {
                    $video = str_replace('watch?v=', 'embed/', $video);
                }
            }
            $avatar = $_FILES['avatar_products']; //mảng 1 chiều
            $avatar_name = "";
            // + B5: Validate:
            // - File upload phải là ảnh
            // - File upload ko đc lớn hơn 2Mb
            // Về nguyên tắc chỉ validate đc nếu như có file đc tải lên
            if ($avatar['error'] == 0) {
                // - File upload phải là ảnh:
                // Lấy đuôi file:
                $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                //		var_dump($extension);
                $allowed = ['png', 'jpg', 'jpeg', 'gif'];
                if (!in_array($extension, $allowed)) {
                    $this->error = 'File upload phải là ảnh';
                }
                // - File upload ko đc lớn hơn 2Mb
                $size_b = $avatar['size'];
                $size_mb = $size_b / 1024 / 1024;
                $size_mb = round($size_mb, 2);
                if ($size_mb > 2) {
                    $this->error = 'File upload ko đc lớn hơn 2Mb';
                }
            }
            // + B6: Xử lý logic chính chỉ khi ko có lỗi:

            if (empty($this->error)) {
                // Xử lý upload file vào thư mục chỉ định
                $filename = '';
                if ($avatar['error'] == 0) {
                    $dir_upload = 'products';
                    // Tạo thư mục uploads trên bằng code, ko đc tạo bằng tay
                    //, chỉ tạo khi thư mục chưa tồn tại: file_exists
                    if (!file_exists("./assets/img/$dir_upload")) {
                        mkdir("./assets/img/$dir_upload");
                    }
                    // Tạo ra tên file mang tính duy nhất:
                    $filename = time() . '-' . $avatar['name'];

                    // Tải file từ thư mục tạm vào thư mục chỉ định:
                    $is_upload = move_uploaded_file(
                        $avatar['tmp_name'],
                        "./assets/img/$dir_upload/$filename"
                    );

                    $avatar_name = $filename;
                }
            }

            // ảnh review video
            $img_video = $_FILES['img_video']; //mảng 1 chiều
            $img_video_name = "";
            // + B5: Validate:
            // - File upload phải là ảnh
            // - File upload ko đc lớn hơn 2Mb
            // Về nguyên tắc chỉ validate đc nếu như có file đc tải lên
            if ($img_video['error'] == 0) {
                // - File upload phải là ảnh:
                // Lấy đuôi file:
                $extension = pathinfo($img_video['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                //		var_dump($extension);
                $allowed = ['png', 'jpg', 'jpeg', 'gif'];
                if (!in_array($extension, $allowed)) {
                    $this->error = 'File upload phải là ảnh';
                }
                // - File upload ko đc lớn hơn 2Mb
                $size_b = $img_video['size'];
                $size_mb = $size_b / 1024 / 1024;
                $size_mb = round($size_mb, 2);
                if ($size_mb > 2) {
                    $this->error = 'File upload ko đc lớn hơn 2Mb';
                }
            }

            // + B6: Xử lý logic chính chỉ khi ko có lỗi:
            if (empty($this->error)) {
                // Xử lý upload file vào thư mục chỉ định
                $filename = '';
                if ($img_video['error'] == 0) {
                    $dir_upload = 'products';
                    // Tạo thư mục uploads trên bằng code, ko đc tạo bằng tay
                    //, chỉ tạo khi thư mục chưa tồn tại: file_exists
                    if (!file_exists("./assets/img/$dir_upload")) {
                        mkdir("./assets/img/$dir_upload");
                    }
                    // Tạo ra tên file mang tính duy nhất:
                    $filename = time() . '-' . $img_video['name'];
                    $img_video_name =  $filename;
                    // Tải file từ thư mục tạm vào thư mục chỉ định:
                    $is_upload = move_uploaded_file(
                        $img_video['tmp_name'],
                        "./assets/img/$dir_upload/$filename"
                    );
                }
            }

            //  upload nhiều ảnh
            $imgs = $_FILES['imgs']; // Mảng chứa các file ảnh đã chọn

            // Kiểm tra xem có file nào được chọn không
            if ($imgs['error'][0] == 0) {
                // Duyệt qua từng file ảnh
                for ($i = 0; $i < count($imgs['name']); $i++) {
                    $img = array(
                        'name' => $imgs['name'][$i],
                        'type' => $imgs['type'][$i],
                        'tmp_name' => $imgs['tmp_name'][$i],
                        'error' => $imgs['error'][$i],
                        'size' => $imgs['size'][$i]
                    );

                    // Validate file ảnh
                    if ($img['error'] == 0) {
                        // Lấy đuôi file
                        $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
                        $extension = strtolower($extension);
                        $allowed = ['png', 'jpg', 'jpeg', 'gif'];
                        if (!in_array($extension, $allowed)) {
                            $this->error = "File" . $imgs['name'] . "upload phải là ảnh";
                            break; // thoát khỏi vòng lặp nếu có lỗi
                        }

                        // Validate kích thước file
                        $size_b = $img['size'];
                        $size_mb = $size_b / 1024 / 1024;
                        $size_mb = round($size_mb, 2);
                        if ($size_mb > 2) {
                            $this->error = 'File' . $imgs['name'] . ' upload ko đc lớn hơn 2Mb';
                            break; // thoát khỏi vòng lặp nếu có lỗi
                        }
                    }
                }
            }

            if (empty($this->error)) {
                // Controller gọi Model để nhờ Model truy vấn CSDL
                $Products_model = new Products();
                $is_insert = $Products_model->insertProducts($name, $status, $guarantee, $video, $price, $category_id, $short_details, $products_details, $avatar_name, $img_video_name);

                if ($is_insert) {
                    $products_id = $Products_model->Products_id;
                    for ($i = 0; $i < count($imgs['name']); $i++) {
                        $img = array(
                            'name' => $imgs['name'][$i],
                            'type' => $imgs['type'][$i],
                            'tmp_name' => $imgs['tmp_name'][$i],
                            'error' => $imgs['error'][$i],
                            'size' => $imgs['size'][$i]
                        );
                        // Upload file vào thư mục chỉ định
                        $filename = '';
                        $dir_upload = 'products';
                        if (!file_exists("./assets/img/$dir_upload")) {
                            mkdir("./assets/img/$dir_upload");
                        }
                        $filename = time() . '-' . $img['name'];
                        $is_upload = move_uploaded_file(
                            $img['tmp_name'],
                            "./assets/img/$dir_upload/$filename"
                        );

                        // Xử lý khi upload thành công
                        if ($is_upload) {
                            // Thêm tên file vào mảng để lưu vào CSDL
                            $Imgproducts_model = new Imgproducts();
                            $is_insert = $Imgproducts_model->insertImgProducts($filename, $products_id);
                        }
                    }
                    $_SESSION['success'] = 'Thêm mới Sản Phẩm ' . $name . ' thành công';
                    header('Location: ../products/index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
                @unlink("./assets/img/products/$avatar_name");
                @unlink("./assets/img/products/$img_video_name");
            }
        }
        // -controller gọi models để lấy dữ liệu danh mục
        $listproducts_model = new Listproducts();
        $listproducts = $listproducts_model->getAll();
        // - Controller gọi View
        $this->page_title = 'Trang Thêm Sản Phẩm';
        $this->content =
            $this->render('views/products/create.php', [
                'listproducts' => $listproducts,
                'post' => $post,
            ]);
        require_once 'views/layouts/system.php';
    }
    public function index($curent_page = 1)
    {

        $limit = 10;
        $page = $curent_page;


        // -controller gọi models để lấy dữ liệu 

        $products_model = new Products();
        // lấy tổng số bản ghi
        $count_total = $products_model->countTotal();

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
        $products = $products_model->getAll($page, $limit);
        // -controller gọi models để lấy dữ liệu danh mục
        $listproducts_model = new Listproducts();
        $listproducts = $listproducts_model->getAll();

        // - Controller gọi View
        $this->page_title = 'Trang Danh Sách Sản Phẩm';
        $this->content =
            $this->render('views/products/index.php', [
                'products' => $products,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,
                'listproducts' => $listproducts
            ]);
        require_once 'views/layouts/system.php';
    }
    public function update($id = "")
    {

        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Sản Phẩm không hợp lệ';
            header('Location: ../products/index');
            exit();
        }

        $products_id = $id;
        $products_model = new Products();
        $product = $products_model->getById($products_id);

        if (empty($product)) {
            $_SESSION['error'] = 'Sản Phẩm không tồn tại';
            header('Location: ../../products/index');
            exit();
        }

        // -controller gọi models để lấy dữ liệu danh mục
        $listproducts_model = new Listproducts();
        $listproducts = $listproducts_model->getAll();
        // -controller gọi models để lấy ảnh review sản phẩm
        $Imgproducts_model = new Imgproducts();
        $imgs_product = $Imgproducts_model->getAll($products_id);
        $name_imgs_product = array();
        foreach ($imgs_product as $value) {
            $name_imgs_product[] = $value['img'];
        }

        // xử lý khi submit

        if (isset($_POST['update_product'])) {
            $name = $_POST['products_name'];
            $status = $_POST['products_status'];
            $guarantee = $_POST['products_guarantee'];
            $video = $_POST['video'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $short_details = $_POST['products_short_details'];
            $products_details = $_POST['products_details'];
            if (empty($name)) {
                $this->error = 'Phải nhập tên sản phẩm';
            } elseif (empty($guarantee)) {
                $this->error = 'Phải nhập kiểu bảo hành';
            } elseif (empty($price)) {
                $this->error = 'Phải nhập giá của sản phẩm';
            };
            if (!empty($video)) {
                if (strpos($video, 'watch?v=')) {
                    $video = str_replace('watch?v=', 'embed/', $video);
                }
            }
            $avatar = $_FILES['avatar_products']; //mảng 1 chiều
            $avatar_name = $product['avatar_products'];
            // + B5: Validate:
            // - File upload phải là ảnh
            // - File upload ko đc lớn hơn 2Mb
            // Về nguyên tắc chỉ validate đc nếu như có file đc tải lên
            if ($avatar['error'] == 0) {

                // - File upload phải là ảnh:
                // Lấy đuôi file:
                $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                //		var_dump($extension);
                $allowed = ['png', 'jpg', 'jpeg', 'gif'];
                if (!in_array($extension, $allowed)) {
                    $this->error = 'File upload phải là ảnh';
                }
                // - File upload ko đc lớn hơn 2Mb
                $size_b = $avatar['size'];
                $size_mb = $size_b / 1024 / 1024;
                $size_mb = round($size_mb, 2);
                if ($size_mb > 2) {
                    $this->error = 'File upload ko đc lớn hơn 2Mb';
                }
            }
            // + B6: Xử lý logic chính chỉ khi ko có lỗi:

            if (empty($this->error) && $avatar['error'] == 0) {
                // Xử lý upload file vào thư mục chỉ định
                $filename = '';
                if ($avatar['error'] == 0) {
                    $dir_upload = 'products';
                    //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
                    @unlink("./assets/img/$dir_upload/$avatar_name");
                    // Tạo thư mục uploads trên bằng code, ko đc tạo bằng tay
                    //, chỉ tạo khi thư mục chưa tồn tại: file_exists
                    if (!file_exists("./assets/img/$dir_upload")) {
                        mkdir("./assets/img/$dir_upload");
                    }
                    // Tạo ra tên file mang tính duy nhất:
                    $filename = time() . '-' . $avatar['name'];

                    // Tải file từ thư mục tạm vào thư mục chỉ định:
                    $is_upload = move_uploaded_file(
                        $avatar['tmp_name'],
                        "./assets/img/$dir_upload/$filename"
                    );

                    $avatar_name = $filename;
                }
            }

            // ảnh review video
            $img_video = $_FILES['img_video']; //mảng 1 chiều
            $img_video_name = $product['img_video'];
            // + B5: Validate:
            // - File upload phải là ảnh
            // - File upload ko đc lớn hơn 2Mb
            // Về nguyên tắc chỉ validate đc nếu như có file đc tải lên
            if ($img_video['error'] == 0) {
                // - File upload phải là ảnh:
                // Lấy đuôi file:
                $extension = pathinfo($img_video['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                //		var_dump($extension);
                $allowed = ['png', 'jpg', 'jpeg', 'gif'];
                if (!in_array($extension, $allowed)) {
                    $this->error = 'File upload phải là ảnh';
                }
                // - File upload ko đc lớn hơn 2Mb
                $size_b = $img_video['size'];
                $size_mb = $size_b / 1024 / 1024;
                $size_mb = round($size_mb, 2);
                if ($size_mb > 2) {
                    $this->error = 'File upload ko đc lớn hơn 2Mb';
                }
            }

            // + B6: Xử lý logic chính chỉ khi ko có lỗi:
            if (empty($this->error) && $img_video['error'] == 0) {
                // Xử lý upload file vào thư mục chỉ định
                //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
                @unlink("./assets/img/$dir_upload/$img_video_name");
                $filename = '';
                if (($img_video['error'] == 0) && ($img_video['error'] == 0)) {
                    $dir_upload = 'products';
                    // Tạo thư mục uploads trên bằng code, ko đc tạo bằng tay
                    //, chỉ tạo khi thư mục chưa tồn tại: file_exists
                    if (!file_exists("./assets/img/$dir_upload")) {
                        mkdir("./assets/img/$dir_upload");
                    }
                    // Tạo ra tên file mang tính duy nhất:
                    $filename = time() . '-' . $img_video['name'];
                    $img_video_name =  $filename;
                    // Tải file từ thư mục tạm vào thư mục chỉ định:
                    $is_upload = move_uploaded_file(
                        $img_video['tmp_name'],
                        "./assets/img/$dir_upload/$filename"
                    );
                }
            }

            //  upload nhiều ảnh
            $imgs = $_FILES['imgs']; // Mảng chứa các file ảnh đã chọn

            // Kiểm tra xem có file nào được chọn không
            if ($imgs['error'][0] == 0) {
                // Duyệt qua từng file ảnh
                for ($i = 0; $i < count($imgs['name']); $i++) {
                    $img = array(
                        'name' => $imgs['name'][$i],
                        'type' => $imgs['type'][$i],
                        'tmp_name' => $imgs['tmp_name'][$i],
                        'error' => $imgs['error'][$i],
                        'size' => $imgs['size'][$i]
                    );

                    // Validate file ảnh
                    if ($img['error'] == 0) {
                        // Lấy đuôi file
                        $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
                        $extension = strtolower($extension);
                        $allowed = ['png', 'jpg', 'jpeg', 'gif'];
                        if (!in_array($extension, $allowed)) {
                            $this->error = "File" . $imgs['name'] . "upload phải là ảnh";
                            break; // thoát khỏi vòng lặp nếu có lỗi
                        }

                        // Validate kích thước file
                        $size_b = $img['size'];
                        $size_mb = $size_b / 1024 / 1024;
                        $size_mb = round($size_mb, 2);
                        if ($size_mb > 2) {
                            $this->error = 'File' . $imgs['name'] . ' upload ko đc lớn hơn 2Mb';
                            break; // thoát khỏi vòng lặp nếu có lỗi
                        }
                    }
                }
                if (($imgs['error'][0] == 0) && empty($this->error)) {
                    $dir_upload = 'products';
                    foreach ($name_imgs_product as $value) {
                        @unlink("./assets/img/$dir_upload/$value");
                    }
                    $Imgproducts_model->delete($products_id);
                    for ($i = 0; $i < count($imgs['name']); $i++) {
                        $img = array(
                            'name' => $imgs['name'][$i],
                            'type' => $imgs['type'][$i],
                            'tmp_name' => $imgs['tmp_name'][$i],
                            'error' => $imgs['error'][$i],
                            'size' => $imgs['size'][$i]
                        );
                        // Upload file vào thư mục chỉ định
                        $filename = '';

                        if (!file_exists("./assets/img/$dir_upload")) {
                            mkdir("./assets/img/$dir_upload");
                        }
                        $filename = time() . '-' . $img['name'];
                        $is_upload = move_uploaded_file(
                            $img['tmp_name'],
                            "./assets/img/$dir_upload/$filename"
                        );

                        // Xử lý khi upload thành công
                        if ($is_upload) {
                            // Thêm tên file vào mảng để lưu vào CSDL
                            $Imgproducts_model = new Imgproducts();
                            $is_insert = $Imgproducts_model->insertImgProducts($filename, $products_id);
                        }
                    }
                }
            }

            if (empty($this->error)) {
                // Controller gọi Model để nhờ Model truy vấn CSDL
                $Products_model = new Products();
                $Products_model->name = $name;
                $Products_model->status = $status;
                $Products_model->guarantee = $guarantee;
                $Products_model->video = $video;
                $Products_model->price = $price;
                $Products_model->category_id = $category_id;
                $Products_model->short_details = $short_details;
                $Products_model->products_details = $products_details;
                $Products_model->avatar_name = $avatar_name;
                $Products_model->img_video_name = $img_video_name;
                $is_update = $Products_model->update($products_id);
                var_dump($is_update);

                if ($is_update) {


                    $_SESSION['success'] = 'Sửa Sản Phẩm ' . $name . ' thành công';
                    header('Location: ../../products/index');
                    exit();
                }
                $this->error = "Sửa " . $product['name'] . " thất bại";
            }
        }
        //- Controller gọi View
        $this->page_title = 'Trang Sửa Sản Phẩm ';
        $this->content =
            $this->render('views/products/update.php', [
                'product' => $product,
                'listproducts' => $listproducts,
                'imgs_product' => $imgs_product
            ]);
        require_once 'views/layouts/system.php';
    }
    public function delete($id = "")
    {
        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID bộ phận không hợp lệ';
            header('Location: ../department/index');
            exit();
        }
        $products_id = $id;
        // -controller gọi models để lấy ảnh review sản phẩm
        $Imgproducts_model = new Imgproducts();
        $imgs_product = $Imgproducts_model->getAll($products_id);
        $name_imgs_product = array();
        foreach ($imgs_product as $value) {
            $name_imgs_product[] = $value['img'];
        }
        $Products_model = new Products();
        $product = $Products_model->getById($products_id);
        $is_delete = $Products_model->delete($products_id);
        if ($is_delete) {
            //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
            $img_video = $product['img_video'];
            @unlink("./assets/img/products/$img_video");
            $avatar_products = $product['avatar_products'];
            @unlink("./assets/img/products/$avatar_products");
            foreach ($name_imgs_product as $value) {
                @unlink("./assets/img/products/$value");
            }
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: ../../products/index');
        exit();
    }
}
