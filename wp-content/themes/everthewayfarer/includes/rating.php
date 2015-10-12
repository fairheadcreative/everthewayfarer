<?php
  if ( get_field('rating')) {
    echo '<div class="rating">';
    $rating = get_field('rating');
    if ( $rating == 1 ) { echo '★☆☆☆☆'; }
    if ( $rating == 2 ) { echo '★★☆☆☆'; }
    if ( $rating == 3 ) { echo '★★★☆☆'; }
    if ( $rating == 4 ) { echo '★★★★☆'; }
    if ( $rating == 5 ) { echo '★★★★★'; }
    echo '</div>';
  }
?>
