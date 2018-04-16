<?php get_header(); ?>
<?php the_post(); ?>

<div class="wrap wrap--single">
  <div class="content">

  <header class="header_with_subtitle">
    <h1>
      <?php the_title(); ?>
    </h1>
    <div class="skills skills--single">
      <?php the_field('skills'); ?>
    </div>
  </header>
  <?php the_content(); ?>

  </div>
</div>

<?php get_footer(); ?>
