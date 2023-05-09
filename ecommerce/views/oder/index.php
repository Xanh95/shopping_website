<!--views/oder/index.php-->

<div class="container-employee" id="list-oder">
    <div class="title-menu">
        <h6>Danh Sách Đơn Hàng</h6>
        <input type="search" placeholder="tìm kiếm Mã Đơn Hàng" id="code_oder">

        Theo tên Khách Hàng
        <input type="search" id="oder_user_name">
        <button class="btn-search-employee" id="search-oder">Tìm Kiếm</button>
    </div>
    <hr>
    <div class="list-employee" id="list-search-oders">
        <table class="table-employee" border="1px">
            <tbody>
                <tr>

                    <th>Mã Đơn Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Thành phố/Tỉnh</th>
                    <th>Quận/Huyện</th>
                    <th>Địa Chỉ</th>
                    <th>Ghi Chú</th>
                    <th>Phưởng Thức thanh toán</th>
                    <th>Tình Trạng</th>
                    <th>Tổng Giá Tiền</th>

                    <th></th>
                </tr>
                <?php foreach ($orders as $value) : ?>
                <tr>
                    <td><?php echo $value['code_oder'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['phone'] ?></td>
                    <td><?php echo $value['city'] ?> </td>
                    <td><?php echo $value['district'] ?></td>
                    <td><?php echo $value['address'] ?></td>
                    <td><?php echo $value['note'] ?></td>
                    <td><?php echo $value['method_pay'] == 1 ? "tại nơi giao hàng" : "Banking" ?></td>
                    <td><?php echo $value['status'] == 1 ? "Chưa Thanh Toán" : "Đã Thanh Toán" ?></td>
                    <td style="color: red;">
                        <b><?php echo number_format($value['total_pay'], 0, ',', '.') . "  VNĐ" ?></b></td>
                    <td><a href="oder/detail/<?php echo $value['id']; ?>">Chi Tiết</a> <a
                            href="oder/delete/<?php echo $value['id']; ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa nhận sự này')">Xoá</a></td>
                </tr>
                <?php endforeach ?>

            </tbody>
        </table>
        <hr>
        <div class="pagination">
            <?php if ($count_total > $limit) : ?>
            <a href="./oder/index/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                        ?>">&lt;&lt;</a>
            <?php if ($total_page > 10) : ?>
            <a href="./oder/index/1">1</a>
            <a href="./oder/index/2">2</a>
            <a href="./oder/index/3">3</a>
            <input type="text" style="width: 30px;" value="<?php echo $page ?>" id="go_page_oder"> <a
                href="./oder/index/" id="go_link_oder">Go</a>
            <a href="./oder/index/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
            <a href="./oder/index/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
            <a href="./oder/index/<?php echo $total_page ?>"><?php echo $total_page ?></a>
            <?php else : ?>
            <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
            <a href="./oder/index/<?php echo $i; ?>"
                style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
            <?php endfor; ?>
            <?php endif ?>


            <a href="./oder/index/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                        ?>">&gt;&gt;</a>
            <?php endif
            ?>
        </div>
    </div>
</div>