<section class="section--text-3-columns">
  <div class="inner-wrap">

    <h2><?php the_sub_field('title'); ?></h2>

      <?php if( have_rows('points') ): ?>
        <div class="text-column">
          <?php while ( have_rows('points') ) : the_row(); ?>

            <article class="text-column__item">

                <i class='material-icons'><?php the_sub_field('image');?></i>
                <h3><?php the_sub_field('title');?></h3>
                <p><?php the_sub_field('text');?></p>


            </article>

          <?php endwhile;?>
          </div>

          <?php if( get_sub_field('button') ): ?>
            <a class='text-column__button' href="<?php the_sub_field('button_link'); ?>">
              <?php the_sub_field('button_text'); ?>
            </a>
          <?php endif; ?>

      <?php endif; ?>



  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.homepage__text-3-columns -->
