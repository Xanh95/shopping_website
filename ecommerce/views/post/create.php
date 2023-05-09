<!--views/post/create.php-->
<form action="" method="post" id="sale" enctype="multipart/form-data">
    <div class="short_details">
        <h6>Thêm bài viết khuyển mãi</h6>
        <hr>
        <h6>Tiêu đề bài viết</h6>
        <input type="text" class="title-sale" name="title" value="<?php
                                                                    if (isset($post['title'])) {
                                                                        echo $post['title'];
                                                                    }
                                                                    ?>">
        <h6>Ảnh đại diện bài viết</h6>
        <input type="file" style="margin-bottom: 10px;" name="avatar_sale">
        <textarea class="summernote" name="sale" required><?php
                                                            if (isset($post['sale'])) {
                                                                echo $post['sale'];
                                                            }
                                                            ?></textarea>
    </div>
    <div class="add-employee-btn text-center">
        <button class="btn btn-success" name="create_sale" type="submit">Thêm</button>
    </div>
</form>