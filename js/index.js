$(document).ready(function () {
  var popup = $(".popup-cart");
  var btn_add = $(".add-to-cart");
  var close = $(".close");
  var box_cart = $(".box-cart");

  btn_add.each(function () {
    $(this).click(function () {
      popup.addClass("show-popup");
    });
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
