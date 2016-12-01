<?php

add_theme_support( 'post-thumbnails' ); 
add_image_size( 'feature-preview', 300, 300, true );
add_image_size( 'feature-full', 3000, 1000, true );
add_image_size( 'feature-thin', 800, 800, true );
add_image_size( 'feature-postcard', 500, 375, true );

function everthewayfarer_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'everthewayfarer' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'everthewayfarer' ),
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'everthewayfarer_widgets_init' );

function remove_calendar_widget() {
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Nav_Menu_Widget');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Tag_Cloud');
}

add_action( 'widgets_init', 'remove_calendar_widget' );

function enqueue_scripts() {
  wp_enqueue_script(
    'production',
    get_stylesheet_directory_uri() . '/js/production.min.js',
    array( 'jquery' )
  );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


//add category-specific class to a page heder
function the_category_unlinked($separator = ' ') {
    $categories = (array) get_the_category();
    
    $thelist = '';
    foreach($categories as $category) {    // concate
        $thelist .= $separator . $category->category_nicename;
    }
    
    echo $thelist;
}

//add featured images to rss feed
add_action('rss2_item', 'add_my_rss_node');

function add_my_rss_node() {
  global $post;
  if(has_post_thumbnail($post->ID)):
    $thumbnail = get_attachment_link(get_post_thumbnail_id($post->ID));
    echo("<image>{$thumbnail}</image>");
  endif;
}

function add_thumb_to_RSS($content) {
   global $post;
   if ( has_post_thumbnail( $post->ID ) ){
      $content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '' . $content;
   }
   return $content;
}
add_filter('the_excerpt_rss', 'add_thumb_to_RSS');
add_filter('the_content_feed', 'add_thumb_to_RSS')

?>
