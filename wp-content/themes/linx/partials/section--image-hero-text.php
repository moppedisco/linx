<section class="section--text-hero" style='background-image: url("<?php the_sub_field('image'); ?>");'>
  <div class="inner-wrap">
    <h3><?php the_sub_field('title'); ?></h3>
    <?php the_sub_field('text'); ?>
    <?php if( get_sub_field('call_to_action_button') ): ?>
      <a href="<?php the_sub_field('button_link'); ?>">
        <span><?php the_sub_field('button_text'); ?></span>
        <i class="material-icons">keyboard_arrow_right</i>
      </a>
    <?php endif; ?>
  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.image-hero-text -->
