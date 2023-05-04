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
