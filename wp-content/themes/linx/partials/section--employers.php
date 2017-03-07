<section class="section--employers">
  <div class="inner-wrap">

    <?php
        $job_loop = new WP_Query( array(
        'post_type' => 'employer',
            'posts_per_page' => 10 // put number of posts that you'd like to display
        ) );
    ?>
    <div class="employers-logos">
      <?php if ( $job_loop->have_posts() ) : ?>
        <?php while ( $job_loop->have_posts() ) : $job_loop->the_post(); ?>

            <?php
              $website = get_post_meta($post->ID, "website", true);
              $logo_url = wp_get_attachment_url(get_post_meta($post->ID, "logo", true));
              $images = get_post_meta($post->ID, "images", true);
            ?>
            <img src="<?php echo $logo_url; ?>" alt="" />
        <?php endwhile;?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
    <div class="employers-text">
      <?php the_sub_field('text'); ?>
      <a href="<?php echo get_permalink( 39 ); ?>" class=button><?php the_sub_field('button_label'); ?></a>
    </div>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.jobs -->
