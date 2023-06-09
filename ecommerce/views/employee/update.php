<!--views/employee/create.php-->
<?php

$checked_male = '';
$checked_female = '';
switch ($employee['gender']) {
    case 1:
        $checked_male = 'checked';
        break;
    case 2:
        $checked_female = 'checked';
        break;
};
$checked_nv = '';
$checked_ql = '';
$checked_tp = '';
$checked_gd = '';


switch ($employee['role']) {
    case 1:
        $checked_gd = 'selected';
        break;
    case 2:
        $checked_tp = 'selected';
        break;
    case 3:
        $checked_ql = 'selected';
        break;
    case 4:
        $checked_nv = 'selected';
        break;
}
?>

<div class="add-employee">
    <div class="add-employee-title">
        <h6>Sửa Nhân Sự <?php echo $employee['name'] ?></h6>
        <hr>
    </div>
    <form action="" method="post" id="list-employee">
        <div class="add-employee-form">
            <div class="name-employee">
                <span class="employee-text">Họ và Tên</span>
                <input type="text" class="employee-input" name="employee_input_name" value="<?php echo $employee['name'] ?>">
            </div>
            <div class="birthday-employee">
                <span class="employee-text">Ngày Sinh</span>
                <input type="text" class="employee-input" name="employee_input_birthday" value="<?php echo $employee['birthday'] ?>">
            </div>
            <div class="phone-employee">
                <span class="employee-text">số điện Thoại</span>
                <input type="text" class="employee-input" name="employee_input_phone" value="<?php echo $employee['phone'] ?>">
            </div>
            <div class="pass-employee">
                <span class="employee-text">Mật Khẩu</span>
                <input type="password" class="employee-input" name="employee_input_pass" id="employee_input_pass">
            </div>
            <div class="address-employee">
                <span class="employee-text">Địa Chỉ</span>
                <input type="text" class="employee-input" name="employee_input_address" value="<?php echo $employee['address'] ?>">
            </div>
            <div class=" pass-employee">
                <span class="employee-text">Nhập Lại Mật Khẩu</span>
                <input type="password" class="employee-input" name="employee_input_confirm_password">
            </div>
            <div class="hometown-employee">
                <span class="employee-text">Quê Quán</span>
                <input type="text" class="employee-input" name="employee_input_hometown" value="<?php echo $employee['hometown'] ?>">
            </div>
            <div class="email-employee">
                <span class="employee-text">Email</span>
                <input type="text" class="employee-input" name="employee_input_email" value="<?php echo $employee['email'] ?>">
            </div>
            <div class="gender-employee">
                <span class="employee-text">Giới Tính</span>
                <label for="Male">Nam&nbsp;</label>
                <input type="radio" class="employee-input" id="Male" name="employee_input_gender" value="1" <?php echo $checked_male ?>>
                <label for="Female">&nbsp;Nữ&nbsp;</label>
                <input type="radio" class="employee-input" id="Female" name="employee_input_gender" value="2" <?php echo $checked_female ?>>
            </div>
            <div class="job-employee">
                <span class="employee-text">Chức Vụ</span>
                <select id="department" name="employee_department">
                    <?php foreach ($departments as $values) : ?>
                        <option value="<?php echo $values['department'] ?>" <?php echo ($values['department'] == $employee['department']) ? 'selected' : '' ?>>
                            <?php echo $values['department']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select id="Role" name="employee_role">
                    <option value="4" <?php echo $checked_nv ?>>Nhân Viên</option>
                    <option value="3" <?php echo $checked_ql ?>>Quản Lý</option>
                    <option value="2" <?php echo $checked_tp ?>>Trưởng Phòng</option>
                    <option value="1" <?php echo $checked_gd ?>>Giám Đốc</option>
                </select>
            </div>
            <div class="add-employee-btn">
                <button class="btn btn-success" name="updateemployee">Sửa</button>
            </div>
        </div>
    </form>
</div>