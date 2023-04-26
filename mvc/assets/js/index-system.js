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
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(6px, 0px)",
    });
  }
});
$("#headingThree").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(6px, 52px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(6px, 25px)",
    });
  }
});
$("#headingfour").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(14px, 78px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(15px, 52px)",
    });
  }
});
$("#headingfive").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-8px, 103px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-8px, 77px)",
    });
  }
});
$("#item-1").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 27px)",
  });
});
// $("#item-2").click(function () {
//   robot.css({
//     opacity: 1,
//     transform: "translate(-39px, 53px)",
//   });
// });
//
if ($("#add-employee").length > 0) {
  $("#collapseOne").addClass("show");
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 53px)",
  });
}
//
if ($("#add-department").length > 0) {
  $("#collapseOne").addClass("show");
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 75px)",
  });
}
//
if ($("#list-department").length > 0) {
  $("#collapseOne").addClass("show");
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 100px)",
  });
}
$("#item-4").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 52px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 27px)",
    });
  }
});
$("#item-5").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 80px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 53px)",
    });
  }
});
$("#item-6").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 104px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 77px)",
    });
  }
});
$("#item-7").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 106px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 77px)",
    });
  }
});
$("#item-8").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 133px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 106px)",
    });
  }
});
$("#item-9").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 157px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 129px)",
    });
  }
});
$("#item-10").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 129px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 103px)",
    });
  }
});
$("#item-11").click(function () {
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 152px)",
  });
  if (!document.querySelectorAll("#headingOne").length > 0) {
    robot.css({
      opacity: 1,
      transform: "translate(-39px, 127px)",
    });
  }
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
    "employee-input-confirm_password": {
      required: true,
      equalTo: "employee-input-pass",
    },
    "employee-input-address": "required",
    "employee-input-hometown": "required",
    "employee-input-gender": "required",
  },
  messages: {
    "employee-input-name": "phải Nhập",
    "employee-input-birthday": "phải Nhập",
    "employee-input-phone": "phải Nhập",
    "employee-input-pass": "phải Nhập",
    "employee-input-address": "phải Nhập",
    "employee-input-hometown": "phải Nhập",
    "employee-input-confirm_password": {
      required: "phải Nhập",
      equalTo: "mật khẩu nhập lại không giống",
    },
    "employee-input-gender": "phải Chọn",
  },
});
// validate edit pass
if ($("#editpassword").length) {
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
}

// summernote
$(document).ready(function () {
  $("#summernote").summernote();
});
