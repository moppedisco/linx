<section class="section--cta-hero">
  <div class="inner-wrap">
    <div class="cta-hero__text">
      <h3><?php the_sub_field('title'); ?></h3>
      <?php the_sub_field('text'); ?>
    </div>
  </div>
  <?php if( get_sub_field('background') == 'solid' ): ?>
    <div class='text-hero__image' style='opacity: 1;background-color: <?php the_sub_field('background_color'); ?>;'></div>
  <?php else: ?>
    <div class='text-hero__image' style='background-image: url("<?php the_sub_field('background_image'); ?>");'></div>
  <?php endif; ?>
  <!-- END .inner-wrap -->
</section>
<!-- END section.image-hero-text -->
