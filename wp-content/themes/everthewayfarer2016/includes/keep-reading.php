<section class="keep-reading">
  <div class="container group">
    <div class="articles articles-mixed">
    <?php
      // if ( in_category( 'News' ) ) { $custom_query = new WP_Query('cat=3'); }
      // elseif ( in_category( 'Journey' ) ) { $custom_query = new WP_Query('cat=2'); }
      // elseif ( in_category( 'Gear' ) ) { $custom_query = new WP_Query( array('cat' => 4, 'posts_per_page' => 4) ); }
      // else { $custom_query = new WP_Query( array('posts_per_page' => 6) ); }
      $custom_query = new WP_Query( array('posts_per_page' => 5) ); ?>
      <?php # If it's a product
              if (!is_home()  ) {
              $args = array( 'post_type' => 'product' );
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post(); 
              global $product; 
              $image_id = get_field('custom_product_image');
              $image_size =  'feature-postcard';
              $image_url = $image_id['sizes'][$image_size]; ?>

              <a class="span-6 postcard-item-container item-product" href="<?php the_permalink() ?>" >
                <img src="<?php echo $image_url; ?>" alt="">
                <span class="price-tag-container">
                  <span class="product-price-tag">
                    <?php echo $product->get_price_html(); ?>
                  </span>
                </span>
              </a>

            <?php 
              endwhile; 
              wp_reset_query(); } ?>
      <?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>


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

    <?php # If it's the postcard category:
              if ( in_category( 'Postcards' ) && is_home() || in_category( 'Postcards' ) ) { ?>
              <?php if (in_category('postcard-a')) { ?>
              <!-- Postcard Type A -->
              <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php get_template_part( 'includes/path-crawl' ); ?>
                <article class="postcard-item type-a" id="id-<?php the_ID(); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
                  <h2><?php the_title(); ?></h2>
                  <div class="border"></div>
                </article>
              </a>   
              <?php } ?>

              <?php if (in_category('postcard-b')) { ?>
              <!-- Postcard Type B -->
              <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php get_template_part( 'includes/path-crawl' ); ?>
                <article class="postcard-item type-b" id="id-<?php the_ID(); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
                  <h2><span><?php the_title(); ?></span></h2>
                  <div class="border"></div>
                </article>
              </a>                     
              <?php } ?>

              <?php if (in_category('postcard-c')) { ?>
              <!-- Postcard Type C -->
              <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php get_template_part( 'includes/path-crawl' ); ?>
                <article class="postcard-item type-c" id="id-<?php the_ID(); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
                  <h2><?php the_title(); ?></h2>
                  <p><?php the_field('postcard_c_subheading'); ?></p>
                </article>
              </a>   
              <?php } ?>

              <?php if (in_category('postcard-d')) { ?>
              <!-- Postcard Type C -->
              <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php get_template_part( 'includes/path-crawl' ); ?>
                <article class="postcard-item type-d" id="id-<?php the_ID(); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
                  <p><?php the_field('postcard_d_intro'); ?></p>
                  <h2><?php the_title(); ?></h2>
                  <div class="border"></div>
                </article>
              </a>   
              <?php } ?>

              <?php if (in_category('postcard-e')) { ?>
              <!-- Postcard Type E -->
              <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php get_template_part( 'includes/path-crawl' ); ?>
                <article class="postcard-item type-e" id="id-<?php the_ID(); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
                  <p><?php $post_date = mysql2date("Y", $post->post_date_gmt); echo $post_date; ?></p>
                  <h2><?php the_title(); ?></h2>
                  <div class="border"></div>
                </article>
              </a>   
              <?php } ?>

              <?php if (in_category('postcard-f')) { ?>
              <!-- Postcard Type F -->
              <a class="span-6 postcard-item-container" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php get_template_part( 'includes/path-crawl' ); ?>
                <article class="postcard-item type-f" id="id-<?php the_ID(); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('feature-postcard'); } ?>
                  <h2><span><em><?php the_title(); ?></em></span></h2>
                  <div class="border"></div>
                </article>
              </a>   
              <?php } ?>

              <?php # If it's a journey post on the National Park Crawl page (refactor this)
              } elseif ( is_category( 'nationalparks' ) || is_home() ) { ?>
              <?php if ( !in_category( 'Postcards' ) ) { ?>
              <!-- Journey in Postcard Style -->
              <?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'feature-postcard', true); ?>
              <a class="span-6 postcard-item-container" id="id-<?php the_ID(); ?>" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                <?php get_template_part( 'includes/path-crawl' ); ?>
                <article class="postcard-item type-journey" id="id-<?php the_ID(); ?>" <?php if ( has_post_thumbnail() ) {?>style="background: url(<?php echo $image_url[0]; ?>) no-repeat center center / cover;"<?php } ?>>
                  <div class="postcard-item-journey-inner">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                  </div>
                </article>
              </a>
            <?php } ?>

            <?php # If it's a journey post on the National Park Crawl page (refactor this)
            } elseif ( is_category( 'Journey' ) && !is_home() ) { ?>
            <?php if ( !in_category( 'Postcards' ) ) { ?>
            <!-- Journey in Postcard Style -->
            <?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'feature-postcard', true); ?>
            <a class="span-6 postcard-item-container" id="id-<?php the_ID(); ?>" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
              <?php get_template_part( 'includes/path-crawl' ); ?>
              <article class="postcard-item type-journey" id="id-<?php the_ID(); ?>" <?php if ( has_post_thumbnail() ) {?>style="background: url(<?php echo $image_url[0]; ?>) no-repeat center center / cover;"<?php } ?>>
                <div class="postcard-item-journey-inner">
                  <h2><?php the_title(); ?></h2>
                  <?php the_excerpt(); ?>
                </div>
              </article>
            </a>
          <?php } ?>

            <?php } else {
                get_template_part( 'includes/index-loop' );
              };
            ?>


    <?php endwhile; ?>

    <?php
      // if ( in_category( 'News' ) ) { echo '<a href="' . site_url() . '/category/news/" class="button">View More</a>'; }
      // elseif ( in_category( 'Journey' ) ) { echo '<a href="' . site_url() . '/category/journey/" class="button">View More</a>'; }
      // elseif ( in_category( 'Gear' ) ) { echo '<a href="' . site_url() . '/category/gear/" class="button">View More</a>'; }
    ?>

    <?php wp_reset_postdata(); // reset the query ?>
    </div>
  </div>  
</section>
