<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $this->page_title; ?></title>
    <!-- jquery -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <!--my css js-->
    <script src="assets/js/login-system.js" defer></script>
    <link rel="stylesheet" href="assets/css/login-system.css" />
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="form" id="login-system" action="" method="post">
        <h3>Đăng Nhập</h3>
        <!-- Hiển thị các lỗi, session lỗi, session thành công tại file
layout-->

        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="username" name="email" />

        <label for="password">Mật Khẩu</label>
        <input type="password" placeholder="Password" id="password" name="password" />
        <img src="assets/img/login-robot.png" alt="assets/img/login-robot.png" class="img" />

        <button type="submit" name="login-system">Đăng Nhập</button>
    </form>
    <h3 style="color: red" class="notification "><?php echo $this->error .  " ";
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
</body>

</html>