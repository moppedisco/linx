<?php if( get_field('background') ): ?>
<section class="section--cta-hero footer-cta cta-hero--hasBG">
  <div class='bg-image' style='background-image: url("<?php the_field('background'); ?>");'></div>
<?php else: ?>
<section class="section--cta-hero footer-cta cta-hero--noBG">
<?php endif; ?>
  <div class="cta-hero__text">
      <h3><?php the_field('headline'); ?></h3>
      <?php the_field('text'); ?>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.image-hero-text -->
