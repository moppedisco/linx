<section class="section--text-image">
    <?php if( have_rows('feature') ): ?>
        <?php while ( have_rows('feature') ) : the_row(); ?>
          <?php $image = get_sub_field('image'); ?>
          <article class='text-image-row <?php echo ($image['width'] > $image['height'] ? "text-image-row--landscape" : "text-image-row--portrait"); ?>'>
            <div class='text-image--text'>
              <h2><?php the_sub_field('title');?></h2>
              <p><?php the_sub_field('text');?></p>
            </div>

            <div class='text-image--image'>
              <div class="image-box" style='background-image: url("<?php echo $image['url']; ?>");'>

              </div>
            </div>
          </article>
        <?php endwhile;?>
    <?php endif; ?>


</section>
<!-- END section.text-image-row -->
