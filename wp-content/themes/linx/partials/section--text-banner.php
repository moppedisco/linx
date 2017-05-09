<?php if( get_sub_field('background_color') ): ?>
  <?php
  $bgcolor = get_sub_field('background_color');
  $textcolor = get_sub_field('text_color');
?>
  <section class="section--text-banner hasBgColor" style='background-color:<?php echo $bgcolor; ?>; color: <?php echo $textcolor; ?>;'>
<?php else: ?>
  <section class="section--text-banner">
<?php endif; ?>
  <div class="inner-wrap">

    <h2><?php the_sub_field('small_text'); ?></h2>
    <?php the_sub_field('large_text'); ?>

  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.text-banner -->
