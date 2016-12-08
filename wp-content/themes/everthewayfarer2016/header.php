<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title(); ?></title>
  <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.css' rel='stylesheet' />
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
  <script src="//use.typekit.net/zif1rom.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:100584,hjsv:5}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');</script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="page-header" class="post<?php the_category_unlinked(' '); ?>"> 
    <nav id="navigation"> 
      <div class="container">
        <ul id="primary-links">
          <li class="nav-primary">
           <span class="page-active">&nbsp;</span><span class="rotate-90">&gt;</span>
           <span class="menu-toggler">             
             <span class="logo logo-mobile"><?php get_template_part( 'includes/logotype' ); ?><span class="toggler-arrow"></span></span>
           </span>
            <ul>
              <li class="nav-primary-1 <?php if (strpos($_SERVER['REQUEST_URI'], "postcards") !== false && !is_home() || has_category( 'postcards') && !is_category( nationalparks ) && !is_home()){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/postcards/">Latest Postcards</a></li>
              <li class="nav-primary-1 <?php if (strpos($_SERVER['REQUEST_URI'], "nationalparks") !== false && !is_home()){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/nationalparks/">Park Crawl</a></li>

              <li class="nav-primary-1 <?php if (!is_home() && is_category('News') || !is_home() && has_category('News')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/news/">News</a></li>
              <!--<li class="nav-primary-1 <?php if (!is_home() && is_category('Gear') || !is_home() && has_category('Gear')) { echo 'active'; };?>"><a href="<?php echo site_url(); ?>/gear/">Travel Gear</a></li>-->
              <li class="nav-primary-1 <?php if (!is_home() && is_category('Journey') || !is_home() && has_category('Journey')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/journey/">Journeys</a></li>
              <li class="nav-primary-2 <?php if (!is_home() && is_page('about')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/about/">About Siv</a></li>
              <!-- START UNCATHEGORIZED ITEMS -->
              <li class="nav-primary-2 uncathegorized <?php if (!is_home() && is_page('photography-freelance-writing-speaking')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/photography-freelance-writing-speaking/">Navigation</a></li>
              <li class="nav-primary-2 uncathegorized <?php if (!is_home() && is_page('subscriber-wallpaper-pack')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/subscriber-wallpaper-pack/">Navigation</a></li>
              <li class="nav-primary-2 uncathegorized <?php if (!is_home() && is_page('resources')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/resources/">Navigation</a></li>
              <li class="nav-primary-2 uncathegorized <?php if (!is_home() && is_page('thanks')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/thanks/">Navigation</a></li>
              <!-- END UNCATHEGORIZED ITEMS -->
              <li class="nav-primary-1"><a href="http://www.suntrailimages.com" target="_blank">Photography</a></li>
              <li class="nav-primary-1 <?php if (!is_home() && is_page('subscribe')){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>/subscribe/">Subscribe</a></li>
              <li class="nav-primary-1 mobile-home uncathegorized <?php if (is_home()){ echo 'active'; };?>"><a href="<?php echo site_url(); ?>">Everything</a></li>
              <li class="nav-icons">
                <a class="nav-primary-twitter" href="https://twitter.com/WayfaringSiv" target="_blank">
                  <span class="icon-block">
                    <?php get_template_part( 'includes/icons' ); ?><span class="icons-tag">Twitter</span>
                  </span></a> 
                <a class="nav-primary-facebook" href="https://www.facebook.com/pages/Ever-The-Wayfarer/480037682086654" target="_blank">
                  <span class="icon-block">
                    <?php get_template_part( 'includes/icons' ); ?><span class="icons-tag">Facebook</span>
                  </span></a> 
                <a class="nav-primary-instagram" href="https://instagram.com/wayfaringsiv/" target="_blank">
                  <span class="icon-block">
                    <?php get_template_part( 'includes/icons' ); ?><span class="icons-tag">Instagram</span>
                  </span></a>
              </li>
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
