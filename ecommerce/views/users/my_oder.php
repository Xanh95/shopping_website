<!--views/oder/index.php-->

<div class="container-employee" id="list-oder">
    <div class="title-menu">
        <h6>Danh Sách Đơn Hàng</h6>
    </div>
    <hr>
    <div class="list-employee" id="list-search-oders">
        <table class="table-employee" border="1px">
            <tbody>
                <tr>

                    <th>Mã Đơn Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số Điện Thoại</th>

                    <th>Địa Chỉ</th>

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
                    <td><?php echo $value['address'] ?></td>
                    <td><?php echo $value['method_pay'] == 1 ? "tại nơi giao hàng" : "Banking" ?></td>
                    <td><?php echo $value['status'] == 1 ? "Chưa Thanh Toán" : "Đã Thanh Toán" ?></td>
                    <td style="color: red;">
                        <b><?php echo number_format($value['total_pay'], 0, ',', '.') . "  VNĐ" ?></b>
                    </td>
                    <td><a href="profile/detailOder/<?php echo $value['id']; ?>">Chi Tiết</a>
                        <br>
                        <a href="profile/deleteMyOder/<?php echo $value['id']; ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn huỷ đơn hàng này')">Huỷ Đơn Hàng</a>
                    </td>
                </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>
</div>