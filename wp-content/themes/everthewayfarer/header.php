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
          <li class="logo"><a href="<?php echo site_url(); ?>">Ever the Wayfarer</a></li>
          <?php if (!is_page('subscribe')) {?><li class="nav-primary-3"><a class="button" href="<?php echo site_url(); ?>/subscribe/">Subscribe</a></li><?php } ?>
          <li class="nav-primary">
            <a class="nav-primary-1 <?php if (!is_home() && is_category('Postcard') || !is_home() && has_category('Postcards')){ echo 'active'; };?>" href="<?php echo site_url(); ?>/postcards/">Postcards</a> 
            <a class="nav-primary-1 <?php if (!is_home() && is_category('Journey') || !is_home() && has_category('Journey')){ echo 'active'; };?>" href="<?php echo site_url(); ?>/journey/">Journeys</a>
            <a class="nav-primary-1 <?php if (!is_home() && is_category('News') || !is_home() && has_category('News')){ echo 'active'; };?>" href="<?php echo site_url(); ?>/news/">News</a>
            <a class="nav-primary-1 <?php if (!is_home() && is_category('Gear') || !is_home() && has_category('Gear')) { echo 'active'; };?>" href="<?php echo site_url(); ?>/gear/">Gear &amp; Reviews</a>
            <a class="nav-primary-1" href="http://www.suntrailimages.com">Photography</a>
            <a class="nav-primary-2 <?php if (!is_home() && is_page('about')){ echo 'active'; };?>" href="<?php echo site_url(); ?>/about/">About</a>
            <a class="nav-primary-2 <?php if (!is_home() && is_page('resources')){ echo 'active'; };?>" href="<?php echo site_url(); ?>/resources/">Resources</a>

            <a class="nav-primary-twitter " href="https://twitter.com/WayfaringSiv" target="_blank">Twitter</a>
            <a class="nav-primary-facebook " href="https://www.facebook.com/pages/Ever-The-Wayfarer/480037682086654" target="_blank">Facebook</a>
            <a class="nav-primary-instagram " href="https://instagram.com/wayfaringsiv/" target="_blank">Instagram</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
