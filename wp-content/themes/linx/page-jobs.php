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
			<header class="header">
					<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			</header>
			<div id="content">

				<div id="inner-content" class="inner-wrap">

						<?php get_sidebar(); ?>

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class='entry-content--jobs'>
									<?php
											// $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
							        $job_loop = new WP_Query( array(
							        	'post_type' => 'job',
							          'posts_per_page' => 10, // put number of posts that you'd like to display
												// 'paged' => $paged
							        ) );
							    ?>

							    <?php if ( $job_loop->have_posts() ) : while ( $job_loop->have_posts() ) : $job_loop->the_post(); ?>

							          <?php
							            $hourly_rate = get_post_meta($post->ID, "hourly_rate", true);
													$currency = get_post_meta($post->ID, "currency", true);
													$number_of_shifts = get_post_meta($post->ID, "number_of_shifts", true);
							            $location = get_post_meta($post->ID, "location_display_name", true);
							            $openpositions = get_post_meta($post->ID, "open_positions", true);
							            $terms = get_the_terms( $post->ID , 'job_categories' );
													$employerID = get_post_meta($post->ID, "employer", true);
													$employerDisplayName = get_post_meta($post->ID, "employer_display_name", true);
							          ?>
							          <a href='<?php echo get_permalink(); ?>' class="list--job-item">
							            <div class="job-item__image">
														<?php foreach ( $terms as $term ): ?>
							                <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" />
							              <?php endforeach; ?>
														<?php if( $openpositions ): ?>
							                <span class="job-item__open-positions"><?php echo $openpositions ?></span>
							              <?php endif; ?>
							            </div>
							            <div class="job-item__text">
														<div class="job-item__text--top">
															<span class="job-item-meta__date"><i class="material-icons">date_range</i><?php echo get_the_date(); ?></span>
															<?php if($location): ?>
																<span class="job-item-meta__location"><i class="material-icons">location_on</i><?php echo $location; ?></span>
															<?php endif; ?>
															<?php if($number_of_shifts): ?>
																<span class="job-item-meta__shifts"><i class="material-icons">timelapse</i><?php echo $number_of_shifts; ?> <?php pll_e('Shifts'); ?></span>
															<?php endif; ?>
														</div>
														<h2 class='job-item__title'><?php the_title(); ?>  <?php if($employerDisplayName): ?><span><?php echo $employerDisplayName; ?></span><?php endif; ?></h2>
														<div class="job-item__text--bottom">
															<span class="job-item__salary"><?php echo $hourly_rate; ?> <?php echo $currency; ?> / <?php pll_e('Hour'); ?></span>
															<?php if($employerID): ?>
																<span class='job-item__employer'>
																	<?php echo get_the_title( $employerID ); ?>
																</span>
															<?php endif; ?>
							              </div>

							            </div>
							          </a>
							      <?php endwhile;?>

										<!-- <?php if ($job_loop->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
										  <nav class="prev-next-posts">
										    <div class="prev-posts-link">
										      <?php echo get_next_posts_link( 'Older Entries', $job_loop->max_num_pages ); // display older posts link ?>
										    </div>
										    <div class="next-posts-link">
										      <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
										    </div>
										  </nav>
										<?php } ?> -->

							    <?php endif; ?>
							    <?php wp_reset_query(); ?>
								</section>

							</article>


						</main>

				</div>

			</div>

<?php get_footer(); ?>
