<footer class="site-footer" id="contact">
    <div class="container">
      <div class="site-footer__inner">
        <div class="group">
          <div class="site-footer__col-one">
            <a href="<?php echo site_url() ?>" class="site-footer__logo">
              <img src="<?php echo get_theme_file_uri('/images/logo.png') ?>" alt="Roslinopedia">
            </a>
            <h3 class="site-footer__heading">Kategorie roślin</h3>
            <h4 class="site-footer__heading">Gleba</h4>
            <nav class="nav-list">
              <ul>
                <?php wp_nav_menu(array(
                  'theme_location' => 'footerMenuLocation',
                )); ?>
              </ul>
            </nav>
          </div>

          <div class="site-footer__col-two-three-group">
            <div class="site-footer__col-two">
              <h3 class="site-footer__heading">Stanowisko</h3>
              <nav class="nav-list">
                <ul>
                <?php wp_nav_menu(array(
                  'theme_location' => 'footerMenuLocation2',
                )); ?>
                </ul>
              </nav>
              <h3 class="site-footer__heading">Typ rośliny</h3>
              <nav class="nav-list">
                <ul>
                <?php wp_nav_menu(array(
                  'theme_location' => 'footerMenuLocation3',
                )); ?>
                </ul>
              </nav>
            </div>
          </div>

          <div class="site-footer__col-four">
            <h3 class="site-footer__heading">Kontakt</h3>
            <p class="site-footer__contact-item">
              <strong>Ilona Melcher</strong>
            </p>
            <p class="site-footer__contact-item">
              <i class="fas fa-phone"></i>
              <a href="tel:+48728482184" class="site-footer__link">+48 728 482 184</a>
            </p>
            <p class="site-footer__contact-item">
              <i class="fas fa-envelope"></i>
              <a href="mailto:ilona.melcher8@gmail.com" class="site-footer__link">ilona.melcher8@gmail.com</a>
            </p>
            <p class="site-footer__contact-item">
              <i class="fab fa-instagram"></i>
              <a href="#" class="site-footer__link">Ilona8895</a>
            </p>
          </div>
        </div>
      </div>
      <div class="site-footer__bottom">
        <div>
          <p>Prawa autorskie © 2026 Roslinopedia | Polityka prywatności</p>
        </div>
        <div>
          <p>Projekt i wykonanie: Ilona Melcher</p>
        </div>
      </div>
    </div>

</footer>

  <div class="search-modal">
      <div class="search-modal__overlay"></div>
      <div class="search-modal__content">
        <div class="search-modal__search-bar">
          <i class="fas fa-search search-modal__icon"></i>
          <input type="text" class="search-modal__input" placeholder="Wyszukaj">
          <div class="spinner-loader"></div>
          <i class="fas fa-window-close search-modal__close"></i>
        </div>

        <div class="search-modal__results">   

        </div>

      </div>
  </div>



<?php wp_footer(); ?>
</body>
</html>