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

$('.wrap--single header, .wrap--single p, .wrap--single h2, .wrap--single h3, .wrap--single ul:not(.picture)').each(function() {
  if (!$(this).find('img').length) {
    $(this).addClass('container');
  }
});

/*
PORTFOLIO SINGLE PAGE: SCROLLS DOWN ON PAGE LOAD 
*/

if ($('body').hasClass('single-project')) {
  var header_height = $('.banner').height();
  $('html, body').animate({ scrollTop: header_height }, 200);
}

/*
FRONT PAGE: CTA BUTTON SCROLLS DOWN AND DISPLAYS PORTFOLIO SECTION 
*/

if ($('body').hasClass('home')) {
  var current_url = location.search;
  var portfolio = $('.portfolio');
  var home_intro__cta = $('.home_intro__cta');
  var portfolio_location = home_intro__cta.offset().top - 40;
  if (current_url == '?portfolio=1') {
    $('.portfolio').slideDown(0);
    //$('html, body').animate({ scrollTop: portfolio_location }, 200);
    $('html, body').animate({ scrollTop: portfolio_location }, 0);
  }
  else {
    $('.button--showPortfolio, .menu_portfolio').click(function(e) {
      e.preventDefault();
      if (portfolio.is(':visible')) {
        portfolio.slideUp(0);
      }
      else {
        portfolio.slideDown(0);
        $('html, body').animate({ scrollTop: portfolio_location }, 200);
      }  
    });
  }
}

/*
NAV MENU PORTFOLIO ITEM: REMOVE QUERYSTRING WHEN ON FRONT PAGE 
*/

if (!$('body').hasClass('home')) {
  var portfolio_menu_item = $('.menu_portfolio a');
  var portfolio_link = portfolio_menu_item.attr('href');
  portfolio_menu_item.attr('href', portfolio_link + '?portfolio=1');
}

/*
LIGHTBOX
*/

$('.element_triggering_light').click(function(e) {
  e.preventDefault();
  $('.lightbox').toggleClass('active');
  $('html, body').toggleClass('no_scrollbar');
});

$('.lightbox_close, .lightbox').click(function() {
  $('.lightbox').removeClass('active').toggleClass('no_scrollbar');
  $('html, body').toggleClass('no_scrollbar');
});

$('.lightbox__inner').click(function(e) {
  e.stopPropagation();
});

/*
DETECTS SCROLLBAR WIDTH
https://davidwalsh.name/detect-scrollbar-width
*/

var scrollDiv = document.createElement("div");
scrollDiv.className = "scrollbar-measure";
document.body.appendChild(scrollDiv);
var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
$('.lightbox_close').css('right', scrollbarWidth);
document.body.removeChild(scrollDiv);

}); /* END OF jQuery(document).ready(function($) */