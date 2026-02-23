<?php

function roslinopedia_adjust_queries($query) {
  if (!is_admin() && (is_post_type_archive('roslina') || is_tax('typ') || is_tax('stanowisko') || is_tax('gleba')) && $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
}

add_action('pre_get_posts', 'roslinopedia_adjust_queries');