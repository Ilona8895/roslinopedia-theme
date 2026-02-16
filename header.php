<!DOCTYPE html>
<html>
  <head>
    <?php wp_head(); ?>
  </head>
  <body>
  <header class="site-header">
    <div class="container">
      <a href="<?php echo site_url() ?>" class="site-header__logo">
        <img src="<?php echo get_theme_file_uri('/images/logo.png') ?>" alt="Roslinopedia">
      </a>
      <i class="site-header__menu-trigger fas fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu">
        <nav class="main-navigation">
          <ul>
            <li><a href="<?php echo site_url('/o-mnie') ?>">O mnie</a></li>
            <li><a href="<?php echo site_url('/baza-roslin') ?>">Baza roślin</a></li>
            <li><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
            <li><a href="<?php echo site_url('/kontakt') ?>">Kontakt</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>


