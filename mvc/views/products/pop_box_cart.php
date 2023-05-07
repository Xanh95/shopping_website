<?php

?>
<div class="container">
    <div class="cart-header">
        <h6 class="number-cart-title">Bạn đang có <span id="total_quantity_card"><?php echo isset($_SESSION['total_quantity']) ? $_SESSION['total_quantity'] : "0" ?></span>
            sản phẩm</h6>
        <img src="assets/img/svg/close.svg" class="close" alt="img/svg/close.svg" title="Đóng">
    </div>
    <div class="container-content">
        <div class="products-cart">
            <?php if (isset($_SESSION['cart'])) : ?>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <div class="product-cart">
                        <div class="product-cart-img"><img class="img-fluid" src="assets/img/products/<?php echo $item['avatar'] ?>" alt=""></div>
                        <div class="product-cart-text">
                            <a href="home/product/<?php echo $item['id_products'] ?>"><?php echo $item['name'] ?></a>
                            <div class="product-price"><?php echo number_format($item['price'], 0, ',', '.') . "  VNĐ"; ?></div>
                        </div>
                        <div class="product-cart-action">
                            <div class="cart-p-qty"><span class="qty-decrease" data-id_product="<?php echo $item['id_products'] ?>">-</span>
                                <input type="tel" class="qty-input" value="<?php echo $item['quantity'] ?>" id="products_<?php echo $item['id_products'] ?>_quantity" data-id_product="<?php echo $item['id_products'] ?>">
                                <span class="qty-increase" data-id_product="<?php echo $item['id_products'] ?>">+</span>
                            </div>
                            <div class="cart-p-remove">
                                <img src="assets/img/svg/Trash.svg" class="delete" alt="img/svg/Trash.svg" data-id_product="<?php echo $item['id_products'] ?>">
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>


        </div>
        <div class="total-pay">
            <div class="container">
                <h6>Thông tin giỏ hàng</h6>
                <div class="products-count">
                    <span class="products-count-text">Số lượng sản phẩm :</span>
                    <span class="products-count-number"><?php echo isset($_SESSION['total_quantity']) ? $_SESSION['total_quantity'] : "0" ?></span>
                </div>
                <div class="total-cart">
                    <span class="total-cart-text">Tổng chi phí :</span>
                    <span class="total-cart-number"><?php
                                                    echo isset($_SESSION['cart']) ? number_format($_SESSION['total_price'], 0, ',', '.') . " VNĐ" : "";
                                                    ?>
                    </span>
                </div>
                <div style="font-size: 14px; color: rgb(78, 78, 84); font-weight: normal; justify-content: flex-end;">
                    Đã bao gồm VAT (nếu có)</div>
                <button class="btn-cart-confirm">
                    Xác Nhận Giỏ Hàng
                </button>
                <a href="home/index" class="btn-cart-dell">Xoá Giỏ Hàng</a>
                <a href="home/index" class="btn-cart-more">Xem Sản Phẩm Khác</a>
            </div>
        </div>
    </div>
</div>