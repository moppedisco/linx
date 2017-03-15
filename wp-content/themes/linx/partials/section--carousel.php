<section class="section--carousel">
  <div class="inner-wrap">
    <h2 class='carousel-title'><?php the_sub_field('title'); ?></h2>
    <div class="desktop-carousel">

      <?php if( have_rows('carousel_item') ): ?>
          <?php while ( have_rows('carousel_item') ) : the_row(); ?>

            <article class="homepage--carousel__feature <?php the_sub_field('screenshot_type');?>">

              <div class="carousel__feature__leftcol">
                <h2><?php the_sub_field('title');?></h2>
                <p><?php the_sub_field('text');?></p>
              </div>

              <div class="carousel__feature__rightcol">
                <div class="image-box" style='background-image:url("<?php the_sub_field('image'); ?>");'></div>
              </div>

            </article>
          <?php endwhile;?>
      <?php endif; ?>
    </div>

    <div class="mobile-carousel">
      <?php while ( have_rows('carousel_item') ) : the_row(); ?>
        <article class="homepage--owl-carousel">

          <div class="owl-carousel__image">
            <div class="image-box" style='background-image:url("<?php the_sub_field('image'); ?>");'></div>
          </div>

          <div class="owl-carousel__text">
            <h2><?php the_sub_field('title');?></h2>
            <p><?php the_sub_field('text');?></p>
          </div>

        </article>
      <?php endwhile;?>
    </div>

  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.carousel -->
