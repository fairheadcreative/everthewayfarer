<div class="sidebar">
  <?php get_sidebar('sidebar-1'); ?>

  <?php get_template_part( 'includes/buy-stock' ); ?>

  <div class="sidebar-follower">
    <?php if ( !is_page(10) ) { ?>
    <a class="sidebar-resources" href="<?php echo site_url(); ?>/resources/">My Top Travel Resources</a>
    <?php } ?>
    <a class="sidebar-subscribe" href="<?php echo site_url(); ?>/subscribe/">Join Us And Subscribe</a>
  </div>
</div>
