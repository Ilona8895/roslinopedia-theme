<?php get_header(); ?>

<?php
  while(have_posts()) {
    the_post(); ?>

<section class="page-banner" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
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
            <td><?php the_field('okres_kwitnienia'); ?></td>
          </tr>
          <tr>
            <th>Stanowisko</th>
            <td><?php the_field('stanowisko'); ?></td>
          </tr>
          <tr>
            <th>Gleba</th>
            <td><?php the_field('gleba'); ?></td>
          </tr>
          <tr>
            <th>Wysokość (cm)</th>
            <td><?php the_field('wysokosc'); ?></td>
          </tr>
          <tr>
            <th>Podlewanie</th>
            <td><?php the_field('podlewanie'); ?></td>
          </tr>
          <tr>
            <th>Mrozoodporność</th>
            <td><?php the_field('mrozoodpornosc'); ?></td>
          </tr>
        </table>
      </div>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>