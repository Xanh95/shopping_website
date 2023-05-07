$(".box-notify").click(function () {
  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./cart/showCart",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {},
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (data) {
      $("#pop-box-cart").html(data);
      cart();
      number();
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
// ajax add to cart  popup
$(".add-to-cart").each(function () {
  $(this).click(function () {
    let id_products = $(this).data("id_product");
    let quantity = $(`#products_${id_products}_quantity`).val();
    let name = $(`#products_${id_products}_name`).val();
    let price = $(`#products_${id_products}_price`).val();
    let avatar = $(`#products_${id_products}_avatar_products`).val();

    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/addToCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        name: name,
        quantity: quantity,
        price: price,
        avatar: avatar,
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        $("#notify-box-cart").html(data);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
});
// ajax add to cart  in product ìno
$("#muahang").each(function () {
  $(this).click(function () {
    let id_products = $(this).data("id_product");
    let quantity = $(`#products_${id_products}_quantity`).val();
    let name = $(`#products_${id_products}_name`).val();
    let price = $(`#products_${id_products}_price`).val();
    let avatar = $(`#products_${id_products}_avatar_products`).val();

    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/addToCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        name: name,
        quantity: quantity,
        price: price,
        avatar: avatar,
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        $("#notify-box-cart").html(data);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
});
// hover details

$(".card-product-body").each(function () {
  var infoBox = $(this).prev();
  $(this).mousemove(function (event) {
    var x = event.clientX;
    var y = event.clientY;

    var screenWidth = window.innerWidth;
    var distance = screenWidth - x;

    var infoBoxLeft = x + 50;
    var infoBoxTop = y - 100;

    infoBox.css({
      left: infoBoxLeft + "px",
      top: infoBoxTop + "px",
      display: "block",
    });

    if (distance < 367) {
      infoBox.css("left", infoBoxLeft - 480 + "px");
    }

    if (screenWidth < 576) {
      infoBox.css("display", "none");
    }
  });

  $(this).mouseleave(function () {
    infoBox.css("display", "none");
  });
});

// ajax add to cart no popup
$(".add-to-cart-nopopup").each(function () {
  $(this).click(function () {
    let id_products = $(this).data("id_product");
    let quantity = $(`#products_${id_products}_quantity`).val();
    let name = $(`#products_${id_products}_name`).val();
    let price = $(`#products_${id_products}_price`).val();
    let avatar = $(`#products_${id_products}_avatar_products`).val();

    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/addToCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        name: name,
        quantity: quantity,
        price: price,
        avatar: avatar,
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        $("#notify-box-cart").html(data);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
});

// ajax add to cart with quantity id
$("#add-to-cart-nopopup").each(function () {
  $(this).click(function () {
    let id_products = $(this).data("id_product");
    let quantity = $(`#products_${id_products}_quantity`).val();
    let name = $(`#products_${id_products}_name`).val();
    let price = $(`#products_${id_products}_price`).val();
    let avatar = $(`#products_${id_products}_avatar_products`).val();

    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/addToCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        name: name,
        quantity: quantity,
        price: price,
        avatar: avatar,
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        $("#notify-box-cart").html(data);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
});

// toast
var btn_success = $(".add-to-cart-nopopup");
var toast_success = $("#toast-cart");
btn_success.click(function (event) {
  event.preventDefault();
  var toast_html = `<div class="toast-cart toast-success">
<div class="toast-icon">
<i class="fas fa-check-circle"></i>
</div>
<div class="toast-cart-body">
<h3 class="toast-title">Success</h3>
<p class="toast-msg">Thêm Vào Giỏ Hàng Thành Công</p>
</div>
<div class="toast-close">
<img src="assets/img/svg/close.svg" alt="assets/img/svg/close.svg">
</div>
</div>`;

  toast_success.prepend(toast_html);
  var close_toast = $(".toast-close");
  close_toast.click(function () {
    toast_success.children(":first").remove();
  });
  setTimeout(function () {
    toast_success.children(":first").remove(); // xoá thông báo đầu tiên
  }, 3000);
});

// ajax search don hang va chuyen huong den do
$("#btn_search_name_product_nav").click(function () {
  let name = $("#ipt_search_name_product_nav").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./home/findIDProduct",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      name: name,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (id) {
      window.location.href = `home/product/${id}`;
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
// search autocomplete code_oder nav
$("#ipt_search_name_product_nav").keyup(function () {
  let name_product = $("#ipt_search_name_product_nav").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./home/searchAutoNameProduct",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      name_product: name_product,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (data) {
      list_name = JSON.parse(data);

      $(function () {
        var availableTags = list_name;
        function split(val) {
          return val.split(/,\s*/);
        }
        function extractLast(term) {
          return split(term).pop();
        }

        $("#ipt_search_name_product_nav")
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
$(".add-to-cart").click(function () {
  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./cart/showCart",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {},
    // Nơi nhận dữ liệu trả về từ PHP
    success: function (data) {
      $("#pop-box-cart").html(data);
      cart();
      number();
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
function cart() {
  $(document).ready(function () {
    var popup = $(".popup-cart");
    var btn_add = $(".add-to-cart");
    var close = $(".close");
    var box_cart = $(".box-cart");
    var cart = $(".box-notify");

    btn_add.each(function () {
      $(this).click(function () {
        event.preventDefault();
        popup.addClass("show-popup");
      });
    });

    cart.click(function () {
      event.preventDefault();
      popup.addClass("show-popup");
    });

    close.click(function () {
      event.preventDefault();
      popup.removeClass("show-popup");
    });
    popup.click(function (e) {
      if (!box_cart.has(e.target).length) {
        event.preventDefault();
        popup.removeClass("show-popup");
      }
    });
  });
  $(".btn-cart-confirm").click(function () {
    window.location.href = "home/confirmCart";
  });
  $("#confirm-pay").click(function () {
    window.location.href = "home/confirmPay";
  });
  $("#muahang").click(function () {
    window.location.href = "home/confirmCart";
  });
}
cart();
