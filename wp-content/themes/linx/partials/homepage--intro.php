<?php if( get_sub_field('embed_type') != "embed" ): ?>
  <section class="homepage--video-intro showBG" style="background-image: url('<?php the_sub_field('hero_background'); ?>');">
<?php else: ?>
  <section class="homepage--video-intro hideBG" style="background-image: url('<?php the_sub_field('hero_background'); ?>');">
<?php endif; ?>
  <div class="inner-wrap">
    <div class="homepage--video-intro__text">
      <h1><?php the_sub_field('hero_title'); ?></h1>
      <?php the_sub_field('hero_text'); ?>
      <?php if( get_sub_field('embed_type') != "embed" ): ?>
        <button class="homepage--video-intro-thumbnail" type="button" name="button">
          <img width='150' src="<?php the_sub_field('video_thumbnail'); ?>" alt="">
        </button>
      <?php endif; ?>
      <?php
        // echo do_shortcode('[gravityform id=1 title=false description=false ajax=true field_values="smsMessage='.get_sub_field('sms_text_message').'"]');
      ?>
    </div>
    <!-- END .homepage-hero-text -->
  </div>
  <!-- END .inner-wrap -->
  <?php if( get_sub_field('embed_type') != "embed" ): ?>
    <video class='homepage--video-intro__video' src="<?php the_sub_field('hero_video'); ?>" paused controls></video>
  <?php else: ?>
    <video class='homepage--video-intro__video' src="<?php the_sub_field('hero_video'); ?>" autoplay muted loop></video>
  <?php endif; ?>
</section>
<!-- END section.homepage-intro -->
