<section class="section--jobs">
  <div class="inner-wrap">

    <?php
        $job_loop = new WP_Query( array(
        'post_type' => 'job',
            'posts_per_page' => 5 // put number of posts that you'd like to display
        ) );
    ?>

    <?php if ( $job_loop->have_posts() ) : ?>
      <?php while ( $job_loop->have_posts() ) : $job_loop->the_post(); ?>

          <?php
            $hourly_rate = get_post_meta($post->ID, "hourly_rate", true);
            $currency = get_post_meta($post->ID, "currency", true);
            $location = get_post_meta($post->ID, "location_display_name", true);
            $openpositions = get_post_meta($post->ID, "open_positions", true);
            $terms = get_the_terms( $post->ID , 'job_categories' );
            $employerDisplayName = get_post_meta($post->ID, "employer_display_name", true);

          ?>
          <a href='<?php echo get_permalink(); ?>' class="list--job-item">
            <div class="job-item__image">
              <?php foreach ( $terms as $term ): ?>
                <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" />
              <?php endforeach; ?>
              <?php if( $openpositions ): ?>
                <span class="job-item__open-positions"><?php echo $openpositions ?></span>
              <?php else: ?>
                </span>
              <?php endif; ?>
            </div>
            <div class="job-item__text">
              <?php if($location): ?>
              <div class="job-item__text--top">
                <span class="job-item-meta__location"><i class="material-icons">location_on</i><?php echo $location; ?></span>
              </div>
              <?php endif; ?>
              <h3 class='job-item__title'><?php the_title(); ?><?php if($employerDisplayName): ?><span><?php echo $employerDisplayName; ?></span><?php endif; ?></h3>
              <div class="job-item__text--bottom">
                <span class="job-item__salary"><?php echo $hourly_rate; ?> <?php echo $currency; ?> / <?php pll_e('Hour'); ?></span>
              </div>


            </div>
          </a>
      <?php endwhile;?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    <div class="jobs-link">
      <a href="<?php echo get_permalink(pll_get_post(1571)); ?>" class=button><?php the_sub_field('button_label'); ?></a>
    </div>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.jobs -->
