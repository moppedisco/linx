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
				<?php get_sidebar(); ?>
		</header>
			<div id="content">

				<div id="inner-content" class="inner-wrap">



						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<section class='entry-content--blogposts'>

									<div class="list--blog-item">
										<a href='<?php echo get_permalink(); ?>'>
											<?php	if ( has_post_thumbnail() ): ?>
												<div class='blog-item__image' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
											<?php endif; ?>
											<div class="blog-item__text">
												<span class="blog-item__date"><i>date_range</i> <?php the_date(); ?></span>
												<h2><?php the_title(); ?></span></h2>

												<p>
													<?php
														$content = get_the_content();
														echo substr($content, 0, 150);
													?>
												</p>
											</div>
										</a>
									</div>

								</section>

							</article>

							<?php endwhile; ?>


							<?php endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
