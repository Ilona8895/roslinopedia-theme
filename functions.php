<?php

require_once get_theme_file_path('/inc/page-banner.php');
require_once get_theme_file_path('/inc/custom-queries.php');
require_once get_theme_file_path('/inc/custom_rest_queries.php');



function roslinopedia_custom_rest() {
  register_rest_field('roslina', 'featuredImageUrl', array(
    'get_callback' => function() {
      return get_the_post_thumbnail_url(get_the_ID(), 'full');
    }
  ));
  register_rest_field('post', 'featuredImageUrl', array(
    'get_callback' => function() {
      return get_the_post_thumbnail_url(get_the_ID(), 'full');
    }
  ));

  register_rest_route('roslinopedia/v1', 'get', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'roslinopediaSearchResults'
  ));


}
add_action('rest_api_init', 'roslinopedia_custom_rest');

function roslinopedia_theme_files() {
  wp_enqueue_style('roslinopedia_google_fonts', '//fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap');
  wp_enqueue_style('roslinopedia_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_script('roslinopedia_main_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
  

  wp_localize_script('roslinopedia_main_js', 'roslinopediaData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
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


add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}


// Własny wygląd strony logowania 
function roslinopedia_login_styles() {
  wp_enqueue_style('roslinopedia_login_styles', get_theme_file_uri('/build/style-index.css'));

}
add_action('login_enqueue_scripts', 'roslinopedia_login_styles');

function roslinopedia_login_logo_url() {
  return esc_url(site_url());
}
add_filter('login_headerurl', 'roslinopedia_login_logo_url');

function roslinopedia_login_logo_title() {
  return get_bloginfo('name');
}
add_filter('login_headertext', 'roslinopedia_login_logo_title');

