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
            <p><a class="btn btn--primary" href="<?php the_permalink(); ?>">Czytaj dalej &raquo;</a></p>
          </a>
        </div>
</div>