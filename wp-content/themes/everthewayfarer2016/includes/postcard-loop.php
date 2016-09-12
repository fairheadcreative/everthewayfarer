<article class="postcard-item" id="id-<?php the_ID(); ?>">
  <div class="postcard-item--preview">
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail('feature-full');
    } ?>
    <h2><?php the_title(); ?></h2>
    <p class="meta"><?php echo get_the_date(); ?></p>
  </div>
</article>

<article class="postcard-item">
  <div class="postcard-item--preview">
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail('feature-full');
    } ?>
    <h2><?php the_title(); ?></h2>
    <p class="meta"><?php echo get_the_date(); ?></p>
  </div>
</article>


<div class="postcard-item--popout" id="id-<?php the_ID(); ?>-popout">
  <a href="javascript:void(0);" class="postcard-item-close">&times;</a>
  <h3><?php the_title(); ?></h3>
  <p class="meta"><?php echo get_the_date(); ?></p>
  <?php the_content(); ?>
  <?php the_post_thumbnail('feature-preview'); ?>
</div>
