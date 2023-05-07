$("form").off("keyup keypress blur change");
if ($(".slider-for").length) {
  $(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav",
  });
}

if ($(".slider-nav").length) {
  $(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    dots: true,
    centerMode: true,
    focusOnSelect: true,
  });
}
if ($(".products-seen").length) {
  $(".products-seen").slick({
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 840,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });
}
// validate comfirm cart
if ($(".select-address").length < 0) {
  $("#confirm-pay-cart").validate({
    rules: {
      "input-name-recipient": "required",
      "input-phone-recipient": "required",
      "input-city-recipient": "required",
      "input-district-recipient": "required",
      "input-address-recipient": "required",
      "ship-address": "required",
      "method-pay": "required",
    },
    messages: {
      "input-name-recipient": "phải nhập/chọn",
      "input-phone-recipient": "phải nhập/chọn",
      "input-city-recipient": "phải nhập/chọn",
      "input-district-recipient": "phải nhập/chọn",
      "input-address-recipient": "phải nhập/chọn",
      "ship-address": "phải nhập/chọn",
      "method-pay": "phải nhập/chọn",
    },
  });
} else {
  $("#confirm-pay-cart").validate({
    rules: {
      "ship-address": "required",
      "method-pay": "required",
    },
    messages: {
      "ship-address": "phải nhập/chọn",
      "method-pay": "phải nhập/chọn",
    },
  });
}
// validate number product
const qtyInputs = document.querySelectorAll(".qty-input");

qtyInputs.forEach((qtyInput) => {
  qtyInput.addEventListener("change", () => {
    if (qtyInput.value < 0) {
      qtyInput.value = 1;
    }
    if (qtyInput.value > 99) {
      qtyInput.value = 99;
    }
  });
});
function number() {
  // validate number product
  const qtyInputs = document.querySelectorAll(".qty-input");

  qtyInputs.forEach((qtyInput) => {
    qtyInput.addEventListener("change", () => {
      if (qtyInput.value < 0) {
        qtyInput.value = 1;
      }
      if (qtyInput.value > 99) {
        qtyInput.value = 99;
      }
    });
  });
  // buttion edit number produtc
  const qtyDecrease = document.querySelectorAll(".qty-decrease");
  const qtyIncrease = document.querySelectorAll(".qty-increase");

  qtyDecrease.forEach((decreaseButton) => {
    decreaseButton.addEventListener("click", () => {
      const inputField = decreaseButton.nextElementSibling;
      let currentVal = parseInt(inputField.value);
      if (!currentVal) {
        currentVal = 0;
      }
      if (currentVal > 1) {
        inputField.value = currentVal - 1;
      }
    });
  });

  qtyIncrease.forEach((increaseButton) => {
    increaseButton.addEventListener("click", () => {
      const inputField = increaseButton.previousElementSibling;
      let currentVal = parseInt(inputField.value);
      if (!currentVal) {
        currentVal = 0;
      }
      if (currentVal < 99) {
        inputField.value = currentVal + 1;
      }
    });
  });
  if (
    document.querySelectorAll(".qty-input").length > 0 &&
    document.querySelectorAll(".sub-qty").length > 0
  ) {
    const qtyInput = document.querySelector(".qty-input");
    const qtysub = document.querySelector(".sub-qty");
    const qtyadd = document.querySelector(".add-qty");

    qtysub.addEventListener("click", () => {
      let currentVal = parseInt(qtyInput.value);
      if (!currentVal) {
        currentVal = 0;
      }
      if (currentVal > 1) {
        qtyInput.value = currentVal - 1;
      }
    });

    qtyadd.addEventListener("click", () => {
      let currentVal = parseInt(qtyInput.value);
      if (!currentVal) {
        currentVal = 0;
      }
      if (currentVal < 99) {
        qtyInput.value = currentVal + 1;
      }
    });
  }
  // increase cart
  $(".qty-increase").each(function () {
    $(this).click(function () {
      let id_products = $(this).data("id_product");
      let quantity = $(`#products_${id_products}_quantity`).val();

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
          $("#notify-box-cart").html(data);
        },
      };
      // Gọi ajax với jQuery
      $.ajax(obj_ajax);
    });
  });
  // update quantity
  $(".qty-increase").each(function () {
    $(this).click(function () {
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
    });
  });
  //
  // update price
  $(".qty-increase").each(function () {
    $(this).click(function () {
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
    });
  });
  //
  // decrease cart
  $(".qty-decrease").each(function () {
    $(this).click(function () {
      let id_products = $(this).data("id_product");
      let quantity = $(`#products_${id_products}_quantity`).val();

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
          $("#notify-box-cart").html(data);
        },
      };
      // Gọi ajax với jQuery
      $.ajax(obj_ajax);
    });
  });
  // update quantity
  $(".qty-decrease").each(function () {
    $(this).click(function () {
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
    });
  });
  //
  // update price
  $(".qty-decrease").each(function () {
    $(this).click(function () {
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
    });
  });
  //
  // change cart
  $(".qty-input").each(function () {
    $(this).change(function () {
      let id_products = $(this).data("id_product");
      let quantity = $(`#products_${id_products}_quantity`).val();

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
          $("#notify-box-cart").html(data);
        },
      };
      // Gọi ajax với jQuery
      $.ajax(obj_ajax);
    });
  });
  // update quantity
  $(".qty-input").each(function () {
    $(this).change(function () {
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
    });
  });
  //
  // update price
  $(".qty-input").each(function () {
    $(this).change(function () {
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
    });
  });
  //
  // delete product cart
  $(".delete").each(function () {
    $(this).click(function () {
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
          $("#notify-box-cart").html(data);
        },
      };
      // Gọi ajax với jQuery
      $.ajax(obj_ajax);
    });
  });

  // update quantity
  $(".delete").each(function () {
    $(this).click(function () {
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
    });
  });
  //
  // update price
  $(".delete").each(function () {
    $(this).click(function () {
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
    });
  });
  // update product cart
  $(".delete").each(function () {
    $(this).click(function () {
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
  });
  $(".delete").each(function () {
    $(this).click(function () {
      var obj_ajax = {
        // url PHP xử lý ajax gửi lên
        url: "./cart/showCart",
        // phương thức gửi dữ liệu: GET, POST, PUT, DELETE

        method: "POST",
        // Set dữ liệu truyền lên
        data: {},
        // Nơi nhận dữ liệu trả về từ PHP
        success: function (data) {
          $(".confirm-box-cart").html(data);
          cart();
          number();
        },
      };
      // Gọi ajax với jQuery
      $.ajax(obj_ajax);
    });
  });
  //
  // delete  cart
  $(".btn-cart-dell").each(function () {
    $(this).click(function () {
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
          $("#notify-box-cart").html(data);
        },
      };
      // Gọi ajax với jQuery
      $.ajax(obj_ajax);
    });
  });

  // update quantity
  $(".btn-cart-dell").each(function () {
    $(this).click(function () {
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
    });
  });
  //
  // update price
  $(".btn-cart-dell").each(function () {
    $(this).click(function () {
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
    });
  });
  // update product cart
  $(".delete").each(function () {
    $(this).click(function () {
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
  });
  //
}
number();
$(document).ready(function () {
  if ($("#action").length > 0) {
    let category = $("#action").val();
    let page = "go_page_" + category;
    let link = "go_link_" + category;

    $(`#${page}`).on("input", function () {
      var goPageInput = $(this).val();
      $(`#${link}`).attr("href", `./home/${category}/` + goPageInput);
    });
  }
});
