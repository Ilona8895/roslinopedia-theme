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
          'meta_query' => array(
            'relation' => 'OR',
            array(
              'key' => 'powiazana_roslina',
              'value' => '"' . get_the_ID() . '"',
              'compare' => 'LIKE',
            ),
            array(
              'key' => 'powiazana_roslina',
              'value' => get_the_ID(),
              'compare' => '=',
            ),
          ),
          'author' => get_current_user_id(),
        ));

   
          while($notes->have_posts()) {
            $notes->the_post();
            ?>
            <div class="note" note-id="<?php the_ID(); ?>">
              <div class="note__header">
                <input readonly type="text" class="note__title" value="<?php esc_attr(the_title()); ?>">
                <button class="btn btn--icon btn--green note__edit-button"><i class="fas fa-edit"></i></button>
                <button class="btn btn--icon btn--green btn--hidden note__save-button"><i class="fas fa-save"></i></button>
                <button class="btn btn--icon btn--danger note__delete-button" data-id="<?php the_ID(); ?>"><i class="fas fa-trash"></i></button>
              </div>
              <textarea class="note__content" readonly><?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?></textarea>         
            </div>
            <?php
          }
          wp_reset_postdata();
          ?>
          <div class="new_note" plant-id="<?php the_ID(); ?>">
              <h3 class="new_note__header">Dodaj nową notatkę</h3>
              <input type="text" class="new_note__title" placeholder="Tytuł notatki" value="">
              <textarea class="new_note__content" placeholder="Treść notatki" value=""></textarea>  
              <button class="btn btn--dark-grey btn--small note__add-button">Dodaj notatkę</button>       
          </div>
          
        </div>
        <?php } ?>

    </div>
    
  </section>

<?php } ?>

<?php get_footer(); ?>