<!--views/department/update.php-->
<?php if ($_SESSION['role'] < 1) : ?>
    <div class="add-department" id="list-products">

        <form action="" method="post">
            <h6>Sửa Danh Mục Sản Phẩm <?php echo $listproducts['listproducts'] ?></h6>
            <hr>
            <span>Danh Mục</span>
            <input type="text" name="department_name" value="<?php echo $listproducts['listproducts'] ?>">

            <button type="submit" class="btn-success" name="updatedepartment" id="updatedepartment">Lưu</button>
        </form>
    </div>
<?php else : ?>
    <h3 style="color: red;">Bạn Chưa Đủ Quyền Hạn Để Vào Chức Năng Này</h3>
<?php endif ?>