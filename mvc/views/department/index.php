<!--views/department/index.php-->
<?php if ($_SESSION['role'] < 2) : ?>
    <div class="list-employee" id="list-department">
        <h6>Danh Sách Bộ Phận</h6>
        <hr>
        <table class="table-employee" border="1px">
            <tbody>
                <tr>
                    <th>id</th>
                    <th>Bộ Phận</th>
                    <th></th>
                </tr>
                <?php foreach ($departments as $values) : ?>
                    <tr>
                        <td><?php echo $values['id']; ?></td>
                        <td><?php echo $values['department']; ?></td>
                        <td><a href="department/update/<?php echo $values['id']; ?>">Sửa</a> <a href="department/delete/<?php echo $values['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bộ phận này')">Xoá</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <h3 style="color: red;">Bạn Chưa Đủ Quyền Hạn Để Vào Chức Năng Này</h3>
<?php endif ?>