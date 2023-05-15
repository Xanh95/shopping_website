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
function toast() {
  // toast
  var toast_success = $("#toast-cart");
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
}
// ajax add to cart  popup
$(".add-to-cart").click(function () {
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
          toast();
        },
      };
      // Gọi ajax với jQuery
      $.ajax(obj_ajax);
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
// ajax add to cart  in product ìno
$("#muahang").click(function () {
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
      window.location.href = "home/confirmCart";
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
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
$(".add-to-cart-nopopup").click(function () {
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
      toast();
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
// ajax add to cart with quantity id
$("#add-to-cart-nopopup").click(function () {
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
      toast();
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
// ajax search don hang va chuyen huong den do
$("#btn_search_name_product_nav").click(function () {
  event.preventDefault();
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
      if (id != "false") {
        window.location.href = `home/product/${id}`;
      } else {
        var obj_ajax = {
          // url PHP xử lý ajax gửi lên
          url: "./home/sanPhamTimThay",
          // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

          method: "POST",
          // Set dữ liệu truyền lên
          data: {
            name: name,
          },
          // Nơi nhận dữ liệu trả về từ PHP
          success: function () {
            {
              window.location.href = `home/sanPhamTimThay`;
            }
          },
        };
        // Gọi ajax với jQuery
        $.ajax(obj_ajax);
      }
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
}
cart();
function number() {
  // validate number product

  $(".qty-input").change(function () {
    let input = parseInt($(".qty-input").val());
    if (isNaN(input)) {
      input = 1;
    } else if (input < 1) {
      input = 1;
    } else if (input > 99) {
      input = 99;
    }
    $(".qty-input").val(input);
    let id_products = $(this).data("id_product");
    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/increaseCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        quantity: input,
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        updateQuantityCart();
        updatePriceCart();
        $("#notify-box-cart").html(data);
        $(`#products_${id_products}_quantity`).val(quantity);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
  // validate number product

  $(".qty-input-2").change(function () {
    let input = parseInt($(".qty-input-2").val());
    if (isNaN(input)) {
      input = 1;
    } else if (input < 1) {
      input = 1;
    } else if (input > 99) {
      input = 99;
    }
    $(".qty-input-2").val(input);
  });
  // buttion edit number product
  $(".qty-decrease").click(function () {
    let input = $(this).next();
    let val_input = parseInt(input.val());
    if (isNaN(val_input)) {
      val_input = 1;
    } else if (val_input == "") {
      val_input = 1;
    } else if (val_input > 1) {
      val_input = val_input - 1;
    } else if (val_input == 1) {
      val_input = 1;
    }
    input.val(val_input);
    let id_products = $(this).data("id_product");
    let quantity = val_input;
    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/increaseCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        quantity: quantity,
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        updateQuantityCart();
        updatePriceCart();
        $("#notify-box-cart").html(data);
        $(`#products_${id_products}_quantity`).val(quantity);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
  $(".qty-increase").click(function () {
    let input = $(this).prev();
    let val_input = parseInt(input.val());
    if (isNaN(val_input)) {
      val_input = 1;
    } else if (val_input == "") {
      val_input = 1;
    } else if (val_input != "") {
      val_input = val_input + 1;
    } else if (val_input > 99) {
      val_input = 99;
    }
    input.val(val_input);
    let id_products = $(this).data("id_product");

    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/increaseCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        quantity: val_input,
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        updateQuantityCart();
        updatePriceCart();
        $("#notify-box-cart").html(data);
        $(`#products_${id_products}_quantity`).val(quantity);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
  // tang so luong san pham co so luong
  $(".add-qty").click(function () {
    let id_products = $(this).data("id_product");
    let input = $(`#products_${id_products}_quantity`);
    let quantity = parseInt(input.val());

    if (isNaN(quantity)) {
      quantity = 1;
    } else if (quantity == "") {
      quantity = 1;
    } else if (quantity != "") {
      quantity = quantity + 1;
    } else if (quantity > 99) {
      quantity = 99;
    }

    input.val(quantity);
  });
  $(".sub-qty").click(function () {
    let id_products = $(this).data("id_product");
    let input = $(`#products_${id_products}_quantity`);
    let quantity = parseInt(input.val());
    if (isNaN(quantity)) {
      quantity = 1;
    } else if (quantity == "") {
      quantity = 1;
    } else if (quantity > 1) {
      quantity = quantity - 1;
    } else if (quantity < 0) {
      quantity = 1;
    }
    input.val(quantity);
  });
  function updateQuantityCart() {
    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/updateQuantityCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {},
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        $("#total_quantity_card").html(data);
        $(".products-count-number").html(data);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  }
  function updatePriceCart() {
    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/updatePriceCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

      method: "POST",
      // Set dữ liệu truyền lên
      data: {},
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        $(".total-cart-number").html(data);
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  }
  // delete product cart
  $(".delete").click(function () {
    let id_products = $(this).data("id_product");
    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/deleteProductCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE
      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        updatePriceCart();
        updateQuantityCart();
        $("#notify-box-cart").html(data);
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
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
  // delete  cart
  $(".btn-cart-dell").click(function () {
    let id_products = $(this).data("id_product");
    var obj_ajax = {
      // url PHP xử lý ajax gửi lên
      url: "./cart/deleteCart",
      // phương thức gửi dữ liệu: GET, POST, PUT, DELETE
      method: "POST",
      // Set dữ liệu truyền lên
      data: {
        id_products: id_products,
      },
      // Nơi nhận dữ liệu trả về từ PHP
      success: function (data) {
        updatePriceCart();
        updateQuantityCart();
        $("#notify-box-cart").html(data);
        cart();
      },
    };
    // Gọi ajax với jQuery
    $.ajax(obj_ajax);
  });
}
number();
// ajax sap xep san pham
$("#btn-sort-products").click(function () {
  event.preventDefault();
  let range = $("#range-price-products").val();
  let sort_price = $("#sort-price-products").val();
  let sort_products = $("#sort-products").val();
  let id_category = $("#id_category").val();

  var obj_ajax = {
    // url PHP xử lý ajax gửi lên
    url: "./home/sapXep",
    // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

    method: "POST",
    // Set dữ liệu truyền lên
    data: {
      range: range,
      sort_price: sort_price,
      sort_products: sort_products,
      id_category: id_category,
    },
    // Nơi nhận dữ liệu trả về từ PHP
    success: function () {
      window.location.href = `home/sapXep`;
    },
  };
  // Gọi ajax với jQuery
  $.ajax(obj_ajax);
});
