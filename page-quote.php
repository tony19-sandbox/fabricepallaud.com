<?php
/*
Template Name: Quote
*/
?>

<?php get_header(); ?>

<div class="wrap">
  <div class="container content">
    
    <div class="page_header page_header--quote">
      <h1 class="page_title">
        Quote
      </h1>
      <p class="page_summary page_summary--quote">
        Please select the type of project you have in mind: <a class="page_header_link" href="<?php bloginfo('wpurl'); ?>/website-questionnaire">Web project</a>, <a class="page_header_link" href="<?php bloginfo('wpurl'); ?>/logo-questionnaire">Logo project</a> or otherwise click on <a class="page_header_link" href="<?php bloginfo('wpurl'); ?>/general-questionnaire">Other</a>.
      </p>
    </div>

    <div class="content content--quote">
      <a class="quote_link" href="<?php bloginfo('wpurl'); ?>/website-questionnaire">
        <span class="quote_link__caption quote_link__caption--website">Web Project</span>
      </a>
      <a class="quote_link" href="<?php bloginfo('wpurl'); ?>/logo-questionnaire">
        <span class="quote_link__caption quote_link__caption--logo">Logo Project</span>
      </a>
      <a class="quote_link" href="<?php bloginfo('wpurl'); ?>/general-questionnaire">
        <span class="quote_link__caption quote_link__caption--general">Other</span>
      </a>
    </div>

    <p class="footnote">
      These three sections contain a <strong>questionaire</strong> that you can decide to fill out online or by downloading a Word document. Your answers to these questions should help me understand the scope of your project and determine its cost.
    </p>
    
  </div>
</div>

<?php get_footer(); ?>