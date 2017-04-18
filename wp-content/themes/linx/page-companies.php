<?php
/*
 Template Name: Companies template
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

				<div class="inner-wrap">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
				</div>

			</header>
			<div id="content">

				<div id="inner-content" class="inner-wrap">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class='entry-content--employers'>
									<?php
							        $blogpost_loop = new WP_Query( array(
							        'post_type' => 'employer',
							            'posts_per_page' => 10 // put number of posts that you'd like to display
							        ) );
							    ?>

							    <?php if ( $blogpost_loop->have_posts() ) : ?>
							      <?php while ( $blogpost_loop->have_posts() ) : $blogpost_loop->the_post(); ?>
							          <?php
							            // $terms = get_the_terms( $post->ID , 'blog_categories' );
													$logo = get_post_meta($post->ID, "logo", true);
							          ?>
												<div class="list--employer-item">
								          <a>
														<?php	if ( has_post_thumbnail() ): ?>
															<div class='employer-item__image' style='background-image: url(<?php the_post_thumbnail_url('large'); ?>);'></div>
														<?php else: ?>
															<div class='employer-item__image'>
																<?php echo wp_get_attachment_image($logo); ?>
															</div>
														<?php endif; ?>
														<div class="employer-item__text">
							                <h2><?php the_title(); ?></span></h2>
															<?php if($content): ?>
															<p>
																<?php
																	$content = get_the_content();
																	echo substr($content, 0, 150);
																?>
															</p>
														<?php endif; ?>
														</div>
								          </a>
												</div>
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
