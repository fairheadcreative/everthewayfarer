<?php get_header(); ?>

<?php $GLOBALS[locationArray] = array(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<article class="single is-page <?php if ( has_post_thumbnail() ) { echo 'has-feature'; } ?>">
  <?php if ( has_post_thumbnail() ) {
    $featureFull = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'feature-full' );
    $featureThin = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'feature-thin' );
  ?>
  <header style="background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%,rgba(0,0,0,0.65) 100%), url('<?php echo $featureThin[0]; ?>')" data-full="background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%,rgba(0,0,0,0.65) 100%), url('<?php echo $featureFull[0]; ?>')">
    <div class="container">
      <h1><?php the_title(); ?></h1>
    </div>
  </header> 
  <?php } ?>
   <?php if ( is_page(87) ) { ?>
     <header class="hero-ty"></header>
   <?php } ?>

  <section id="main">
    <div class="container group">
      <div class="articles the-content">
        <?php if ( has_post_thumbnail() ) {} else { ?><h1><?php the_title(); ?></h1><?php } ?>
        <?php the_content(); ?>

        <?php if ( !is_page(293) && !is_page(87) && !is_cart() && !is_checkout() ) { ?>
        <a class="button secondary" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>">Share on Facebook</a>
        <a class="button secondary" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink() ?>&source=tweetbutton&text=<?php the_title(); ?>&url=<?php the_permalink(); ?>&via=wayfaringsiv">Tweet post</a>
        <?php } ?>

        <?php if ( is_page(87) ) { ?>
         <div class="push-bottom-1">
           <a class="button share-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&title=Inspiring Travel Ideas &amp; Stunning Photography - Everthewayfarer.com"><span class="share-icon"></span>Share this</a>
           <!--<a class="button secondary" target="_blank" href="https://twitter.com/wayfaringsiv">Twitter</a>
           <a class="button secondary" target="_blank" href="https://www.instagram.com/wayfaringsiv/">Instagram</a>-->
         </div>     
        <?php } ?>

        <?php
            if ( get_field('resources')) {
                echo '<div class="resources"><h3>Article Resources</h3>';
                echo the_field('resources') . '</div>';
            }
        ?>

        <?php if ( !is_page(87) && !is_cart() && !is_checkout() ) { ?>
          <?php get_template_part( 'includes/subscribe' ); ?>
        <?php } ?>

        <?php if ( !is_page(293) && !is_cart() && !is_checkout() && !is_page(87) ) { ?>
        <div class="writer article-writer">
          <h3 class="h1-sub">Need a writer, photographer or speaker?</h3>
          <a class="button" href="/photography-freelance-writing-speaking/">Get in touch with me</a>
        </div>
        <?php } ?>
      </div>

      <?php /*get_template_part( 'includes/sidebar' ); */?>

    </div>
  </section>
</article>

<?php if ( !is_cart() && !is_checkout() ) { ?>
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
