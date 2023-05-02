<!--views/department/create.php-->
<?php if ($_SESSION['role'] < 1) : ?>
    <div class="add-department">
        <form action="" id="add-listproducts" method="post">
            <h6>Thêm Danh Mục</h6>
            <hr>
            <span>Danh Mục</span>
            <input type="text" name="department">
            <button type="submit" class="btn-success" name="createdepartment" id="createdepartment">thêm mới</button>
        </form>
    </div>
<?php else : ?>
    <h3 style="color: red;">Bạn Chưa Đủ Quyền Hạn Để Vào Chức Năng Này</h3>
<?php endif ?>