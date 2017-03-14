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
			<header class="header">
				<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
				<span class="blog-item__date"><i>date_range</i><?php the_date(); ?></span>
			</header>
			<div id="content">

				<div id="inner-content" class="inner-wrap">

						<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<?php if(has_post_thumbnail() ): ?>
										<div class="article-header__images">
											<?php the_post_thumbnail( 'large' ); ?>
										</div>
									<?php endif; ?>

									<span class="blog-item__author"><i>portrait</i><?php the_author(); ?></span>

								</header> <?php // end article header ?>

								<section class="entry-content" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

							</article>

							<?php endwhile; endif; ?>

						</main>

				</div>

			</div>
			<?php if(get_field( "add_footer_cta" )): ?>
				<?php get_template_part( 'partials/footer--cta-hero' ); ?>
			<?php endif; ?>
<?php get_footer(); ?>
