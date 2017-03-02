<?php
/*
 * LANDINGPAGE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

<main id="content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<nav class='menu-main-nav' role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu(array(
					 'container' => false,                           // remove nav container
					 'theme_location' => 'main-nav',                 // where it's located in the theme
					 'menu_class' => '',
					 'menu_id' => 'homepage-here-navigation',
					 'before' => '',                                 // before the menu
					 'after' => '',                                  // after the menu
					 'link_before' => '',                            // before each link
					 'link_after' => '<i class="material-icons"></i>',                             // after each link
					 'depth' => 0,                                   // limit the depth of the nav
					 'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>

			</nav>

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

								<?php elseif( get_row_layout() == 'image_hero_w_text' ): ?>

									<?php get_template_part( 'partials/section--image-hero-text' ); ?>

								<?php elseif( get_row_layout() == 'text_w_3_column_points' ): ?>

									<?php get_template_part( 'partials/section--text-3-columns' ); ?>

								<?php elseif( get_row_layout() == 'simple_content_box' ): ?>

									<?php get_template_part( 'partials/section--simple-content' ); ?>

							<?php endif; ?>
						<?php endwhile; ?>

				<?php endif; ?>
</main>


<?php get_footer(); ?>
