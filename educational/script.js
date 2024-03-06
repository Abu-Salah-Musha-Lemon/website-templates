$(document).ready(function () {
  $(".fa-bars").click(function () {
    $(this).toggleClass("fa-times");
    $(".navbar").toggleClass("nav-toggle");
  });

  $(window).on("scroll load", function () {
    $(".fa-bars").removeClass("fa-times");
    $(".navbar").removeClass("nav-toggle");

    if ($(window).scrollTop() > 30) {
      $("header").addClass("header-active");
    } else {
      $("header").removeClass("header-active");
    }

    let win = $(window);
    let item = $(this);

    $("section").each(function () {
      var top = $(window).scrollTop();
      var id = $(this).attr("id");
      var height = $(this).height();
      var offset = $(this).offset().top - 200;
      if (top >= offset && top < offset + height) {
        $("navbar ul li a").removeClass("active");
        $("navbar")
          .find('[href="#' + id + '"]')
          .addClass("active");
      }
    });

    $("section").each(function () {
      var top = $(window).scrollTop();
      var id = $(this).attr("id"); // Change to $(this).attr("id")
      var height = $(this).height();
      var offset = $(this).offset().top; // Remove - 200

      if (top >= offset && top < height + offset) {
        $("navbar ul li a").removeClass("active");
        $("navbar")
          .find('[href="#' + id + '"]')
          .addClass("active");
      }
    });

    // 29min
  });
});
