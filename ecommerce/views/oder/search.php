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
            <td style="color: red;"><b><?php echo number_format($value['total_pay'], 0, ',', '.') . "  VNĐ" ?></b></td>
            <td><a href="oder/detail/<?php echo $value['id']; ?>">Chi Tiết</a> <a
                    href="oder/delete/<?php echo $value['id']; ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa nhận sự này')">Xoá</a></td>
        </tr>
        <?php endforeach ?>

    </tbody>
</table>