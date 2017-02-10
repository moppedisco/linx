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

											<?php // VIDEO HERO =================================// ?>
							      	<?php if( get_row_layout() == 'video_hero' ): ?>
													<section class="homepage--hero">
														<div class="inner-wrap">
															<div class="homepage--hero-text">
											        	<h1><?php the_sub_field('hero_title'); ?></h1>
																<?php the_sub_field('hero_text'); ?>
															</div>
															<!-- END .homepage-hero-text -->
														</div>
														<!-- END .inner-wrap -->
														<video class='homepage--hero-video' src="<?php the_sub_field('hero_video'); ?>" paused muted loop></video>
													</section>
													<!-- END section.homepage-hero -->

											<?php // TEXT BANNER ================================// ?>
											<?php elseif( get_row_layout() == 'text_banner' ): ?>
													<section class="homepage--text-banner">
														<div class="inner-wrap">

															<h3><?php the_sub_field('small_text'); ?></h3>
															<?php the_sub_field('large_text'); ?>

														</div>
														<!-- END .inner-wrap -->
													</section>
													<!-- END section.homepage-hero -->

												<?php // TEXT BANNER ================================// ?>
												<?php elseif( get_row_layout() == 'carousel' ): ?>
															<section class="homepage--carousel">
																<div class="inner-wrap">

																	<?php if( have_rows('carousel_item') ): ?>
																	    <?php while ( have_rows('carousel_item') ) : the_row(); ?>

																				<article class="homepage--carousel__feature <?php the_sub_field('screenshot_type');?>">

																					<div class="carousel__feature__leftcol" data-scroll-speed='2'>
																		        <h3><?php the_sub_field('title');?></h3>
																						<p><?php the_sub_field('text');?></p>
																					</div>

																					<div class="carousel__feature__rightcol">
																						<img src="<?php the_sub_field('image'); ?>" alt="" />
																					</div>

																				</article>
																	    <?php endwhile;?>
																	<?php endif; ?>

																</div>
																<!-- END .inner-wrap -->
															</section>
															<!-- END section.homepage-hero -->

														<?php // JOBS SECTION ================================// ?>
													<?php elseif( get_row_layout() == 'jobs' ): ?>
																	<section class="homepage--jobs">
																		<div class="inner-wrap">

																			<?php
																			    $job_loop = new WP_Query( array(
																			    'post_type' => 'job',
																			        'posts_per_page' => 10 // put number of posts that you'd like to display
																			    ) );
																			?>

																			<?php if ( $job_loop->have_posts() ) : ?>
																			    <?php while ( $job_loop->have_posts() ) : $job_loop->the_post(); ?>
																						<?php
																							$salary = get_post_meta($post->ID, "salary", true);
																							$location = get_post_meta($post->ID, "location", true);
																							$terms = get_the_terms( $post->ID , 'job_categories' );
																						?>
																						<div class="job-listing">
																								<div class="job-listing__image icon-role-<?php foreach ( $terms as $term ) {echo $term->slug; } ?>">

																								</div>
																								<div class="job-listing__text">
																				          <h3 class='job-listing__title'><?php the_title(); ?></h3>
																									<span class="job-listing__location"><?php echo $location['address']; ?></span>
																									<span class="job-listing__salary"><?php echo $salary; ?></span>
																									<div class="clearfix" style='clear: both;'>
																										<span class='job-listing__category'>
																											<?php
																												foreach ( $terms as $term ) {
																													echo $term->name;
																												}
																											?>
																										</span>
																										<?php the_content(); ?>
																									</div>
																								</div>

																						</div>
																			    <?php endwhile;?>
																			<?php else: ?>
																			<?php endif; ?>
																			<?php wp_reset_query(); ?>

																		</div>
																		<!-- END .inner-wrap -->
																	</section>
																	<!-- END section.homepage-hero -->
							        <?php endif; ?>


							    <?php endwhile; ?>

							<?php endif; ?>
			</main>

<?php get_footer(); ?>
