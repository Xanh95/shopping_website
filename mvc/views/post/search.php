<!--views/post/create.php-->
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