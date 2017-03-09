<?php
/*
 * BLOGPOST TEMPLATE
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
			<header class="header <?php	if ( has_post_thumbnail() ) { echo 'header--hasImage';	} ?>" style='background-image: url("<?php	if ( has_post_thumbnail() ) {	the_post_thumbnail_url('full');	} ?>")'>

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
			</header>
			<div id="content">

				<div id="inner-content" class="inner-wrap">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">



								<header class="article-header">
									<span class="blogposts__date"><i>date_range</i> <?php the_date(); ?></span>
									<span class="blogposts__author"><i>portrait</i>	<?php the_author(); ?></span>
									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

								<section class="entry-content" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

							</article>

							<?php endwhile; endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
