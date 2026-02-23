<?php

function roslinopediaSearchResults($data) {
  
  $query = new WP_Query(array(
    'post_type' =>  array('roslina', 'post'),
    's' => sanitize_text_field($data['search'])
  ));

  $results = array('plants' => array(), 'posts' => array());


  while($query->have_posts()) {
    $query->the_post();
    if(get_post_type() === 'roslina') {
      $results['plants'][] = array(
      'title' => get_the_title(),
      'permalink' => get_the_permalink(),
      'content' => get_the_content(),
      'featuredImageUrl' => get_the_post_thumbnail_url(get_the_ID(), 'full')
      );
    }
    if(get_post_type() === 'post') {
      $results['posts'][] = array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'content' => get_the_content(),
        'featuredImageUrl' => get_the_post_thumbnail_url(get_the_ID(), 'full')
      );
    }
  


    }

    return $results;

}