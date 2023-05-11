<!-- views/layouts/login%register.php -->

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->page_title; ?></title>
    <meta charset="UTF-8" />
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" />
    <link rel="icon" href="favicon.ico" type="image/ico">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="assets/css/login&register.css" />
    <script type="text/javascript" src="assets/js/login&register.js" defer></script>
    <!-- jquery validate -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="cont box">
        <span class="border-line"></span>
        <div action="" class="form-box">
            <h3 style="color: red"><?php echo $this->error .  " ";
                                    if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    } ?></h3>
            <h3 style="color: green"><?php
                                        if (isset($_SESSION['success'])) {
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']);
                                        }

                                        ?></h3>
            <div class="form sign-in">
                <h2>Đăng Nhập</h2>
                <form action="" id="form-box" method="post">
                    <label>
                        <span>Địa chỉ Email</span>
                        <input type="email" name="email" />
                    </label>
                    <label>
                        <span>Mật Khẩu</span>
                        <input type="password" name="password" />
                    </label>
                    <button class="submit" type="submit" name="login">Đăng Nhập</button>
                </form>
                <p class="forgot-pass">Quên Mật Khẩu ?</p>
                <a href="home/index" class="forgot-pass">Về Trang Chủ</a>

                <div class="social-media">
                    <ul>
                        <li><img src="assets/img/login&register/facebook.png" /></li>
                        <li><img src="assets/img/login&register/twitter.png" /></li>
                        <li><img src="assets/img/login&register/linkedin.png" /></li>
                        <li><img src="assets/img/login&register/instagram.png" /></li>
                    </ul>
                </div>
            </div>

            <div class="sub-cont">
                <div class="img">
                    <div class="img-text m-up">
                        <h2>Đăng ký</h2>
                        <p>Đăng ký và khám phá rất nhiều sản phẩm mới!</p>
                    </div>

                    <div class="img-text m-in">
                        <h2>Bạn đã có tài khoản</h2>
                        <p>
                            Nếu bạn đã có tài khoản, chỉ cần đăng nhập. Chúng tôi rất nhớ
                            bạn!
                        </p>

                    </div>
                    <div class="img-btn">
                        <span class="m-up">Đăng ký</span>
                        <span class="m-in">Đăng Nhập</span>
                    </div>
                </div>
                <div class="form sign-up">
                    <h2>Đăng Ký</h2>
                    <form action="" id="box-register" method="post">
                        <label>
                            <span>Tên Của Bạn</span>
                            <input type="text" name="register-name" />
                        </label>
                        <label>
                            <span>Số Điện Thoại</span>
                            <input type="text" name="register-phone" />
                        </label>
                        <label>
                            <span>Địa Chỉ Email</span>
                            <input type="email" name="register-email" />
                        </label>
                        <label>
                            <span>Mật Khẩu</span>
                            <input type="password" name="register-pass" id="register-pass" />
                        </label>
                        <label>
                            <span>Nhập lại mật khẩu</span>
                            <input type="password" name="register-repass" />
                        </label>
                        <button type="submit" class="submit" name="register">Đăng ký ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>