var robot = $("#robot");
$("#headingOne").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(0px, 0px)",
  });
});
$("#headingTwo").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(6px, 25px)",
  });
});
$("#headingThree").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(6px, 52px)",
  });
});
$("#headingfour").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(14px, 78px)",
  });
});
$("#headingfive").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-8px, 106px)",
  });
});
$("#item-1").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 27px)",
  });
});
$("#item-2").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 53px)",
  });
});
$("#item-3").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 77px)",
  });
});
$("#item-4").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 52px)",
  });
});
$("#item-5").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 80px)",
  });
});
$("#item-6").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 104px)",
  });
});
$("#item-7").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 105px)",
  });
});
$("#item-8").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 133px)",
  });
});
$("#item-9").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 157px)",
  });
});
$("#menu").click(function () {
  var sidebar = $("#sidebar");
  if (sidebar.css("display") !== "none") {
    sidebar.css("display", "none");
    $("#main").css("grid-template-columns", "1fr");
  } else {
    sidebar.css("display", "block");
    $("#main").css("grid-template-columns", "204px 1fr");
  }
});
// validate add employee
$("#add-employee").validate({
  rules: {
    "employee-input-name": "required",
    "employee-input-birthday": "required",
    "employee-input-phone": "required",
    "employee-input-pass": "required",
    "employee-input-address": "required",
    "employee-input-hometown": "required",
  },
  messages: {
    "employee-input-name": "phải Nhập",
    "employee-input-birthday": "phải Nhập",
    "employee-input-phone": "phải Nhập",
    "employee-input-pass": "phải Nhập",
    "employee-input-address": "phải Nhập",
    "employee-input-hometown": "phải Nhập",
  },
});
// validate edit pass
$("#editpassword").validate({
  rules: {
    currentpass: "required",
    newpass: "required",
    renewpass: {
      required: true,
      equalTo: newpass,
    },
  },
  messages: {
    currentpass: "phải Nhập",
    newpass: "phải Nhập",
    renewpass: {
      required: "phải nhập",
      equalTo: "chưa giống với mật khẩu mới",
    },
  },
});
