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
                <input type="text" class="employee-input" name="employee_input_name">
            </div>
            <div class="birthday-employee">
                <span class="employee-text">Ngày Sinh</span>
                <input type="text" class="employee-input" name="employee_input_birthday">
            </div>
            <div class="phone-employee">
                <span class="employee-text">số điện Thoại</span>
                <input type="text" class="employee-input" name="employee_input_phone">
            </div>
            <div class="pass-employee">
                <span class="employee-text">Mật Khẩu</span>
                <input type="password" class="employee-input" name="employee_input_pass" id="employee_input_pass">
            </div>
            <div class="address-employee">
                <span class="employee-text">Địa Chỉ</span>
                <input type="text" class="employee-input" name="employee_input_address">
            </div>
            <div class="pass-employee">
                <span class="employee-text">Nhập Lại Mật Khẩu</span>
                <input type="password" class="employee-input" name="employee_input_confirm_password">
            </div>
            <div class="hometown-employee">
                <span class="employee-text">Quê Quán</span>
                <input type="text" class="employee-input" name="employee_input_hometown">
            </div>
            <div class="email-employee">
                <span class="employee-text">Email</span>
                <input type="text" class="employee-input" name="employee_input_email">
            </div>
            <div class="gender-employee">
                <span class="employee-text">Giới Tính</span>
                <label for="Male">Nam&nbsp;</label>
                <input type="radio" class="employee-input" id="Male" name="employee_input_gender" value="1">
                <label for="Female">&nbsp;Nữ&nbsp;</label>
                <input type="radio" class="employee-input" id="Female" name="employee_input_gender" value="2">
            </div>
            <div class="job-employee">
                <span class="employee-text">Chức Vụ</span>
                <select id="department" name="employee_department">
                    <?php foreach ($departments as $values) : ?>
                    <option value="<?php echo $values['department'] ?>">
                        <?php echo $values['department']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="Role" name="employee_role">
                    <option value="4">Nhân Viên</option>
                    <option value="3">Quản Lý</option>
                    <option value="2">Trưởng Phòng</option>
                    <option value="1">Giám Đốc</option>
                </select>
            </div>
            <div class="add-employee-btn">
                <button class="btn btn-success" name="addemployee">Thêm</button>
            </div>
        </div>
    </form>
</div>