<!--views/layouts/home.php-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $this->page_title; ?></title>
    <!-- bootstrap jqery font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- my css -->
    <link rel="stylesheet" href="assets/css/products.css">
    <link rel="stylesheet" href="assets/css/index.css" />
    <script src="assets/js/index.js" defer></script>
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
                        <img src="assets/img/svg/menu.svg" alt="assets/img/svg/menu.svg" />
                    </div>
                    <span class="span-header">Danh mục</span>
                    <div class="menu-list collapse multi-collapse" id="menu">
                        <div class="items">
                            <ul>
                                <li>
                                    <a href="home/index">
                                        <img src="assets/img/svg/home.svg" alt="assets/img/svg/home.svg" title="home" />
                                        <span class="text-item-dropdow">Trang Chủ</span>
                                    </a>
                                </li>
                                <li class="have-menu">
                                    <a href="home/pcgaming">
                                        <img src="assets/img/svg/tintuc.svg" alt="assets/img/svg/tintuc.svg"
                                            title="tin tức" />
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
                                    <a href="#" target="_blank">
                                        <img src="assets/img/svg/cart-icon.svg" alt="img/svg/cart-icon.svg"
                                            title="giỏ hàng" />
                                        <span class="text-item-dropdow">Giỏ Hàng</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
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
                                    <a href="home/pcgaming">
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
                        <input type="search" placeholder="Tìm kiếm" class="has-submit" />
                        <button type="reset" class="search-cancel"></button>
                        <button type="submit" class="btn-search"></button>
                    </form>
                </div>
                <div class="d-flex">
                    <div class="box-notify">
                        <div class="box-icon-cart">
                            <img src="assets/img/svg/cart-icon-gray.svg" alt="img/svg/cart-icon-gray.svg"
                                title="Giỏ Hàng" />
                            <span class="notify-number">9+</span>
                        </div>
                    </div>
                    <div class="box-account">
                        <div class="box-icon">
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

        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide banner" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block img-banner" src="assets/img/banner/ban-ghe-gaming.png" alt="First slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-banner" src="assets/img/banner/bpc.png" alt="Second slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-banner" src="assets/img/banner/chuot-gaming.png" alt="Third slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-banner" src="assets/img/banner/laptop-dohoa.png" alt="fourth slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-banner" src="assets/img/banner/laptop-gaming.png" alt="fifth slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-banner" src="assets/img/banner/manhinh-gaming.png" alt="sixth slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-banner" src="assets/img/banner/pc-dohoa.png" alt="seventh slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-banner" src="assets/img/banner/pcgaming.png" alt="eighth slide" />
                        <!-- <div class="carousel-caption d-none d-md-block">
                <h5>sieu nhan do</h5>
                <p>3000</p>
              </div> -->
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div id="toast-cart">
            </div>
            <div class="popup-cart ">
                <div class="box-cart">
                    <div class="container">
                        <div class="cart-header">
                            <h6 class="number-cart-title">Bạn đang có 6 sản phẩm</h6>
                            <img src="assets/img/svg/close.svg" class="close" alt="img/svg/close.svg" title="Đóng">
                        </div>
                        <div class="container-content">
                            <div class="products-cart">
                                <div class="product-cart">
                                    <div class="product-cart-img"><img class="img-fluid"
                                            src="assets/img/pc/Glacier-I1660-Super-WH-228x228.jpg" alt=""></div>
                                    <div class="product-cart-text">
                                        <a href="#">Bàn Phím Cơ E-DRA EK387FL - Polar Night - Red Switch</a>
                                        <div class="product-price">19.363.000 vnđ</div>
                                    </div>
                                    <div class="product-cart-action">
                                        <div class="cart-p-qty"><span class="qty-decrease">-</span>
                                            <input type="tel" class="qty-input"><span class="qty-increase">+</span>
                                        </div>
                                        <div class="cart-p-remove">
                                            <img src="assets/img/svg/Trash.svg" alt="img/svg/Trash.svg">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-cart">
                                    <div class="product-cart-img"><img class="img-fluid"
                                            src="assets/img/pc/Glacier-I1660-Super-WH-228x228.jpg" alt=""></div>
                                    <div class="product-cart-text">
                                        <a href="#">Bàn Phím Cơ E-DRA EK387FL - Polar Night - Red Switch</a>
                                        <div class="product-price">19.363.000 vnđ</div>
                                    </div>
                                    <div class="product-cart-action">
                                        <div class="cart-p-qty"><span class="qty-decrease">-</span>
                                            <input type="tel" class="qty-input"><span class="qty-increase">+</span>
                                        </div>
                                        <div class="cart-p-remove">
                                            <img src="assets/img/svg/Trash.svg" alt="img/svg/Trash.svg">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-cart">
                                    <div class="product-cart-img"><img class="img-fluid"
                                            src="assets/img/pc/Glacier-I1660-Super-WH-228x228.jpg" alt=""></div>
                                    <div class="product-cart-text">
                                        <a href="#">Bàn Phím Cơ E-DRA EK387FL - Polar Night - Red Switch</a>
                                        <div class="product-price">19.363.000 vnđ</div>
                                    </div>
                                    <div class="product-cart-action">
                                        <div class="cart-p-qty"><span class="qty-decrease">-</span>
                                            <input type="tel" class="qty-input"><span class="qty-increase">+</span>
                                        </div>
                                        <div class="cart-p-remove">
                                            <img src="assets/img/svg/Trash.svg" alt="img/svg/Trash.svg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="total-pay">
                                <div class="container">
                                    <h6>Thông tin giỏ hàng</h6>
                                    <div class="products-count">
                                        <span class="products-count-text">Số lượng sản phẩm :</span>
                                        <span class="products-count-number">20</span>
                                    </div>
                                    <div class="total-cart">
                                        <span class="total-cart-text">Tổng chi phí :</span>
                                        <span class="total-cart-number">64.782.000 vnđ</span>
                                    </div>
                                    <div
                                        style="font-size: 14px; color: rgb(78, 78, 84); font-weight: normal; justify-content: flex-end;">
                                        Đã bao gồm VAT (nếu có)</div>
                                    <button href="#" class="btn-cart-confirm">
                                        Thanh toán
                                    </button>
                                    <a href="#" class="btn-cart-dell">Xoá Giỏ Hàng</a>
                                    <a href="#" class="btn-cart-more">Xem Sản Phẩm Khác</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="block-home">
                <div class="block-header">
                    <span class="block-header-title">DANH MỤC SẢN PHẨM</span>
                </div>
                <div class="block-content home-category">
                    <a href="home/pcgaming">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(26, 93, 196);">
                        </div>
                        <img src="assets/img/cat_maytinh_v2.png" alt="">
                        <div class="text">
                            <div>PC Gaming</div>
                            <div class="sm">Chiến mọi game</div>
                        </div>
                    </a>
                    <a href="home/banphim">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(13, 20, 48);">
                        </div>
                        <img src="assets/img/cat_banphimco_v2.png" alt="">
                        <div class="text">
                            <div>Bàn Phím Cơ</div>
                            <div class="sm">Gõ lướt <br>như bay
                            </div>
                        </div>
                    </a>
                    <a href="home/pcwork">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(1, 249, 201);">
                        </div>
                        <img src="assets/img/cat_dohoa_v3.png" alt="">
                        <div class="text">
                            <div>PC ĐỒ HỌA</div>
                            <div class="sm">TỐI ƯU CÔNG VIỆC</div>
                        </div>
                    </a>
                    <a href="home/laptopgaming">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(255, 204, 58);">
                        </div>
                        <img src="assets/img/cat_ laptop_v2.png" alt="">
                        <div class="text">
                            <div>GAMING LAPTOP</div>
                            <div class="sm">Làm chủ cuộc chơi <br>mọi nơi</div>
                        </div>
                    </a>
                    <a href="home/manhinh">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(209, 33, 55);"></div>
                        <img src="assets/img/cat_manhinhgame_v2.png" alt="">
                        <div class="text">
                            <div>MÀN HÌNH<br> GAMING</div>
                            <div class="sm">tận hưởng<br> thế giới game</div>
                        </div>
                    </a>
                    <a href="home/laptopvp">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(52, 61, 87);"></div>
                        <img src="assets/img/cat_laptop_hoctap_v2.png" alt="">
                        <div class="text">
                            <div>laptop<br> văn phòng</div>
                            <div class="sm">Mỏng nhẹ,<br> bền bỉ</div>
                        </div>
                    </a>
                    <a href="home/chuot">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(255, 144, 5);"></div>
                        <img src="assets/img/cat_chuot_gaming_v2.png" alt="">
                        <div class="text">
                            <div>Chuột <br>Gaming</div>
                            <div class="sm">chuyên nghiệp <br>từng cú click</div>
                        </div>
                    </a>
                    <a href="home/ghe">
                        <div class="shape" style="border-color: rgb(41, 50, 78) transparent rgb(253, 242, 146);"></div>
                        <img src="assets/img/cat_banghe_gaming_v2.png" alt="">
                        <div class="text">
                            <div>Ghế gaming</div>
                            <div class="sm">hiện đại, thoải mái</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="intro">
                <div class="intro-header">
                    <span class="intro-header-title">GIỚI THIỆU VỀ GH</span>
                </div>
                <div class="intro-content">
                    <div class="intro-content-info">
                        <div class="intro-text">
                            <h3>Green-Home - Chất Lượng uy tín hàng đầu Việt Nam!</h3>
                        </div>
                        <span class="intro-span">
                            Green-Home tự hào với tôn chỉ luôn lấy khách hàng làm trọng tâm bằng
                            việc cung cấp các dịch vụ hậu mãi chu đáo, tận tâm để mang đến cho
                            khách hàng những sản phẩm có chất lượng và trải nghiệm với Web và
                            vóc dáng cơ thể tốt nhất! Chúng tôi đảm bảo bạn sẽ có được những
                            trải nghiệm tuyệt vời nhất khi, sử dụng các dịch vụ và sản phẩm của
                            Green-Home.
                        </span>
                    </div>
                    <div class="intro-img">
                        <img src="assets/img/intro-demo.png" alt="" />
                        <a href="https://www.youtube.com/channel/UCdWP4f3gZTNPc4VzciBeNZg"><span
                                class="btn-play"></span></a>
                    </div>
                </div>
            </div>

            <div class="products">
                <div class="container-fluid">

                    <div class="row d-flex justify-content-around card-container">
                        <div class="col-md-6 col-sm-12 col-xl-3 col-lg-4 card-product">

                            <div class="card-product-body intro-body">
                                <div class="card-product-img justify-content-center">
                                    <a href="#">
                                        <img src="assets/img/intro1.svg" alt="img/intro1.svg"
                                            class="img-fluid img-product" />
                                    </a>
                                </div>

                                <div class="service-title">
                                    <h6>
                                        Sản phẩm, dịch vụ đa dạng, cập nhật thường xuyên
                                    </h6>
                                </div>
                                <div class="service-text">
                                    <span>
                                        Hệ thống luôn cung cấp, cập nhật những sản phẩm mới/hot nhất trên thị trường.
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xl-3 col-lg-4 card-product">

                            <div class="card-product-body intro-body">
                                <div class="card-product-img justify-content-center">
                                    <a href="#">
                                        <img src="assets/img/intro2.svg" alt="img/intro2.svg"
                                            class="img-fluid img-product" />
                                    </a>
                                </div>

                                <div class="service-title">
                                    <h6>
                                        Hàng nghìn khách hàng tin tưởng
                                    </h6>
                                </div>
                                <div class="service-text">
                                    <span>Hơn 260.000 giao dịch thành công mỗi ngày. Chúng tôi luôn đặt uy tín, chất
                                        lượng dịch vụ lên hàng đầu.</span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xl-3 col-lg-4 card-product">

                            <div class="card-product-body intro-body">
                                <div class="card-product-img justify-content-center">
                                    <a href="#">
                                        <img src="assets/img/intro3.svg" alt="img/intro3.svg"
                                            class="img-fluid img-product" />
                                    </a>
                                </div>

                                <div class="service-title">
                                    <h6>Trung tâm trợ giúp hỗ trợ tư vấn 24/24</h6>
                                </div>
                                <div class="service-text">
                                    <span> Đội ngũ chăm sóc khách hàng luôn tư vấn và hỗ trợ nhiệt tình khi gặp sự
                                        cố trong quá trình trải nghiệm sản phẩm.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xl-3 col-lg-4 card-product">
                            <div class="card-product-body intro-body">
                                <div class="card-product-img justify-content-center">
                                    <a href="#">
                                        <img src="assets/img/intro4.svg" alt="img/intro4.svg"
                                            class="img-fluid img-product" />
                                    </a>
                                </div>

                                <div class="service-title">
                                    <h6>Giá cả ưu đãi, siêu rẻ trên thị trường</h6>
                                </div>
                                <div class="service-text">
                                    <span>Cung cấp những sản phẩm với giá cả tốt nhất cùng với đó là những ưu đãi vô
                                        cùng hấp dẫn.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="products-hr" />
            </div>


            <div class="contact-box-bottom">
                <a class="contact-box-wrapper nut-chat-facebook" href="https://www.messenger.com/t/100001510042170"
                    rel="nofollow" target="_blank">
                    <div class="contact-icon-box" style="border: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 800">
                            <radialGradient id="a" cx="101.9" cy="809" r="1.1"
                                gradientTransform="matrix(800 0 0 -800 -81386 648000)" gradientUnits="userSpaceOnUse">
                                <stop offset="0" style="stop-color:#09f"></stop>
                                <stop offset=".6" style="stop-color:#a033ff"></stop>
                                <stop offset=".9" style="stop-color:#ff5280"></stop>
                                <stop offset="1" style="stop-color:#ff7061"></stop>
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
                    <div class="contact-icon-box" style="border: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 161.5 161.5">
                            <path
                                d="M504.54,431.79h14.31c19.66,0,31.15,2.89,41.35,8.36a56.65,56.65,0,0,1,23.65,23.65c5.47,10.2,8.36,21.69,8.36,41.35V519.4c0,19.66-2.89,31.15-8.36,41.35a56.65,56.65,0,0,1-23.65,23.65c-10.2,5.47-21.69,8.36-41.35,8.36H504.6c-19.66,0-31.15-2.89-41.35-8.36a56.65,56.65,0,0,1-23.65-23.65c-5.47-10.2-8.36-21.69-8.36-41.35V505.14c0-19.66,2.89-31.15,8.36-41.35a56.65,56.65,0,0,1,23.65-23.65C473.39,434.68,484.94,431.79,504.54,431.79Z"
                                transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path>
                            <path
                                d="M592.21,517v2.35c0,19.66-2.89,31.15-8.35,41.35a56.65,56.65,0,0,1-23.65,23.65c-10.2,5.47-21.69,8.36-41.35,8.36H504.6c-16.09,0-26.7-1.93-35.62-5.63L454.29,572Z"
                                transform="translate(-431.25 -431.25)"
                                style="fill:#001a33;opacity:0.11999999731779099;isolation:isolate"></path>
                            <path
                                d="M455.92,572.51c7.53.83,16.94-1.31,23.62-4.56,29,16,74.38,15.27,101.84-2.3q1.6-2.4,3-5c5.49-10.24,8.39-21.77,8.39-41.5v-14.3c0-19.73-2.9-31.26-8.39-41.5a56.86,56.86,0,0,0-23.74-23.74c-10.24-5.49-21.77-8.39-41.5-8.39H504.76c-16.8,0-27.71,2.12-36.88,6.15q-.75.67-1.47,1.37c-26.89,25.92-28.93,82.11-6.13,112.64l.08.14c3.51,5.18.12,14.24-5.18,19.55C454.32,571.89,454.63,572.39,455.92,572.51Z"
                                transform="translate(-431.25 -431.25)" style="fill:#fff"></path>
                            <path
                                d="M497.35,486.34H465.84v6.76h21.87l-21.56,26.72a6.06,6.06,0,0,0-1.17,4v1.72h29.73a2.73,2.73,0,0,0,2.7-2.7v-3.62h-23l20.27-25.43,1.11-1.35.12-.18a8,8,0,0,0,1.41-5Z"
                                transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path>
                            <path d="M537.47,525.54H542v-39.2h-6.76v36.92A2.27,2.27,0,0,0,537.47,525.54Z"
                                transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path>
                            <path
                                d="M514.37,495.07a15.36,15.36,0,1,0,15.36,15.36A15.36,15.36,0,0,0,514.37,495.07Zm0,24.39a9,9,0,1,1,9-9A9,9,0,0,1,514.37,519.46Z"
                                transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path>
                            <path
                                d="M561.92,494.82A15.48,15.48,0,1,0,577.4,510.3,15.5,15.5,0,0,0,561.92,494.82Zm0,24.64a9.09,9.09,0,1,1,9.09-9.09A9.07,9.07,0,0,1,561.92,519.46Z"
                                transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path>
                            <path d="M526.17,525.54h3.62V495.93h-6.33v27A2.72,2.72,0,0,0,526.17,525.54Z"
                                transform="translate(-431.25 -431.25)" style="fill:#0068ff"></path>
                        </svg>
                    </div>
                    <!-- <div class="contact-info">
                <b>Chat Zalo</b>
                <br>
                <span>(8h-22h)</span>
            </div> -->
                </a>
                <a class="contact-box-wrapper nut-goi-hotline" href="tel:0389607406">
                    <div class="contact-icon-box" style="color: #ed1b24;"><i class="fas fa-phone-alt"></i>
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
                        <p><a href="">Giới thiệu GH Store</a>
                        </p>
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
                                <img src="assets/img/facebook.png"></a>
                            <a href="https://www.youtube.com/channel/UCdWP4f3gZTNPc4VzciBeNZg" target="_blank">
                                <img src="assets/img/youtube.png">
                            </a>
                            <a href="https://www.instagram.com/bach.t.vuong/" target="_blank">
                                <img src="assets/img/instagram.png">
                            </a>
                        </div>
                        <span style="overflow-wrap: anywhere; color: white">Email: tangxuananh1995@gmail.com</span>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d232.6981151682157!2d105.88372265090887!3d21.065877654426778!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a9dbfc01980d%3A0xb123b4159b94d55b!2zSExWIGRpbmggZMaw4buhbmcgc-G7qWMga2hv4bq7IHbDs2MgZMOhbmc!5e0!3m2!1svi!2s!4v1682176596047!5m2!1svi!2s"
                            width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="footer-bottom text-center">

                <div class="f-bottom-copyright">© 2023 - Bản quyền của Tăng Xuân Anh</div>

            </div>

    </footer>

</body>

</html>