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
//
if ($("#list-product").length > 0) {
  $("#collapseThree").addClass("show");
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
}

//
//
if ($("#createproducts").length > 0) {
  $("#collapseThree").addClass("show");
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
}

//
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
//
if ($("#sale").length > 0) {
  $("#collapsefive").addClass("show");
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
}

//
if ($("#list-sale").length > 0) {
  $("#collapsefive").addClass("show");
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
}

//

if ($("#list-products").length > 0) {
  $("#collapseThree").addClass("show");
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
}
//
if ($("#add-listproducts").length > 0) {
  $("#collapseThree").addClass("show");
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
}

//
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
// Define custom date format validation rule
$.validator.addMethod(
  "dateFormat",
  function (value, element, params) {
    // Check if value matches "dd/mm/yyyy" format using regular expression
    if (!/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/\d{4}$/.test(value)) {
      return false;
    }

    // Split date string into day, month, and year
    var dateParts = value.split("/");
    var day = parseInt(dateParts[0], 10);
    var month = parseInt(dateParts[1], 10);
    var year = parseInt(dateParts[2], 10);

    // Check if month is valid
    if (month < 1 || month > 12) {
      return false;
    }

    // Check if day is valid
    if (day < 1 || day > 31) {
      return false;
    }

    // Check if day is valid for this month and year
    var daysInMonth = new Date(year, month, 0).getDate();
    if (day > daysInMonth) {
      return false;
    }

    // Date is valid
    return true;
  },
  "Phải nhập đúng định dạng ngày tháng năm (dd/mm/yyyy)"
);

// validate add employee
$("#add-employee").validate({
  rules: {
    employee_input_name: "required",
    employee_input_birthday: {
      required: true,
      dateFormat: true, // use custom dateFormat rule
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
    employee_input_name: "Phải nhập tên",
    employee_input_birthday: {
      required: "Phải nhập ngày sinh",
      dateFormat: "Phải nhập đúng định dạng ngày tháng năm (dd/mm/yyyy)",
    },
    employee_input_phone: {
      required: "Phải nhập số điện thoại",
      minlength: "Số điện thoại phải có ít nhất 9 chữ số",
    },
    employee_input_pass: {
      required: "Phải nhập mật khẩu",
      minlength: "Mật khẩu phải có ít nhất 8 ký tự",
    },
    employee_input_address: "Phải nhập địa chỉ",
    employee_input_hometown: "Phải nhập quê quán",
    employee_input_confirm_password: {
      required: "Phải nhập lại mật khẩu",
      equalTo: "Mật khẩu nhập lại không giống",
    },
    employee_input_gender: "Phải chọn giới tính",
    employee_input_email: {
      required: "Phải nhập email",
      email: "Phải nhập đúng định dạng email",
    },
  },
});
// validate update employee
$("#list-employee").validate({
  rules: {
    employee_input_name: "required",
    employee_input_birthday: {
      required: true,
      dateFormat: true, // use custom dateFormat rule
    },
    employee_input_phone: {
      required: true,
      minlength: 9,
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
    employee_input_name: "Phải nhập tên",
    employee_input_birthday: {
      required: "Phải nhập ngày sinh",
      dateFormat: "Phải nhập đúng định dạng ngày tháng năm (dd/mm/yyyy)",
    },
    employee_input_phone: {
      required: "Phải nhập số điện thoại",
      minlength: "Số điện thoại phải có ít nhất 9 chữ số",
    },

    employee_input_address: "Phải nhập địa chỉ",
    employee_input_hometown: "Phải nhập quê quán",

    employee_input_gender: "Phải chọn giới tính",
    employee_input_email: {
      required: "Phải nhập email",
      email: "Phải nhập đúng định dạng email",
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
  $(".summernote").summernote({
    height: 550,
  });
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
// ajax search products
$("#search-product").click(function () {
  let name = $("#product-name").val();
  let sortname = $("#product-sortname").val();
  let sorttime = $("#product-sorttime").val();
  let category = $("#product-category").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchProducts",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      name: name,
      sortname: sortname,
      sorttime: sorttime,
      category: category,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (products) {
      $("#list-search-products").html(products);
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
// ajax search sale
$("#search-sale").click(function () {
  let title = $("#sale-name").val();
  let sortname = $("#sale-sortname").val();
  let sorttime = $("#sale-sorttime").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchSales",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      title: title,
      sortname: sortname,
      sorttime: sorttime,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (sales) {
      $("#list-search-sales").html(sales);
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
// search autocomplete title
$("#sale-name").keyup(function () {
  let name = $("#sale-name").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchAutoTitle",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      name: name,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (post) {
      list_name = JSON.parse(post);

      $(function () {
        var availableTags = list_name;
        function split(val) {
          return val.split(/,\s*/);
        }
        function extractLast(term) {
          return split(term).pop();
        }

        $("#sale-name")
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
// tìm kiếm birthday
$("#employee-birthday").keyup(function () {
  let birthday = $("#employee-birthday").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchAutoBirthDay",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      birthday: birthday,
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

        $("#employee-birthday")
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
// tìm kiếm tên sản phẩm
$("#product-name").keyup(function () {
  let name_product = $("#product-name").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchAutoNameProduct",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      name_product: name_product,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (products) {
      list_name = JSON.parse(products);

      $(function () {
        var availableTags = list_name;
        function split(val) {
          return val.split(/,\s*/);
        }
        function extractLast(term) {
          return split(term).pop();
        }

        $("#product-name")
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
// tìm kiếm tên danh mục sản phẩm
$("#product-category").keyup(function () {
  let category = $("#product-category").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./ajax/searchAutoCategory",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      category: category,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (category) {
      list_name = JSON.parse(category);

      $(function () {
        var availableTags = list_name;
        function split(val) {
          return val.split(/,\s*/);
        }
        function extractLast(term) {
          return split(term).pop();
        }

        $("#product-category")
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
// validate
$("#add-department").validate({
  rules: {
    department: "required",
  },
  messages: {
    department: " phải nhập tên bộ phận",
  },
});
$("#add-listproducts").validate({
  rules: {
    department: "required",
  },
  messages: {
    department: " phải nhập tên bộ phận",
  },
});
// show price VND
$("#price_products").on("keyup change", function () {
  var price = $("#price_products").val();
  price = parseInt(price.replace(/,/g, ""));
  price = price.toLocaleString("vi-VN") + " VNĐ";
  $("#price_text").html(price);
});
$(document).ready(function () {
  if ($("#price_products").length > 0) {
    var price = $("#price_products").val();
    if (price !== "") {
      price = parseInt(price.replace(/,/g, ""));
      price = price.toLocaleString("vi-VN") + " VNĐ";
      $("#price_text").html(price);
    }
  }
});
// validate create products
$("#createproducts").validate({
  rules: {
    products_name: "required",
    products_guarantee: "required",
    price: {
      required: true,
      number: true,
    },
  },
  messages: {
    products_name: "Phải nhập",
    products_guarantee: "Phải nhập",
    price: {
      required: "Phải nhập",
      number: "Phải là số",
    },
  },
});
// phân trang đến trang muốn
$("#go_page").on("input", function () {
  var goPageInput = $(this).val();
  $("#go_link").attr("href", "./products/index/" + goPageInput);
});
$("#go_page_employee").on("input", function () {
  var goPageInput = $(this).val();
  $("#go_link_employee").attr("href", "./employee/index/" + goPageInput);
});
$("#go_page_sale").on("input", function () {
  var goPageInput = $(this).val();
  $("#go_link_sale").attr("href", "./post/index/" + goPageInput);
});

// validate post sale
$("#sale").validate({
  rules: {
    title: {
      required: true,
      maxlength: 75,
    },
  },
  messages: {
    title: {
      required: "phải nhập tiêu đề",
      maxlength: "nhiều nhất 75 ký tự",
    },
  },
});
