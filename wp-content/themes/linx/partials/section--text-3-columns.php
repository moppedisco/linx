<section class="section--text-3-columns columns--<?php the_sub_field('horizontal_or_vertical') ?>">
  <div class="inner-wrap">

    <h2><?php the_sub_field('title'); ?></h2>
    <?php if( get_sub_field('horizontal_or_vertical') == 'vertical' ): ?>
      <div class="text-columns-split">
        <div class="text-columns--image">
          <img src="<?php the_sub_field('vertical_image'); ?>" alt="" />
        </div>        
    <?php endif; ?>
    <div class="text-columns">
    <?php if( have_rows('points') ): ?>

        <?php while ( have_rows('points') ) : the_row(); ?>

          <article class="text-column__item">
            <?php if( get_sub_field('image') ): ?>
            	<i class='material-icons'><?php the_sub_field('image');?></i>
            <?php endif; ?>

            <h3><?php the_sub_field('title');?></h3>
            <p><?php the_sub_field('text');?></p>
          </article>

        <?php endwhile;?>

    <?php endif; ?>
    </div>
    <!-- END .text-column -->

    <?php if( get_sub_field('button') ): ?>
      <a class='text-column__button' href="<?php the_sub_field('button_link'); ?>">
        <?php the_sub_field('button_text'); ?>
      </a>
    <?php endif; ?>

    <?php if( get_sub_field('horizontal_or_vertical') == 'vertical' ): ?>
      </div>
      <!-- END .text-columns-split -->
    <?php endif; ?>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.text-3-columns -->
