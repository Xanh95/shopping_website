<!--views/products/search.php-->
<table class="table-employee" border="1px">
    <tbody>
        <tr>

            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Ảnh đại diện SP</th>
            <th>Trạng Thái</th>
            <th>Bảo Hành</th>
            <th>Danh Mục</th>
            <th>Giá Sản Phẩm</th>

            <th></th>
        </tr>
        <?php foreach ($products as $values) : ?>
            <tr>

                <td><?php echo $values['id'] ?></td>
                <td><?php echo $values['name'] ?></td>
                <td><img src="assets/img/products/<?php echo $values['avatar_products'] ?>" alt="assets/img/products/<?php echo $values['avatar_products'] ?>" width="100px"></td>
                <td><?php echo $values['status'] == 1 ? "Còn Hàng" : "Hết Hàng" ?></td>
                <td><?php echo $values['guarantee'] ?></td>
                <td><?php
                    foreach ($listproducts as $listproduct) {
                        if ($listproduct['id'] == $values['category_id']) {
                            echo $listproduct['listproducts'];
                            break;
                        }
                    }
                    ?></td>
                <td style="color: red;"> <b><?php echo number_format($values['price'], 0, '.', '.') . ' VNĐ'; ?></b>
                </td>

                <td><a href="products/update/<?php echo $values['id']; ?>">Sửa</a> <a href="products/delete/<?php echo $values['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa nhận sự này')">Xoá</a></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>