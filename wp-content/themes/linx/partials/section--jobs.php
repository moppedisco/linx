<section class="section--jobs">
  <div class="inner-wrap">

    <?php
        $job_loop = new WP_Query( array(
        'post_type' => 'job',
            'posts_per_page' => 10 // put number of posts that you'd like to display
        ) );
    ?>

    <?php if ( $job_loop->have_posts() ) : ?>
      <?php while ( $job_loop->have_posts() ) : $job_loop->the_post(); ?>

          <?php
            $hourly_rate = get_post_meta($post->ID, "hourly_rate", true);
            $location = get_post_meta($post->ID, "location", true);
            $openpositions = get_post_meta($post->ID, "open_positions", true);
            $terms = get_the_terms( $post->ID , 'job_categories' );
          ?>
          <a class="list--job-item">
            <div class="job-item__image icon-role-<?php foreach ( $terms as $term ) {echo $term->slug; } ?>">
              <?php if( $openpositions ): ?>
                <span class="job-item__open-positions"><?php echo $openpositions ?></span>
              <?php else: ?>
                </span>
              <?php endif; ?>
            </div>
            <div class="job-item__text">
              <div class="job-item__text--top">
                <span class="job-item-meta__location"><i class="material-icons">location_on</i><?php echo $location['address']; ?></span>
              </div>
              <h3 class='job-item__title'><?php the_title(); ?></span></h3>
              <div class="job-item__text--bottom">
                <span class="job-item__salary"><?php echo $hourly_rate; ?></span>
              </div>


            </div>
          </a>
      <?php endwhile;?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    <div class="jobs-link">
      <a href="<?php echo get_permalink( 39 ); ?>" class=button><?php the_sub_field('button_label'); ?></a>
    </div>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.jobs -->
