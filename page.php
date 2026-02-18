<?php get_header(); ?>

<?php
  while(have_posts()) {
    the_post(); 
    
    pageBanner();
    ?>


  <section class="page-content">
    <div class="container container--narrow page-section">
      <?php the_content(); ?>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>