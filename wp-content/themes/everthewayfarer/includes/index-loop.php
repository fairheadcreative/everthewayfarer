<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
  <article>
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail('feature-preview');
    } ?>
    <h2><?php the_title(); ?></h2>
    <?php get_template_part( 'includes/rating' ); ?>

    <?php the_excerpt(); ?>

    <p class="meta">An article on <?php echo get_the_date(); ?></p>
  </article>
</a>

<?php
  if(get_field('location')) {
    $title = get_the_title();
    $location = get_field('location');
    $permalink = get_permalink();
    array_push($GLOBALS[locationArray], array($title, $location, $permalink));
  }
?>
