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
if (document.querySelectorAll("#qty-input").length > 0) {
  const qtyInput = document.querySelector("#qty-input");
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
