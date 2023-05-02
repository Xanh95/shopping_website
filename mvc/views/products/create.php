<!--views/products/create.php-->
<div class="add-employee">
    <div class="add-employee-title">
        <h6>Thêm Sản Phẩm</h6>
        <hr>
    </div>
    <form method="post" action="" class="createproducts" id="createproducts" enctype="multipart/form-data">
        <div class="add-employee-form">
            <div class="name-employee">
                <span class="employee-text">Tên Sản Phẩm</span>
                <input type="text" class="employee-input" name="products_name">
            </div>
            <div class="birthday-employee">
                <span class="employee-text">Trạng Thái</span>
                <select name="products_status" id="">
                    <option value="1">Còn Hàng</option>
                    <option value="2">Hết Hàng</option>
                </select>
            </div>
            <div class="phone-employee">
                <span class="employee-text">Bảo Hành</span>
                <input type="text" class="employee-input" name="products_guarantee">
            </div>

            <div class="hometown-employee">
                <span class="employee-text">video ytb SP</span>
                <input type="text" class="employee-input" name="video">
            </div>
            <div class="hometown-employee">
                <span class="employee-text">ảnh review video</span>
                <input type="file" class="employee-input input-img" name="img_video">
            </div>
            <div class="hometown-employee">
                <span class="employee-text">ảnh review SP</span>
                <input type="file" class="employee-input input-img" name="imgs[]" multiple="multiple">
            </div>
            <div class="hometown-employee">
                <span class="employee-text">ảnh đại diện SP</span>
                <input type="file" class="employee-input input-img" name="avatar_products">
            </div>
            <div class="hometown-employee">
                <span class="employee-text">Giá Sản Phẩm</span>
                <div class="price">
                    <input type="number" class="employee-input" name="price" id="price_products">
                    <span class="price_text" id="price_text">VNĐ</span>
                </div>

            </div>

            <div class="job-employee">
                <span class="employee-text">Danh Mục</span>
                <select name="category_id" id="">
                    <?php foreach ($listproducts as $values) : ?>
                        <option value="<?php echo $values['id'] ?>">
                            <?php echo $values['listproducts']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


        </div>
        <div class="short_details">
            <hr>
            <h6>Mô tả ngắn gọn sản phẩm</h6>
            <textarea class="summernote" name="products_short_details"></textarea>
        </div>
        <hr>
        <h6>Mô Tả Sản Phẩm</h6>
        <hr>
        <div class="details">
            <textarea class="summernote" name="products_details"></textarea>
        </div>
        <div class="add-employee-btn text-center">
            <button class="btn btn-success" name="create_products">Thêm</button>
        </div>
    </form>
</div>