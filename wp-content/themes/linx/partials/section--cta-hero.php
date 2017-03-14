<?php if( get_sub_field('background') ): ?>
<section class="section--cta-hero cta-hero--hasBG">
  <div class='bg-image' style='background-image: url("<?php the_sub_field('background'); ?>");'></div>
<?php else: ?>
<section class="section--cta-hero cta-hero--noBG">
<?php endif; ?>
  <div class="cta-hero__text">
      <h3><?php the_sub_field('title'); ?></h3>
      <?php the_sub_field('text'); ?>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.image-hero-text -->
