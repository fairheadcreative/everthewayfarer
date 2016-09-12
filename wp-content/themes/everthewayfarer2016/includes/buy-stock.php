<?php if ( is_single() ) { ?>
<?php if( have_rows('stock') ): ?>
<div class="stock">
  <h3>Buy Photos from this Article</h3>
  <?php while( have_rows('stock') ): the_row(); ?>
    <?php $image = get_sub_field('stock_preview'); ?>
    <a class="stock-item" href="<?php the_sub_field('stock_link'); ?>" target="_blank">
      <h5><?php the_sub_field('stock_title'); ?></h5>
      <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="" />
    </a>
  <?php endwhile; ?>
  </ul>
</div>
<?php else : ?>
<div class="stock no-stock"></div>
<?php endif; ?>
<?php } else { ?>
<div class="stock no-stock"></div>
<?php } ?>
