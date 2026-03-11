<?php get_header(); ?>

<?php
  while(have_posts()) {
    the_post(); 
    
    pageBanner(array(
      'photo' => get_the_post_thumbnail_url(get_the_ID(), 'bannerImage')
    ));
    ?>

  <section class="plant-database">
  <div class="container">

      <div class="metabox metabox--blog">    
        <p>Opublikowano przez <?php the_author_posts_link(); ?> <?php the_time('F j, Y'); ?> w kategorii <?php echo get_the_category_list(', '); ?></p>
        <a href="<?php echo esc_url(site_url('/blog')) ?>" class="metabox__back-btn btn btn--primary btn--small"><i class="fas fa-home"></i> Powrót do bloga</a>
        <?php 
        $tags = get_the_tags();
        if ($tags) : ?>
          <div class="metabox__tags">
            <span class="metabox__tags-label">Tagi:</span>
            <?php foreach ($tags as $tag) : ?>
              <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="metabox__tag"><?php echo esc_html($tag->name); ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>


      <?php the_content(); ?>
    </div>
  </section>

<?php } ?>

<?php get_footer(); ?>



