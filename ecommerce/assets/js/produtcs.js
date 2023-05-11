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
if ($(".select-address").length > 0) {
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
} else {
  $("#confirm-pay-cart").validate({
    rules: {
      "input-name-recipient": "required",
      "input-phone-recipient": {
        required: true,
        minlength: 9,
      },
      "input-city-recipient": "required",
      "input-district-recipient": "required",
      "input-address-recipient": "required",
      "ship-address": "required",
      "method-pay": "required",
    },
    messages: {
      "input-name-recipient": "phải nhập/chọn",
      "input-phone-recipient": {
        required: "phải nhập",
        minlength: "SĐT ít nhất 9 số",
      },
      "input-city-recipient": "phải nhập/chọn",
      "input-district-recipient": "phải nhập/chọn",
      "input-address-recipient": "phải nhập/chọn",
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
