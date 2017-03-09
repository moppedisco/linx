<section class="section--bullet-points">
  <div class="inner-wrap">
    <div class="bullet-points__text">
      <?php the_sub_field('text'); ?>
    </div>

    <ul class="bullet-points">
    <?php if( have_rows('points') ): ?>

        <?php while ( have_rows('points') ) : the_row(); ?>
          <li class="bullet-points__item">
            <i class='material-icons'>check</i><span><?php the_sub_field('text');?></span>
          </li>
          <!-- END .bullet-points__item -->
        <?php endwhile;?>

    <?php endif; ?>
    </ul>
    <!-- END .bullet-points -->

    <?php if( get_sub_field('button') ): ?>
      <div class="bullet-points__button">
        <a href="<?php the_sub_field('button_link'); ?>">
          <?php the_sub_field('button_text'); ?>
        </a>
        <hr>
      </div>
    <?php endif; ?>



  </div>
  <!-- END .inner-wrap -->
</section>
<!-- END section.text-3-columns -->
