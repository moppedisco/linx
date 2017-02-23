<section class="homepage--video-intro" style='background-image: url("<?php the_sub_field('hero_background'); ?>");'>
  <div class="inner-wrap">
    <div class="homepage--video-intro__text">
      <h1><?php the_sub_field('hero_title'); ?></h1>
      <?php the_sub_field('hero_text'); ?>
      <?php
        echo do_shortcode('[gravityform id=1 title=false description=false ajax=true field_values="smsMessage='.get_sub_field('sms_text_message').'"]');
      ?>
    </div>
    <!-- END .homepage-hero-text -->
  </div>
  <!-- END .inner-wrap -->
  <video class='homepage--video-intro__video' src="<?php the_sub_field('hero_video'); ?>" autoplay muted loop></video>
</section>
<!-- END section.homepage-intro -->
