<!--views/employee/create.php-->

<div class="add-employee">
    <div class="add-employee-title">
        <h6>Thêm Nhân Sự</h6>
        <hr>
    </div>
    <form action="" method="post" id="add-employee">
        <div class="add-employee-form">
            <div class="name-employee">
                <span class="employee-text">Họ và Tên</span>
                <input type="text" class="employee-input" name="employee-input-name">
            </div>
            <div class="birthday-employee">
                <span class="employee-text">Ngày Sinh</span>
                <input type="text" class="employee-input" name="employee-input-birthday">
            </div>
            <div class="phone-employee">
                <span class="employee-text">số điện Thoại</span>
                <input type="text" class="employee-input" name="employee-input-phone">
            </div>
            <div class="pass-employee">
                <span class="employee-text">Mật Khẩu</span>
                <input type="password" class="employee-input" name="employee-input-pass">
            </div>
            <div class="address-employee">
                <span class="employee-text">Địa Chỉ</span>
                <input type="text" class="employee-input" name="employee-input-address">
            </div>
            <div class="pass-employee">
                <span class="employee-text">Nhập Lại Mật Khẩu</span>
                <input type="confirm_password" class="employee-input" name="employee-input-confirm_password">
            </div>
            <div class="hometown-employee">
                <span class="employee-text">Quê Quán</span>
                <input type="text" class="employee-input" name="employee-input-hometown">
            </div>
            <div class="gender-employee">
                <span class="employee-text">Giới Tính</span>
                <label for="Male">Nam</label>
                <input type="radio" class="employee-input" id="Male" name="employee-input-gender" value="0">
                <label for="Female">Nữ</label>
                <input type="radio" class="employee-input" id="Female" name="employee-input-gender" value="1">
            </div>
            <div class="job-employee">
                <span class="employee-text">Chức Vụ</span>
                <select name="Department" id="Department">
                    <?php foreach ($departments as $values) : ?>
                    <option value="<?php echo $values['id']; ?>"><?php echo $values['department']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="Role" id="Role">
                    <option value="4">nhân viên</option>
                    <option value="3">quản lý</option>
                    <option value="2">Trưởng Phòng</option>
                    <option value="1">giám đốc</option>
                </select>
            </div>
            <div class="add-employee-btn">
                <button class="btn btn-success" name="addemployee">Thêm</button>
            </div>
        </div>
    </form>
</div>