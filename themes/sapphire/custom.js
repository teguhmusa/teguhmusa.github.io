var general = {
  init: function () {
      general.cover();
      general.carousel();
      general.ancor_link();
      general.particle();
  },

  cover:function() {
    $('.open_invitation').on('click', function(){
      $(this).parent().parent().parent().slideUp("fast");
      $('body').removeClass('overclosed');
    })
  },

  carousel:function() {
    $('.owl-carousel').owlCarousel({
      margin:0,
      nav:true,
      loop:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
    })
  },

  ancor_link: function() {
    var lastId,
    topMenu = $("#bot-menu"),
    topMenuHeight = topMenu.outerHeight()+15,

    menuItems = topMenu.find("a"),

    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

    $('.nav-link').on('click', function(){
      $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
      }, 500);
    });

    $(window).scroll(function(){
      var fromTop = $(this).scrollTop()+topMenuHeight;

      var cur = scrollItems.map(function(){
        if ($(this).offset().top < fromTop)
          return this;
      });

      cur = cur[cur.length-1];
      var id = cur && cur.length ? cur[0].id : "";

      if (lastId !== id) {
          lastId = id;

          menuItems
            .parent().removeClass("active")
            .end().filter("[href='#"+id+"']").parent().addClass("active");
      }
   });
  },

  particle: function() {
    particlesJS("particles-js", {"particles":{"number":{"value":100,"density":{"enable":true,"value_area":1025.8919341219544}},"color":{"value":"#fff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":10,"random":true,"anim":{"enable":false,"speed":10,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":500,"color":"#ffffff","opacity":0.4,"width":2},"move":{"enable":true,"speed":3,"direction":"bottom","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"bubble"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":0.5}},"bubble":{"distance":400,"size":4,"duration":0.3,"opacity":1,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});
  }
}

$(document).ready(function () {
  $('body').addClass('overclosed');
  $("html, body").animate({ scrollTop: 0 }, "fast");
  AOS.init();
  general.init()
})
