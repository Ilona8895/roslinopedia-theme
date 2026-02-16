<?php get_header(); ?>

<?php
  while(have_posts()) {
    the_post(); ?>

<section class="page-banner" style="background-image: url('<?php echo get_theme_file_uri('/images/banner.jpg') ?>')">
    <div class="page-banner__overlay"></div>
    <div class="page-banner__content">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
    </div>
  </section>

  <section class="page-content">
  <div class="container container--narrow page-section">

      <div class="metabox metabox--blog">    
        <p>Opublikowano przez <?php the_author_posts_link(); ?> <?php the_time('F j, Y'); ?> w kategorii <?php echo get_the_category_list(', '); ?></p>
        <a href="<?php echo site_url('/blog') ?>" class="metabox__back-btn btn btn--green btn--small"><i class="fas fa-home"></i> Powrót do bloga</a>
      </div>

      <?php the_content(); ?>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>



