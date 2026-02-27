<?php get_header(); ?>

<?php
  while(have_posts()) {
    the_post(); 
    

    pageBanner(array(
      'photo' => get_the_post_thumbnail_url(get_the_ID(), 'bannerImage')
    ));
    ?>


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

      <?php if(is_user_logged_in()) { ?>
      <div class="plant-single__notes">
        <?php 
        $notes = new WP_Query(array(
          'post_type' => 'notatka',
          'posts_per_page' => -1,
          'orderby' => 'title',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'powiazana_roslina',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE',
            ),
          ),
          'author' => get_current_user_id(),
        ));

        if(!$notes->have_posts()) { ?>
          <h3 class="plant-single__header">Nie ma żadnych notatek dla tej rośliny.</h3>
          <button class="btn btn--dark-grey btn--small">Dodaj notatkę</button>
        <?php } else {  
          while($notes->have_posts()) {
            $notes->the_post();
            ?>
            <div class="note">
              <div class="note__header">
                <h3 class="note__title"><?php the_title(); ?></h3>
                <button class="btn btn--icon btn--green"><i class="fas fa-edit"></i></button>
                <button class="btn btn--icon btn--danger"><i class="fas fa-trash"></i></button>
              </div>
              <div class="note__content"><?php the_content(); ?></div>         
            </div>
            <?php
          }
          ?>
          <button class="btn btn--dark-grey btn--small">Dodaj notatkę</button>
          <?php
          
        }
        wp_reset_postdata();
        
        ?>
        </div>
        <?php } ?>

    </div>
    
  </section>

<?php } ?>

<?php get_footer(); ?>