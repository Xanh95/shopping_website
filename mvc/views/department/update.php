<!--views/department/update.php-->
<div class="add-department">

    <form action="" method="post">
        <h6>Sửa Bộ Phận <?php echo $department['department'] ?></h6>
        <hr>
        <span>Bộ Phận</span>
        <input type="text" name="department_name" value="<?php echo $department['department'] ?>">

        <button type="submit" class="btn-success" name="updatedepartment" id="updatedepartment">Lưu</button>
    </form>
</div>