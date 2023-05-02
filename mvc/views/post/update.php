<!--views/post/update.php-->
<form action="" method="post" id="sale" enctype="multipart/form-data">
    <div class="short_details" id="list-sale">
        <h6>Sửa bài viết <?php echo $post['title'] ?> </h6>
        <hr>
        <h6>Tiêu đề bài viết</h6>
        <input type="text" class="title-sale" name="title" value="<?php echo $post['title'] ?>">
        <h6>Ảnh đại diện bài viết</h6>
        <input type="file" style="margin-bottom: 10px;" name="avatar_sale">
        <img src="assets/img/post/<?php echo $post['avatar_sale'] ?>" alt="assets/img/post/<?php echo $post['avatar_sale'] ?>" width="100px">
        <textarea class="summernote" name="sale" required><?php echo $post['sale'] ?></textarea>
    </div>
    <div class="add-employee-btn text-center">
        <button class="btn btn-success" name="update_sale" type="submit">Sửa</button>
    </div>
</form>