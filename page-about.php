<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap">
  <div class="container content">
    
    <div class="page_header page_header--about">
      <h1 class="page_title">
        Who's this?
      </h1>
      <p class="page_summary page_summary--about">
        Some general stuff about myself, my background and what I can do for you 
      </p>
    </div>

    <div class="content content--about">
      <div class="about_info">
        <?php the_content(); ?>
      </div>
      <div class="about_illustration">
        <img class="about_illustration__img" src="<?php bloginfo('template_url'); ?>/dist/images/about.jpg" />
      </div>
    </div>
    
  </div>
</div>

<?php get_footer(); ?>