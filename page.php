<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap">

  <section class="hero" style="background-image: url(<?php the_post_thumbnail_url('hero'); ?>)">
    <?php //get_template_part('templates/hero'); ?>
  </section>

  <section class="content_wrap">
    <div class="container">
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
  </section>  

</div>

<?php get_footer(); ?>