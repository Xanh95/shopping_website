<?php
require_once 'controllers/Controller.php';
require_once 'models/Employee.php';
require_once 'models/Department.php';

class EmployeeController extends Controller
{
    //index.php?controller=employee&action=create
    public function create()
    {
        // - Controller xử lý submit form:

        if (isset($_POST['addemployee'])) {
            $name = $_POST['employee_input_name'];
            $birthday = $_POST['employee_input_birthday'];
            $phone = $_POST['employee_input_phone'];
            $password = $_POST['employee_input_pass'];
            $confirm_password = $_POST['employee_input_confirm_password'];
            $address = $_POST['employee_input_address'];
            $hometown = $_POST['employee_input_hometown'];
            $email = $_POST['employee_input_email'];
            $gender = $_POST['employee_input_gender'];
            $department = $_POST['employee_department'];
            $role = $_POST['employee_role'];

            $birthday_timestamp = strtotime($birthday);
            if (empty($name)) {
                $this->error = 'phải nhập họ tên';
            } elseif (strlen($name) < 3) {
                $this->error = 'tên phải dài hơn 3 ký tự';
            } elseif (empty($birthday)) {
                $this->error = 'phải nhập ngày sinh';
            } elseif (!$birthday_timestamp || !preg_match('/\d{2}\/\d{2}\/\d{4}/', $birthday)) {
                $this->error = 'Ngày sinh không đúng định dạng ngày/tháng/năm dd/mm/yyyy.';
            } elseif (empty($phone)) {
                $this->error = 'phải nhập số điện thoại';
            } elseif (strlen($phone) < 9) {
                $this->error = 'phải nhập số điện thoại ít nhất 9 số';
            } elseif (empty($password)) {
                $this->error = 'phải nhập mật khẩu';
            } elseif (strlen($password) < 8) {
                $this->error = 'mật khẩu ít nhất 8 ký tự';
            } elseif (empty($confirm_password)) {
                $this->error = 'phải nhập lại mật khẩu';
            } elseif ($password !== $confirm_password) {
                $this->error = 'mật khẩu không giống nhau';
            } elseif (empty($address)) {
                $this->error = 'phải nhập địa chỉ';
            } elseif (empty($hometown)) {
                $this->error = 'phải nhập quê quán';
            } elseif (empty($email)) {
                $this->error = 'phải nhập email';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'định dạng email chưa đúng';
            } elseif (empty($gender)) {
                $this->error = 'phải chọn giới tính';
            }

            if (empty($this->error)) {
                // Mã hóa mật khẩu trc khi lưu, thuật toán bcrypt
                $password = password_hash($password, PASSWORD_BCRYPT);
                // Controller gọi Model để nhờ Model truy vấn CSDL
                $employee_model = new Employee();
                $is_insert = $employee_model->insertEmployee($name, $birthday, $phone, $password, $address, $hometown, $email, $gender, $department, $role);

                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới nhân sự ' . $name . ' thành công';
                    header('Location: ../employee/index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
        }
        // -controller gọi models để lấy dữ liệu các bộ phận

        $department_model = new Department();
        $departments = $department_model->getAll();

        // -controller goi view
        $this->page_title = 'Trang Thêm Nhân Sự';
        $this->content =
            $this->render('views/employee/create.php', ['departments' => $departments]);
        require_once 'views/layouts/system.php';
    }
    public function index()
    {

        // -controller gọi models để lấy dữ liệu các bộ phận

        $employee_model = new Employee();
        $employees = $employee_model->getAll();
        // - Controller gọi View
        $this->page_title = 'Trang Danh Sách Bộ Phận';
        $this->content =
            $this->render('views/employee/index.php', ['employees' => $employees]);
        require_once 'views/layouts/system.php';
    }
    public function update($id)
    {

        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID bộ phận không hợp lệ';
            header('Location: ../../employee/index');
            exit();
        }

        $employee_id = $id;
        $employee_model = new Employee();
        $employee = $employee_model->getById($employee_id);
        if (empty($employee)) {
            $_SESSION['error'] = 'Nhân sự không tồn tại';
            header('Location: ../../employee/index');
            exit();
        }

        if (isset($_POST['updateemployee'])) {

            $name = $_POST['employee_input_name'];
            $birthday = $_POST['employee_input_birthday'];
            $phone = $_POST['employee_input_phone'];
            $password = $_POST['employee_input_pass'];
            $confirm_password = $_POST['employee_input_confirm_password'];
            $address = $_POST['employee_input_address'];
            $hometown = $_POST['employee_input_hometown'];
            $email = $_POST['employee_input_email'];
            $gender = $_POST['employee_input_gender'];
            $department = $_POST['employee_department'];
            $role = $_POST['employee_role'];

            $birthday_timestamp = strtotime($birthday);
            if (empty($name)) {
                $this->error = 'phải nhập họ tên';
            } elseif (strlen($name) < 3) {
                $this->error = 'tên phải dài hơn 3 ký tự';
            } elseif (empty($birthday)) {
                $this->error = 'phải nhập ngày sinh';
            } elseif (!$birthday_timestamp || !preg_match('/\d{2}\/\d{2}\/\d{4}/', $birthday)) {
                $this->error = 'Ngày sinh không đúng định dạng ngày/tháng/năm dd/mm/yyyy.';
            } elseif (empty($phone)) {
                $this->error = 'phải nhập số điện thoại';
            } elseif (strlen($phone) < 9) {
                $this->error = 'phải nhập số điện thoại ít nhất 9 số';
            } elseif (empty($password)) {
                $this->error = 'phải nhập mật khẩu';
            } elseif (empty($confirm_password)) {
                $this->error = 'phải nhập lại mật khẩu';
            } elseif ($password !== $confirm_password) {
                $this->error = 'mật khẩu không giống nhau';
            } elseif (empty($address)) {
                $this->error = 'phải nhập địa chỉ';
            } elseif (empty($hometown)) {
                $this->error = 'phải nhập quê quán';
            } elseif (empty($email)) {
                $this->error = 'phải nhập email';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'định dạng email chưa đúng';
            } elseif (empty($gender)) {
                $this->error = 'phải chọn giới tính';
            }

            if (empty($this->error)) {
                // Mã hóa mật khẩu trc khi lưu, thuật toán bcrypt
                $password = password_hash($password, PASSWORD_BCRYPT);
                // Controller gọi Model để nhờ Model truy vấn CSDL
                $employee_model = new Employee();
                $employee_model->name = $name;
                $employee_model->birthday = $birthday;
                $employee_model->phone = $phone;
                $employee_model->password = $password;
                $employee_model->address = $address;
                $employee_model->hometown = $hometown;
                $employee_model->email = $email;
                $employee_model->gender = $gender;
                $employee_model->department = $department;
                $employee_model->role = $role;
                $is_update = $employee_model->update($employee_id);


                if ($is_update) {
                    $_SESSION['success'] = "Sửa " . $employee['name'] . " thành công";
                    header('Location: ../../employee/index');
                    exit();
                }
                $this->error = 'Sửa mới thất bại';
            }
        }
        // -controller gọi models để lấy dữ liệu các bộ phận
        $department_model = new Department();
        $departments = $department_model->getAll();
        // -controller gọi models để lấy dữ liệu employee
        $employee = new Employee();
        $employee = $employee->getById($employee_id);

        // -controller goi view
        $this->page_title = 'Trang Thêm Nhân Sự';
        $this->content =
            $this->render('views/employee/update.php', [
                'employee' => $employee,
                'departments' => $departments,
            ]);
        require_once 'views/layouts/system.php';
    }
    public function delete($id)
    {
        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID nhân sự không hợp lệ';
            header('Location: ../../employee/index');
            exit();
        }

        $employee_id = $id;
        $employee_model = new Employee();
        $is_delete = $employee_model->delete($employee_id);

        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: ../../employee/index');
        exit();
    }
}
