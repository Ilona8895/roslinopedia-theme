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
      <?php the_content(); ?>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>