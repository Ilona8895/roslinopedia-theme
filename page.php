<?php get_header(); ?>

<?php
  while(have_posts()) {
    the_post(); 
    
    pageBanner();
    ?>


  <section class="plant-database">
    <div class="container container--narrow page-section">
      <?php the_content(); ?>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>