<?php
/*
Plugin Name: Simplify Amin
Description: Admin functionality plugin.
Author: Fairhead Creative
Author URI: http://fairheadcreative.com
Copyright: Fairhead Creative
*/

// Ditch Admin Bar items we don't want

function remove_admin_bar_links() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
  $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
  $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
  $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
  $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
  $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
  $wp_admin_bar->remove_menu('themes');           // Remove the updates link
  $wp_admin_bar->remove_menu('customize');
  $wp_admin_bar->remove_menu('updates');          // Remove the updates link
  $wp_admin_bar->remove_menu('comments');          // Remove the updates link
  $wp_admin_bar->remove_menu('new-content');      // Remove the content link
  $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


// Ditch Dashboard items we don't want
add_action( 'admin_menu', 'my_remove_menu_pages', 103);
function my_remove_menu_pages() {
  //remove_menu_page('edit.php');
  remove_menu_page('edit.php?post_type=acf');
  //remove_menu_page('themes.php');
  remove_menu_page('tools.php');
  remove_menu_page('upload.php');
  remove_menu_page('edit-comments.php');
  remove_menu_page('plugins.php');
  remove_menu_page('options-general.php');
  //remove_menu_page('users.php');
  
  remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
  remove_submenu_page( 'themes.php', 'theme-editor.php' );
  remove_submenu_page( 'themes.php', 'themes.php' );
  remove_submenu_page( 'themes.php', 'nav-menus.php' );
  remove_submenu_page( 'options-general.php', 'options-permalink.php' );
  remove_submenu_page( 'options-general.php', 'options-media.php' );
  remove_submenu_page( 'options-general.php', 'options-reading.php' );
}

// Remove 'customize.php', finnickey link
function remove_customize_page(){
    global $submenu;
      unset($submenu['themes.php'][6]); // remove customize link
}
add_action( 'admin_menu', 'remove_customize_page');
  

// Dashboard Footer

add_filter('admin_footer_text', 'fc_footer_admin');
function fc_footer_admin () { ?>
  Site designed by <a href="http://fairheadcreative.com" title="Fairhead Creative Web Design">Fairhead Creative</a>.<?php
}

  
// Remove unnecessary dashboard widgets

function remove_dashboard_widgets(){
  global $wp_meta_boxes;
  // do not remove "Right Now" for administrators
  if (!current_user_can('activate_plugins')) {
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  }
  // remove widgets for everyone
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

?>
