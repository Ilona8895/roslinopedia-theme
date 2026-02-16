<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container">
      <a href="<?php echo site_url() ?>" class="site-header__logo">
        <img src="<?php echo get_theme_file_uri('/images/logo.png') ?>" alt="Roslinopedia">
      </a>
      <i class="site-header__menu-trigger fas fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu">
        <nav class="main-navigation">

          <?php
          wp_nav_menu(array(
            'theme_location' => 'headerMenuLocation',

          ));
          ?>
          <!-- <ul>
            <li><a href="<?php echo site_url('/o-mnie') ?>">O mnie</a></li>
            <li><a href="<?php echo site_url('/baza-roslin') ?>">Baza roślin</a></li>
            <li><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
            <li><a href="<?php echo site_url('/kontakt') ?>">Kontakt</a></li>
          </ul> -->
        </nav>
      </div>
    </div>
  </header>


