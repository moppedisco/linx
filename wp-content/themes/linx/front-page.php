<?php
/*
 Template Name: Frontpage
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

<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div id="inner-header" class="inner-wrap">

		<nav class='header-links' role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php wp_nav_menu(array(
					 'container' => false,								// remove nav container
					 'theme_location' => 'header-links',
					 'link_after' => '<i class="material-icons"></i>'
			)); ?>
		</nav>

	</div>

</header>

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

								<?php elseif( get_row_layout() == 'feature_text_w_image' ): ?>

									<?php get_template_part( 'partials/section--feature-row' ); ?>

								<?php elseif( get_row_layout() == 'simple_content_box' ): ?>

									<?php get_template_part( 'partials/section--simple-content' ); ?>
									

			        <?php endif; ?>
				    <?php endwhile; ?>

				<?php endif; ?>
</main>

<?php get_footer(); ?>
