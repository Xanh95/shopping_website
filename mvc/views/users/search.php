<table class="table-employee" border="1px">
    <tbody>
        <tr>

            <th>ID</th>
            <th>Tên Khách hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>


            <th></th>
        </tr>
        <?php foreach ($users as $values) : ?>
        <tr>

            <td><?php echo $values['id'] ?></td>
            <td><?php echo $values['name'] ?></td>
            <td><?php echo $values['phone'] ?></td>
            <td><?php echo $values['email'] ?></td>
            <td><?php echo $values['gender'] == 1 ? "Nam" : "Nữ" ?></td>
            <td><?php echo $values['birthday'] ?></td>




            <td><a href="user/update/<?php echo $values['id']; ?>">Sửa</a> <a
                    href="user/delete/<?php echo $values['id']; ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa khách này')">Xoá</a></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>