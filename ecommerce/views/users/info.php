<!-- views/layouts/users/info.php -->
<?php
if (!empty($_SESSION['birthday'])) {
    $birthday = explode("/", filter_var(trim($_SESSION['birthday'], "/")));
    $dd_birthday = $birthday[0];
    $mm_birthday = $birthday[1];
    $yy_birthday = $birthday[2];
}
?>
<div class="info-user">
    <div class="info-user-title">
        <h5>Thông tin tài khoản</h5>
        <span>(dùng để tham gia vào chương trình khuyến mãi hoặc quà tặng)</span>
    </div>
    <form action="" id="update-info-user" method="post">
        <div class="info-user-container">
            <div class="info-user-content">
                <span class="input input--isao">
                    <input class="input__field input__field--isao" type="text" id="input-name" name="input-name" />
                    <label class="input__label input__label--isao" for="input-name" data-content="Tên Của Bạn">
                        <span
                            class="input__label-content input__label-content--isao"><?php echo $_SESSION['user']; ?></span>
                    </label>
                </span>
                <span class="input input--isao">
                    <input class="input__field input__field--isao" type="text" id="input-phone" name="input-phone" />
                    <label class="input__label input__label--isao" for="input-phone" data-content="Số Điện Thoai">
                        <span class="input__label-content input__label-content--isao">SĐT:
                            <?php echo $_SESSION['phone']; ?></span>
                    </label>
                </span>

                <div class="content-item">
                    <label>Giới tính</label>
                    <div class="item-input ">

                        <label for="gender-male">
                            <input type="radio" name="gender" value="1" id="gender-male" class="check-radio"
                                <?php echo $_SESSION['gender'] == 1 ? 'checked' : ''  ?>>
                            <span class="radiobtn">Nam</span>
                        </label>
                        <label for="gender-female">
                            <input type="radio" name="gender" value="2" id="gender-female" class="check-radio"
                                <?php echo $_SESSION['gender'] == 2 ? 'checked' : ''  ?>>
                            <span class="radiobtn">Nữ</span>
                        </label>

                    </div>
                </div>

                <div class="content-item">
                    <label>Ngày sinh</label>
                    <div class="item-input">
                        <select name="dd_birthday">
                            <option value="">Ngày</option>
                            <?php for ($i = 1; $i < 32; $i++) : ?>
                            <option value="<?php echo $i ?>" <?php
                                    if (!empty($_SESSION['birthday'])) {
                                        echo $dd_birthday == $i ? 'selected' : '';
                                        }  ?>>
                                <?php echo $i ?>
                            </option>
                            <?php endfor ?>
                        </select>
                        <select name="mm_birthday">
                            <option value="">Tháng</option>
                            <?php for ($i = 1; $i < 13; $i++) : ?>
                            <option value="<?php echo $i ?>" <?php if (!empty($_SESSION['birthday'])) {
                                        echo $mm == $i ? 'selected' : '';
                                        } ?>>
                                <?php echo $i ?>
                            </option>
                            <?php endfor ?>
                        </select>
                        <select name="yy_birthday">
                            <option value="">Năm</option>
                            <?php for ($i = 1960; $i <= ($yeah = date('Y')); $i++) : ?>
                            <option value="<?php echo $i ?>" <?php if (!empty($_SESSION['birthday'])) {
                                        echo $yy_birthday == $i ? 'selected' : '';
                                        } ?>>
                                <?php echo $i ?></option>
                            <?php endfor ?>

                        </select>
                    </div>
                </div>
                <div class="btn-contain">
                    <button class="btn" name="update-info">Cập Nhật</button>
                    <div class="btn-particles">
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>