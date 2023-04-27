<!--views/employee/index.php-->
<div class="container-employee" id="list-employee">
    <div class="title-menu">
        <h6>Danh Sách nhân sự</h6>
        <input type="search" placeholder="tìm kiếm nhân sự">
        Theo Tên
        <select name="sortname " id="">
            <option value="1">Từ a-z</option>
            <option value="2">Từ z-a</option>
        </select>
        Theo Thời Gian vào
        <select name="sorttime " id="">
            <option value="1">Mới-&gt;Cũ</option>
            <option value="2">Cũ-&gt;Mới</option>
        </select>
        Theo Ngày Sinh
        <input type="text">
        <button class="btn-search-employee">Tìm Kiếm</button>
    </div>
    <hr>
    <div class="list-employee">
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
    </div>
    <hr>
    <div class="pagination">
        <a href="#">&lt;&lt;</a>
        <a href="">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a>
        <a href="#">&gt;&gt;</a>
    </div>
</div>