<!--views/users/address.php-->
<div class="address-list">
    <h5>Địa Chỉ Của Tôi</h5>
    <hr>
    <div class="them-dia-chi"><a href="profile/add_address" class="add-address-new"><i class="fas fa-plus"></i>
            Thêm địa chỉ</a>
    </div>
    <hr>
    <?php foreach ($address as $values) : ?>
        <div class="info-address">
            <table>
                <tr>
                    <td>Họ Và Tên</td>
                    <td><?php echo $values['name'] ?></td>

                </tr>
                <tr>
                    <td>Số Điện Thoại</td>
                    <td><?php echo $values['phone'] ?></td>
                    <td>
                        <a href="profile/edit_address/<?php echo $values['id'] ?>" class="btn-action-address">Chỉnh Sửa</a>
                    </td>
                    <td>
                        <a href="profile/delete_address/<?php echo $values['id'] ?>" class="btn-action-address">Xoá</a>
                    </td>

                </tr>
                <tr>
                    <td>Địa Chỉ</td>
                    <td><?php echo $values['address'] ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="color: red;"><i class="fas <?php echo $values['address_type'] == 1 ? "fa-house-user" : "fa-building" ?>"></i>
                        <span><?php echo $values['address_type'] == 1 ? "Nhà riêng" : "Cơ Quan" ?></span>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    <?php endforeach ?>

</div>