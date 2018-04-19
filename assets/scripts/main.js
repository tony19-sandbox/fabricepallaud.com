jQuery(document).ready(function($) {

var sticky_navigation_threshold = 1030;
      
/*
DISPLAY WIDTH IN REAL TIME
*/

$('body').prepend("<div style='z-index: 99999; display: none; font-size: 14px; position: fixed; color: #fff !important; background: rgba(0,0,0,0.85) !important; bottom: 0; padding: 4px 8px;' id='dimensions'></div>");
$('#dimensions').html(window.innerWidth);
$(window).resize(function() { $('#dimensions').html( window.innerWidth); });
if (document.location.href.indexOf('localhost') !== -1) { $('#dimensions').show(); }

/*
MOBILE MENU DISPLAY
*/

$('.mobile_menu_link').click(function() {
  $('.mobile_menu').css( 'display', 'flex').hide().fadeIn();
});
$('.mobile_menu_close').click(function() {
  $('.mobile_menu').fadeOut();
});

/*
STICKY MAIN MENU
*/

var sticky_navigation_location = $('.nav_primary').offset().top; 
function sticky_navigation() {
  var viewport_width = $('body').width();
  if (viewport_width > sticky_navigation_threshold) { 
    var scroll_top = $(window).scrollTop(); 
    if (scroll_top > sticky_navigation_location) {
      $('.nav_primary').addClass('nav_primary_fixed').removeClass('nav_primary_regular');
      $('.nav_primary .menu_home').addClass('menu_home--sticky');
    } 
    else {
      $('.nav_primary').addClass('nav_primary_regular').removeClass('nav_primary_fixed');
      $('.nav_primary .menu_home').removeClass('menu_home--sticky');
    }
  }
  else {
    $('.nav_primary').addClass('nav_primary_regular').removeClass('nav_primary_fixed');
    $('.nav_primary .menu_home').removeClass('menu_home--sticky');
  }
}
sticky_navigation();
$(window).on('resize', sticky_navigation);
$(window).scroll(function() { sticky_navigation(); });

/*
APPLY "CONTAINER" CLASS TO P ELEMENTS IN SINGLE POST
*/

$('.wrap--single header,.wrap--single p, .wrap--single h2, .wrap--single h3, .wrap--single ul:not(.picture)').each(function() {
  $(this).addClass('container');
});

/*
PORTFOLIO SINGLE PAGE: SCROLLS DOWN ON PAGE LOAD 
*/

if ($('body').hasClass('single-project')) {
  var header_height = $('.banner').height();
  $('html, body').animate({ scrollTop: header_height }, 200);
}

/*
PORTFOLIO SINGLE PAGE: SCROLLS DOWN ON PAGE LOAD 
*/

$('.button--showPortfolio').toggle(function() {
  $('.portfolio').slideDown();
}, function() {
  $('.portfolio').slideUp();
});

}); /* END OF jQuery(document).ready(function($) */