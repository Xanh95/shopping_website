$(document).ready(function () {
  var popup = $(".popup-cart");
  var btn_add = $(".add-to-cart");
  var close = $(".close");
  var box_cart = $(".box-cart");
  var cart = $(".box-notify");

  btn_add.each(function () {
    $(this).click(function () {
      popup.addClass("show-popup");
    });
  });

  cart.click(function () {
    popup.addClass("show-popup");
  });

  close.click(function () {
    popup.removeClass("show-popup");
  });
  popup.click(function (e) {
    if (!box_cart.has(e.target).length) {
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
