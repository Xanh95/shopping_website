<?php
require_once 'controllers/Controller.php';
require_once 'models/Post.php';

class PostController extends Controller
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
        }
    }
    public function create()
    {

        if (isset($_POST['create_sale'])) {
            $title = $_POST['title'];
            $sale = $_POST['sale'];
            $avatar = $_FILES['avatar_sale'];
            if (empty($title)) {
                $this->error = "Phải nhập tiêu đề";
            } elseif (empty($sale)) {
                $this->error = "Phải nhập nội dung sale";
            } elseif ($avatar['error'] != 0) {
                $this->error = "Chưa Tải ảnh đại diện bài viết thành công";
            } elseif (strlen($title) > 75) {
                $this->error = "tiêu đề bài biết tối đa 75 ký tự";
            }
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
                    $dir_upload = 'post';
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
            if (empty($this->error)) {
                $Post_model = new Post();
                $is_insert = $Post_model->insertPost($title, $sale, $avatar_name);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới bài viết ' . $title . ' thành công';
                    header('Location: ../administrator/congratulate');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
        }
        // - Controller gọi View
        $this->page_title = 'Trang Thêm Khuyến Mãi';
        $this->content =
            $this->render('views/post/create.php');
        require_once 'views/layouts/system.php';
    }
    public function index($curent_page = 1)
    {

        $limit = 15;
        $page = $curent_page;


        // -controller gọi models để lấy dữ liệu 

        $posts_model = new Post();
        // lấy tổng số bản ghi
        $count_total = $posts_model->countTotal();

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
        // lấy danh sách bài viết
        $posts = $posts_model->getAll($page, $limit);


        // - Controller gọi View
        $this->page_title = 'Trang Danh Sách Sản Phẩm';
        $this->content =
            $this->render('views/post/index.php', [
                'posts' => $posts,
                'total_page' => $total_page,
                'page' => $curent_page,
                'count_total' => $count_total,
                'limit' => $limit,

            ]);
        require_once 'views/layouts/system.php';
    }
    public function update($id = '')
    {
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID Bài viết không hợp lệ';
            header('Location: ../post/index');
            exit();
        }
        $post_id = $id;
        $post_model = new Post();
        $post = $post_model->getById($post_id);

        if (empty($post)) {
            $_SESSION['error'] = 'Bài viết không tồn tại';
            header('Location: ../../post/index');
            exit();
        }
        if (isset($_POST['update_sale'])) {
            $title = $_POST['title'];
            $sale = $_POST['sale'];
            $avatar = $_FILES['avatar_sale'];
            if (empty($title)) {
                $this->error = "Phải nhập tiêu đề";
            } elseif (empty($sale)) {
                $this->error = "Phải nhập nội dung sale";
            } elseif (strlen($title) > 75) {
                $this->error = "tiêu đề bài biết tối đa 75 ký tự";
            }
            $avatar_name = $post['avatar_sale'];

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
                    $dir_upload = 'post';

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
            if (empty($this->error)) {
                $Post_model = new Post();
                $Post_model->title = $title;
                $Post_model->sale = $sale;
                $Post_model->avatar_name = $avatar_name;
                $is_insert = $Post_model->update($post_id);
                if ($is_insert) {
                    $_SESSION['success'] = 'Sửa bài viết ' . $title . ' thành công';
                    header('Location: ../../post/index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
        }
        // - Controller gọi View
        $this->page_title = 'Trang Thêm Khuyến Mãi';
        $this->content =
            $this->render('views/post/update.php', ['post' => $post]);
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

        $posts_id = $id;

        $posts_model = new Post();
        $is_delete = $posts_model->delete($posts_id);

        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: ../../post/index');
        exit();
    }
}
