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


add_action( 'after_setup_theme', 'my_rss_template' );
/**
 * Register custom RSS template.
 */
function my_rss_template() {
  add_feed( 'short', 'my_custom_rss_render' );
}
/**
 * Custom RSS template callback.
 */
function my_custom_rss_render() {
  get_template_part( 'feed', 'short' );
}


//add featured images to rss feed
add_action('rss2_item', 'add_thumb_to_RSS');

function add_my_rss_node() {
  global $post;
  if(has_post_thumbnail($post->ID)):
    $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    echo("<image><url>{$thumbnail}</url></image>");
  endif;
}

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

//woocommerce - redirect to custom Thank you page after purchase
add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' ); 
function wc_custom_redirect_after_purchase() {
  global $wp;

  if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
    //this has to be changed once we deploy to production
    wp_redirect( 'https://everthewayfare.staging.wpengine.com/thank-you/' );
    exit;
  }
}

function post_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;
}

// remove sidebar and breadcrumbs from woocommerce pages
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
// remove default woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
// reorder product summary elements
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );

add_action( 'wp', 'bbloomer_remove_sidebar_product_pages' );
 
function bbloomer_remove_sidebar_product_pages() {
  if (is_product()) {
    remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
  }
}

function change_posts_on_homepage( $query ) {

    //First, number of posts on home page
    $posts_on_first = 5;

    if ( $query->is_home() && !is_paged() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', $posts_on_first );
    }

    if ( $query->is_home() && is_paged() && $query->is_main_query() ) {
    
    //Next, this is default number of posts per page
   $ppp = get_option('posts_per_page');

   $page_offset = $ppp*($query->query_vars['paged']-2) + $posts_on_first;

    //Apply adjust page offset
    $query->set('offset', $page_offset );
} 

}
add_action( 'pre_get_posts', 'change_posts_on_homepage' );

?>
