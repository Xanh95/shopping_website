document.querySelector(".img-btn").addEventListener("click", function () {
  document.querySelector(".cont").classList.toggle("s-signup");
});

// validate login
$("#form-box").validate({
  rules: {
    email: {
      required: true,
      email: true,
    },

    password: "required",
  },
  messages: {
    email: {
      required: "Vui lòng nhập địa chỉ email của bạn",
      email: "Vui lòng nhập địa chỉ email hợp lệ",
    },
    password: "Vui lòng nhập mật khẩu của bạn",
  },
});
// validate register
$("#box-register").validate({
  rules: {
    "register-name": "required",
    "register-phone": "required",
    "register-email": {
      required: true,
      email: true,
    },
    "register-pass": {
      required: true,
      minlength: 8,
    },
    "register-repass": {
      required: true,
      equalTo: "#register-pass",
    },
  },
  messages: {
    "register-name": "Vui lòng nhập tên của bạn",
    "register-phone": "Vui lòng nhập số điện thoại của bạn",
    "register-email": {
      required: "Vui lòng nhập địa chỉ email của bạn",
      email: "Vui lòng nhập địa chỉ email hợp lệ",
    },
    "register-pass": {
      required: "Vui lòng nhập mật khẩu của bạn",
      minlength: "Mật khẩu phải chứa ít nhất 8 ký tự",
    },
    "register-repass": {
      required: "Vui lòng nhập lại mật khẩu",
      equalTo: "Mật khẩu không khớp",
    },
  },
});
