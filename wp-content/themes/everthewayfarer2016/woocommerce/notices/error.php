<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>
<div class="woocommerce-error" data-fadeout-target="error">
  <ul>
    <?php foreach ( $messages as $message ) : ?>
      <li><?php echo wp_kses_post( $message ); ?></li>
    <?php endforeach; ?>
  </ul>
  <span class="close-button" data-fadeout="error"><span class="close-icon">&times;</span></span>
</div>
