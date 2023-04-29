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
if ($("#list-employee").length > 0) {
  $("#collapseOne").addClass("show");
  robot.css({
    opacity: 1,
    transform: "translate(-39px, 27px)",
  });
}
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
    employee_input_name: "required",
    employee_input_birthday: {
      required: true,
      date: true,
      dateFormat: "dd/mm/yyyy",
    },
    employee_input_phone: {
      required: true,
      minlength: 9,
    },
    employee_input_pass: {
      required: true,
      minlength: 8,
    },
    employee_input_confirm_password: {
      required: true,
      equalTo: "#employee_input_pass",
    },
    employee_input_address: "required",
    employee_input_hometown: "required",
    employee_input_gender: "required",
    employee_input_email: {
      required: true,
      email: true,
    },
  },
  messages: {
    employee_input_name: "phải Nhập",
    employee_input_birthday: {
      required: "Phải nhập ngày sinh",
      date: "Phải nhập đúng định dạng ngày tháng năm",
      dateFormat: "Phải nhập đúng định dạng ngày tháng năm",
    },
    employee_input_phone: {
      required: "phải Nhập",
      minlength: "ít nhất 9 chữ số",
    },
    employee_input_pass: {
      required: "phải Nhập",
      minlength: "mật khẩu ít nhất 8 ký tự",
    },
    employee_input_address: "phải Nhập",
    employee_input_hometown: "phải Nhập",
    employee_input_confirm_password: {
      required: "phải Nhập",
      equalTo: "mật khẩu nhập lại không giống",
    },
    employee_input_gender: "phải Chọn",
    employee_input_email: {
      required: "phải Nhập",
      email: "phải là dạng email",
    },
  },
});
// validate edit pass
if ($("#editpassword").length) {
  $("#editpassword").validate({
    rules: {
      currentpass: "required",
      newpass: {
        required: true,
        minlength: 8,
      },
      renewpass: {
        required: true,
        equalTo: newpass,
      },
    },
    messages: {
      currentpass: "phải Nhập",
      newpass: {
        required: "phải Nhập",
        minlength: "mật khẩu ít nhất 8 ký tự",
      },
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
// ajax search employee
$("#search-employee").click(function () {
  let name = $("#employee-name").val();
  let sortname = $("#employee-sortname").val();
  let sorttime = $("#employee-sorttime").val();
  let birthday = $("#employee-birthday").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchEmployee",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      name: name,
      sortname: sortname,
      sorttime: sorttime,
      birthday: birthday,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (employee) {
      $("#list-search-employee").html(employee);
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
// search autocomplete name
$("#employee-name").keyup(function () {
  let name = $("#employee-name").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchAutoName",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      name: name,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (employee) {
      list_name = JSON.parse(employee);

      $(function () {
        var availableTags = list_name;
        function split(val) {
          return val.split(/,\s*/);
        }
        function extractLast(term) {
          return split(term).pop();
        }

        $("#employee-name")
          // don't navigate away from the field on tab when selecting an item
          .on("keydown", function (event) {
            if (
              event.keyCode === $.ui.keyCode.TAB &&
              $(this).autocomplete("instance").menu.active
            ) {
              event.preventDefault();
            }
          })
          .autocomplete({
            minLength: 0,
            source: function (request, response) {
              // delegate back to autocomplete, but extract the last term
              response(
                $.ui.autocomplete.filter(
                  availableTags,
                  extractLast(request.term)
                )
              );
            },
            focus: function () {
              // prevent value inserted on focus
              return false;
            },
            select: function (event, ui) {
              var terms = split(this.value);
              // remove the current input
              terms.pop();
              // add the selected item
              terms.push(ui.item.value);
              // add placeholder to get the comma-and-space at the end
              terms.push("");
              this.value = terms.join("");
              return false;
            },
          });
      });
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
