<table class="table-employee" border="1px">
    <tbody>
        <tr>

            <th>ID</th>
            <th>giá tiền</th>
            <th>Mã đơn hàng</th>
            <th>Tình Trạng Thanh Toán</th>
            <th>mã ngân hàng</th>
            <th>Mã giao dịch tại NH</th>
            <th>vnp_CardType</th>
            <th>vnp_PayDate</th>

        </tr>
        <?php foreach ($vnpay as $values) : ?>
            <tr>

                <td><?php echo $values['id'] ?></td>
                <td style="color: red;">
                    <b><?php echo number_format(($values['vnp_Amount'] / 100), 0, '.', '.') . ' VNĐ'; ?></b>
                </td>
                <td><?php echo $values['vnp_TxnRef'] ?></td>

                <td><?php echo $values['vnp_ResponseCode'] == "00" ? "Thành Công" : "Thất bại" ?></td>
                <td><?php echo $values['vnp_BankCode'] ?></td>
                <td><?php echo $values['vnp_BankTranNo'] ?></td>
                <td><?php echo $values['vnp_CardType'] ?></td>
                <td><?php echo $values['vnp_PayDate'] ?></td>



            </tr>
        <?php endforeach; ?>

    </tbody>
</table>