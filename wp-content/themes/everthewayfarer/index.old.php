<?php get_header(); ?>
<?php
if ( is_home() ) { ?>
  <div id="map-wrapper">
    <div class="container">
      <h1>Wayfaring journeys from around the world</h1>
    </div>
    <div id="map">
    </div>
  </div>
<?php } elseif ( is_category( 'Journey' ) ) { ?>
  <div id="map-wrapper">
    <div class="container">
      <h1>Journeys</h1>
    </div>
    <div id="map">
    </div>
  </div>
<?php }
?>

<?php $GLOBALS[locationArray] = array(); ?>

<section id="main">
  <div class="container group">
    <?php if ( is_home() ) { ?>
      <div class="articles" style="min-height: 0;">
        <a href="/nationalparks/">
        <div class="article-subscribe is-homenp">
          <div class="inner">
            <h2 class="h1">Park Crawl 2016</h2>
            <p>45 parks. 22 states. 1 great American idea. <span>></span></p>
            <span class="button">Check it out</span>
          </div>
        </div>
        </a>
      </div>
    <?php }; ?>

    <div class="articles<?php if ( is_home() ) {?> articles-mixed<?php } ?>">
      <?php # If it's the news category, add a title
        if ( in_category( 'News' ) && !is_home() ) { echo '<h1>Latest News</h1>'; };
      ?>
      <?php # If it's the gear category, add a title
        if ( in_category( 'Gear' ) && !is_home() ) { echo '<h1>Latest Gear & Reviews</h1>'; };
      ?>
      <?php # If it's the postcard category, add a title
        if ( is_category( 'Postcards' ) && !is_home() ) { echo '<h1>Latest Postcards</h1>'; };
      ?>
      <?php # If it's the postcard category, add a title
        if ( is_category( 'nationalparks' ) && !is_home() ) { echo '<h1>Latest Park Crawl Postcards</h1>'; };
      ?>

      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

      <?php # If it's the postcard category:
        if ( in_category( 'Postcards' ) && !is_home() ) { ?>

        <?php if (in_category('postcard-a')) { ?>
        <!-- Postcard Type A -->
        <article class="postcard-item type-a" id="id-<?php the_ID(); ?>">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
          <h2><?php the_title(); ?></h2>
          <div class="border"></div>
        </article>
        <?php } ?>

        <?php if (in_category('postcard-b')) { ?>
        <!-- Postcard Type B -->
        <article class="postcard-item type-b" id="id-<?php the_ID(); ?>">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
          <h2><span><?php the_title(); ?></span></h2>
          <div class="border"></div>
        </article>
        <?php } ?>

        <?php if (in_category('postcard-c')) { ?>
        <!-- Postcard Type C -->
        <article class="postcard-item type-c" id="id-<?php the_ID(); ?>">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
          <h2><?php the_title(); ?></h2>
          <p><?php the_field('postcard_c_subheading'); ?></p>
        </article>
        <?php } ?>

        <?php if (in_category('postcard-d')) { ?>
        <!-- Postcard Type C -->
        <article class="postcard-item type-d" id="id-<?php the_ID(); ?>">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
          <p><?php the_field('postcard_d_intro'); ?></p>
          <h2><?php the_title(); ?></h2>
          <div class="border"></div>
        </article>
        <?php } ?>

        <?php if (in_category('postcard-e')) { ?>
        <!-- Postcard Type E -->
        <article class="postcard-item type-e" id="id-<?php the_ID(); ?>">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
          <p><?php $post_date = mysql2date("Y", $post->post_date_gmt); echo $post_date; ?></p>
          <h2><?php the_title(); ?></h2>
          <div class="border"></div>
        </article>
        <?php } ?>

        <?php if (in_category('postcard-f')) { ?>
        <!-- Postcard Type F -->
        <article class="postcard-item type-f" id="id-<?php the_ID(); ?>">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
          <h2><span><em><?php the_title(); ?></em></span></h2>
          <div class="border"></div>
        </article>
        <?php } ?>

      <?php } else {
          get_template_part( 'includes/index-loop' );
        };
      ?>

      <?php endwhile; ?>
      <?php endif; ?>

    </div>

    <?php # If it's not the postcard category:
      if ( !in_category( 'Postcards' ) ) { ?>
      <div class="sidebar">
        <?php get_template_part( 'includes/sidebar' ); ?>
      </div>
    <?php }; ?>
  </div>
</section>


<?php # If it's the postcard category:
  if ( in_category( 'Postcards' ) && !is_home() ) { ?>

  <div class="postcard-popout-bg"></div>

  <?php # Create postcard popout elements
    if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

  <div class="postcard-item--popout" id="id-<?php the_ID(); ?>-popout">
    <a href="javascript:void(0);" class="postcard-item-close"></a>
    <div class="inner">
      <?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); ?>
      <div class="postcard-item--image" style="background-image: url('<?php echo $image_url[0]; ?>');">
        <img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" />
      </div>
      <div class="postcard-item--content">
        <div class="postcard-item--content--message">
          <?php the_content(); ?>
        </div>
        <div class="postcard-item--content--signature">
        </div>
        <a class="button button-pc facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><span>Share this photo</span></a>
      </div>
    </div>
  </div>

<?php endwhile; ?>
<?php endif; ?>
<?php }; ?>

<div class="test">
  <?php global $query_string;
  query_posts( $query_string . '&posts_per_page=-1' );
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    if(get_field('location')) {
      $title = get_the_title();
      $location = get_field('location');
      $permalink = get_permalink();
      array_push($GLOBALS[locationArray], array($title, $location, $permalink));
    }
  endwhile; endif;
  wp_reset_query();
  ?>
</div>

<?php get_footer(); ?>
