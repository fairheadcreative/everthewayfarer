<?php get_header(); ?>

<?php $GLOBALS[locationArray] = array(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php if ( in_category('Postcards')) { ?>
<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); ?>
<div class="single-postcard-bg" style="background: url(<?php echo $image_url[0]; ?>) no-repeat center center / cover">
  <div class="postcard-close">
    <a href="<?php echo site_url(); ?>/postcards/" data-url-animation="fadeout">&nbsp;</a>
  </div>
  <div class="postcard-item--popout is-open" id="id-<?php the_ID(); ?>-popout">
    <div class="postcard-item--content">
      <div class="postcard-toggle">
        <span class="toggle-icon">&gt;</span><span class="toggle-text">hide</span>
      </div>
      <div class="postcard-item--content--message">
       <h1><?php the_title(); ?></h1>      
      <div class="postcard-item--image">
        <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" />
      </div>
      <div class="postcard-item--content--text">
        <?php the_content(); ?>
      </div>

      <a class="button button-pc facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>', 'newwindow', 'width=670, height=656'); return false;"><span>Share this photo</span></a>
      </div>
      <div class="postcard-item--content--signature">
      </div>
    </div>
  <!--<div class="more"><h3>Want more postcards?</h3> <a href="/postcards/" class="button">See more</a></div>-->
  </div>
  <div class="splash-article-previous"><?php previous_post_link('%link', '<span><span class="line-thin"></span><span class="line-thin"></span></span>', TRUE, '2' ); ?></div>
  <div class="splash-article-next"><?php next_post_link('%link', '<span><span class="line-thin"></span><span class="line-thin"></span></span>', TRUE, '2' ); ?></div>  
</div>
<?php } else { ?>

<article class="single <?php if ( in_category( 'Gear' ) ) { echo 'is-gear'; } ?><?php if ( in_category( 'Gear' ) || in_category( 'Journey' )) { echo 'has-feature'; } ?>">

  <?php if ( has_post_thumbnail() ) {
    $featureFull = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'feature-full' );
    $featureThin = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'feature-thin' );
  ?>
  <header style="background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%,rgba(0,0,0,0.65) 100%), url('<?php echo $featureThin[0]; ?>')" data-full="background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%,rgba(0,0,0,0.65) 100%), url('<?php echo $featureFull[0]; ?>')">

  <?php } else { ?>
  <header>
  <?php } ?>

    <?php if ( in_category( 'Journey' ) ) { ?>
    <div id="map-wrapper-align">
      <div id="map-wrapper" class="is-journey">
        <div id="map">
        </div>
      </div>
    </div>
    <?php } ?>

    <?php if ( !in_category( 'News' ) ) { ?> 
    <div class="container">
      <h1><?php the_title(); ?><?php get_template_part( 'includes/rating' ); ?></h1>
    </div>
    <?php } ?>
  </header>
  
  <section id="main">
    <div class="container group">
      <div class="articles the-content">
        <?php if ( in_category( 'News' ) ) { ?> 
        <h1><?php the_title(); ?></h1>
        <?php } ?>
        <?php the_content(); ?>

        <?php
          if ( get_field('resources')) {
            echo '<div class="resources"><h3>Article Resources</h3>';
            echo the_field('resources') . '</div>';
          }
        ?>

        <?php/* get_template_part( 'includes/subscribe' ); */?>



          <?php if( have_rows('stock') ): ?>
          <div class="stock article-stock">
            <div class="intro">
              <h3 class="h1-sub">Buy Photos from this Article</h3>
              <p>Join your fellow EverTheWayfarer fans who receive exclusive weekly insider travel tips and resources.</p>
            </div>
              <?php while( have_rows('stock') ): the_row(); ?>
              <?php $image = get_sub_field('stock_preview'); ?>
              <a class="stock-item" href="<?php the_sub_field('stock_link'); ?>" target="_blank">
                <h5><?php the_sub_field('stock_title'); ?></h5>
                <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="" />
              </a>
              <?php endwhile; ?>
              <div class="stock-item stock-more" href="#">
                <h3 class="h1-sub">Want more?</h3>
                <a class="button" href="#">Discover more photos</a>
                <img src="<?php echo get_template_directory_uri();?>/images/stock-more.jpg" alt="" />
              </div>
          </div>
          <?php endif; ?>
          
          <div class="push-bottom-1 text-sans">
           <a class="button share-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&title=Inspiring Travel Ideas &amp; Stunning Photography - Everthewayfarer.com"><span class="share-icon"></span>Share this</a> <span><span class="tablet-hide">Enjoyed this note from me? </span>Share <span class="tablet-hide">it </span>with your friends. <span class="mobile-hide">Thanks!</span></span>
          </div> 
          
          <div class="article-about">
            <div class="span-6">
              <figure><img src="<?php echo get_template_directory_uri();?>/images/figure-siv.jpg" alt="Sivani Babu"></figure>
              <h3>Sivani Babu</h3>
              <p>Federal public defender turned ethical traveler and lifelong lover of all things outdoors.</p>
              <p><a href="<?php echo site_url(); ?>/about/">See Siv's Story</a></p>
            </div>
            <div class="span-6">
              <figure><img src="<?php echo get_template_directory_uri();?>/images/figure-community.jpg" alt="Ever the Wayfarer community"></figure>
              <h3>Wayfaring Community</h3>
              <p>Join fellow wayfarers to receive exclusive travel resources and postcards from Siv.</p>
              <p><a href="<?php echo site_url(); ?>/subscribe/">Subscribe Now, Free</a></p>
            </div>
          </div>
         
        </div>

      
    </div>
  </section>
</article>
<?php get_template_part( 'includes/keep-reading' ); ?> 

<?php } ?>

<?php
  if(get_field('location')) {
    $title = get_the_title();
    $location = get_field('location');
    $permalink = get_permalink();
    array_push($GLOBALS[locationArray], array($title, $location, $permalink));
  }
?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
