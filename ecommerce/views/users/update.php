<form action="" method="post" id="update_user">
    <div class="container-employee" id="list-user">
        <h6>Thông tin Khách hàng</h6>
        <hr>
        <div class="list-employee" id="list-search-users">
            <table class="table-employee" border="1px">
                <tbody>
                    <tr>

                        <th>ID</th>
                        <th>Tên Khách hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Giới Tính</th>
                        <th>Ngày Sinh</th>
                        <th>Đổi Mật Khẩu</th>


                        <th></th>
                    </tr>

                    <tr>

                        <td><?php echo $users['id'] ?> <input type="hidden" name="id" value="<?php echo $users['id'] ?>"></td>
                        <td><input type="text" value="<?php echo $users['name'] ?>" name="name"></td>
                        <td><input type="text" value="<?php echo $users['phone'] ?>" name="phone"></td>
                        <td><?php echo $users['email'] ?></td>
                        <td><select name="gender" id="">
                                <option value="1" <?php echo $users['gender'] == 1 ? "checked" : "" ?>>Nam</option>
                                <option value="2" <?php echo $users['gender'] == 2 ? "checked" : "" ?>>Nữ</option>
                            </select></td>
                        <td><input type="text" value="<?php echo $users['birthday'] ?>" name="birthday"></td>
                        <td><input type="password" name="password"></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success" name="update_user">Sửa</button>
        </div>
    </div>
</form>


<div class="select-address">
    <h5>địa chỉ khách hàng đã lưu</h5>
    <hr>
    <?php foreach ($address_user as $values) : ?>
        <label for="address-2" class="option-address">
            <table>
                <tbody>
                    <tr>
                        <td>Họ Và Tên</td>
                        <td><?php echo $values['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Số Điện Thoại</td>
                        <td><?php echo $values['phone'] ?></td>
                        <td rowspan="4">
                        </td>
                    </tr>
                    <tr>
                        <td>Địa Chỉ</td>
                        <td><?php echo $values['address'] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="color: red;"><i class="fas <?php echo $values['address_type'] == 1 ? "fa-house-user" : "fa-building" ?>"></i>
                            <span><?php echo $values['address_type'] == 1 ? "Nhà riêng" : "Cơ Quan" ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </label>

    <?php endforeach ?>
</div>