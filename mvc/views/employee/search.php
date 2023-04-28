<table class="table-employee" border="1px">
    <tbody>
        <tr>
            <th>Mã Số</th>
            <th>Họ và Tên</th>
            <th>Ngày Sinh</th>
            <th>Số Điện Thoại</th>
            <th>giới tính</th>
            <th>Địa Chỉ</th>
            <th>Quê Quán</th>
            <th>Bộ Phận</th>
            <th>Chức Vụ</th>
            <th></th>
        </tr>
        <?php foreach ($employees as $values) : ?>
            <tr>
                <td><?php echo $values['id'] ?></td>
                <td><?php echo $values['name'] ?></td>
                <td><?php echo $values['birthday'] ?></td>
                <td><?php echo $values['phone'] ?></td>
                <td><?php echo $values['gender'] == 1 ? 'Nam' : 'Nữ'  ?></td>
                <td><?php echo $values['address'] ?></td>
                <td><?php echo $values['hometown'] ?></td>
                <td><?php echo $values['department'] ?></td>
                <td><?php
                    $role = '';
                    switch ($values['role']) {
                        case 1:
                            $role = "Giám Đốc";
                            break;

                        case 2:
                            $role = "Trưởng Phòng";
                            break;
                        case 3:
                            $role = "Quản Lý";
                            break;
                        case 4:
                            $role = "Nhân Viên";
                            break;
                    };
                    echo $role; ?></td>
                <td><a href="employee/update/<?php echo $values['id']; ?>">Sửa</a> <a href="employee/delete/<?php echo $values['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa nhận sự này')">Xoá</a></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>