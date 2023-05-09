<?php
//controllers/ProfileController.php
// Nhúng file đi từ file index gốc
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Oder.php';


class ProfileController extends Controller
{
    //index.php?controller=administrator&action=congratulate
    public function __construct()
    {
        if (isset($_COOKIE['user'])) {
            $_SESSION['user'] = $_COOKIE['user'];
            $_SESSION['role'] = $_COOKIE['role'];
            $_SESSION['id'] = $_COOKIE['id'];
            $_SESSION['email'] = $_COOKIE['email'];
        }
        $controller = isset($_SESSION['controller']) ? $_SESSION['controller'] : 'category';
        $action = isset($_SESSION['action']) ? $_SESSION['action'] : 'index';
        if (isset($_SESSION['controller'])) {
            unset($_SESSION['controller']);
        }
        if (isset($_SESSION['action'])) {
            unset($_SESSION['action']);
        }

        if (!isset($_SESSION['user']) && $controller != 'home' && $action != 'login_register') {
            $_SESSION['error'] = 'Bạn cần đăng nhập';
            header('Location: ../profile/login_register');
            exit();
        }
    }
    public function info()
    {
        $user_model = new User();
        $user = $user_model->getUser($_SESSION['email']);
        $_SESSION['user'] = $user['name'];
        $_SESSION['birthday'] = $user['birthday'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['gender'] = $user['gender'];

        if (isset($_POST['update-info'])) {
            $d_birthday = $_POST['dd_birthday'];
            $m_birthday = $_POST['mm_birthday'];
            $y_birthday = $_POST['yy_birthday'];
            $name = $_POST['input-name'];
            $phone = $_POST['input-phone'];

            $id = $_SESSION['id'];
            $gender = '';
            if (isset($_POST['gender'])) {
                $gender = $_POST['gender'];
            }
            $new_birthday = "$d_birthday" . "/" . $m_birthday . "/" . $y_birthday;
            if (empty($d_birthday)) {
                $this->error = 'Chưa nhập Ngày Sinh';
            } elseif (empty($m_birthday)) {
                $this->error = 'Chưa nhập Tháng Sinh';
            } elseif (empty($y_birthday)) {
                $this->error = 'Chưa nhập năm Sinh';
            } elseif (empty($name)) {
                $name = $user['name'];
            } elseif (empty($phone)) {
                $phone = $user['phone'];
            } elseif (empty($gender)) {
                $this->error = 'Chưa chọn giới tính';
            } elseif (!empty($phone) && (strlen($phone) < 9)) {
                $this->error = 'SDT ít nhất 9 số';
            }

            $user_model->name = $name;
            $user_model->phone = $phone;
            $user_model->new_birthday = $new_birthday;
            $user_model->gender = $gender;
            $is_update = $user_model->upDateInfo($id);
            if ($is_update) {
                $_SESSION['success'] = 'Sửa thông tin cá nhân thành công';
                header('Location: ../profile/info');
                exit();
            } else {

                $this->error = "Sửa thông tin cá nhân thất bại";
            }
        }



        $this->page_title = 'Thông Tin cá nhân';
        $this->content = $this->render('views/users/info.php', ['user' => $user]);
        require_once 'views/layouts/profile.php';
    }
    public function editpass()
    {

        $id = $_SESSION['id'];
        if (isset($_POST['edit-pass'])) {
            $curent_pass = $_POST['input-currentpass'];
            $newpass = $_POST['input-newpass'];
            $renewpass = $_POST['input-renewpass'];
            if (empty($curent_pass)) {
                $this->error = 'phải nhập mật khẩu hiện tại';
            } elseif (empty($newpass)) {
                $this->error = 'Phải nhập mật khẩu mới';
            } elseif (strlen($newpass) < 8) {
                $this->error = 'mật khẩu mới ít nhất 8 ký tự';
            } elseif (empty($renewpass)) {
                $this->error = 'Phải Nhập lại mật khẩu mới';
            } elseif ($newpass != $renewpass) {
                $this->error = 'Nhập lại mật khẩu mới chưa chính xác';
            }
            if (empty($this->error)) {
                $user_model = new User();
                $user = $user_model->getUser($_SESSION['email']);
                $password_hash = $user['password'];
                $is_same_password = password_verify($curent_pass, $password_hash);
                if ($is_same_password) {
                    $newpass = password_hash($newpass, PASSWORD_BCRYPT);
                    $user_model->password = $newpass;
                    $is_edit_pass = $user_model->upDatePass($id);

                    // var_dump($is_edit_pass);
                    // die();
                    if ($is_edit_pass) {
                        $_SESSION = [];
                        session_destroy();
                        setcookie('user', '', time() - 1);
                        setcookie('role', '', time() - 1);
                        setcookie('id', '', time() - 1);
                        setcookie('email', '', time() - 1);
                        header('Location: ../profile/login_register');
                        exit();
                    }
                    $this->error = 'Đổi mật khẩu thất bại';
                }
            }
        }
        $this->page_title = 'Đổi mật khẩu cá nhân';
        $this->content = $this->render('views/users/editpass.php');
        require_once 'views/layouts/profile.php';
    }
    public function address()
    {
        $id = $_SESSION['id'];
        $user_model = new User();
        $user_address = $user_model->getUserAdress($id);

        $this->page_title = 'Địa chỉ cá nhân';
        $this->content = $this->render('views/users/address.php', ['address' => $user_address]);
        require_once 'views/layouts/profile.php';
    }
    public function add_address()
    {


        $name = '';
        $phone = '';
        $city = '';
        $district = '';
        $address = '';
        $address_type = '';
        $id = $_SESSION['id'];
        if (isset($_POST['add-address'])) {
            $name = $_POST['input-namerecipient'];
            $phone = $_POST['input-phonerecipient'];
            $city = $_POST['input-cityrecipient'];
            $district = $_POST['input-districtrecipient'];
            $address = $_POST['input-addressrecipient'];
            $address_type = '';
            if (isset($_POST['address-type'])) {
                $address_type = $_POST['address-type'];
            }
            if (empty($name)) {
                $this->error = 'Không được để trống tên người nhận';
            } elseif (empty($phone)) {
                $this->error = 'Không được để trống số điện thoại người nhận';
            } elseif (empty($city)) {
                $this->error = 'Không được để trống thành phố người nhận';
            } elseif (empty($district)) {
                $this->error = 'Không được để trống quận/huyện người nhận';
            } elseif (empty($address)) {
                $this->error = 'Không được để trống địa chỉ người nhận';
            } elseif (empty($address_type)) {
                $this->error = 'Chưa chọn loại địa chỉ';
            }

            // Kiểm tra 
            if (empty($this->error)) {
                $user_model = new User();
                $user_model->name = $name;
                $user_model->phone = $phone;
                $user_model->city = $city;
                $user_model->district = $district;
                $user_model->address = $address;
                $user_model->address_type = $address_type;
                $is_insert = $user_model->createAddress($id);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới địa chỉ thành công';
                    header('Location: ../profile/address');
                    exit();
                }
                $this->error = 'Thêm mới địa chỉ thất bại';
            }
        }

        $this->page_title = 'Thêm Địa chỉ cá nhân';
        $this->content = $this->render('views/users/add_address.php', [
            'name' => $name,
            'phone' => $phone,
            'city' => $city,
            'district' => $district,
            'address' => $address,
            'address_type' => $address_type

        ]);
        require_once 'views/layouts/profile.php';
    }
    public function edit_address($id_address = '')
    {


        $name = '';
        $phone = '';
        $city = '';
        $district = '';
        $address = '';
        $address_type = '';
        $id = $_SESSION['id'];
        $user_model = new User();
        $address_edit = $user_model->getUserAdressById($id_address);


        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID địa chỉ không hợp lệ';
            header('Location: ../profile/address');
            exit();
        }
        if (isset($_POST['update-address'])) {
            $name = $_POST['input-namerecipient'];
            $phone = $_POST['input-phonerecipient'];
            $city = $_POST['input-cityrecipient'];
            $district = $_POST['input-districtrecipient'];
            $address = $_POST['input-addressrecipient'];
            $address_type = '';
            if (isset($_POST['address-type'])) {
                $address_type = $_POST['address-type'];
            }
            if (empty($name)) {
                $this->error = 'Không được để trống tên người nhận';
            } elseif (empty($phone)) {
                $this->error = 'Không được để trống số điện thoại người nhận';
            } elseif (empty($city)) {
                $this->error = 'Không được để trống thành phố người nhận';
            } elseif (empty($district)) {
                $this->error = 'Không được để trống quận/huyện người nhận';
            } elseif (empty($address)) {
                $this->error = 'Không được để trống địa chỉ người nhận';
            } elseif (empty($address_type)) {
                $this->error = 'Chưa chọn loại địa chỉ';
            }

            // Kiểm tra 
            if (empty($this->error)) {

                $user_model->name = $name;
                $user_model->phone = $phone;
                $user_model->city = $city;
                $user_model->district = $district;
                $user_model->address = $address;
                $user_model->address_type = $address_type;
                $is_update = $user_model->updateAddress($id_address);

                if ($is_update) {
                    $_SESSION['success'] = 'Sửa địa chỉ thành công';
                    header('Location: ../../profile/address');
                    exit();
                }
                $this->error = 'Sửa địa chỉ thất bại';
            }
        }

        $this->page_title = 'Sửa Địa chỉ cá nhân';
        $this->content = $this->render('views/users/edit_address.php', [
            'address_edit' => $address_edit
        ]);
        require_once 'views/layouts/profile.php';
    }
    public function delete_address($id = "")
    {
        // -controller gọi models để lấy dữ liệu bộ phận
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID địa chỉ không hợp lệ';
            header('Location: ../department/index');
            exit();
        }
        $address_id = $id;


        $user_model = new User();

        $is_delete = $user_model->deleteAddress($address_id);
        if ($is_delete) {

            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: ../../profile/address');
        exit();
    }
    public function myOder()
    {
        $oder_model = new Oder();
        $oder = $oder_model->findMyOder();

        $this->page_title = 'Đơn hàng của tôi';
        $this->content = $this->render('views/users/my_oder.php', ['orders' => $oder]);
        require_once 'views/layouts/profile.php';
    }
    public function detailOder($id = '')
    {
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID đơn hàng không hợp lệ';
            header('Location: ../home/index');
            exit();
        }
        $oder_id = $id;
        $oder_model = new Oder();
        $oder = $oder_model->getMyOderById($oder_id);
        $status = $oder['status'];
        $code_oder = $oder['code_oder'];
        $code_oder = $oder['code_oder'];
        $oder_detail = $oder_model->getOderByCode($code_oder);
        $this->page_title = 'Chi Tiết của tôi';
        $this->content = $this->render('views/users/myoderdetail.php', [
            'order' => $oder,
            'order_detail' => $oder_detail,
            'status' => $status,
            'code_oder' => $code_oder
        ]);
        require_once 'views/layouts/profile.php';
    }
    public function deleteMyOder($id)
    {
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION['error'] = 'ID  đơn hàng không hợp lệ';
            header('Location: ../../oder/index');
            exit();
        }
        $oder_model = new Oder();
        $is_delete = $oder_model->deleteMyOder($id);
        if ($is_delete) {
            $_SESSION['success'] = "Huỷ đơn hàng thành công. Tiếp tục đặt hàng";
            header("Location: ../../home/index");
            exit();
        }
    }
    public function logout()
    {

        //        session_destroy();
        $_SESSION = [];
        session_destroy();
        //    unset($_SESSION['user']);

        setcookie('user', '', time() - 1);
        setcookie('role', '', time() - 1);
        setcookie('id', '', time() - 1);
        setcookie('email', '', time() - 1);
        header('Location: ../profile/login_register');
        exit();
    }
    public function login_register()
    {
        //nếu user đã đăng nhập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
        if (isset($_SESSION['user'])) {
            header('Location: ../profile/info');
            exit();
        }
        if (isset($_POST['register'])) {
            $name = $_POST['register-name'];
            $phone = $_POST['register-phone'];
            $email = $_POST['register-email'];
            $password = $_POST['register-pass'];
            $repassword = $_POST['register-repass'];
            $role = 5;
            if (empty($name)) {
                $this->error = 'Không được để trống tên của bạn';
            } elseif (empty($phone)) {
                $this->error = 'Không được để trống số điện thoại của bạn';
            } elseif (empty($email)) {
                $this->error = 'Không được để trống email của bạn';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'định dạng email chưa đúng';
            } elseif (empty($password)) {
                $this->error = 'Không được để trống mật khẩu';
            } elseif (strlen($password) < 8) {
                $this->error = 'mật khẩu ít nhất 8 ký tự';
            } elseif (empty($repassword)) {
                $this->error = 'chưa nhập lại mật khẩu';
            } elseif ($password != $repassword) {
                $this->error = 'mật khẩu nhập lại chưa giống';
            }
            if (empty($this->error)) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $User_model = new User();
                $is_register = $User_model->regiser($name, $phone, $email, $password, $role);
                if ($is_register) {
                    $_SESSION['success'] = 'Đăng ký tài khoản  thành công';
                } else {
                    $this->error = ' thất bại';
                }
            }
        }


        if (isset($_POST['login'])) {
            //            die;
            $email = $_POST['email'];
            //do password đang lưu trong CSDL sử dụng cơ chế mã hóa nên cần phải thêm
            //            hàm  cho password
            $password = $_POST['password'];
            //validate
            if (empty($email) || empty($password)) {
                $this->error = 'Email hoặc password không được để trống';
            } elseif (strlen($password) < 8) {
                $this->error = 'Mật khẩu không ít hơn 8 ký tự';
            }

            $user_model = new User();
            if (empty($this->error)) {
                $user = $user_model->getUser($email);
                if (empty($user)) {
                    $this->error = 'Email ko tồn tại';
                } else {
                    // + Dùng hàm sau để kiểm tra xem mật
                    //khẩu mã hóa có đúng với mật khẩu từ
                    //form gửi lên hay ko
                    // Hàm này chỉ có tác dụng với các mật
                    //khẩu đc mã hóa bằng hàm password_hash

                    $is_same_password = password_verify($password, $user['password']);
                    if ($is_same_password) {
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        //tạo session user để xác định user nào đang login
                        $_SESSION['user'] = $user['name'];
                        $_SESSION['role'] = $user['role'];
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['email'] = $user['email'];
                        if (isset($_SESSION['user'])) {
                            if ($_SESSION['role'] > 4) {
                                setcookie('user', $user['name'], time() + 3600);
                                setcookie('role', $user['role'], time() + 3600);
                                setcookie('id', $user['id'], time() + 3600);
                                setcookie('email', $user['email'], time() + 3600);
                            }
                        }

                        if ($user['role'] == 1) {
                            $_SESSION['role'] = 0;
                        }
                        header("Location: ../profile/info");
                        exit();
                    } else {
                        $this->error = 'Sai tài khoản hoặc mật khẩu';
                    }
                }
            }
        }


        $this->page_title = 'Trang Đăng Ký & Đăng Nhập';
        require_once 'views/layouts/login.php';
    }
}
