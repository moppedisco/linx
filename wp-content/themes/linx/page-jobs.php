<?php
/*
 Template Name: Jobs template
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

								<section class='entry-content--jobs'>
									<?php
							        $job_loop = new WP_Query( array(
							        'post_type' => 'job',
							            'posts_per_page' => 10 // put number of posts that you'd like to display
							        ) );
							    ?>

							    <?php if ( $job_loop->have_posts() ) : ?>
							      <?php while ( $job_loop->have_posts() ) : $job_loop->the_post(); ?>

							          <?php
							            $hourly_rate = get_post_meta($post->ID, "hourly_rate", true);
													$number_of_shifts = get_post_meta($post->ID, "number_of_shifts", true);
							            $location = get_post_meta($post->ID, "location", true);
							            $openpositions = get_post_meta($post->ID, "open_positions", true);
							            $terms = get_the_terms( $post->ID , 'job_categories' );
													$employerID = get_post_meta($post->ID, "employer", true);
							          ?>
							          <a href='<?php echo get_permalink(); ?>' class="list-view-item">
							            <div class="job-listing__image icon-role-<?php foreach ( $terms as $term ) {echo $term->slug; } ?>">
														<?php if( $openpositions ): ?>
							                <span class="job-listing__open-positions"><?php echo $openpositions ?></span>
							              <?php endif; ?>
							            </div>
							            <div class="job-listing__text">
														<div class="clearfix">
															<span class="job-listing__location"><i class="material-icons">location_on</i><?php echo $location['address']; ?></span>
															<span class="job-listing__shifts"><i class="material-icons">timelapse</i> <?php echo $number_of_shifts; ?></span>
															<span class="job-listing__salary"><?php echo $hourly_rate; ?></span>
														</div>
						                <h2 class='job-listing__title'><?php the_title(); ?></span></h2>

							              <div class="clearfix" style='clear: both;'>
							                <span class='job-listing__category'>
							                  <?php
							                    foreach ( $terms as $term ) {
							                      echo $term->name;
							                    }
							                  ?>
							                </span>
															<?php if($employerID): ?>
																<span class='job-listing__employer'>
																	<?php echo get_the_title( $employerID ); ?>
																</span>
															<?php endif; ?>

							              </div>
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
