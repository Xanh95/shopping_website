<!--views/layouts/main.php-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8" />
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" />
    <title><?php echo $this->page_title; ?></title>
    <!-- include summernote css/js -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- jqueryui -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!--  font awesome-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- my css js -->
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="assets/css/products.css" />
    <link rel="stylesheet" href="assets/css/index-system.css" />
    <script src="assets/js/index-system.js" defer></script>
</head>

<body>
    <header>
        <nav class="header">
            <div class="box-logo">
                <a href="administrator/congratulate/">
                    <img src="./assets/img/logo/logo.png" alt="./assets/img/logo/logo.png" title="Trang Chủ"
                        class="img-logo" />
                </a>
            </div>
            <div class="d-flex">
                <div class="box-icon" href="#menu" role="button" id="menu">
                    <img src="assets/img/svg/menu.svg" alt="assets/img/svg/menu.svg" />
                </div>
                <span class="span-header">Danh mục</span>
            </div>
            <div class="box-seach">
                <form action="" class="form-search" id="formSearchHeader">
                    <input type="search" placeholder="Tìm kiếm Đơn Hàng" class="has-submit" />
                    <button type="reset" class="search-cancel"></button>
                    <button type="submit" class="btn-search"></button>
                </form>
            </div>
            <div class="box-account">
                <div class="box-icon">
                    <img src="assets/img/svg/profile.svg" alt="assets/img/svg/profile.svg" title="notify" />
                </div>

                <span class="username">
                    <?php
                    echo $_SESSION['user'];
                    $role = '';
                    switch ($_SESSION['role']) {
                        case 0:
                            $role = "Giám Đốc";
                            break;

                        case 2:
                            $role = "Trưởng Phòng";
                            break;
                        case 3:
                            $role = "Quản Lý";
                            break;
                        case 4:
                            $role = "Nhân Viên";
                            break;
                    };
                    echo " ($role)";
                    ?>
                    <a href="./administrator/editpass">Đổi mật khẩu</a></span>
                <a href="./administrator/logout">Logout</a>
            </div>
        </nav>
    </header>

    <main class="main" id="main">
        <div class="sidebar" id="sidebar">
            <img src="assets/img/login-robot.png" alt="assets/img/login-robot.png" class="checkin-menu" id="robot" />
            <div id="accordion">

                <?php if ($_SESSION['role'] < 4) : ?>
                <div class="menu-item">
                    <div class="item" id="headingOne">
                        <h5 class="mb-0">
                            <button class="title-menu" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Nhân Sự
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="menu-item-body">
                            <ul>
                                <li id="item-1"><a href="employee/index">Danh sách nhân sự</a></li>
                                <li id="item-2"><a href="employee/create">Thêm mới nhân sự</a></li>
                                <li id="item-3"><a href="department/create">Thêm mới Bộ Phận</a></li>
                                <li id="item-12"><a href="department/index">Danh Sách Bộ Phận</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="menu-item">
                    <div class="item" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="title-menu" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                Đơn hàng
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="menu-item-body">
                            <ul>
                                <li id="item-4"><a>Danh sách đơn hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="item" id="headingThree">
                        <h5 class="mb-0">
                            <button class="title-menu" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                Sản Phẩm
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="menu-item-body">
                            <ul>
                                <li id="item-5"><a href="products/index">Danh sách Sản Phẩm</a></li>
                                <li id="item-6"><a href="products/create">Thêm Sản Phẩm</a></li>
                                <li id="item-10"><a href="listproducts/index">Danh sách Danh Mục</a></li>
                                <li id="item-11"><a href="listproducts/create">Thêm Danh Mục</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="item" id="headingfour">
                        <h5 class="mb-0">
                            <button class="title-menu" data-toggle="collapse" data-target="#collapsefour"
                                aria-expanded="false" aria-controls="collapsefour">
                                khách hàng
                            </button>
                        </h5>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                        <div class="menu-item-body">
                            <ul>
                                <li id="item-7"><a>Danh sách khách hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="item" id="headingfive">
                        <h5 class="mb-0">
                            <button class="title-menu" data-toggle="collapse" data-target="#collapsefive"
                                aria-expanded="false" aria-controls="collapsefive">
                                Bài viết
                            </button>
                        </h5>
                    </div>
                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                        <div class="menu-item-body">
                            <ul>
                                <li id="item-8">
                                    <a href="post/create">Thêm khuyến mãi</a>
                                </li>
                                <li id="item-9">
                                    <a href="post/index">Danh sách khuyến mãi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- Hiển thị các lỗi, session lỗi, session thành công tại file
layout-->
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


            <div class="action-container" id="results-ajax">

                <?php echo $this->content; ?>
            </div>
        </div>
    </main>
</body>
<footer>
    <div class="text-center">
        <div class="f-bottom-copyright">© 2023 - Bản quyền của Tăng Xuân Anh</div>
    </div>
</footer>

</html>