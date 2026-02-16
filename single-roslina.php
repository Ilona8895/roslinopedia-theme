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

  <section class="plant-single">
    <div class="container">
      <div class="plant-single__content">
        <div class="plant-single__description">
          <?php the_content(); ?>
        </div>
        <div class="plant-single__icon-wrapper">
          <img src="<?php echo get_theme_file_uri('/images/flower.png') ?>" alt="kwiat">
        </div>
      </div>

      <div class="plant-parameters">
        <h2 class="plant-parameters__header">Parametry rośliny</h2>
        <table class="plant-parameters__table">
          <tr>
            <th>Okres kwitnienia</th>
            <td>lipiec - październik</td>
          </tr>
          <tr>
            <th>Stanowisko</th>
            <td>słoneczne, półcieniste</td>
          </tr>
          <tr>
            <th>Gleba</th>
            <td>przepuszczalna</td>
          </tr>
          <tr>
            <th>Wysokość (cm)</th>
            <td>200-300</td>
          </tr>
          <tr>
            <th>Podlewanie</th>
            <td>umiarkowane</td>
          </tr>
          <tr>
            <th>Mrozoodporność</th>
            <td>częściowa</td>
          </tr>
        </table>
      </div>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>