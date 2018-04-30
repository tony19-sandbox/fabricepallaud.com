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

  <div class="lightbox lightbox--enquiry">
    <div class="lightbox__inner">
      <a class="lightbox_close">&times;</a>
      <?php //get_template_part('templates/form_enquiry'); ?>
      <iframe src="http://127.0.0.1/wordpress/hexagontrip/trip-finder/"></iframe>
    </div>
  </div>

  </div>
</div>

<?php get_footer(); ?>
