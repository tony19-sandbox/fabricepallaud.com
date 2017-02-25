<header class='banner'>
  <div class='container container--header'>
    <a class='header__branding' href='<?php bloginfo( "wpurl" ); ?>'>
      <img
        class='header__branding__logo'
        src='<?php bloginfo( "template_url" ); ?>/dist/images/baia_logo.svg'
      />
    </a>
    <ul class='social_links'>
      <li>
        <a class='linkedin' href='https://www.linkedin.com/'>
          <i class='fa fa-linkedin' aria-hidden='true'></i>
        </a>
      </li>
      <li>
        <a class='github' href='https://github.com/'>
          <i class='fa fa-github' aria-hidden='true'></i>
        </a>
      </li>
    </ul>    
  </div>
</header>

<div class='nav_primary_wrap'>
  <nav class='nav_primary'>
    <div class='container container--nav_primary'>
      <?php wp_nav_menu( array( 'menu' => 'main_menu' ) ); ?>
      <a class='mobile_menu_link' href='#'>
        <i class='fa fa-bars' aria-hidden='true'></i> <span>Menu</span>
      </a>      
    </div>
  </nav>  
</div>

<div class='mobile_menu'>
  <?php get_template_part( 'templates/mobile_menu' ); ?>
</div>