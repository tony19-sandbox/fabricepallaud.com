/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        var sticky_navigation_threshold = 1030;
        
        /* Display width in real time */
        $( 'body' ).prepend( "<div style='z-index: 99999; display: none; font-size: 14px; position: fixed; color: #fff !important; background: rgba(0,0,0,0.85) !important; bottom: 0; padding: 4px 8px;' id='dimensions'></div>" );
        $( '#dimensions' ).html(window.innerWidth);
        $( window ).resize(function() { $( '#dimensions' ).html( window.innerWidth ); });
        if ( document.location.href.indexOf( 'localhost' ) !== -1 ) { $( '#dimensions' ).show(); }
        
        $( '.mobile_menu_link' ).click( function() {
          $( '.mobile_menu' ).css( 'display', 'flex' ).hide().fadeIn();
        });
        $( '.mobile_menu_close' ).click( function() {
          $( '.mobile_menu' ).fadeOut();
        });

        /* Sticky main menu */
        var sticky_navigation_location = $( '.nav_primary' ).offset().top; 
        function sticky_navigation() {
          var viewport_width = $( 'body' ).width();
          if ( viewport_width > sticky_navigation_threshold ) { 
            var scroll_top = $(window).scrollTop(); 
            if (scroll_top > sticky_navigation_location) {
              $( '.nav_primary' ).addClass( 'nav_primary_fixed' ).removeClass( 'nav_primary_regular' );
              $( '.nav_primary .menu_home' ).addClass( 'menu_home--sticky' );
            } 
            else {
              $( '.nav_primary' ).addClass( 'nav_primary_regular' ).removeClass( 'nav_primary_fixed' );
              $( '.nav_primary .menu_home' ).removeClass( 'menu_home--sticky' );
            }
          }
          else {
            $( '.nav_primary' ).addClass( 'nav_primary_regular' ).removeClass( 'nav_primary_fixed' );
            $( '.nav_primary .menu_home' ).removeClass( 'menu_home--sticky' );
          }
        }
        sticky_navigation();
        $( window ).on( 'resize', sticky_navigation );
        $(window).scroll(function() { sticky_navigation(); });

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },
    // Portfolio
    'portfolio': {
      init: function() {
        $( '.test' ).click(function() {
          var data = {
            action: 'load_entries',
            'post_id': '29'
          };
          $.post( WPaAjax.ajaxurl, data, function(response) {
            $('.portfolio_current_entry').html(response);
          });
        });
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
