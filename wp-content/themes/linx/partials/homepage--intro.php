<?php if( get_sub_field('embed_type') != "embed" ): ?>
  <section class="section--video-hero showBG">
<?php else: ?>
  <section class="section--video-hero hideBG">
<?php endif; ?>
  <div class="inner-wrap">
    <div class="video-hero-text">
      <h1><?php the_sub_field('hero_title'); ?></h1>
      <?php the_sub_field('hero_text'); ?>
      <?php if( get_sub_field('embed_type') != "embed" ): ?>
        <button class="video-hero__button" type="button" name="button">

          <span><?php the_sub_field('play_button_text'); ?></span>
          <i class="icon">play_circle_outline</i>
        </button>
      <?php endif; ?>
      <?php if( get_sub_field('add_form')): ?>
        <?php
            $form_object = get_sub_field('form');
            echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
        ?>
      <?php endif; ?>
      <?php
        // echo do_shortcode('[gravityform id=1 title=false description=false ajax=true field_values="smsMessage='.get_sub_field('sms_text_message').'"]');
      ?>
    </div>
    <!-- END .section-hero-->
  </div>
  <!-- END .inner-wrap -->
  <?php if( get_sub_field('embed_type') != "embed" ): ?>
    <video class='video-hero__video' src="<?php the_sub_field('hero_video'); ?>" paused controls></video>
  <?php else: ?>
    <video class='video-hero__video' src="<?php the_sub_field('hero_video'); ?>" autoplay muted loop></video>
  <?php endif; ?>
  <div class="video-hero__bg" style="background-image: url('<?php the_sub_field('hero_background'); ?>');"></div>
</section>
<!-- END section.homepage-intro -->
