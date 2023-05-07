<form action="" id="confirm-pay-cart" novalidate="novalidate" method="post">
    <div class="confirm-cart">
        <div class="container-confim-cart">
            <div class="confirm-box-cart">
                <div class="container">
                    <div class="cart-process">
                        <div class="process actived">
                            <span>1. Chọn sản phẩm</span>
                        </div>
                        <div class="process actived">
                            <span>2. Xác nhận đơn hàng</span>
                        </div>
                        <div class="process actived">
                            <span>3. Thanh toán</span>
                        </div>
                    </div>
                    <div class="container-content">
                        <div class="content-products-cart">
                            <div class="banking-pay">
                                <h5>Hình Thức Thanh Toán</h5>
                                <hr>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="method-pay" id="place" value="1"></td>
                                            <td>
                                                <label for="place"> Thanh toán tại nơi giao hàng</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" name="method-pay" id="banking" value="2">
                                            </td>
                                            <td>
                                                <label for="banking">
                                                    <p>
                                                        TK:103872495382 <br>
                                                        vietinbank <br>
                                                        Tăng Xuân Anh
                                                    </p>
                                                    <p>
                                                        <span>Nội Dung Thanh toán :</span> Thanh toán đơn hàng
                                                        <?php echo $_SESSION['code_oder'] ?>
                                                    </p>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="address-form">
                                <h5>Địa chỉ Nhận Hàng</h5>
                                <hr>
                                <div class="form-item">
                                    <label for="fullname" class="form-label">Họ và tên</label>
                                    <span class="input input--isao">
                                        <input class="input__field input__field--isao" type="text"
                                            id="input-name-recipient" name="input-name-recipient">
                                        <label class="input__label input__label--isao" for="input-name-recipient"
                                            data-content="Người tại địa chỉ nhận">
                                            <span class="input__label-content input__label-content--isao">Người tại địa
                                                chỉ nhận</span>
                                        </label>
                                    </span>
                                </div>
                                <div class="form-item">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <span class="input input--isao">
                                        <input class="input__field input__field--isao" type="text"
                                            id="input-phone-recipient" name="input-phone-recipient">
                                        <label class="input__label input__label--isao" for="input-phone-recipient"
                                            data-content="Người tại địa chỉ nhận">
                                            <span class="input__label-content input__label-content--isao">Người tại địa
                                                chỉ nhận</span>
                                        </label>
                                    </span>
                                </div>
                                <div class="form-item">
                                    <label for="city" class="form-label">Tỉnh/Thành phố</label>
                                    <span class="input input--isao">
                                        <input class="input__field input__field--isao" type="text"
                                            id="input-city-recipient" name="input-city-recipient">
                                        <label class="input__label input__label--isao" for="input-city-recipient"
                                            data-content="Nơi nhận">
                                            <span class="input__label-content input__label-content--isao">Nơi
                                                nhận</span>
                                        </label>
                                    </span>
                                </div>
                                <div class="form-item">
                                    <label for="district" class="form-label">Quận huyện</label>
                                    <span class="input input--isao">
                                        <input class="input__field input__field--isao" type="text"
                                            id="input-district-recipient" name="input-district-recipient">
                                        <label class="input__label input__label--isao" for="input-district-recipient"
                                            data-content="Nơi nhận">
                                            <span class="input__label-content input__label-content--isao">Nơi
                                                nhận</span>
                                        </label>
                                    </span>
                                </div>
                                <div class="form-item">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <span class="input input--isao">
                                        <input class="input__field input__field--isao" type="text"
                                            id="input-address-recipient" name="input-address-recipient">
                                        <label class="input__label input__label--isao" for="input-address-recipient"
                                            data-content="Người nhận">
                                            <span class="input__label-content input__label-content--isao">Người
                                                nhận</span>
                                        </label>
                                    </span>
                                </div>
                                <div class="form-item">
                                    <label for="address" class="form-label">Ghi Chú Giao Hàng</label>
                                    <span class="input input--isao">
                                        <textarea name="note" id="" cols="30" rows="5"></textarea>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="total-pay">
                            <div class="container">
                                <h6>Thông tin giỏ hàng</h6>
                                <div class="products-count">
                                    <span class="products-count-text">Số lượng sản phẩm :</span>
                                    <span
                                        class="products-count-number"><?php echo isset($_SESSION['total_quantity']) ? $_SESSION['total_quantity'] : "0" ?></span>
                                </div>
                                <div class="total-cart">
                                    <span class="total-cart-text">Tổng chi phí :</span>
                                    <span class="total-cart-number"><?php
                                                                    echo isset($_SESSION['cart']) ? number_format($_SESSION['total_price'], 0, ',', '.') . " VNĐ" : "";
                                                                    ?>
                                    </span>
                                </div>
                                <div
                                    style="font-size: 14px; color: rgb(78, 78, 84); font-weight: normal; justify-content: flex-end;">
                                    Đã bao gồm VAT (nếu có)</div>
                                <button type="submit" id="confirm-pay-finish" name="confirm-pay">
                                    Tạo Đơn Hàng
                                </button>
                                <a href="home/index" class="btn-cart-dell">Xoá Giỏ Hàng</a>
                                <a href="home/index" class="btn-cart-more">Xem Sản Phẩm Khác</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="select-address">
        <h5>Chọn địa chỉ đã lưu</h5>
        <hr>
        <?php if (isset($_SESSION['user'])) : ?>
        <?php foreach ($address as  $value) : ?>
        <label for="address-<?php echo $value['id'] ?>" class="option-address">
            <table>
                <tbody>
                    <tr>
                        <td>Họ Và Tên</td>
                        <td><?php echo $value['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Số Điện Thoại</td>
                        <td><?php echo $value['phone'] ?></td>
                        <td rowspan="4">
                            <input type="radio" name="ship-address" id="address-<?php echo $value['id'] ?>"
                                value="<?php echo $value['id'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Địa Chỉ</td>
                        <td>
                            <?php echo $value['address'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="color: red">
                            <i
                                class="fas <?php echo $value['address_type'] == 1 ? "fa-house-user" : "fa-building" ?>"></i>
                            <span><?php echo $value['address_type'] == 1 ? "Nhà Riêng" : "Cơ Quan" ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </label>
        <?php endforeach ?>
        <?php endif ?>
    </div>


</form>