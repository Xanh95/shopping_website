<?php
require_once 'controllers/Controller.php';
require_once 'models/Department.php';

class EmployeeController extends Controller
{
    //index.php?controller=employee&action=create
    public function create()
    {
        // -controller gọi models để lấy dữ liệu các bộ phận

        $department_model = new Department();
        $departments = $department_model->getAll();

        // -controller goi view
        $this->page_title = 'Trang Thêm Nhân Sự';
        $this->content =
            $this->render('views/employee/create.php', ['departments' => $departments]);
        require_once 'views/layouts/system.php';
    }
}
