<?php get_header(); 

pageBanner(array(
  'title' => 'Baza roślin', 
));
?>

  <section class="plant-database">
    <div class="container">

    <?php while(have_posts()) {
      the_post(); ?>
      <div class="plant-list-item">
        <div class="plant-list-item__image-wrapper">
          <div class="plant-list-item__decorative-shape"></div>
          <?php the_post_thumbnail('full', array('class' => 'plant-list-item__image')); ?>
        </div>
        <div class="plant-list-item__content">
          <a href="<?php the_permalink(); ?>">
            <h2 class="plant-list-item__name"><?php the_title(); ?></h2>
            <p class="plant-list-item__description"><?php if(has_excerpt()) {
              echo get_the_excerpt();
            } else {
              echo wp_trim_words(get_the_content(), 18);
            } ?></p>
          </a>
        </div>
      </div>
    <?php } ?>
    <?php echo paginate_links(); ?>


    </div>
  </section>


  

<?php get_footer(); ?>
