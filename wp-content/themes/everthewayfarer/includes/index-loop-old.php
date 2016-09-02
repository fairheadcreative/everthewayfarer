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
<?php # If it's Journeys category:
          if ( in_category( 'Journey' ) && is_home() || in_category( 'Journey' ) ) { ?>
          
          <!-- Postcard Type A -->
          <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
            <article class="postcard-item type-a" id="id-<?php the_ID(); ?>">
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
              <h2><?php the_title(); ?></h2>
              <div class="border"></div>
            </article>
          </a>   
<?php } ?>
