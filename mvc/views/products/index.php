<!--views/products/index.php-->

<div class="container-employee" id="list-product">
    <div class="title-menu">
        <h6>Danh Sách Sản Phẩm</h6>
        <input type="search" placeholder="tìm kiếm tên SP" id="product-name">
        Theo Thời Gian
        <select name="sorttime " id="product-sorttime">
            <option value="">Thời Gian</option>
            <option value="1">Mới-&gt;Cũ</option>
            <option value="2">Cũ-&gt;Mới</option>
        </select>
        Theo Tên
        <select name="sortname " id="product-sortname">
            <option value="">Tên</option>
            <option value="1">Từ a-z</option>
            <option value="2">Từ z-a</option>
        </select>
        Theo Danh Mục
        <input type="search" id="product-category">
        <button class="btn-search-employee" id="search-product">Tìm Kiếm</button>
    </div>
    <hr>
    <div class="list-employee" id="list-search-products">
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
                    <td><img src="assets/img/products/<?php echo $values['avatar_products'] ?>"
                            alt="assets/img/products/<?php echo $values['avatar_products'] ?>" width="100px"></td>
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

                    <td><a href="products/update/<?php echo $values['id']; ?>">Sửa</a> <a
                            href="products/delete/<?php echo $values['id']; ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa nhận sự này')">Xoá</a></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <hr>
        <div class="pagination">
            <?php if ($count_total > $limit) : ?>
            <a href="./products/index/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                            ?>">&lt;&lt;</a>
            <?php if ($total_page > 10) : ?>
            <a href="./products/index/1">1</a>
            <a href="./products/index/2">2</a>
            <a href="./products/index/3">3</a>
            <input type="text" style="width: 30px;" value="<?php echo $page ?>" id="go_page"> <a
                href="./products/index/" id="go_link">Go</a>
            <a href="./products/index/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
            <a href="./products/index/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
            <a href="./products/index/<?php echo $total_page ?>"><?php echo $total_page ?></a>
            <?php else : ?>
            <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
            <a href="./products/index/<?php echo $i; ?>"
                style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
            <?php endfor; ?>
            <?php endif ?>


            <a href="./products/index/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                            ?>">&gt;&gt;</a>
            <?php endif
            ?>
        </div>
    </div>
</div>