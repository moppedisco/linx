<?php
/*
 Template Name: Blog template
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
			<header class="header" style="background-image: url(<?php echo get_field('hero_image'); ?>);">
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
				<div class="inner-wrap">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
				</div>

			</header>
			<div id="content">

				<div id="inner-content" class="inner-wrap">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content" itemprop="articleBody">
									<?php
										// the_content();
									?>
								</section> <?php // end article section ?>

								<section class='entry-content--blogposts'>
									<?php
							        $blogpost_loop = new WP_Query( array(
							        'post_type' => 'blogpost',
							            'posts_per_page' => 10 // put number of posts that you'd like to display
							        ) );
							    ?>

							    <?php if ( $blogpost_loop->have_posts() ) : ?>
							      <?php while ( $blogpost_loop->have_posts() ) : $blogpost_loop->the_post(); ?>
							          <?php
							            // $terms = get_the_terms( $post->ID , 'blog_categories' );
							          ?>
							          <a href='<?php echo get_permalink(); ?>' class="list-view-item">
													<?php	if ( has_post_thumbnail() ): ?>
														<img class='list-view-item__image' src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="">
													<?php endif; ?>
													<div class="list-view-item__text">
														<span class="blogposts__date"><i>date_range</i> <?php the_date(); ?></span>
														<span class="blogposts__author"><i>portrait</i>	<?php the_author(); ?></span>
						                <h2><?php the_title(); ?></span></h2>

														<p>
															<?php
																$content = get_the_content();
																echo substr($content, 0, 150);
															?>
														</p>

														<button class="blogposts__readmore" href="<?php get_permalink(); ?>">Read more</button>
													</div>
							          </a>
							      <?php endwhile;?>
							    <?php endif; ?>
							    <?php wp_reset_query(); ?>
								</section>

							</article>

							<?php endwhile; endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
