<?php get_header(); ?>

<?php $GLOBALS[locationArray] = array(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php if ( in_category('Postcard')) { ?>

  <article class="single is-postcard">
    <div class="container group">
      <div class="postcard-image">
        <?php the_post_thumbnail('feature-full'); ?>
      </div>

      <div class="postcard-message">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), ('feature-full')); ?>
        <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $image[0]; ?>&description=something great here" class="button pinterest">Pin this photo</a>

        <a class="button secondary" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>">Share on Facebook</a>
        <a class="button secondary" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink() ?>&source=tweetbutton&text=<?php the_title(); ?>&url=<?php the_permalink(); ?>&via=wayfaringsiv">Share on Twitter</a>

      </div>
    </div>
  </article>

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

        <a class="button secondary" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>">Share on Facebook</a>
        <a class="button secondary" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink() ?>&source=tweetbutton&text=<?php the_title(); ?>&url=<?php the_permalink(); ?>&via=wayfaringsiv">Tweet post</a>

        <?php
          if ( get_field('resources')) {
            echo '<div class="resources"><h3>Article Resources</h3>';
            echo the_field('resources') . '</div>';
          }
        ?>

        <?php get_template_part( 'includes/subscribe' ); ?>



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
          </ul>
        </div>
        <?php endif; ?>

        <div class="writer article-writer">
          <h3 class="h1-sub">Need a writer, photographer or speaker?</h3>
          <a class="button" href="/photography-freelance-writing-speaking/">Get in touch with me</a>
        </div>

        <?php get_template_part( 'includes/keep-reading' ); ?>
      </div>

      <?php get_template_part( 'includes/sidebar' ); ?>
    </div>
  </section>
</article>

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
