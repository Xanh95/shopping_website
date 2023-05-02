<!--views/employee/index.php-->

<div class="container-employee" id="list-employee">
    <div class="title-menu">
        <h6>Danh Sách nhân sự</h6>
        <input type="search" placeholder="tìm kiếm nhân sự" id="employee-name">
        Theo Thời Gian vào
        <select name="sorttime " id="employee-sorttime">
            <option value="">Thời Gian</option>
            <option value="1">Mới-&gt;Cũ</option>
            <option value="2">Cũ-&gt;Mới</option>
        </select>
        Theo Tên
        <select name="sortname " id="employee-sortname">
            <option value="">Tên</option>
            <option value="1">Từ a-z</option>
            <option value="2">Từ z-a</option>
        </select>
        Theo Ngày Sinh
        <input type="text" id="employee-birthday">
        <button class="btn-search-employee" id="search-employee">Tìm Kiếm</button>
    </div>
    <hr>
    <div class="list-employee" id="list-search-employee">
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
                    <td><a href="employee/update/<?php echo $values['id']; ?>">Sửa</a> <a
                            href="employee/delete/<?php echo $values['id']; ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa nhận sự này')">Xoá</a></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <hr>

    <div class="pagination">
        <?php if ($count_total > $limit) : ?>
        <a href="./employee/index/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                        ?>">&lt;&lt;</a>
        <?php if ($total_page > 10) : ?>
        <a href="./employee/index/1">1</a>
        <a href="./employee/index/2">2</a>
        <a href="./employee/index/3">3</a>
        <input type="text" style="width: 30px;" value="<?php echo $page ?>" id="go_page_employee"> <a
            href="./employee/index/" id="go_link_employee">Go</a>
        <a href="./employee/index/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
        <a href="./employee/index/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
        <a href="./employee/index/<?php echo $total_page ?>"><?php echo $total_page ?></a>
        <?php else : ?>
        <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
        <a href="./employee/index/<?php echo $i; ?>"
            style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
        <?php endfor; ?>
        <?php endif ?>


        <a href="./employee/index/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                        ?>">&gt;&gt;</a>
        <?php endif
        ?>
    </div>
</div>