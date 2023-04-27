<!--views/department/create.php-->
<?php if ($_SESSION['role'] < 2) : ?>
<div class="add-department">
    <form action="" id="add-department" method="post">
        <h6>Thêm Bộ Phận</h6>
        <hr>
        <span>Bộ Phận</span>
        <input type="text" name="department">
        <button type="submit" class="btn-success" name="createdepartment" id="createdepartment">thêm mới</button>
    </form>
</div>
<?php else : ?>
<h3 style="color: red;">Bạn Chưa Đủ Quyền Hạn Để Vào Chức Năng Này</h3>
<?php endif ?>