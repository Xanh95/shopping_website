<!--views/products/update.php-->
<div class="add-employee">
    <div class="add-employee-title">
        <h6>Sửa Sản Phẩm</h6>
        <hr>
    </div>
    <form method="post" action="" class="createproducts" id="list-product" enctype="multipart/form-data">
        <div class="add-employee-form">
            <div class="name-employee">
                <span class="employee-text">Tên Sản Phẩm</span>
                <input type="text" class="employee-input" name="products_name" value="<?php echo $product['name'] ?>">
            </div>
            <div class="birthday-employee">
                <span class="employee-text">Trạng Thái</span>
                <select name="products_status" id="">
                    <option value="1" <?php $product['status'] == 1 ? 'checked' : '' ?>>Còn Hàng</option>
                    <option value="2" <?php $product['status'] == 2 ? 'checked' : '' ?>>Hết Hàng</option>
                </select>
            </div>
            <div class="phone-employee">
                <span class="employee-text">Bảo Hành</span>
                <input type="text" class="employee-input" name="products_guarantee"
                    value="<?php echo $product['guarantee'] ?>">
            </div>

            <div class="hometown-employee">
                <span class="employee-text">video ytb SP</span>
                <input type="text" class="employee-input" name="video" value="<?php echo $product['video'] ?>">
            </div>

            <div class="hometown-employee">
                <span class="employee-text">Giá Sản Phẩm</span>
                <div class="price">
                    <input type="number" class="employee-input" name="price" id="price_products"
                        value="<?php echo $product['price'] ?>">
                    <span class="price_text" id="price_text">VNĐ</span>
                </div>

            </div>

            <div class="job-employee">
                <span class="employee-text">Danh Mục</span>
                <select name="category_id" id="">
                    <?php foreach ($listproducts as $values) : ?>
                    <option value="<?php echo $values['id'] ?>"
                        <?php echo $values['id'] == $product['category_id'] ? 'selected' : '' ?>>
                        <?php echo $values['listproducts']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


        </div>
        <div class="hometown-employee">
            <span class="employee-text">ảnh review video</span>
            <input type="file" class="employee-input input-img" name="img_video">
        </div>
        <?php if (!empty($product['img_video'])) : ?>
        <img src="assets/img/products/<?php echo $product['img_video'] ?>"
            alt="assets/img/products/<?php echo $product['img_video'] ?>" width="100px">
        <?php endif; ?>
        <div class="hometown-employee">
            <span class="employee-text">ảnh review SP</span>
            <input type="file" class="employee-input input-img" name="imgs[]" multiple="multiple">
        </div>
        <div class="imgs_product">
            <?php foreach ($imgs_product as  $values) : ?>
            <img src="assets/img/products/<?php echo $values['img'] ?>"
                alt="assets/img/products/<?php echo $values['img'] ?>" width="100px">
            <?php endforeach ?>
        </div>
        <div class="hometown-employee">
            <span class="employee-text">ảnh đại diện SP</span>
            <input type="file" class="employee-input input-img" name="avatar_products">
        </div>
        <img src="assets/img/products/<?php echo $product['avatar_products'] ?>"
            alt="assets/img/products/<?php echo $product['avatar_products'] ?>" width="100px">
        <div class="short_details">
            <hr>
            <h6>Mô tả ngắn gọn sản phẩm</h6>
            <textarea class="summernote"
                name="products_short_details"><?php echo $product['short_details'] ?></textarea>
        </div>
        <hr>
        <h6>Mô Tả Sản Phẩm</h6>
        <hr>
        <div class="details">
            <textarea class="summernote" name="products_details"><?php echo $product['details'] ?></textarea>
        </div>
        <div class="add-employee-btn text-center">
            <button class="btn btn-success" name="update_product">Sửa</button>
        </div>
    </form>
</div>