<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title(); ?></title>
  <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.css' rel='stylesheet' />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
  <script src="//use.typekit.net/zif1rom.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:100584,hjsv:5}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');</script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="page-header"> 
    <nav id="navigation"> 
      <div class="container">
        <ul id="primary-links">
          <li class="nav-primary">
           <span class="page-active">&nbsp;</span><span class="rotate-90">&gt;</span>
            <ul>
              <li class="nav-primary-1 <?php if (!is_home() && is_category('Postcard') || !is_home() && has_category('Postcards')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/postcards/">Latest Postcards</a></li>
              <li class="nav-primary-1 <?php if (!is_home() && is_category('Journey') || !is_home() && has_category('Journey')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/journey/">Journeys</a></li>
              <li class="nav-primary-1 <?php if (!is_home() && is_category('News') || !is_home() && has_category('News')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/news/">News</a></li>
              <li class="nav-primary-1 <?php if (!is_home() && is_category('Gear') || !is_home() && has_category('Gear')) { echo 'active'; };?>"><a href="<?php echo site_url(); ?>/gear/">Gear &amp; Reviews</a></li>
              <li class="nav-primary-1"><a href="http://www.suntrailimages.com">Photography</a></li>
              <li class="nav-primary-2 <?php if (!is_home() && is_page('about')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/about/">About</a></li>
              <li class="nav-primary-2 <?php if (!is_home() && is_page('resources')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/resources/">Resources</a></li>
              <li class="nav-primary-1 <?php if (is_home()){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>">Homepage</a></li>
              <li class="nav-primary-1 <?php if (!is_home() && is_page('subscribe')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/subscribe/">Subscribe</a></li>
              <li><a class="nav-primary-twitter " href="https://twitter.com/WayfaringSiv" target="_blank">Twitter</a></li>
              <li><a class="nav-primary-facebook " href="https://www.facebook.com/pages/Ever-The-Wayfarer/480037682086654" target="_blank">Facebook</a></li>
              <li><a class="nav-primary-instagram " href="https://instagram.com/wayfaringsiv/" target="_blank">Instagram</a></li>
            </ul>  
          </li>
          <li class="logo"><a href="<?php echo site_url(); ?>"><?php get_template_part( 'includes/logotype' ); ?></a></li>
          <?php if (!is_page('subscribe')) {?><li class="nav-primary-3"><a class="button" href="<?php echo site_url(); ?>/subscribe/">Subscribe</a></li><?php } ?>
        </ul>
      </div>
    </nav>
  </header>
  <div class="splash-overlay is-under" data-visual="overlay" data-fadein="true">
    <?php get_template_part( 'includes/subscribe-splash' ); ?>
  </div>
