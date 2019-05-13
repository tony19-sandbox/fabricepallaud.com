<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(' • ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
  <meta name="description" content="My name is Fabrice Pallaud. I'm a Front-end Developer and I specialize in high quality WordPress development. " />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php ini_set('display_errors', 'on'); error_reporting(E_ALL); ?>

<header class="banner">
  <div class="container container--header">
    <a class="header__branding" href="<?php bloginfo('wpurl'); ?>">
      <img
        class="header__branding__logo"
        src="<?php bloginfo('template_url'); ?>/dist/images/logo_desktop.svg"
      />
      <div class="logo_square"></div>
    </a>
    <ul class="social_links">
      <li>
        <a class="linkedin" href="https://www.linkedin.com/in/fabrice-pallaud-b8b4ba24/"></a>
      </li>
      <li>
        <a class="github" href="https://github.com/fabricepallaud"></a>
      </li>
    </ul>    
  </div>
</header>

<div class="nav_primary_wrap">
  <nav class="nav_primary">
    <div class="container container--nav_primary">
      <?php wp_nav_menu(array('menu' => 'main_menu')); ?>
    </div>
  </nav>
</div>