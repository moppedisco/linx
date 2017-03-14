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
