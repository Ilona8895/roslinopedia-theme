<?php get_header(); 
pageBanner(array(
  'title' => get_the_archive_title(),
));
?>


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
        <?php the_post_thumbnail('full', array('class' => 'blog-post-item__image')); ?>
        </div>

        <div class="plant-list-item__content">
          <a href="<?php the_permalink(); ?>">
            <h2 class="plant-list-item__name"><?php the_title(); ?></h2>
            <p class="plant-list-item__description"><p><?php if(has_excerpt()) {
              echo get_the_excerpt();
            } else {
              echo wp_trim_words(get_the_content(), 18);
            } ?></p></p>
            <p><a class="btn btn--green" href="<?php the_permalink(); ?>">Czytaj dalej &raquo;</a></p>
          </a>
        </div>
      </div>
     
    <?php } ?>
    <?php echo paginate_links(); ?>
    </div>
      
  </section>


  

<?php get_footer(); ?>
