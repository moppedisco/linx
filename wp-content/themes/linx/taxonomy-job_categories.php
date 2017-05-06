<?php
/*
 * CUSTOM POST TYPE TAXONOMY TEMPLATE
 *
 * This is the custom post type taxonomy template. If you edit the custom taxonomy name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom taxonomy is called "register_taxonomy('shoes')",
 * then your template name should be taxonomy-shoes.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates#Displaying_Custom_Taxonomies
*/
?>

<?php get_header(); ?>
		<header class="header">
				<h1 class="page-title" itemprop="headline"><?php single_cat_title(); ?></h1>
		</header>
			<div id="content">

				<div id="inner-content" class="inner-wrap">

						<?php get_sidebar(); ?>

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">


									<?php
										$hourly_rate = get_post_meta($post->ID, "hourly_rate", true);
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
												<span class="job-item-meta__date"><i class="material-icons">date_range</i><?php the_date(); ?></span>
												<?php if($location): ?>
													<span class="job-item-meta__location"><i class="material-icons">location_on</i><?php echo $location; ?></span>
												<?php endif; ?>
												<?php if($number_of_shifts): ?>
													<span class="job-item-meta__shifts"><i class="material-icons">timelapse</i><?php echo $number_of_shifts; ?></span>
												<?php endif; ?>
											</div>
											<h2 class='job-item__title'><?php the_title(); ?>  <?php if($employerDisplayName): ?><span><?php echo $employerDisplayName; ?></span><?php endif; ?></h2>
											<div class="job-item__text--bottom">
												<span class="job-item__salary"><?php echo $hourly_rate; ?></span>
												<?php if($employerID): ?>
													<span class='job-item__employer'>
														<?php echo get_the_title( $employerID ); ?>
													</span>
												<?php endif; ?>
											</div>

										</div>
									</a>


							</article>

							<?php endwhile; ?>

								<!-- <?php bones_page_navi(); ?> -->

							<?php endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
