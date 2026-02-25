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


     <div class="site-header__right-column">
      <div class="site-header__menu">
        <nav class="main-navigation">

          <?php
          wp_nav_menu(array(
            'theme_location' => 'headerMenuLocation',

          ));
          ?>
        </nav>
      </div>

      <div class="site-header__buttons-container">
        <?php if(is_user_logged_in()) { ?>
          <div class="site-header__user">
            <a href="<?php echo wp_logout_url(); ?>" class="btn btn--dark-grey btn--small">Wyloguj się</a>
            <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 40); ?></span>
          </div>
          
        <?php } else { ?>
          <a href="<?php echo wp_login_url(); ?>" class="icon-link"><i class="fas fa-user"></i></a>
        <?php } ?>
        
        <button class="icon-link search-modal__trigger" title="Otwórz wyszukiwarkę">
          <i class="fas fa-search"></i>
        </button>
        <button class="icon-link site-header__menu-trigger" aria-hidden="true">
          <i class="fas fa-bars"></i>
        </button>

      </div>
      </div>
    </div>
  </header>


