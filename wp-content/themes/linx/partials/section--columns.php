<section class="section--columns">
  <div class="inner-wrap">
    <h2><?php the_sub_field('title'); ?></h2>
    <div data-size="<?php the_sub_field('column_size'); ?>" class="columns-type-<?php the_sub_field('wrapping'); ?> columns-<?php the_sub_field('column_size'); ?>">
    <?php if( have_rows('column') ): ?>
        <?php while ( have_rows('column') ) : the_row(); ?>
          <div class="column-item ">
            <?php
              the_sub_field('text');
            ?>
          </div>
        <?php endwhile;?>
    <?php endif; ?>
    </div>
  </div>
</section>
<!-- END section.section__columns -->
