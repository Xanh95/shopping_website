<!--views/layouts/products.php-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $this->page_title; ?></title>
    <!-- bootstrap jquery font-awesome Slick -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"
        integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jqueryui -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- my css and js -->
    <script src="assets/js/index.js" defer></script>
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="assets/css/products.css" />
    <script src="assets/js/produtcs.js" defer></script>
</head>

<body>
    <header class="heading">
        <nav class="nav-heading">
            <div class="header-container d-flex">
                <div class="box-logo">
                    <a href="home/index">

                        <img src="assets/img/logo/logo.png" alt="assets/img/logo/logo.png" title="logo"
                            class="img-logo" />
                    </a>
                </div>
                <div class="d-flex">
                    <div class="box-icon" data-toggle="collapse" href="#menu" role="button" aria-expanded="false"
                        aria-controls="menu">
                        <img src="assets/img/svg/menu.svg" alt="img/svg/menu.svg" />
                    </div>
                    <span class="span-header">Danh mục</span>
                    <div class="menu-list collapse multi-collapse" id="menu">
                        <div class="items">
                            <ul>
                                <li>
                                    <a href="home/index">
                                        <img src="assets/img/svg/home.svg" alt="img/svg/home.svg" title="home" />
                                        <span class="text-item-dropdow">Trang Chủ</span>
                                    </a>
                                </li>
                                <li class="have-menu">
                                    <a href="home/pcgaming">
                                        <img src="assets/img/svg/tintuc.svg" alt="img/svg/tintuc.svg" title="tin tức" />
                                        <span class="text-item-dropdow">Danh sách sản phẩm</span>
                                    </a>
                                    <ul class="drop-menu">
                                        <li><a href="home/banphim">Bàn Phím Cơ</a></li>
                                        <li><a href="home/manhinh">Màn Hình Gaming</a></li>
                                        <li><a href="home/chuot">Chuột Gaming</a></li>
                                        <li><a href="home/ghe">Ghế Gaming</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="home/confirmCart" target="_blank">
                                        <img src="assets/img/svg/cart-icon.svg" alt="img/svg/cart-icon.svg"
                                            title="giỏ hàng" />
                                        <span class="text-item-dropdow">Giỏ Hàng </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="home/confirmPay">
                                        <img src="assets/img/svg/napviatm.svg" alt="img/svg/napviatm.svg"
                                            title="thanh toán ATM" />
                                        <span class="text-item-dropdow">Thanh toán ATM</span>
                                    </a>
                                </li>
                                <li class="have-menu">
                                    <a href="home/pcgaming">
                                        <img src="assets/img/svg/pc.svg" alt="img/svg/pc.svg" title="pc" />
                                        <span class="text-item-dropdow">Bộ PC</span>
                                    </a>
                                    <ul class="drop-menu">
                                        <li><a href="home/pcgaming">Gaming</a></li>
                                        <li><a href="home/pcwork">Văn phòng</a></li>
                                    </ul>
                                </li>
                                <li class="have-menu">
                                    <a href="#">
                                        <img src="assets/img/svg/laptop.svg" alt="img/svg/laptop.svg" title="laptop"
                                            title="laptop" />
                                        <span class="text-item-dropdow">Laptop</span>
                                    </a>
                                    <ul class="drop-menu">
                                        <li><a href="home/laptopgaming">Gaming</a></li>
                                        <li><a href="home/laptopvp">Văn phòng</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex sale">
                    <a href="home/sale">
                        <div class="box-icon">
                            <img src="assets/img/svg/sale.svg" alt="img/svg/sale.svg" title="Sale" />
                        </div>
                    </a>
                    <span class="span-header">Khuyến mãi</span>
                </div>
                <div class="box-seach">
                    <form action="" class="form-search" id="formSearchHeader">
                        <input type="search" placeholder="Tìm kiếm" class="has-submit"
                            id="ipt_search_name_product_nav" />
                        <button type="reset" class="search-cancel"></button>
                        <button type="submit" class="btn-search" id="btn_search_name_product_nav"></button>
                    </form>
                </div>
                <div class="d-flex">
                    <div class="box-notify">
                        <div class="box-icon-cart">
                            <img src="assets/img/svg/cart-icon-gray.svg" alt="img/svg/cart-icon-gray.svg"
                                title="Giỏ hàng" />
                            <div id="notify-box-cart">
                                <?php if (isset($_SESSION['total_quantity']) && ($_SESSION['total_quantity']) > 0) : ?>
                                <span class="notify-number"><?php echo $_SESSION['total_quantity'] ?></span>
                                <?php endif ?>
                            </div>

                        </div>
                    </div>
                    <div class="box-account">
                        <div class="box-icon <?php echo isset($_SESSION['email']) ? "logged" : "" ?>">
                            <a href="profile/info">

                                <img src="assets/img/svg/profile.svg" alt="img/svg/profile.svg" title="profile" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div id="toast-cart"></div>

        <div class="popup-cart">
            <div class="box-cart" id="pop-box-cart">

            </div>
        </div>
        <div class="container-products">
            <div class="grid">
                <div class="user-activity">
                    <ul>
                        <li><a href="home/pcgaming">PC - Gaming</a></li>
                        <li><a href="home/pcwork">PC - Đồ Hoạ/Văn Phòng</a></li>
                        <li><a href="home/laptopgaming">Laptop Gaming</a></li>
                        <li><a href="home/laptopvp">Laptop Văn phòng</a></li>
                        <li><a href="home/banphim">Bàn Phím</a></li>
                        <li><a href="home/manhinh">Màn Hình</a></li>
                        <li><a href="home/chuot">Chuột Gaming</a></li>
                        <li><a href="home/ghe">Ghế Gaming</a></li>
                        <li><a href="home/sale">Tin Tức Khuyến Mãi</a></li>

                    </ul>
                </div>
                <div class="show-activity" id="result-ajax">
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
                    <?php echo $this->content; ?>

                </div>
            </div>
        </div>
        <!-- </div>  -->
        <div class="contact-box-bottom">
            <a class="contact-box-wrapper nut-chat-facebook" href="https://www.messenger.com/t/100001510042170"
                rel="nofollow" target="_blank">
                <div class="contact-icon-box" style="border: none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800">
                        <radialGradient id="a" cx="101.9" cy="809" r="1.1"
                            gradientTransform="matrix(800 0 0 -800 -81386 648000)" gradientUnits="userSpaceOnUse">
                            <stop offset="0" style="stop-color: #09f"></stop>
                            <stop offset=".6" style="stop-color: #a033ff"></stop>
                            <stop offset=".9" style="stop-color: #ff5280"></stop>
                            <stop offset="1" style="stop-color: #ff7061"></stop>
                        </radialGradient>
                        <path fill="url(#a)"
                            d="M400 0C174.7 0 0 165.1 0 388c0 116.6 47.8 217.4 125.6 287 6.5 5.8 10.5 14 10.7 22.8l2.2 71.2a32 32 0 0 0 44.9 28.3l79.4-35c6.7-3 14.3-3.5 21.4-1.6 36.5 10 75.3 15.4 115.8 15.4 225.3 0 400-165.1 400-388S625.3 0 400 0z">
                        </path>
                        <path fill="#FFF"
                            d="m159.8 501.5 117.5-186.4a60 60 0 0 1 86.8-16l93.5 70.1a24 24 0 0 0 28.9-.1l126.2-95.8c16.8-12.8 38.8 7.4 27.6 25.3L522.7 484.9a60 60 0 0 1-86.8 16l-93.5-70.1a24 24 0 0 0-28.9.1l-126.2 95.8c-16.8 12.8-38.8-7.3-27.5-25.2z">
                        </path>
                    </svg>
                </div>
                <!-- <div class="contact-info">
                <b>Chat Facebook</b>
                <br>
                <span>(8h-22h)</span>
            </div> -->
            </a>
            <a class="contact-box-wrapper nut-chat-zalo" href="https://zalo.me/0389607406" rel="nofollow"
                target="_blank">
                <div class="contact-icon-box" style="border: none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 161.5 161.5">
                        <path
                            d="M504.54,431.79h14.31c19.66,0,31.15,2.89,41.35,8.36a56.65,56.65,0,0,1,23.65,23.65c5.47,10.2,8.36,21.69,8.36,41.35V519.4c0,19.66-2.89,31.15-8.36,41.35a56.65,56.65,0,0,1-23.65,23.65c-10.2,5.47-21.69,8.36-41.35,8.36H504.6c-19.66,0-31.15-2.89-41.35-8.36a56.65,56.65,0,0,1-23.65-23.65c-5.47-10.2-8.36-21.69-8.36-41.35V505.14c0-19.66,2.89-31.15,8.36-41.35a56.65,56.65,0,0,1,23.65-23.65C473.39,434.68,484.94,431.79,504.54,431.79Z"
                            transform="translate(-431.25 -431.25)" style="fill: #0068ff"></path>
                        <path
                            d="M592.21,517v2.35c0,19.66-2.89,31.15-8.35,41.35a56.65,56.65,0,0,1-23.65,23.65c-10.2,5.47-21.69,8.36-41.35,8.36H504.6c-16.09,0-26.7-1.93-35.62-5.63L454.29,572Z"
                            transform="translate(-431.25 -431.25)" style="
                  fill: #001a33;
                  opacity: 0.11999999731779099;
                  isolation: isolate;
                "></path>
                        <path
                            d="M455.92,572.51c7.53.83,16.94-1.31,23.62-4.56,29,16,74.38,15.27,101.84-2.3q1.6-2.4,3-5c5.49-10.24,8.39-21.77,8.39-41.5v-14.3c0-19.73-2.9-31.26-8.39-41.5a56.86,56.86,0,0,0-23.74-23.74c-10.24-5.49-21.77-8.39-41.5-8.39H504.76c-16.8,0-27.71,2.12-36.88,6.15q-.75.67-1.47,1.37c-26.89,25.92-28.93,82.11-6.13,112.64l.08.14c3.51,5.18.12,14.24-5.18,19.55C454.32,571.89,454.63,572.39,455.92,572.51Z"
                            transform="translate(-431.25 -431.25)" style="fill: #fff"></path>
                        <path
                            d="M497.35,486.34H465.84v6.76h21.87l-21.56,26.72a6.06,6.06,0,0,0-1.17,4v1.72h29.73a2.73,2.73,0,0,0,2.7-2.7v-3.62h-23l20.27-25.43,1.11-1.35.12-.18a8,8,0,0,0,1.41-5Z"
                            transform="translate(-431.25 -431.25)" style="fill: #0068ff"></path>
                        <path d="M537.47,525.54H542v-39.2h-6.76v36.92A2.27,2.27,0,0,0,537.47,525.54Z"
                            transform="translate(-431.25 -431.25)" style="fill: #0068ff"></path>
                        <path
                            d="M514.37,495.07a15.36,15.36,0,1,0,15.36,15.36A15.36,15.36,0,0,0,514.37,495.07Zm0,24.39a9,9,0,1,1,9-9A9,9,0,0,1,514.37,519.46Z"
                            transform="translate(-431.25 -431.25)" style="fill: #0068ff"></path>
                        <path
                            d="M561.92,494.82A15.48,15.48,0,1,0,577.4,510.3,15.5,15.5,0,0,0,561.92,494.82Zm0,24.64a9.09,9.09,0,1,1,9.09-9.09A9.07,9.07,0,0,1,561.92,519.46Z"
                            transform="translate(-431.25 -431.25)" style="fill: #0068ff"></path>
                        <path d="M526.17,525.54h3.62V495.93h-6.33v27A2.72,2.72,0,0,0,526.17,525.54Z"
                            transform="translate(-431.25 -431.25)" style="fill: #0068ff"></path>
                    </svg>
                </div>
                <!-- <div class="contact-info">
                <b>Chat Zalo</b>
                <br>
                <span>(8h-22h)</span>
            </div> -->
            </a>
            <a class="contact-box-wrapper nut-goi-hotline" href="tel:0389607406">
                <div class="contact-icon-box" style="color: #ed1b24">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <!-- <div class="contact-info">
                <b>1900.1903</b>
                <br>
                <span>(8h-22h)</span>
            </div> -->
            </a>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="f-links">
                    <div class="f-links-group">
                        <span class="f-title">Thông tin chung</span>
                        <p><a href="">Giới thiệu GH Store</a></p>
                        <p><a href="">Tuyển dụng</a></p>
                        <p><a href="#">Tin tức</a></p>
                        <p><a href="#">Ý kiến khách hàng</a></p>
                        <p><a href="#">Liện hệ hợp tác</a></p>
                    </div>
                    <div class="f-links-group">
                        <span class="f-title">Chính sách chung</span>
                        <p><a href="#">Quy định chung</a></p>
                        <p><a href="#">Chính sách vận chuyển</a></p>
                        <p><a href="#">Chính sách bảo hành</a></p>
                        <p><a href="#">Chính sách đổi, trả lại hàng</a></p>
                        <p><a href="">Chính sách cho doanh nghiệp</a></p>
                    </div>
                    <div class="f-links-group">
                        <span class="f-title">Thông tin khuyến mãi</span>
                        <p><a href="#">Sản phẩm bán chạy</a></p>
                        <p><a href="#">Sản phẩm khuyến mãi</a></p>
                        <p><a href="#">Hàng thanh lý</a></p>
                    </div>
                    <div class="f-links-group">
                        <span class="f-title">Follow us!</span>

                        <div class="f-links-social">
                            <a href="https://www.facebook.com/bach.t.vuong" target="_blank">
                                <img src="assets/img/facebook.png" />
                            </a>
                            <a href="https://www.youtube.com/channel/UCdWP4f3gZTNPc4VzciBeNZg" target="_blank">
                                <img src="assets/img/youtube.png" />
                            </a>
                            <a href="https://www.instagram.com/bach.t.vuong/" target="_blank">
                                <img src="assets/img/instagram.png" />
                            </a>
                        </div>
                        <span style="overflow-wrap: anywhere; color: white">Email: tangxuananh1995@gmail.com</span>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d232.6981151682157!2d105.88372265090887!3d21.065877654426778!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a9dbfc01980d%3A0xb123b4159b94d55b!2zSExWIGRpbmggZMaw4buhbmcgc-G7qWMga2hv4bq7IHbDs2MgZMOhbmc!5e0!3m2!1svi!2s!4v1682176596047!5m2!1svi!2s"
                            width="200" height="200" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <div class="f-bottom-copyright">
                    © 2023 - Bản quyền của Tăng Xuân Anh
                </div>
            </div>
        </div>
    </footer>
</body>

</html>