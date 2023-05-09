<!--views/users/index.php-->

<div class="container-employee" id="list-user">
    <div class="title-menu">
        <h6>Danh Sách Khách Hàng</h6>
        <input type="search" placeholder="tìm kiếm tên KH" id="user-name">

        Theo Ngày Sinh
        <input type="search" id="user-birthday">
        <button class="btn-search-employee" id="search-user">Tìm Kiếm</button>
    </div>
    <hr>
    <div class="list-employee" id="list-search-users">
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




                        <td><a href="user/update/<?php echo $values['id']; ?>">Sửa</a> <a href="user/delete/<?php echo $values['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa khách này')">Xoá</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <hr>
        <div class="pagination">
            <?php if ($count_total > $limit) : ?>
                <a href="./user/index/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                        ?>">&lt;&lt;</a>
                <?php if ($total_page > 10) : ?>
                    <a href="./user/index/1">1</a>
                    <a href="./user/index/2">2</a>
                    <a href="./user/index/3">3</a>
                    <input type="text" style="width: 30px;" value="<?php echo $page ?>" id="go_page_user"> <a href="./user/index/" id="go_link_user">Go</a>
                    <a href="./user/index/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
                    <a href="./user/index/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
                    <a href="./user/index/<?php echo $total_page ?>"><?php echo $total_page ?></a>
                <?php else : ?>
                    <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
                        <a href="./user/index/<?php echo $i; ?>" style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
                    <?php endfor; ?>
                <?php endif ?>


                <a href="./user/index/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                        ?>">&gt;&gt;</a>
            <?php endif
            ?>
        </div>
    </div>
</div>