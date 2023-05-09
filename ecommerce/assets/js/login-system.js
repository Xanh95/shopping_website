$("#login-system").validate({
  rules: {
    email: {
      required: true,
      email: true,
    },
    password: {
      required: true,
      minlength: 8,
    },
  },
  messages: {
    email: {
      required: "Vui lòng nhập email",
      email: "Vui lòng nhập địa chỉ email hợp lệ",
    },
    password: {
      required: "Vui lòng nhập mật khẩu",
      minlength: "Mật khẩu phải có ít nhất 8 ký tự",
    },
  },
});
// tranfroms robot
var username = document.querySelector("#username");
var password = document.querySelector("#password");
var img = document.querySelector(".img");
username.addEventListener("click", function () {
  img.style.transform = "translate(-36px,126px)";
  img.style.width = "26px";
});
password.addEventListener("click", function () {
  img.style.transform = "translate(-36px,211px)";
  img.style.width = "26px";
  if (document.querySelectorAll(".error").length > 0) {
    img.style.transform = "translate(-36px,236px)";
    img.style.width = "26px";
  }
});
document.addEventListener("click", function (event) {
  if (event.target !== username && event.target !== password) {
    img.style.transform = "";
    img.style.width = "56px";
  }
});
