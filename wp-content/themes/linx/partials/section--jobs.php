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
          $salary = get_post_meta($post->ID, "salary", true);
          $location = get_post_meta($post->ID, "location", true);
          $terms = get_the_terms( $post->ID , 'job_categories' );
        ?>
        <a href='<?php echo get_permalink(); ?>' class="job-listing">
            <div class="job-listing__image icon-role-<?php foreach ( $terms as $term ) {echo $term->slug; } ?>">

            </div>
            <div class="job-listing__text">
              <h3 class='job-listing__title'><?php the_title(); ?></h3>
              <span class="job-listing__location"><?php echo $location['address']; ?></span>
              <span class="job-listing__salary"><?php echo $salary; ?></span>
              <div class="clearfix" style='clear: both;'>
                <span class='job-listing__category'>
                  <?php
                    foreach ( $terms as $term ) {
                      echo $term->name;
                    }
                  ?>
                </span>
                <?php the_content(); ?>
              </div>
            </div>

        </a>
      <?php endwhile;?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.jobs -->
