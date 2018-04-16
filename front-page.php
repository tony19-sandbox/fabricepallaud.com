<?php
/*
Template Name: Front page
*/
?>

<?php get_header(); ?>

<div class="wrap wrap--front">
  <div class="container container--home">
    
    <h1 class="home_intro__title">
      Hi I'm <span>Fabrice</span>, Front-end Developer.
    </h1>

    <p class="home_intro__description">
      Specialized in <strong>PSD to WP</strong> precision work - Follower of <strong>best practices</strong> & latest trends - Used to work with <strong>  development & marketing agencies.</strong>
    </p>

    <div class="home_intro__subtitle">
      <h2>my portfolio</h2>
      <a class="button">expand</a>
    </div>

    <div class="portfolio">
      
      <?php
      $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1
      );
      $projects = new WP_Query($args);
      while ($projects->have_posts()) : $projects->the_post();
      ?>          
        <section class="portfolio_entry square_border">

          <header class="portfolio_entry__header">
            <h2 class="portfolio_entry_title">
              <?php the_field('front_page_title', false, false); ?>
            </h2>
            <a class="portfolio_entry_link" href="<?php the_permalink(); ?>">
              see case study
            </a>
          </header>

          <p class="portfolio_entry__maincontent">
            <?php the_field('summary', false, false); ?>
          </p>

          <footer class="portfolio_entry__footer">
            <div class="skills">
              <?php the_field('skills'); ?>
            </div>
            <div class="time_to_read">
              <?php the_field('reading_time'); ?>
            </div>
          </footer>

        </section>

      <?php
      endwhile;
      ?>
    </div>
    
  </div>
</div>

<?php get_footer(); ?>