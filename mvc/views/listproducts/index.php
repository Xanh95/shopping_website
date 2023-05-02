<!--views/department/index.php-->
<?php if ($_SESSION['role'] < 2) : ?>
    <div class="list-employee" id="list-products">
        <h6>Danh Sách Danh Mục Sản Phẩm</h6>
        <hr>
        <table class="table-employee" border="1px">
            <tbody>
                <tr>
                    <th>id</th>
                    <th>Bộ Phận</th>
                    <th></th>
                </tr>
                <?php foreach ($listname as $values) : ?>
                    <tr>
                        <td><?php echo $values['id']; ?></td>
                        <td><?php echo $values['listproducts']; ?></td>
                        <td><a href="listproducts/update/<?php echo $values['id']; ?>">Sửa</a> <a href="listproducts/delete/<?php echo $values['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bộ phận này')">Xoá</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <h3 style="color: red;">Bạn Chưa Đủ Quyền Hạn Để Vào Chức Năng Này</h3>
<?php endif ?>