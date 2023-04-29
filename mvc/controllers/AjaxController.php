<?php
require_once 'controllers/Controller.php';
require_once 'models/Employee.php';

class AjaxController extends Controller
{
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
        }
        if ($sortname == 2) {

            $sortname = "DESC";
        } elseif ($sortname == 1) {
            $sortname = "ASC";
        }


        // -controller gọi models để lấy dữ liệu các bộ phận
        $employee_model = new Employee();
        $employees = $employee_model->search($name, $sortname, $sorttime, $birthday);

        //view
        $this->content =  $this->render('views/employee/search.php', ['employees' => $employees]);
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
    // public function searchAutoBirthDay()
    // {

    //     $birthday = $_POST['birthday'];



    //     // -controller gọi models để lấy dữ liệu các bộ phận
    //     $employee_model = new Employee();
    //     $employees = $employee_model->searchBirthDay($birthday);

    //     print_r($employees);

    //     return json_encode($employees);
    // }
}