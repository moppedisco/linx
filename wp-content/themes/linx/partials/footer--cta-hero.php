<section class="section--cta-hero footer-cta">
  <div class="cta-hero__text">
      <h3><?php the_field('footer_cta_title', 'option'); ?></h3>
      <?php echo get_field('footer_cta_text', 'option'); ?>
  </div>
  <?php if( get_field('footer_cta_background','option') == 'solid' ): ?>
    <div class='text-hero__image' style='opacity: 1;background-color: <?php the_field('footer_cta_background_color','option'); ?>;'></div>
  <?php else: ?>
    <?php $image = get_field('footer_cta_background_image', 'option'); ?>
    <div class='text-hero__image' style='background-image: url("<?php echo wp_get_attachment_url(get_field('footer_cta_background_image', 'option')); ?>");'></div>
  <?php endif; ?>
  <!-- END .inner-wrap -->
</section>
<!-- END section.image-hero-text -->
