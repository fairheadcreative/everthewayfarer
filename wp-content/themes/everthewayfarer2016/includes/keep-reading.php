<div class="container group">
<h2 class="h1">Keep reading</h2>
<div class="articles articles-mixed">


<?php
  if ( in_category( 'News' ) ) { $custom_query = new WP_Query('cat=3'); }
  elseif ( in_category( 'Journey' ) ) { $custom_query = new WP_Query('cat=2'); }
  elseif ( in_category( 'Gear' ) ) { $custom_query = new WP_Query( array('cat' => 4, 'posts_per_page' => 4) ); }
  else { $custom_query = new WP_Query( array('posts_per_page' => 4) ); }
  while($custom_query->have_posts()) : $custom_query->the_post();
?>

<!-- <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
  <article>
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail('feature-preview');
    } ?>
    <h2><?php the_title(); ?></h2>
    <?php get_template_part( 'includes/rating' ); ?>

    <?php the_excerpt(); ?>

    <p class="meta">An article on <?php echo get_the_date(); ?></p>
  </article>
</a> -->

          <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
            <?php get_template_part( 'includes/path-crawl' ); ?>
            <article class="postcard-item type-a" id="id-<?php the_ID(); ?>">
              <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
              <h2><span><?php the_title(); ?></span></h2>
              <div class="border"></div>
            </article>
          </a>


<?php endwhile; ?>

<?php
  if ( in_category( 'News' ) ) { echo '<a href="' . site_url() . '/category/news/" class="button">View More</a>'; }
  elseif ( in_category( 'Journey' ) ) { echo '<a href="' . site_url() . '/category/journey/" class="button">View More</a>'; }
  elseif ( in_category( 'Gear' ) ) { echo '<a href="' . site_url() . '/category/gear/" class="button">View More</a>'; }
?>

<?php wp_reset_postdata(); // reset the query ?>
</div>
</div>
