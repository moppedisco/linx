<?php
/*
 Template Name: Blank template
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<main id="content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if( have_rows('homepage_section') ): ?>
				    <?php while ( have_rows('homepage_section') ) : the_row(); ?>
							<?php if( get_row_layout() == 'video_hero' ): ?>

								<?php get_template_part( 'partials/homepage--intro' ); ?>

							<?php elseif( get_row_layout() == 'text_banner' ): ?>

								<?php get_template_part( 'partials/section--text-banner' ); ?>

							<?php elseif( get_row_layout() == 'carousel' ): ?>

								<?php get_template_part( 'partials/section--carousel' ); ?>

							<?php elseif( get_row_layout() == 'jobs' ): ?>

								<?php get_template_part( 'partials/section--jobs' ); ?>

							<?php elseif( get_row_layout() == 'employers' ): ?>

								<?php get_template_part( 'partials/section--employers' ); ?>

							<?php elseif( get_row_layout() == 'image_hero_w_text' ): ?>

								<?php get_template_part( 'partials/section--image-hero-text' ); ?>

							<?php elseif( get_row_layout() == 'text_w_3_column_points' ): ?>

								<?php get_template_part( 'partials/section--text-3-columns' ); ?>

							<?php elseif( get_row_layout() == 'feature_text_w_image' ): ?>

								<?php get_template_part( 'partials/section--feature-row' ); ?>

							<?php elseif( get_row_layout() == 'simple_content_box' ): ?>

								<?php get_template_part( 'partials/section--simple-content' ); ?>

							<?php elseif( get_row_layout() == 'bullet_points' ): ?>

								<?php get_template_part( 'partials/section--bullet-points' ); ?>

							<?php elseif( get_row_layout() == 'cta_section' ): ?>

								<?php get_template_part( 'partials/section--cta-hero' ); ?>

							<?php elseif( get_row_layout() == 'columns' ): ?>

								<?php get_template_part( 'partials/section--columns' ); ?>

						<?php endif; ?>
				    <?php endwhile; ?>

				<?php endif; ?>
</main>

<?php get_footer(); ?>
