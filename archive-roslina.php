<?php get_header(); 

pageBanner(array(
  'title' => 'Baza roślin', 
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
