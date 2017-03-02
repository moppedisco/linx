<section class="section--simple-content">
  <div class="inner-wrap">
    <div class="simple-content-wrap">
      <?php if( have_rows('layout') ): ?>
          <?php while ( have_rows('layout') ) : the_row(); ?>

            <?php if( get_sub_field('image') ): ?>
              <article class='simple-content--image'>
                <?php $image = get_sub_field('image'); ?>
                <img src="<?php echo $image['url'] ?>" alt="">
              </article>

            <?php else: ?>
              <article class='simple-content--text'>
                <?php the_sub_field('text');?>
              </article>
            <?php endif; ?>

          <?php endwhile;?>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- END section.simple-content -->
