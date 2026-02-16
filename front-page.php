<?php get_header(); ?>

<section class="hero-section" style="background-image: url('<?php echo get_theme_file_uri('/images/hero.jpg') ?>')">
    <div class="hero-section__overlay"></div>
    <div class="hero-section__content">
      <h1 class="hero-section__title">Baza roślin ogrodowych</h1>
    </div>
  </section>

  <section class="plant-database">
    <div class="container">
      <h2 class="plant-database__title">Baza roślin</h2>
      <div class="plant-database__grid">
        <div class="plant-card">
          <a href="plant-single.html">
            <div class="plant-card__image-wrapper">
              <img src="<?php echo get_theme_file_uri('/images/hortensja.jpg') ?>" alt="Hortensja" class="plant-card__image" />
            </div>
            <h3 class="plant-card__name">Hortensja</h3>
            <p class="plant-card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </a>
        </div>
        <div class="plant-card">
          <a href="plant-single.html">
            <div class="plant-card__image-wrapper">
              <img src="<?php echo get_theme_file_uri('/images/begonia.jpg') ?>" alt="Begonia" class="plant-card__image" />
            </div>
            <h3 class="plant-card__name">Begonia</h3>
            <p class="plant-card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </a>
        </div>
        <div class="plant-card">
          <a href="plant-single.html">
            <div class="plant-card__image-wrapper">
              <img src="<?php echo get_theme_file_uri('/images/lawenda.jpg') ?>" alt="Lawenda Hidcote" class="plant-card__image" />
            </div>
            <h3 class="plant-card__name">Lawenda Hidcote</h3>
            <p class="plant-card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </a>
        </div>
        <div class="plant-card">
          <a href="plant-single.html">
            <div class="plant-card__image-wrapper">
              <img src="<?php echo get_theme_file_uri('/images/szalwia.jpg') ?>" alt="Szałwia" class="plant-card__image" />
            </div>
            <h3 class="plant-card__name">Szałwia</h3>
            <p class="plant-card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </a>
        </div>
      </div>
      <div class="plant-database__cta">
        <a href="plants.html" class="btn btn--green btn--large">Zobacz wszystkie rośliny</a>
      </div>
    </div>
  </section>

  <section class="blog-section" id="blog">
    <div class="container">
      <h2 class="blog-section__title">Blog</h2>
      <div class="blog-section__grid">
        <div class="blog-card">
          <a href="#">
            <img src="<?php echo get_theme_file_uri('/images/pole-lawendy.jpg') ?>" alt="Rośliny słoneczne" class="blog-card__image" />
            <div class="blog-card__content">
              <h3 class="blog-card__title">Rośliny, które pokochają słońce – najlepsze gatunki do nasłonecznionych ogrodów</h3>
            </div>
          </a>
        </div>
        <div class="blog-card">
          <a href="#">
            <img src="<?php echo get_theme_file_uri('/images/kwiaty.jpg') ?>" alt="Kalendarz kwitnienia" class="blog-card__image" />
            <div class="blog-card__content">
              <h3 class="blog-card__title">Kalendarz kwitnienia – jak zaplanować ogród, który kwitnie przez cały sezon</h3>
            </div>
          </a>
        </div>
        <div class="blog-card">
          <a href="#">
            <img src="<?php echo get_theme_file_uri('/images/pszczolawkwiatach.jpg') ?>" alt="Rośliny miododajne" class="blog-card__image" />
            <div class="blog-card__content">
              <h3 class="blog-card__title">Rośliny miododajne – jak stworzyć ogród przyjazny pszczołom i motylom</h3>
            </div>
          </a>
        </div>
      </div>
      <div class="blog-section__cta">
        <a href="<?php echo site_url('/blog') ?>" class="btn btn--green btn--large">Zobacz więcej</a>
      </div>
    </div>
  </section>

  

<?php get_footer(); ?>

