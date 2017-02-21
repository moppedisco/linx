<section class="section--carousel">
  <div class="inner-wrap">

    <?php if( have_rows('carousel_item') ): ?>
        <?php while ( have_rows('carousel_item') ) : the_row(); ?>

          <article class="homepage--carousel__feature <?php the_sub_field('screenshot_type');?>">

            <div class="carousel__feature__leftcol" data-scroll-speed='1'>
              <h2><?php the_sub_field('title');?></h2>
              <p><?php the_sub_field('text');?></p>
            </div>

            <div class="carousel__feature__rightcol">
              <img src="<?php the_sub_field('image'); ?>" alt="" />
            </div>

          </article>
        <?php endwhile;?>
    <?php endif; ?>

  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.homepage-hero -->
