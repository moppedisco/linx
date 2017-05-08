<?php if( get_sub_field('background_color') ): ?>
  <?php
  $bgcolor = get_sub_field('background_color');
  $textcolor = get_sub_field('text_color');
?>
  <section class="section--simple-content hasBgColor" style='background-color:<?php echo $bgcolor; ?>; color: <?php echo $textcolor; ?>;'>
<?php else: ?>
  <section class="section--simple-content">
<?php endif; ?>
  <div class="inner-wrap">
    <?php if( get_sub_field('grid_size') ): ?>
      <div class="simple-content-wrap <?php the_sub_field('grid_size'); ?>">
    <?php else: ?>
      <div class="simple-content-wrap">
    <?php endif; ?>
      <?php if( have_rows('layout') ): ?>
          <?php while ( have_rows('layout') ) : the_row(); ?>

            <?php if( get_sub_field('image') ): ?>
              <article class='simple-content--image'>
                <?php $image = get_sub_field('image'); ?>
                <img src="<?php echo $image['url'] ?>" alt="">
              </article>

            <?php else: ?>
              <article class='simple-content--text'>
                <?php the_sub_field('text'); ?>
              </article>
            <?php endif; ?>

          <?php endwhile;?>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- END section.simple-content -->
