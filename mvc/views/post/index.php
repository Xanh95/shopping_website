<!--views/products/index.php-->

<div class="container-employee" id="list-sale">
    <div class="title-menu">
        <h6>Danh Sách Bài Viết</h6>
        <input type="search" placeholder="tìm kiếm tên bài viết" id="sale-name">
        Theo Thời Gian
        <select name="sorttime " id="sale-sorttime">
            <option value="">Thời Gian</option>
            <option value="1">Mới-&gt;Cũ</option>
            <option value="2">Cũ-&gt;Mới</option>
        </select>
        Theo Tên
        <select name="sortname " id="sale-sortname">
            <option value="">Tên</option>
            <option value="1">Từ a-z</option>
            <option value="2">Từ z-a</option>
        </select>

        <button class="btn-search-employee" id="search-sale">Tìm Kiếm</button>
    </div>
    <hr>
    <div class="list-employee" id="list-search-sales">
        <table class="table-employee" border="1px">
            <tbody>
                <tr>

                    <th>ID</th>
                    <th>Tiêu Đề Bài Viết</th>
                    <th>Ảnh đại diện Bài Viết</th>
                    <th>Thời Gian Đăng</th>


                    <th></th>
                </tr>
                <?php foreach ($posts as $values) : ?>
                    <tr>

                        <td><?php echo $values['id'] ?></td>
                        <td><?php echo $values['title'] ?></td>
                        <td><img src="assets/img/post/<?php echo $values['avatar_sale'] ?>" alt="assets/img/post/<?php echo $values['avatar_sale'] ?>" width="100px"></td>


                        <td><?php echo $values['created_at'] ?></td>


                        <td><a href="post/update/<?php echo $values['id']; ?>">Sửa</a> <a href="post/delete/<?php echo $values['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này')">Xoá</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <hr>
        <div class="pagination">
            <?php if ($count_total > $limit) : ?>
                <a href="./post/index/<?php echo ($page - 1) <= 0 ? 1 : ($page - 1)
                                        ?>">&lt;&lt;</a>
                <?php if ($total_page > 10) : ?>
                    <a href="./post/index/1">1</a>
                    <a href="./post/index/2">2</a>
                    <a href="./post/index/3">3</a>
                    <input type="text" style="width: 30px;" value="<?php echo $page ?>" id="go_page"> <a href="./post/index/" id="go_link">Go</a>
                    <a href="./post/index/<?php echo $total_page - 2 ?>"><?php echo $total_page - 2 ?></a>
                    <a href="./post/index/<?php echo $total_page - 1 ?>"><?php echo $total_page - 1 ?></a>
                    <a href="./post/index/<?php echo $total_page ?>"><?php echo $total_page ?></a>
                <?php else : ?>
                    <?php for ($i = 1; $i <= $total_page; ++$i) : ?>
                        <a href="./post/index/<?php echo $i; ?>" style="color: <?php echo ($page == $i) ? '#ff6000' : '#007bff' ?>;"><?php echo $i; ?></a>
                    <?php endfor; ?>
                <?php endif ?>


                <a href="./post/index/<?php echo ($page + 1) >= $total_page ? $total_page : ($page + 1)
                                        ?>">&gt;&gt;</a>
            <?php endif
            ?>
        </div>
    </div>
</div>