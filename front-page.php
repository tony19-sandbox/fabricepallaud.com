<?php
/*
Template Name: Page Home
*/
?>

<div class='container container--home'>
  
  <h1 class='home_intro__title'>
    Hi. I'm <span>Fabrice Pallaud</span>, WordPress developer.
  </h1>

  <p class='home_intro__subtitle'>
    See my <a href='<?php echo get_bloginfo("wpurl"); ?>/portfolio/'>portfolio</a>, 
    get <a href='mailto:info@baiadesign.com'>in touch</a>.
  </p>

  <div class='home_links'>
    <div class='home_link home_link--portfolio'>
      <a href='<?php echo get_bloginfo('wpurl'); ?>/services/'>
        <div class='home_link_disc'>
          <img class='home_link_icon' src='<?php bloginfo( "template_url" ); ?>/dist/images/link_portfolio.png' />
        </div>
        What I do
      </a>
    </div>
    <div class='home_link home_link--about'>
      <a href='<?php echo get_bloginfo('wpurl'); ?>/about/'>
        <div class='home_link_disc'>
          <img class='home_link_icon' src='<?php bloginfo( "template_url" ); ?>/dist/images/link_about.png' />
        </div>
        Who I am
      </a>
    </div>
    <div class='home_link home_link--contact'>
      <a href='mailto:info@baiadesign.com'>
        <div class='home_link_disc'>
          <img class='home_link_icon' src='<?php bloginfo( "template_url" ); ?>/dist/images/link_contact.png' />
        </div>
        Get in touch
      </a>
    </div>
  </div>

</div>