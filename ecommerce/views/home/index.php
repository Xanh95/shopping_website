<!--views/home/index.php-->

<div class="products">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between px-5">
            <div class="name-products">
                <h3> <i class="icon-title pc"></i>Máy Tính-PC Gaming</h3>
            </div>
            <div class="more-products">
                <a class="read-all" href="home/pcgaming" target="_blank" rel="noopener noreferrer">Xem thêm</a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <?php foreach ($pc_gaming as $values) : ?>
            <div class="col-md-3 col-sm-6 card-product">
                <div class="card-product-a">
                    <div class="details-product">
                        <div class="details-product-title">
                            <h5><?php echo $values['name'] ?></h5>
                        </div>
                        <div class="product-price">
                            Giá bán :
                            <?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="guarantee">
                            <span>Bảo hành <?php echo $values['guarantee'] ?></span>
                        </div>
                        <div class="title-hardware">
                            <img src="assets/img/svg/layer.svg" alt="img/svg/layer.svg" class="title-hardware-svg">
                            <span>Thông số sản phẩm</span>
                        </div>
                        <?php echo $values['short_details'] ?>
                    </div>
                    <div class="card-product-body">

                        <div class="card-product-img justify-content-center">
                            <a href="home/product/<?php echo $values['id'] ?>">
                                <img width="200" height="200"
                                    src="assets/img/products/<?php echo $values['avatar_products'] ?>"
                                    alt="img/products/<?php echo $values['avatar_products'] ?>"
                                    class="img-fluid img-product" />
                            </a>
                        </div>
                        <div class="box-btn">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_price"
                                value="<?php echo $values['price'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_name"
                                value="<?php echo $values['name'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_avatar_products"
                                value="<?php echo $values['avatar_products'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_quantity" value="1">
                            <button class="add-to-cart" data-id_product="<?php echo $values['id'] ?>"> Mua Ngay</button>
                            <button class="add-to-cart-nopopup" data-id_product="<?php echo $values['id'] ?>"> Thêm Giỏ
                                Hàng</button>
                        </div>

                        <div class="card-product-title">
                            <h6><?php echo $values['name'] ?></h6>
                        </div>
                        <div class="product-price"><?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="card-product-quantity">
                            <span><?php echo ($values['status'] == 1) ? 'Còn Hàng' : 'Hết Hàng(liên hệ)' ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <?php endforeach ?>

        </div>
    </div>
    <hr class="products-hr" />
</div>
<div class="products">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between px-5">
            <div class="name-products">
                <h3> <i class="icon-title laptop"></i>Máy Tính-LapTop Gaming</h3>
            </div>
            <div class="more-products">
                <a class="read-all" href="home/laptopgaming" target="_blank" rel="noopener noreferrer">Xem thêm</a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">

            <?php foreach ($laptop_gaming as $values) : ?>
            <div class="col-md-3 col-sm-6 card-product">
                <div class="card-product-a">
                    <div class="details-product">
                        <div class="details-product-title">
                            <h5><?php echo $values['name'] ?></h5>
                        </div>
                        <div class="product-price">
                            Giá bán :
                            <?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="guarantee">
                            <span>Bảo hành <?php echo $values['guarantee'] ?></span>
                        </div>
                        <div class="title-hardware">
                            <img src="assets/img/svg/layer.svg" alt="img/svg/layer.svg" class="title-hardware-svg">
                            <span>Thông số sản phẩm</span>
                        </div>
                        <?php echo $values['short_details'] ?>
                    </div>
                    <div class="card-product-body">

                        <div class="card-product-img justify-content-center">
                            <a href="home/product/<?php echo $values['id'] ?>">
                                <img width="200" height="200"
                                    src="assets/img/products/<?php echo $values['avatar_products'] ?>"
                                    alt="img/products/<?php echo $values['avatar_products'] ?>"
                                    class="img-fluid img-product" />
                            </a>
                        </div>
                        <div class="box-btn">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_price"
                                value="<?php echo $values['price'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_name"
                                value="<?php echo $values['name'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_avatar_products"
                                value="<?php echo $values['avatar_products'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_quantity" value="1">
                            <button class="add-to-cart" data-id_product="<?php echo $values['id'] ?>"> Mua Ngay</button>
                            <button class="add-to-cart-nopopup" data-id_product="<?php echo $values['id'] ?>"> Thêm Giỏ
                                Hàng</button>
                        </div>

                        <div class="card-product-title">
                            <h6><?php echo $values['name'] ?></h6>
                        </div>
                        <div class="product-price"><?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="card-product-quantity">
                            <span><?php echo ($values['status'] == 1) ? 'Còn Hàng' : 'Hết Hàng(liên hệ)' ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <?php endforeach ?>
        </div>
    </div>
    <hr class="products-hr" />
</div>
<div class="products">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between px-5">
            <div class="name-products">
                <h3> <i class="icon-title speak gaminggear"></i>Gaming Gears</h3>
            </div>
            <div class="more-products">
                <a class="read-all" href="home/banphim" target="_blank" rel="noopener noreferrer">Xem thêm</a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">

            <?php foreach ($gear as $values) : ?>
            <div class="col-md-3 col-sm-6 card-product">
                <div class="card-product-a">
                    <div class="details-product">
                        <div class="details-product-title">
                            <h5><?php echo $values['name'] ?></h5>
                        </div>
                        <div class="product-price">
                            Giá bán :
                            <?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="guarantee">
                            <span>Bảo hành <?php echo $values['guarantee'] ?></span>
                        </div>
                        <div class="title-hardware">
                            <img src="assets/img/svg/layer.svg" alt="img/svg/layer.svg" class="title-hardware-svg">
                            <span>Thông số sản phẩm</span>
                        </div>
                        <?php echo $values['short_details'] ?>
                    </div>
                    <div class="card-product-body">

                        <div class="card-product-img justify-content-center">
                            <a href="home/product/<?php echo $values['id'] ?>">
                                <img width="200" height="200"
                                    src="assets/img/products/<?php echo $values['avatar_products'] ?>"
                                    alt="img/products/<?php echo $values['avatar_products'] ?>"
                                    class="img-fluid img-product" />
                            </a>
                        </div>
                        <div class="box-btn">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_price"
                                value="<?php echo $values['price'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_name"
                                value="<?php echo $values['name'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_avatar_products"
                                value="<?php echo $values['avatar_products'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_quantity" value="1">
                            <button class="add-to-cart" data-id_product="<?php echo $values['id'] ?>"> Mua Ngay</button>
                            <button class="add-to-cart-nopopup" data-id_product="<?php echo $values['id'] ?>"> Thêm Giỏ
                                Hàng</button>
                        </div>

                        <div class="card-product-title">
                            <h6><?php echo $values['name'] ?></h6>
                        </div>
                        <div class="product-price"><?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="card-product-quantity">
                            <span><?php echo ($values['status'] == 1) ? 'Còn Hàng' : 'Hết Hàng(liên hệ)' ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <?php endforeach ?>
        </div>
    </div>
    <hr class="products-hr" />
</div>
<div class="products">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between px-5">
            <div class="name-products">
                <h3> <i class="icon-title manhinh"></i>Màn Hình</h3>
            </div>
            <div class="more-products">
                <a class="read-all" href="home/manhinh" target="_blank" rel="noopener noreferrer">Xem thêm</a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <?php foreach ($seen as $values) : ?>
            <div class="col-md-3 col-sm-6 card-product">
                <div class="card-product-a">
                    <div class="details-product">
                        <div class="details-product-title">
                            <h5><?php echo $values['name'] ?></h5>
                        </div>
                        <div class="product-price">
                            Giá bán :
                            <?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="guarantee">
                            <span>Bảo hành <?php echo $values['guarantee'] ?></span>
                        </div>
                        <div class="title-hardware">
                            <img src="assets/img/svg/layer.svg" alt="img/svg/layer.svg" class="title-hardware-svg">
                            <span>Thông số sản phẩm</span>
                        </div>
                        <?php echo $values['short_details'] ?>
                    </div>
                    <div class="card-product-body">

                        <div class="card-product-img justify-content-center">
                            <a href="home/product/<?php echo $values['id'] ?>">
                                <img width="200" height="200"
                                    src="assets/img/products/<?php echo $values['avatar_products'] ?>"
                                    alt="img/products/<?php echo $values['avatar_products'] ?>"
                                    class="img-fluid img-product" />
                            </a>
                        </div>
                        <div class="box-btn">

                            <input type="hidden" id="products_<?php echo $values['id'] ?>_price"
                                value="<?php echo $values['price'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_name"
                                value="<?php echo $values['name'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_avatar_products"
                                value="<?php echo $values['avatar_products'] ?>">
                            <input type="hidden" id="products_<?php echo $values['id'] ?>_quantity" value="1">
                            <button class="add-to-cart" data-id_product="<?php echo $values['id'] ?>"> Mua Ngay</button>
                            <button class="add-to-cart-nopopup" data-id_product="<?php echo $values['id'] ?>"> Thêm Giỏ
                                Hàng</button>
                        </div>

                        <div class="card-product-title">
                            <h6><?php echo $values['name'] ?></h6>
                        </div>
                        <div class="product-price"><?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                        </div>
                        <div class="card-product-quantity">
                            <span><?php echo ($values['status'] == 1) ? 'Còn Hàng' : 'Hết Hàng(liên hệ)' ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <?php endforeach ?>
        </div>
    </div>
    <hr class="products-hr" />
</div>
<div class="products">
    <div class="container-fluid">
        <div class="row d-flex justify-content-between px-5">
            <div class="name-products">
                <h3><i class="icon-title speak"></i>Thông Báo</h3>
            </div>
            <div class="more-products">
                <a class="read-all" href="home/sale" target="_blank" rel="noopener noreferrer">Xem thêm</a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <?php foreach ($post as $values) : ?>
            <div class="col-md-3 col-sm-6 card-product">
                <div class="card-product-a">

                    <div class="card-product-body-sale">
                        <div class="card-product-img justify-content-center">
                            <a href="#">
                                <img src="assets/img/post/<?php echo $values['avatar_sale'] ?>"
                                    alt="assets/img/post/<?php echo $values['avatar_sale'] ?>"
                                    class="img-fluid img-product" />
                            </a>
                        </div>

                        <div class="news-title">
                            <h6><?php echo $values['title'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach ?>
        </div>
    </div>
    <hr class="products-hr" />
</div>