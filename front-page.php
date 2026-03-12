<?php get_header(); ?>

<section class="hero-section" style="background-image: url('<?php echo get_theme_file_uri('/images/hero.jpg') ?>')">
    <div class="hero-section__overlay"></div>
    <div class="hero-section__content">
      <h1 class="hero-section__title">Baza roślin ogrodowych!!!</h1>
    </div>
  </section>

  <section class="plant-database">
    <div class="container">
      <h2 class="plant-database__title">Baza roślin</h2>
      <div class="plant-database__grid">

      <?php
      $homepagePlants = new WP_Query(array(
        'posts_per_page' => 4,
        'post_type' => 'roslina',

      ));

      while($homepagePlants->have_posts()) {
        $homepagePlants->the_post(); ?>


        <div class="plant-card">
          <a href="<?php the_permalink(); ?>">
            <div class="plant-card__image-wrapper">
              <?php the_post_thumbnail('full', array('class' => 'plant-card__image')); ?>
            </div>
            <h3 class="plant-card__name"><?php the_title(); ?></h3>
            <p class="plant-card__description"><?php if(has_excerpt()) {
              echo get_the_excerpt();
            } else {
              echo wp_trim_words(get_the_content(), 18);
            } ?></p>
          </a>
        </div>
 

        <?php } ?>
        <?php wp_reset_postdata(); ?>

      </div>
      <div class="plant-database__cta">
        <a href="<?php echo get_post_type_archive_link('roslina'); ?>" class="btn btn--primary btn--large">Zobacz wszystkie rośliny</a>
      </div>
    </div>
  </section>

  <section class="blog-section" id="blog">
    <div class="container">

      <h2 class="blog-section__title">Blog</h2>
      <div class="blog-section__grid">

      <?php

      $homepagePosts = new WP_Query(array(
        'posts_per_page' => 3
      ));

      while($homepagePosts->have_posts()) {
        $homepagePosts->the_post(); ?>

        <div class="blog-card">
          <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('full', array('class' => 'blog-card__image')); ?>
            <div class="blog-card__content">
              <h3 class="blog-card__title"><?php the_title(); ?></h3>
              <p><?php if(has_excerpt()) {
                echo get_the_excerpt();
              } else {
                echo wp_trim_words(get_the_content(), 18);
              } ?></p>
            </div>
          </a>
        </div>

        <?php } ?>
        <?php wp_reset_postdata(); ?>
        
      </div>
      <div class="blog-section__cta">
        <a href="<?php echo site_url('/blog') ?>" class="btn btn--primary btn--large">Zobacz więcej</a>
      </div>
    </div>
  </section>

  

<?php get_footer(); ?>

