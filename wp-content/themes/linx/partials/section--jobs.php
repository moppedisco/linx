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
          <a href='<?php echo get_permalink(); ?>' class="job-listing">
            <hr>
            <div class="job-listing__image icon-role-<?php foreach ( $terms as $term ) {echo $term->slug; } ?>">
              <?php if( $openpositions ): ?>
                <span class="job-listing__open-positions"><?php echo $openpositions ?></span>
              <?php else: ?>
                </span>
              <?php endif; ?>
            </div>
            <div class="job-listing__text">
              <h3 class='job-listing__title'><?php the_title(); ?></span></h3>
              <span class="job-listing__salary"><?php echo $hourly_rate; ?></span>
              <div class="clearfix" style='clear: both;'>
                <span class='job-listing__category'>
                  <?php
                    foreach ( $terms as $term ) {
                      echo $term->name;
                    }
                  ?>
                </span>
                <span class="job-listing__location"><?php echo $location['address']; ?></span>
              </div>
            </div>
            <hr>
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
