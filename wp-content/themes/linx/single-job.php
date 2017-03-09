<?php
/*
 * SINGLE JOB TEMPLATE
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
			<header class="header">
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

									<?php
										$expireDate = get_post_meta( get_the_ID(), 'pw_spe_expiration', true );
										$today = date('Y-m-d');
										$hourly_rate = get_post_meta(get_the_ID(), "hourly_rate", true);
										$number_of_shifts = get_post_meta(get_the_ID(), "number_of_shifts", true);
										$location = get_post_meta(get_the_ID(), "location", true);
										$openpositions = get_post_meta(get_the_ID(), "open_positions", true);
										$terms = get_the_terms( get_the_ID() , 'job_categories' );
									?>

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
									<div class="article-header-meta">
										<div class="job-listing__role">
											<i class='icon-role-<?php foreach ( $terms as $term ) {echo $term->slug; } ?>'></i>
											<span class="job-listing__category"><?php foreach ( $terms as $term ) {echo $term->slug; } ?></span>
										</div>
										<span class="job-listing__location"><i class="material-icons">location_on</i><?php echo $location['address']; ?></span>
										<span class="job-listing__shifts"><i class="material-icons">timelapse</i> <?php echo $number_of_shifts; ?></span>
										<span class="job-listing__salary"><?php echo $hourly_rate; ?></span>
									</div>
								</header> <?php // end article header ?>

								<section class="entry-content" itemprop="articleBody">
									<div class="article-expire__date">
										<?php if($expireDate < $today && $expireDate): ?>
											<?php echo do_shortcode( '[expires expired="This job expired on: %s"]' ); ?>
										<?php endif; ?>
									</div>
									<?php the_content(); ?>
									<div class="article-expire__date">
										<?php if($expireDate > $today): ?>
											<?php echo do_shortcode( '[expires expires_on="Last application date: %s"]' ); ?>
										<?php elseif($expireDate < $today && $expireDate): ?>
											<?php echo do_shortcode( '[expires expired="This job expired on: %s"]' ); ?>
										<?php endif; ?>
									</div>
								</section> <?php // end article section ?>

							</article>

							<?php endwhile; endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
