<section class="section--text-hero">

  <div class="inner-wrap">
    <h3><?php the_sub_field('title'); ?></h3>
    <?php the_sub_field('text'); ?>
    <?php if( get_sub_field('call_to_action_button') ): ?>
      <a class='text-hero__cta' href="<?php the_sub_field('button_link'); ?>">
        <span><?php the_sub_field('button_text'); ?></span>
        <i class="material-icons">keyboard_arrow_right</i>
      </a>
    <?php endif; ?>

    <?php if( get_sub_field('add_form') ): ?>
      <div class="text-hero__form">
        <?php
          $form_object = get_sub_field('form');
          gravity_form_enqueue_scripts($form_object['id'], true);
          gravity_form($form_object['id'], true, true, false, '', true, 1);
        ?>
      </div>
    <?php endif; ?>

  </div>
  <!-- END .inner-wrap -->
  <div class='text-hero__image' style='background-image: url("<?php the_sub_field('image'); ?>");'></div>
</section>
<!-- END section.image-hero-text -->
