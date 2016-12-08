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

//add new formatting to wp wyswig editor

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		array(  
			'title' => 'Inline instruction',  
			'block' => 'span',  
			'classes' => 'instructions-inline',
			'wrapper' => true,
			
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

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
add_action('rss2_item', 'add_thumb_to_RSS');

// function add_my_rss_node() {
//   global $post;
//   if(has_post_thumbnail($post->ID)):
//     $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
//     echo("<image><url>{$thumbnail}</url></image>");
//   endif;
// }

function add_thumb_to_RSS($content) {
   global $post;
   if ( has_post_thumbnail( $post->ID ) ){
      $content = '<image><url>' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '</url></image>' . $content;
   }
   return $content;
}
add_filter('the_excerpt_rss', 'add_thumb_to_RSS');
add_filter('the_content_feed', 'add_thumb_to_RSS');

add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['sizes'] ) )
        unset( $attr['sizes'] );

    if( isset( $attr['srcset'] ) )
        unset( $attr['srcset'] );

    return $attr;

 }, PHP_INT_MAX );

add_filter( 'wp_calculate_image_sizes', '__return_false',  PHP_INT_MAX );

add_filter( 'wp_calculate_image_srcset', '__return_false', PHP_INT_MAX );

remove_filter( 'the_content', 'wp_make_content_images_responsive' );

?>
