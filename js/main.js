jQuery(window).load(function() {
  $('.preloader').fadeOut(300);
  $('.img-preloader').fadeOut(500);
});


jQuery(document).ready(function($) {

  jQuery("html").niceScroll({
    scrollspeed: 60,
    mousescrollstep: 80,
    cursorminheight: 80,
    cursorwidth: 6,
    cursorborder: 0,
    cursorcolor: '#263241',
    autohidemode: false,
    zindex: 9999999,
    horizrailenabled: false,
    cursorborderradius: 0,
  });

});
