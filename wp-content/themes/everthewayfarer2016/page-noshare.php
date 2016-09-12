<?php /* Template Name: No-Share */ ?>
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

  <section id="main">
    <div class="container group">
      <div class="articles the-content">
        <?php if ( has_post_thumbnail() ) {} else { ?><h1><?php the_title(); ?></h1><?php } ?>
        <?php the_content(); ?>
      </div>

      <?php get_template_part( 'includes/sidebar' ); ?>
    </div>
  </section>
</article>

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
