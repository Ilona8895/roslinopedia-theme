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