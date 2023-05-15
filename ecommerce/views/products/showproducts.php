<!--views/products/showproducts.php-->

<div class="products">
    <div class="name-products">
        <h3>
            <?php echo $category ?>
        </h3>
        mức giá
        <select name="" id="range-price-products">
            <option value="">Khoảng giá</option>
            <option value="1">dưới 10tr</option>
            <option value="2">10tr-20tr</option>
            <option value="3">20tr-30tr</option>
            <option value="4">30tr-40tr</option>
            <option value="5">40tr-50tr</option>
            <option value="6">50tr ></option>
        </select>
        sắp xếp giá tiền
        <select name="" id="sort-price-products">

            <option value="">sản phẩm</option>
            <option value="1">Từ thấp đến cao</option>
            <option value="2">Từ cao đến thấp</option>
        </select>
        sắp xếp thời gian
        <select name="" id="sort-products">
            <option value="">sản phẩm</option>
            <option value="1">Từ Cũ đến Mới</option>
            <option value="2">Từ Mới đến Cũ</option>
        </select>
        <input type="hidden" value="<?php echo $id_category ?>" id="id_category">
        <button class="btn-search-employee" id="btn-sort-products">Tìm Kiếm</button>
        <hr>
    </div>
    <div class="container-fluid" id="container-fluid">
        <div class="row d-flex justify-content-between px-5">
        </div>
        <div class="container-card-products">
            <?php foreach ($products as $values) : ?>
                <div class="card-product">
                    <div class="card-product-a">
                        <div class="details-product" style="left: 542px; top: 214px; display: none;">
                            <div class="details-product-title">
                                <h5><?php echo $values['name'] ?></h5>
                            </div>
                            <div class="product-price">
                                Giá bán : <?php echo number_format($values['price'], 0, ',', '.') . "  VNĐ"; ?>
                            </div>
                            <div class="guarantee">
                                <span>Bảo hành <?php echo $values['guarantee'] ?></span>
                            </div>
                            <div class="title-hardware">
                                <img src="assets/img/svg/layer.svg" alt="assets/img/svg/layer.svg" class="title-hardware-svg">
                                <span>Thông số sản phẩm</span>
                            </div>
                            <?php echo $values['short_details'] ?>
                        </div>
                        <div class="card-product-body">
                            <div class="card-product-img justify-content-center">
                                <a href="home/product/<?php echo $values['id'] ?>">
                                    <img src="assets/img/products/<?php echo $values['avatar_products'] ?>" alt="assets/img/products/<?php echo $values['avatar_products'] ?>" class="img-fluid img-product">
                                </a>
                            </div>
                            <div class="box-btn">
                                <input type="hidden" id="products_<?php echo $values['id'] ?>_price" value="<?php echo $values['price'] ?>">
                                <input type="hidden" id="products_<?php echo $values['id'] ?>_name" value="<?php echo $values['name'] ?>">
                                <input type="hidden" id="products_<?php echo $values['id'] ?>_avatar_products" value="<?php echo $values['avatar_products'] ?>">
                                <input type="hidden" id="products_<?php echo $values['id'] ?>_quantity" value="1">
                                <button class="add-to-cart" data-id_product="<?php echo $values['id'] ?>">Mua Ngay</button>
                                <button class="add-to-cart-nopopup" data-id_product="<?php echo $values['id'] ?>">
                                    Thêm Giỏ Hàng
                                </button>
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
        <hr class="products-hr">
        <div class="pagination">
            <input type="hidden" value="<?php echo $action ?>" id="action">
            <?php if ($count_total > $limit) : ?>
                <a href="./home/<?php echo $action ?>/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                                        ?>">&lt;&lt;</a>
                <?php if ($total_page > 10) : ?>
                    <a href="./home/<?php echo $action ?>/1">1</a>
                    <a href="./home/<?php echo $action ?>/2">2</a>
                    <a href="./home/<?php echo $action ?>/3">3</a>
                    <input type="number" style="width: 50px;" value="<?php echo $page ?>" id="go_page_<?php echo $action ?>"> <a href="./home/<?php echo $action ?>/" id="go_link_<?php echo $action ?>">Go</a>
                    <a href="./home/<?php echo $action ?>/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
                    <a href="./home/<?php echo $action ?>/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
                    <a href="./home/<?php echo $action ?>/<?php echo $total_page ?>"><?php echo $total_page ?></a>
                <?php else : ?>
                    <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
                        <a href="./home/<?php echo $action ?>/<?php echo $i; ?>" style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
                    <?php endfor; ?>
                <?php endif ?>


                <a href="./home/<?php echo $action ?>/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                                        ?>">&gt;&gt;</a>
            <?php endif ?>
        </div>
    </div>

</div>