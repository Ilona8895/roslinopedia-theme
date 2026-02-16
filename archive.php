<?php get_header(); ?>

<section class="page-banner" style="background-image: url('<?php echo get_theme_file_uri('/images/banner.jpg') ?>')">
    <div class="page-banner__overlay"></div>
    <div class="page-banner__content">
      <h1 class="page-banner__title">   <?php the_archive_title(); ?> </h1>
    </div>
  </section>

  <section class="plant-database">
  <div class="container container--narrow page-section">

    <?php
    while(have_posts()) {
      the_post(); ?>
      
      <div class="metabox metabox--blog">
          <p>Opublikowano przez <?php the_author_posts_link(); ?> <?php the_time('F j, Y'); ?> w kategorii <?php echo get_the_category_list(', '); ?></p>
        </div>
        
      <div class="plant-list-item">
      <div class="blog-post-item__image-wrapper">
          <img src="<?php echo get_theme_file_uri('images/pole-lawendy.jpg') ?>" alt="Rośliny, które pokochają słońce – najlepsze gatunki do nasłonecznionych ogrodów" class="blog-post-item__image" />
        </div>

        <div class="plant-list-item__content">
          <a href="<?php the_permalink(); ?>">
            <h2 class="plant-list-item__name"><?php the_title(); ?></h2>
            <p class="plant-list-item__description"><p><?php the_excerpt(); ?></p></p>
            <p><a class="btn btn--green" href="<?php the_permalink(); ?>">Czytaj dalej &raquo;</a></p>
          </a>
        </div>
      </div>
     
    <?php } ?>
    <?php echo paginate_links(); ?>
    </div>

  </section>


  

<?php get_footer(); ?>
