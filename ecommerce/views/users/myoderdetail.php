<h6>Thông Tin Đơn Hàng <?php echo $code_oder ?></h6>
<hr />
<form action="" method="post">

    <div class="status_oder" id="list-oder">
        <span>Tình trạng <?php echo $status == 1 ? "Chưa Thanh Toán" : "Đã Thanh Toán"; ?> </span>


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
                <td>
                    <a href="home/product/<?php echo $values['product_id'] ?>"><?php echo $values['name_product'] ?></a>
                </td>
                <td>
                    <a href="home/product/<?php echo $values['product_id'] ?>"><img
                            src="assets/img/products/<?php echo $values['avatar'] ?>"
                            alt="assets/img/products/<?php echo $values['avatar'] ?>" width="100px"></a>
                </td>
                <td style="color: red;"> <b><?php echo number_format($values['price'], 0, '.', '.') . ' VNĐ'; ?></b>
                </td>
                <td>
                    <?php echo $values['quantity'] ?>
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


</form>