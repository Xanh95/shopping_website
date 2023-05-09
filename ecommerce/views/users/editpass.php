<!-- views/users/editpass -->
<div class="editpassword">
    <form action="" id="editpassword" method="post">
        <h5>Đổi mật Khẩu</h5>
        <hr>
        <span class="input input--isao">
            <input class="input__field input__field--isao" type="password" id="input-currentpass" name="input-currentpass" />
            <label class="input__label input__label--isao" for="input-currentpass" data-content="mật Khẩu hiện tại">
                <span class="input__label-content input__label-content--isao">mật Khẩu hiện tại</span>
            </label>
        </span>
        <span class="input input--isao">
            <input class="input__field input__field--isao" type="password" id="input-newpass" name="input-newpass" />
            <label class="input__label input__label--isao" for="input-newpass" data-content="Mật khẩu mới">
                <span class="input__label-content input__label-content--isao">Mật khẩu mới</span>
            </label>
        </span>
        <span class="input input--isao">
            <input class="input__field input__field--isao" type="password" id="input-renewpass" name="input-renewpass" />
            <label class="input__label input__label--isao" for="input-renewpass" data-content="Nhập lại mật khẩu mới">
                <span class="input__label-content input__label-content--isao">Nhập lại mật khẩu mới</span>
            </label>
        </span>

        <button class="btn" name="edit-pass">Cập Nhật</button>
    </form>
</div>