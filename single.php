<?php get_header(); ?>

<?php
  while(have_posts()) {
    the_post(); 
    
    pageBanner(array(
      'photo' => get_the_post_thumbnail_url(get_the_ID(), 'bannerImage')
    ));
    ?>

  <section class="plant-database">
  <div class="container">

      <div class="metabox metabox--blog">    
        <p>Opublikowano przez <?php the_author_posts_link(); ?> <?php the_time('F j, Y'); ?> w kategorii <?php echo get_the_category_list(', '); ?></p>
        <a href="<?php echo site_url('/blog') ?>" class="metabox__back-btn btn btn--green btn--small"><i class="fas fa-home"></i> Powrót do bloga</a>
      </div>

      <?php the_content(); ?>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>



