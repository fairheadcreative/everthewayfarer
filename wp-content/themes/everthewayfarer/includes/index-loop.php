
<a class="span-6 postcard-item-container container-postit" id="id-<?php the_ID(); ?>" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
  <article class="postcard-item type-postit" id="id-<?php the_ID(); ?>">
    <div class="postcard-item-postit-inner">
      <h2><?php the_title(); ?></h2>
      <?php the_excerpt(); ?>
    </div>
  </article>
</a>