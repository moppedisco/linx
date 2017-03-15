<section class="section--employers">
  <div class="inner-wrap">
    <div class="employers-logos">
      <?php if( have_rows('logos') ): ?>

          <?php while ( have_rows('logos') ) : the_row(); ?>
            <?php
              // $post_objects = get_sub_field('company');
              // print_r($post_objects );

              $post_object = get_sub_field('company');
            	if($post_object){
            		//Fetch the image field from the carsandtrucks post
            		$image = get_field('logo', $post_object->ID);
                echo '<img src="' . $image['sizes']['medium'] . '" alt="' . $image['alt'] . '" />';
            	}

            ?>
          <?php endwhile;?>

      <?php endif; ?>
    </div>

    <div class="employers-text">
      <?php the_sub_field('text'); ?>
      <?php if( get_sub_field('button_label') ): ?>
        <a href="<?php echo get_permalink( 39 ); ?>" class=button><?php the_sub_field('button_label'); ?></a>
      <?php endif; ?>
    </div>

  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.jobs -->
