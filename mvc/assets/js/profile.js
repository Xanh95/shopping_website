/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

(function (window) {
  "use strict";

  // class helper functions from bonzo https://github.com/ded/bonzo

  function classReg(className) {
    return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
  }

  // classList support for class management
  // altho to be fair, the api sucks because it won't accept multiple classes at once
  var hasClass, addClass, removeClass;

  if ("classList" in document.documentElement) {
    hasClass = function (elem, c) {
      return elem.classList.contains(c);
    };
    addClass = function (elem, c) {
      elem.classList.add(c);
    };
    removeClass = function (elem, c) {
      elem.classList.remove(c);
    };
  } else {
    hasClass = function (elem, c) {
      return classReg(c).test(elem.className);
    };
    addClass = function (elem, c) {
      if (!hasClass(elem, c)) {
        elem.className = elem.className + " " + c;
      }
    };
    removeClass = function (elem, c) {
      elem.className = elem.className.replace(classReg(c), " ");
    };
  }

  function toggleClass(elem, c) {
    var fn = hasClass(elem, c) ? removeClass : addClass;
    fn(elem, c);
  }

  var classie = {
    // full names
    hasClass: hasClass,
    addClass: addClass,
    removeClass: removeClass,
    toggleClass: toggleClass,
    // short names
    has: hasClass,
    add: addClass,
    remove: removeClass,
    toggle: toggleClass,
  };

  // transport
  if (typeof define === "function" && define.amd) {
    // AMD
    define(classie);
  } else {
    // browser global
    window.classie = classie;
  }
})(window);
// js button
$.fn.boom = function (e) {
  var colors = [
    // "#ffb3f6",
    // "#7aa0ff",
    // "#333",
    "#14fd14",
    "#45f3ff",
    "#ffa549",
  ];
  var shapes = [
    '<polygon class="star" points="21,0,28.053423027509677,11.29179606750063,40.97218684219823,14.510643118126104,32.412678195541844,24.70820393249937,33.34349029814194,37.989356881873896,21,33,8.656509701858067,37.989356881873896,9.587321804458158,24.70820393249937,1.0278131578017735,14.510643118126108,13.94657697249032,11.291796067500632"></polygon>',
    '<path class="circle" d="m 20 1 a 1 1 0 0 0 0 25 a 1 1 0 0 0 0 -25"></path>',
    '<polygon class="other-star" points="18,0,22.242640687119284,13.757359312880714,36,18,22.242640687119284,22.242640687119284,18.000000000000004,36,13.757359312880716,22.242640687119284,0,18.000000000000004,13.757359312880714,13.757359312880716"></polygon>',
    '<polygon class="diamond" points="18,0,27.192388155425117,8.80761184457488,36,18,27.19238815542512,27.192388155425117,18.000000000000004,36,8.807611844574883,27.19238815542512,0,18.000000000000004,8.80761184457488,8.807611844574884"></polygon>',
  ];

  var btn = $(this);
  var group = [];
  var num = Math.floor(Math.random() * 50) + 30;

  for (i = 0; i < num; i++) {
    var randBG = Math.floor(Math.random() * colors.length);
    var getShape = Math.floor(Math.random() * shapes.length);
    var c = Math.floor(Math.random() * 10) + 5;
    var scale = Math.floor(Math.random() * (8 - 4 + 1)) + 4;
    var x = Math.floor(Math.random() * (150 + 100)) - 100;
    var y = Math.floor(Math.random() * (150 + 100)) - 100;
    var sec = Math.floor(Math.random() * 1700) + 1000;
    var cir = $('<div class="cir"></div>');
    var shape = $('<svg class="shape">' + shapes[getShape] + "</svg>");

    shape.css({
      top: e.pageY - btn.offset().top + 20,
      left: e.pageX - btn.offset().left + 40,
      transform: "scale(0." + scale + ")",
      transition: sec + "ms",
      fill: colors[randBG],
    });

    btn.siblings(".btn-particles").append(shape);

    group.push({ shape: shape, x: x, y: y });
  }

  for (var a = 0; a < group.length; a++) {
    var shape = group[a].shape;
    var x = group[a].x,
      y = group[a].y;
    shape.css({
      left: x + 50,
      top: y + 15,
      transform: "scale(0)",
    });
  }

  setTimeout(function () {
    for (var b = 0; b < group.length; b++) {
      var shape = group[b].shape;
      shape.remove();
    }
    group = [];
  }, 2000);
};

$(function () {
  $(document).on("click", ".btn", function (e) {
    $(this).boom(e);
  });
});
// ẩn hiện mô tả sản phẩm
$(document).ready(function () {
  $(".btn-text-descript").click(function () {
    var desc = $(this).next(".text-descript");
    desc.toggle(); // Hiển thị/ẩn div kế tiếp nó
    // Nếu đối tượng kế tiếp đang ẩn đi
    if (desc.css("display") === "none") {
      $(this).text("Xem Chi Tiết Sản Phẩm >");
    } else {
      $(this).text("Ẩn Chi Tiết Sản Phẩm <");
    }
  });
});
// validate number product cart
$(".number-input").each(function () {
  $(this).change(function () {
    if ($(this).val() < 0) {
      $(this).val(1);
    }
    if ($(this).val() > 99) {
      $(this).val(99);
    }
  });
});
// validate update-info-user
$("#update-info-user").validate({
  rules: {
    "input-name": "required",
    "input-phone": "required",
    "input-address": "required",
    "input-email": {
      required: true,
      email: true,
    },
    gender: "required",
  },
  messages: {
    "input-name": "Vui lòng nhập tên",
    "input-phone": "Vui lòng nhập số điện thoại",
    "input-address": "Vui lòng nhập địa chỉ",
    "input-email": {
      required: "Vui lòng nhập địa chỉ email",
      email: "Vui lòng nhập địa chỉ email hợp lệ",
    },
    gender: "Vui lòng chọn giới tính",
  },
});
// validate edit pass
$("#editpassword").validate({
  rules: {
    "input-currentpass": "required",
    "input-newpass": "required",
    "input-renewpass": {
      required: true,
      equalTo: "#input-currentpass",
    },
  },
  messages: {
    "input-currentpass": "Phải nhập",
    "input-newpass": "Phải nhập",
    "input-renewpass": {
      required: "Phải nhập",
      equalTo: "Không giống mật với Mật khẩu mới",
    },
  },
});
// validate recipient
$("#recipient").validate({
  rules: {
    "input-namerecipient": "required",
    "input-phonerecipient": "required",
    "input-cityrecipient": "required",
    "input-districtrecipient": "required",
    "input-addressrecipient": "required",
    "address-type": "required",
  },
  messages: {
    "input-namerecipient": "phải nhập",
    "input-phonerecipient": "phải nhập",
    "input-cityrecipient": "phải nhập",
    "input-districtrecipient": "phải nhập",
    "input-addressrecipient": "phải nhập",
    "address-type": "phải nhập",
  },
});
// js input
(function () {
  // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
  if (!String.prototype.trim) {
    (function () {
      // Make sure we trim BOM and NBSP
      var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
      String.prototype.trim = function () {
        return this.replace(rtrim, "");
      };
    })();
  }

  [].slice
    .call(document.querySelectorAll("input.input__field"))
    .forEach(function (inputEl) {
      // in case the input is already filled..
      if (inputEl.value.trim() !== "") {
        classie.add(inputEl.parentNode, "input--filled");
      }

      // events:
      inputEl.addEventListener("focus", onInputFocus);
      inputEl.addEventListener("blur", onInputBlur);
    });

  function onInputFocus(ev) {
    classie.add(ev.target.parentNode, "input--filled");
  }

  function onInputBlur(ev) {
    if (ev.target.value.trim() === "") {
      classie.remove(ev.target.parentNode, "input--filled");
    }
  }
})();
//  change number products
const qtyDecrease = document.querySelectorAll(
  ".btn-change-number.btn-decrease"
);
const qtyIncrease = document.querySelectorAll(
  ".btn-change-number.btn-increase"
);

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
