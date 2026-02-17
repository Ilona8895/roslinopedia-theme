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
          <p>
          <?php the_content(); ?>
          </p>  
        </div>
        <div class="plant-single__icon-wrapper">

        <?php
          $terms = get_the_terms(get_the_ID(), 'typ');
          $typ_icon = '';
          if ($terms && !is_wp_error($terms)) {
            $nazwa = $terms[0]->name;
            switch ($nazwa) {
              case 'Bylina':   $typ_icon = 'flower'; break;
              case 'Drzewo':   $typ_icon = 'tree'; break;
              case 'Krzew':    $typ_icon = 'bush'; break;
              case 'Uprawne':  $typ_icon = 'vegetable'; break;
            }
          }
        ?>
        <img src="<?php echo get_theme_file_uri('/images/' . $typ_icon . '.png'); ?>" alt="ikona rośliny">
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
            <td><?php echo get_the_term_list(get_the_ID(), 'stanowisko','',', '); ?></td>
          </tr>
          <tr>
            <th>Gleba</th>
            <td><?php echo get_the_term_list(get_the_ID(), 'gleba','',', '); ?></td>
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