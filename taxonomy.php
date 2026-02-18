<?php get_header(); 
pageBanner(array(
  'title' => single_term_title('', false),
));
?>


  <section class="plant-database">
    <div class="container">

    <?php while(have_posts()) {
      the_post();
      get_template_part('template-parts/plant');
     } ?>
    <?php echo paginate_links(); ?>


    </div>
  </section>


  

<?php get_footer(); ?>
