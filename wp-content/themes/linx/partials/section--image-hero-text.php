<section class="section--text-hero">
  <div class="inner-wrap">
    <div class="text-hero-left">
      <h3><?php the_sub_field('title'); ?></h3>
      <?php the_sub_field('text'); ?>
    </div>
    <div class="text-hero-right">
      <?php if( get_sub_field('call_to_action') == 'cta' ): ?>
        <a class='text-hero__cta' href="<?php the_sub_field('button_link'); ?>">
          <span><?php the_sub_field('button_text'); ?></span>
          <i class="material-icons">keyboard_arrow_right</i>
        </a>
      <?php elseif(get_sub_field('call_to_action') == 'form' ): ?>
        <div class="text-hero__form">
          <?php
            $form_object = get_sub_field('form');
            gravity_form_enqueue_scripts($form_object['id'], true);
            gravity_form($form_object['id'], true, true, false, '', true, 1);
          ?>
        </div>
      <?php endif; ?>
    </div>

  </div>
  <!-- END .inner-wrap -->
  <?php if( get_sub_field('background') == 'color' ): ?>
    <div class='text-hero__image' style='opacity: 1;background-color: <?php the_sub_field('background_color'); ?>;'></div>
  <?php else: ?>
    <div class='text-hero__image' style='background-image: url("<?php the_sub_field('image'); ?>");'></div>
  <?php endif; ?>
</section>
<!-- END section.image-hero-text -->
