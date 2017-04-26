<?php if( get_sub_field('call_to_action') && get_sub_field('call_to_action') != 'disabled' ): ?>
  <section class="section--text-hero">
    <?php echo get_sub_field('call_to_action'); ?>
<?php else: ?>
  <section class="section--text-hero noCTA">
<?php endif; ?>
  <div class="inner-wrap">
    <div class="text-hero-left">
      <?php if($i == 1): ?>
        <h1 class='text-hero__title'><?php the_sub_field('title'); ?></h1>
      <?php else: ?>
        <h3 class='text-hero__title'><?php the_sub_field('title'); ?></h3>
      <?php endif; ?>
      <?php the_sub_field('text'); ?>
    </div>
    <?php if( get_sub_field('call_to_action') && get_sub_field('call_to_action') != 'disabled' ): ?>
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
    <?php endif; ?>

  </div>
  <!-- END .inner-wrap -->
  <?php if( get_sub_field('background') == 'color' ): ?>
    <div class='text-hero__image' style='opacity: 1;background-color: <?php the_sub_field('background_color'); ?>;'></div>
  <?php else: ?>
    <div class='text-hero__image' style='background-image: url("<?php the_sub_field('image'); ?>");'></div>
  <?php endif; ?>
</section>
<!-- END section.image-hero-text -->
