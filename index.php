<?php get_header(); 

pageBanner(array(
  'title' => 'Inspiracje dla Twojego ogrodu',
));
?>


  <section class="plant-database">
  <div class="container">

    <?php
    while(have_posts()) {
      the_post(); ?>
      
      <div class="metabox metabox--blog">
          <p>Opublikowano przez <?php the_author_posts_link(); ?> <?php the_time('F j, Y'); ?> w kategorii <?php echo get_the_category_list(', '); ?></p>
      </div>
          
    <?php 
    get_template_part('template-parts/post');
    } ?>
    <?php echo paginate_links(); ?>
    </div>

  </section>


  

<?php get_footer(); ?>
