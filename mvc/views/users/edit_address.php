<!-- views/users/edit_address.php -->
<div class="address-form">
    <h5>Sửa Địa chỉ</h5>
    <hr>
    <form class="form-wrapper" id="recipient" method="post">
        <div class="form-item">
            <label for="fullname" class="form-label">Họ và tên</label>
            <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" id="input-namerecipient"
                    name="input-namerecipient" value="<?php echo $address_edit['name'] ?>" />
                <label class="input__label input__label--isao" for="input-namerecipient"
                    data-content="Người tại địa chỉ nhận">
                    <span class="input__label-content input__label-content--isao">Người tại địa chỉ nhận</span>
                </label>
            </span>
        </div>
        <div class="form-item">
            <label for="phone" class="form-label">Số điện thoại</label>
            <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" id="input-phonerecipient"
                    name="input-phonerecipient" value="<?php echo $address_edit['phone'] ?>" />
                <label class="input__label input__label--isao" for="input-phonerecipient"
                    data-content="Người tại địa chỉ nhận">
                    <span class="input__label-content input__label-content--isao">Người tại địa chỉ nhận</span>
                </label>
            </span>
        </div>
        <div class="form-item">
            <label for="city" class="form-label">Tỉnh/Thành phố</label>
            <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" id="input-cityrecipient"
                    name="input-cityrecipient" value="<?php echo $address_edit['city'] ?>" />
                <label class="input__label input__label--isao" for="input-cityrecipient" data-content="Nơi nhận">
                    <span class="input__label-content input__label-content--isao">Nơi nhận</span>
                </label>
            </span>
            </input>
        </div>
        <div class="form-item">
            <label for="district" class="form-label">Quận huyện</label>
            <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" id="input-districtrecipient"
                    name="input-districtrecipient" value="<?php echo $address_edit['district'] ?>" />
                <label class="input__label input__label--isao" for="input-districtrecipient" data-content="Nơi nhận">
                    <span class="input__label-content input__label-content--isao">Nơi nhận</span>
                </label>
            </span>
        </div>
        <div class="form-item">
            <label for="address" class="form-label">Địa chỉ</label>
            <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" id="input-addressrecipient"
                    name="input-addressrecipient" value="<?php echo $address_edit['address'] ?>" />
                <label class="input__label input__label--isao" for="input-addressrecipient" data-content="Người nhận">
                    <span class="input__label-content input__label-content--isao">Người nhận</span>
                </label>
            </span>
        </div>
        <div class="form-item">
            <label for="address-type" class="form-label">Loại địa chỉ</label>
            <input type="radio" id="home" name="address-type" class="form-input--checkbox" value="1"
                <?php echo $address_edit['address_type'] == 1 ? "checked" : "" ?>>
            <label for="home" class="form-label--checkbox">Nhà riêng/ Chung cư</label>
            <input type="radio" id="office" name="address-type" class="form-input--checkbox" value="2"
                <?php echo $address_edit['address_type'] == 2 ? "checked" : "" ?>>
            <label for="office" class="form-label--checkbox">Cơ quan/ Công ty</label>
        </div>

        <button type="submit" class="form-button" name="update-address">Sửa địa chỉ</button>
    </form>
</div>