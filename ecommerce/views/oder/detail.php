<h6>Thông Tin Đơn Hàng <?php echo $code_oder ?></h6>
<hr />
<form action="" method="post">

    <div class="status_oder" id="list-oder">
        <span>Tình trạng thanh toán</span>
        <select name="status" id="">
            <option value="1" <?php echo $status == 1 ? "selected" : ""; ?>>Chưa Thanh Toán</option>
            <option value="2" <?php echo $status == 2 ? "selected" : ""; ?>>Đã Thanh Toán</option>
        </select>

    </div>

    <table class="table-employee" border="1px">
        <tbody>
            <tr>
                <th>ID Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh đại diện SP</th>
                <th>Giá Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php foreach ($order_detail as $values) : ?>
                <tr>
                    <td><?php echo $values['product_id'] ?></td>
                    <td><?php echo $values['name_product'] ?></td>
                    <td><img src="assets/img/products/<?php echo $values['avatar'] ?>" alt="assets/img/products/<?php echo $values['avatar'] ?>" width="100px"></td>
                    <td style="color: red;"> <b><?php echo number_format($values['price'], 0, '.', '.') . ' VNĐ'; ?></b>
                    </td>
                    <td>
                        <input type="number" name="<?php echo $values['id'] ?>" value="<?php echo $values['quantity'] ?>">
                        <br>
                        <a href="oder/deleteProduct/<?php echo $values['id'] ?>">Xoá khỏi đơn hàng</a>
                    </td>
                    <td style="color: red;">
                        <b><?php echo number_format(($values['price'] * $values['quantity']), 0, '.', '.') . ' VNĐ'; ?></b>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th>Tổng giá thành</th>
                <td style="color: red;"><b>
                        <?php
                        $total = 0;
                        foreach ($order_detail as $values) {
                            $total += ($values['price'] * $values['quantity']);
                        };
                        echo number_format(($total), 0, '.', '.') . ' VNĐ';
                        ?>
                    </b>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success" name="update_oder">Sửa</button>

</form>