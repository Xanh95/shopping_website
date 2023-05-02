<!--views/department/update.php-->
<?php if ($_SESSION['role'] < 2) : ?>
<div class="add-department" id="list-department">

    <form action="" method="post">
        <h6>Sửa Bộ Phận <?php echo $department['department'] ?></h6>
        <hr>
        <span>Bộ Phận</span>
        <input type="text" name="department_name" value="<?php echo $department['department'] ?>">

        <button type="submit" class="btn-success" name="updatedepartment" id="updatedepartment">Lưu</button>
    </form>
</div>
<?php else : ?>
<h3 style="color: red;">Bạn Chưa Đủ Quyền Hạn Để Vào Chức Năng Này</h3>
<?php endif ?>