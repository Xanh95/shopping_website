<?php
require_once 'controllers/Controller.php';
require_once 'models/Listproducts.php';

class ListproductsController extends Controller
{
    //index.php?controller=Listproduct&action=create
    public function create()
    {
        if ($_SESSION['role'] > 1) {
            $_SESSION['error'] = 'bạn chưa đủ quyền vào chức năng này';
            header('Location: ../administrator/congratulate');
            exit();
        }
        if (isset($_POST['createdepartment'])) {
            $listname = $_POST['department'];
            if (empty($listname)) {
                $this->error = 'Phải nhập tên Danh mục sản phẩm';
            }

            if (empty($this->error)) {
                // Controller gọi Model để nhờ Model truy vấn CSDL
                $listproducts_model = new Listproducts();
                $is_insert = $listproducts_model->insertDepartment($listname);

                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới danh mục ' . $listname . ' thành công';
                    header('Location: ../listproducts/index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
        }
        // - Controller gọi View
        $this->page_title = 'Trang Thêm Danh Mục Sản Phẩm';
        $this->content =
            $this->render('views/listproducts/create.php');
        require_once 'views/layouts/system.php';
    }
    public function index()
    {
        // -controller gọi models để lấy dữ liệu các bộ phận

        $listproducts_model = new Listproducts();
        $listname = $listproducts_model->getAll();
        // - Controller gọi View
        $this->page_title = 'Trang Danh Sách Bộ Phận';
        $this->content =
            $this->render('views/listproducts/index.php', ['listname' => $listname]);
        require_once 'views/layouts/system.php';
    }
    public function update($id = "")
    {
        if ($_SESSION['role'] > 1) {
            $_SESSION['error'] = 'bạn chưa đủ quyền vào chức năng này';
            header('Location: ../../administrator/congratulate');
            exit();
        }
        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID bộ phận không hợp lệ';
            header('Location: ../department/index');
            exit();
        }

        $listproducts_id = $id;
        $listproducts_model = new Listproducts();
        $listproducts = $listproducts_model->getById($listproducts_id);

        if (empty($listproducts)) {
            $_SESSION['error'] = 'bộ phận không tồn tại';
            header('Location: ../../department/index');
            exit();
        }
        if (isset($_POST['updatedepartment'])) {
            $listproducts_new_name = $_POST['department_name'];
            if (empty($listproducts_new_name)) {
                $this->error = 'Cần Nhập Tên';
            }
            if (empty($this->error)) {
                $listproducts_model->listproducts_name = $listproducts_new_name;
                $is_update = $listproducts_model->update($listproducts_id);
                if ($is_update) {
                    $_SESSION['success'] = 'Sửa' . $listproducts['listproducts'] . ' thành công';
                } else {
                    $_SESSION['error'] = 'Sửa' . $listproducts['listproducts'] . 'thất bại';
                }
                header('Location: ../../listproducts/index');
                exit();
            }
        }
        //- Controller gọi View
        $this->page_title = 'Trang Sửa Danh Mục SP';
        $this->content =
            $this->render('views/listproducts/update.php', ['listproducts' => $listproducts]);
        require_once 'views/layouts/system.php';
    }
    public function delete($id = "")
    {
        if ($_SESSION['role'] > 1) {
            $_SESSION['error'] = 'bạn chưa đủ quyền vào chức năng này';
            header('Location: ../../administrator/congratulate');
            exit();
        }
        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID bộ phận không hợp lệ';
            header('Location: ../department/index');
            exit();
        }

        $listproducts_id = $id;
        $listproducts_model = new Listproducts();
        $is_delete = $listproducts_model->delete($listproducts_id);

        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: ../../listproducts/index');
        exit();
    }
}
