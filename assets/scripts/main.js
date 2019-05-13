jQuery(document).ready(function($) {

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

if ($(window).width() > 768) {
  if ($('body').hasClass('single-project')) {
    var header_height = $('.banner').height() + 1;
    $('html, body').animate({ scrollTop: header_height }, 200);
  }
}

/*
FRONT PAGE: CTA BUTTON SCROLLS DOWN AND DISPLAYS PORTFOLIO SECTION 
*/

if ($(window).width() > 768) {
  if ($('body').hasClass('home') || $('body').hasClass('page-template-front-page')) {
    var current_url = location.search;
    var portfolio = $('.portfolio');
    var home_intro__cta = $('.home_intro__cta');
    var portfolio_location = home_intro__cta.offset().top - 40;
    if (current_url == '?portfolio=1') {
      $('.portfolio').slideDown(0);
      $('html, body').animate({ scrollTop: portfolio_location }, 0);
    }
    else {
      $('.button--showPortfolio, .menu_portfolio').click(function(e) {
        e.preventDefault();
        if (portfolio.is(':visible')) {
          portfolio.slideUp(0);
          $('.button--showPortfolio').text('see case studies');
        }
        else {
          portfolio.slideDown(0);
          $('html, body').animate({ scrollTop: portfolio_location }, 200);
          $('.button--showPortfolio').text('hide case studies');
        }  
      });
    }
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

}); /* END OF jQuery(document).ready(function($) */