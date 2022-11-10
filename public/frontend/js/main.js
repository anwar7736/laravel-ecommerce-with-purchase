var lastScrollTop = 0;
$(window).scroll(function (event) {
  var st = $(this).scrollTop();
  if (st > lastScrollTop) {
    $(".navbar").css("background-color", "white", "color", "black");
    $(".navbar-brand").css("color", "black");
    $(".navbar-nav li a").css("color", "black");
    $(".icons a").css("color", "black");
    $(".bar1, .bar2").css("background-color", "black");
  } else if (st == 0) {
    
      $("#navbar").css("background-color", "white", "color", "black");

      $("#forwhitebg").css("background-color", "white", "color", "black");
      $("#navbar .navbar-brand").css("color", "black");
      $("#forwhitebg .navbar-brand").css("color", "black");
      $("#forwhitebg .navbar-nav li a").css("color", "black");
      $("#navbar .navbar-nav .nav-item .nav-link").css("color", "black");
      $("#forwhitebg .icons a").css("color", "black");
      $("#navbar .icons a").css("color", "black");
      $("#forwhitebg .bar1,#forwhitebg .bar2").css("background-color", "black");
      $("#navbar .bar1,#navbar .bar2").css("background-color", "black");
  }
  lastScrollTop = st;
});
function toggleSound() {
  var audioElem = document.getElementById("myVideo");
  if (audioElem.paused) {
    audioElem.className = "fa-circle-play";
    audioElem.play();
  } else {
    audioElem.className = "fa-circle-pause";
    audioElem.pause();
  }
}

$(document).ready(function () {
  ma5menu({
    menu: ".site-menu",
    activeClass: "active",
    footer: "#ma5menu-tools",
    position: "left",
    closeOnBodyClick: true,
  });
});
$(document).ready(function () {
  $("#forwhitebg .bar1, #forwhitebg .bar2").css("background-color", "black");
  $(".navbar").click(function () {
    $(".navbar").css("background-color", "white", "color", "black");
    $(".navbar-brand").css("color", "black");
    $(".navbar-nav li a").css("color", "black");
    $(".icons a").css("color", "black");
    $(".bar1").css("background-color", "white");
    $(".bar2").css("background-color", "white");
  });
  $(".navbar").hover(function () {
    $(".navbar").css("background-color", "white", "color", "black");
    $(".navbar-brand").css("color", "black");
    $(".navbar-nav li a").css("color", "black");
    $(".icons a").css("color", "black");
    $(".bar1").css("background-color", "white");
    $(".bar2").css("background-color", "white");
  });
});
$(document).ready(function () {
  $("#men-hover").hover(
    function () {
      $("#men-hover-dropdown").stop(true).slideDown("medium");
    },
    function () {
      $("#men-hover-dropdown").stop(true).slideUp("medium");
    }
  );
  $("#women-hover").hover(
    function () {
      $("#women-hover-dropdown").stop(true).slideDown("medium");
    },
    function () {
      $("#women-hover-dropdown").stop(true).slideUp("medium");
    }
  );
});
$(document).ready(function () {
  $(".search, .close-search").click(function () {
    $(".search-wiget").stop(true).slideToggle("medium");
  });
  $("#filter").click(function () {
    $(".filter-wiget").stop(true).slideToggle("medium");
  });
});

$(document).ready(function(){
    $('.navbar-toggler').click(function(){
        $('.navbar-toggler .bar').css({
            "background-color":"black"
        });
    });
});

$(document).ready(function () {
  $("#men-button").click(function () {
    $(".menbutton").animate(css);
  });
});

// $(window).scroll(function () {
//     if ($(window).scrollTop() > 100) {
//         $('.filter-wiget').addClass('fixed');
//     } else {
//         $('.filter-wiget').removeClass('fixed');
//     }
// });

$(document).ready(function () {
  $("#cart-sidebar-btn").hover(function () {
    $(".cart-sidebar").css("right", "0");
    $(".overlay-sidebar").delay(500).fadeIn("slow");
  });
  $(".overlay-sidebar").hover(function () {
    $(".cart-sidebar").css("right", "-100%");
    $(".overlay-sidebar").delay(-100).fadeOut("medium");
  });
  $("#cart-sidebar-close").click(function () {
    $(".cart-sidebar").css("right", "-100%");
    $(".overlay-sidebar").delay(-100).fadeOut("medium");
  });
});
$(document).ready(function () {
  $("#address-manually").click(function () {
    $("#address-manually").css("display", "none");
    $(".address-manually").slideDown("medium");
  });
  $(".cuppon").click(function(){
    $(".cuppon-input").slideToggle("medium");
  });
});
$(document).ready(function () {
  $(".signin-up").hover(function () {
    $(".signin-dp").stop(true).slideToggle("medium");
  });
});
// $(document).ready(function(){
//     $("#grid-4").click(function(){
//         $(".products .col-lg-3").remo
//     });
// });

$(document).ready(function () {
  $(".foryou-inner").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 4,
        nav: true,
        loop: false,
      },
    },
  });
  $(".wishlist-inner").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 4,
        nav: false,
        loop: false,
      },
    },
  });
  $(".cat-5").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: true,
        loop: false,
      },
    },
  });
  $(".recently2").owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 2,
        nav: false,
        loop: false,
      },
    },
  });
});

//   aos

AOS.init();

//   aos

// magnific pop up
$(document).ready(function () {
  $(".product-link-zoom").magnificPopup({
    type: "image",
    mainClass: "mfp-with-zoom",
    zoom: {
      enabled: true, // By default it's false, so don't forget to enable it

      duration: 300,
    },
    gallery:{
      enabled:true
    }
  });
});

// magnificPopup

// Light zomm
// $(".lightzoom").lightzoom({
//   glassSize: 225,
//   zoomPower: 1,
// });
// Light zomm

// // Selecting the iframe element
// var iframe = document.getElementById("myIframe");

// // Adjusting the iframe height onload event
// iframe.onload = function(){
//     iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
// }
