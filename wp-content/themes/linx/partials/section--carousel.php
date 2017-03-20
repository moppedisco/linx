<section class="section--carousel">
  <div class="inner-wrap">
    <h2 class='carousel-title'><?php the_sub_field('title'); ?></h2>
    <div class='desktop-carousel-nav'>
      <?php if( have_rows('carousel_item') ): ?>
          <?php while ( have_rows('carousel_item') ) : the_row(); ?>
            <button type="button" class='carousel-dot'></button>
          <?php endwhile;?>
      <?php endif; ?>
    </div>
    <div class="desktop-carousel">
      <?php $i = 0; ?>
      <?php if( have_rows('carousel_item') ): ?>
          <?php while ( have_rows('carousel_item') ) : the_row(); ?>

            <?php if($i == 0): ?>
              <article class="homepage--carousel__feature">
                <div class="carousel__feature__leftcol">
                  <h2><?php the_sub_field('title');?></h2>
                  <p><?php the_sub_field('text');?></p>
                </div>
                <div class="carousel__feature__rightcol">
            <?php endif; ?>
                  <div class="image-box-wrap <?php the_sub_field('screenshot_type');?>">
                    <div class="image-box" style='background-image:url("<?php the_sub_field('image'); ?>");'></div>
                  </div>
            <?php $i++; ?>
          <?php endwhile;?>
            </div>
          </article>
      <?php endif; ?>

      <?php $k = 0; ?>
      <?php if( have_rows('carousel_item') ): ?>
          <?php while ( have_rows('carousel_item') ) : the_row(); ?>
              <?php if($k > 0): ?>
              <article class="homepage--carousel__feature">
                <div class="carousel__feature__leftcol <?php the_sub_field('screenshot_type');?>">
                  <h2><?php the_sub_field('title');?></h2>
                  <p><?php the_sub_field('text');?></p>
                </div>
                <div class="carousel__feature__rightcol">
                </div>
              </article>
            <?php endif; ?>

            <?php $k++; ?>
          <?php endwhile;?>
      <?php endif; ?>

    </div>

    <div class="mobile-carousel">
      <?php while ( have_rows('carousel_item') ) : the_row(); ?>
        <article class="homepage--owl-carousel">

          <div class="owl-carousel__image <?php the_sub_field('screenshot_type');?>">
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
