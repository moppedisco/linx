
  <?php if( get_field('background', 'option') ): ?>
  <section class="section--cta-hero footer-cta cta-hero--hasBG">
    <?php $image = get_field('background', 'option'); ?>
    <div class='bg-image' style='background-image: url("<?php echo wp_get_attachment_url($image,'full'); ?>");'></div>
  <?php else: ?>
  <section class="section--cta-hero footer-cta cta-hero--noBG">
  <?php endif; ?>
    <div class="cta-hero__text">
        <h3><?php the_field('title', 'option'); ?></h3>

        <?php the_field('text', 'option'); ?>
    </div>
    <!-- END .inner-wrap -->
  </section>
  <!-- END section.image-hero-text -->
