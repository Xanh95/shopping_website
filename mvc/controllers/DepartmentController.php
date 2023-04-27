<?php
require_once 'controllers/Controller.php';
require_once 'models/Department.php';

class DepartmentController extends Controller
{
    //index.php?controller=department&action=create
    public function create()
    {
        if (isset($_POST['createdepartment'])) {
            $department = $_POST['department'];
            if (empty($department)) {
                $this->error = 'Phải nhập tên bộ phận';
            }

            if (empty($this->error)) {
                // Controller gọi Model để nhờ Model truy vấn CSDL
                $department_model = new Department();
                $is_insert = $department_model->insertDepartment($department);

                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới bộ phận ' . $department . ' thành công';
                    header('Location: ../department/index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
        }
        // - Controller gọi View
        $this->page_title = 'Trang Thêm Bộ Phận';
        $this->content =
            $this->render('views/department/create.php');
        require_once 'views/layouts/system.php';
    }
    public function index()
    {
        // -controller gọi models để lấy dữ liệu các bộ phận

        $department_model = new Department();
        $departments = $department_model->getAll();
        // - Controller gọi View
        $this->page_title = 'Trang Danh Sách Bộ Phận';
        $this->content =
            $this->render('views/department/index.php', ['departments' => $departments]);
        require_once 'views/layouts/system.php';
    }
    public function update($id)
    {
        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID bộ phận không hợp lệ';
            header('Location: ../../department/index');
            exit();
        }

        $department_id = $id;
        $department_model = new Department();
        $department = $department_model->getById($department_id);

        if (empty($department)) {
            $_SESSION['error'] = 'bộ phận không tồn tại';
            header('Location: ../../department/index');
            exit();
        }
        if (isset($_POST['updatedepartment'])) {
            $department_new_name = $_POST['department_name'];
            if (empty($department_new_name)) {
                $this->error = 'Cần Nhập Tên';
            }
            if (empty($this->error)) {
                $department_model->department_name = $department_new_name;
                $is_update = $department_model->update($department_id);
                if ($is_update) {
                    $_SESSION['success'] = 'Sửa' . $department['department'] . ' thành công';
                } else {
                    $_SESSION['error'] = 'Sửa' . $department['department'] . 'thất bại';
                }
                header('Location: ../../department/index');
                exit();
            }
        }
        //- Controller gọi View
        $this->page_title = 'Trang Sửa Bộ Phận';
        $this->content =
            $this->render('views/department/update.php', ['department' => $department]);
        require_once 'views/layouts/system.php';
    }
    public function delete($id)
    {
        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID bộ phận không hợp lệ';
            header('Location: ../../department/index');
            exit();
        }

        $department_id = $id;
        $department_model = new Department();
        $is_delete = $department_model->delete($department_id);

        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: ../../department/index');
        exit();
    }
}
