<?php


function pageBanner($args = NULL){

  if (!isset($args['title'])) {
    $args['title'] = get_the_title();

  }
  if (!isset($args['photo'])) {
    $args['photo'] = get_theme_file_uri('/images/banner.jpg');
  }
  ?>
  <section class="page-banner" style="background-image: url('<?php echo $args['photo']; ?>'); ">
    <div class="page-banner__overlay"></div>
    <div class="page-banner__content">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
    </div>
  </section>
 
    <?php
}

function roslinopedia_theme_files() {
  wp_enqueue_style('roslinopedia_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_script('roslinopedia_main_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'roslinopedia_theme_files');


function roslinopedia_theme_features() {
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerMenuLocation', 'Footer Menu Location');
  register_nav_menu('footerMenuLocation2', 'Footer Menu Location 2');
  register_nav_menu('footerMenuLocation3', 'Footer Menu Location 3');

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('bannerImage', 1500, 350, true); 
}
add_action('after_setup_theme', 'roslinopedia_theme_features');


function roslinopedia_adjust_queries($query) {
  if (!is_admin() && (is_post_type_archive('roslina') || is_tax('typ') || is_tax('stanowisko') || is_tax('gleba')) && $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
}



add_action('pre_get_posts', 'roslinopedia_adjust_queries');