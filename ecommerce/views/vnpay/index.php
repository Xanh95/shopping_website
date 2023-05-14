<!--views/vnpay/index.php-->

<div class="container-employee" id="list-vnpay">
    <div class="title-menu">
        <h6>Danh Sách vnpay</h6>
        <input type="search" placeholder="tìm kiếm Mã Đơn Hàng" id="code_oder">
        <button class="btn-search-employee" id="search-vnpay">Tìm Kiếm</button>
    </div>
    <hr>
    <div class="list-employee" id="list-search-vnpay">
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
        <hr>
        <div class="pagination">
            <?php if ($count_total > $limit) : ?>
                <a href="./vnpay/index/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                        ?>">&lt;&lt;</a>
                <?php if ($total_page > 10) : ?>
                    <a href="./vnpay/index/1">1</a>
                    <a href="./vnpay/index/2">2</a>
                    <a href="./vnpay/index/3">3</a>
                    <input type="text" style="width: 30px;" value="<?php echo $page ?>" id="go_page_vnpay"> <a href="./vnpay/index/" id="go_link_vnpay">Go</a>
                    <a href="./vnpay/index/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
                    <a href="./vnpay/index/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
                    <a href="./vnpay/index/<?php echo $total_page ?>"><?php echo $total_page ?></a>
                <?php else : ?>
                    <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
                        <a href="./vnpay/index/<?php echo $i; ?>" style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
                    <?php endfor; ?>
                <?php endif ?>


                <a href="./vnpay/index/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                        ?>">&gt;&gt;</a>
            <?php endif
            ?>
        </div>
    </div>
</div>