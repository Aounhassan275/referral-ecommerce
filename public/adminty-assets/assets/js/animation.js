"use strict";
$(document).ready(function () {
  $(".js--triggerAnimation").on("click", function (e) {
    e.preventDefault();
    var anim = $(".js--animations").val();
    testAnim(anim);
  });

  $(".js--animations").on("change", function () {
    var anim = $(this).val();
    testAnim(anim);
  });

  function testAnim(x) {
    $("#animationSandbox")
      .removeClass()
      .addClass(x + " animated")
      .one(
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
        function () {
          $(this).removeClass();
        }
      );
  }
});
// slide 0 is left
$(document).ready(function () {
  $(".js--triggerAnimation-0").on("click", function (e) {
    e.preventDefault();
    var anim = $(".js--animations-0").val();
    testAnim(anim);
  });

  $(".js--animations-0").on("change", function () {
    var anim = $(this).val();
    testAnim(anim);
  });

  function testAnim(x) {
    $("#animationSandbox-0")
      .removeClass()
      .addClass(x + " animated")
      .one(
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
        function () {
          $(this).removeClass();
        }
      );
  }
});
// slide 1 is up
$(document).ready(function () {
  $(".js--triggerAnimation-1").on("click", function (e) {
    e.preventDefault();
    var anim = $(".js--animations-1").val();
    testAnim(anim);
  });

  $(".js--animations-1").on("change", function () {
    var anim = $(this).val();
    testAnim(anim);
  });

  function testAnim(x) {
    $("#animationSandbox-1")
      .removeClass()
      .addClass(x + " animated")
      .one(
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
        function () {
          $(this).removeClass();
        }
      );
  }
});
// slide 2 is down
$(document).ready(function () {
  $(".js--triggerAnimation-2").on("click", function (e) {
    e.preventDefault();
    var anim = $(".js--animations-2").val();
    testAnim(anim);
  });

  $(".js--animations-2").on("change", function () {
    var anim = $(this).val();
    testAnim(anim);
  });

  function testAnim(x) {
    $("#animationSandbox-2")
      .removeClass()
      .addClass(x + " animated")
      .one(
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
        function () {
          $(this).removeClass();
        }
      );
  }
});

// slide 3 is down
$(document).ready(function () {
  $(".js--triggerAnimation-3").on("click", function (e) {
    e.preventDefault();
    var anim = $(".js--animations-3").val();
    testAnim(anim);
  });

  $(".js--animations-3").on("change", function () {
    var anim = $(this).val();
    testAnim(anim);
  });

  function testAnim(x) {
    $("#animationSandbox-3")
      .removeClass()
      .addClass(x + " animated")
      .one(
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
        function () {
          $(this).removeClass();
        }
      );
  }
});
