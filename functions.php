<?php

function roslinopedia_theme_files() {
  wp_enqueue_style('roslinopedia_main_styles', get_theme_file_uri('/build/style-index.css'));
}

add_action('wp_enqueue_scripts', 'roslinopedia_theme_files');