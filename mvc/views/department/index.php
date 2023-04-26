<!--views/department/index.php-->
<div class="list-employee" id="list-department">
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
                <td><a href="department/update/<?php echo $values['id']; ?>">Sửa</a> <a
                        href="department/delete/<?php echo $values['id']; ?>">Xoá</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>