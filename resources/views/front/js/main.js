// carousel
$(document).ready(function () {
  let $carousel = $(".carousel-play");
  $carousel.flickity({
    // options
    cellAlign: "left",
    contain: true,
    draggable: true,
    pageDots: false,
    prevNextButtons: false,
    wrapAround: true,
    autoPlay: 2500,
  });
  $(".carousel-btn__prev").on("click", function () {
    $carousel.flickity("previous");
  });
  $(".carousel-btn__next").on("click", function () {
    $carousel.flickity("next");
  });
});

// menu mobile
function menuMobile() {
  let menuIcon = document.querySelector(".menu-mobile__icon");
  let menuList = document.querySelector(".menu-mobile__list");
  menuIcon.addEventListener("click", function () {
    menuList.classList.toggle("active");
  });
  window.addEventListener("resize", function () {
    let get = window.screen.width;
    if (get > 767) {
      console.log(get);
      menuList.classList.remove("active");
    }
  });
}
menuMobile();

// scroll top
function toTop() {
  let toTop = document.querySelector(".to-top");
  toTop.addEventListener("click", function () {
    window.scrollTo(0, 0);
  });
  document.addEventListener("scroll", function () {
    let a = pageYOffset;
    if (a >= 600) {
      // console.log(a);
      toTop.style.bottom = 45 + "px";
    } else {
      toTop.style.bottom = -100 + "%";
    }
  });
}
toTop();


// tabs

(function() {
  $(function() {
    var toggle;
    return toggle = new Toggle('.sidebar-tabs');
  });

  this.Toggle = (function() {
    Toggle.prototype.el = null;

    Toggle.prototype.tabs = null;

    Toggle.prototype.panels = null;

    function Toggle(toggleClass) {
      this.el = $(toggleClass);
      this.tabs = this.el.find(".sidebar-tabs__link");
      this.panels = this.el.find(".sidebar-tabs__content--wrap");
      this.bind();
    }

    Toggle.prototype.show = function(index) {
      var activePanel, activeTab;
      this.tabs.removeClass('active');
      activeTab = this.tabs.get(index);
      $(activeTab).addClass('active');
      this.panels.hide();
      activePanel = this.panels.get(index);
      return $(activePanel).show();
    };

    Toggle.prototype.bind = function() {
      var _this = this;
      return this.tabs.unbind('click').bind('click', function(e) {
        return _this.show($(e.currentTarget).index());
      });
    };

    return Toggle;

  })();

}).call(this);
