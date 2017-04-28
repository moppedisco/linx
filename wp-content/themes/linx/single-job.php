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

<?php
	$expireDate = get_post_meta( get_the_ID(), 'pw_spe_expiration', true );
	$today = date('Y-m-d');
	$hourly_rate = get_post_meta(get_the_ID(), "hourly_rate", true);
	$currency = get_post_meta(get_the_ID(), "currency", true);
	$number_of_shifts = get_post_meta(get_the_ID(), "number_of_shifts", true);
	$location = get_post_meta(get_the_ID(), "location_display_name", true);
	$openpositions = get_post_meta(get_the_ID(), "open_positions", true);
	$terms = get_the_terms( get_the_ID() , 'job_categories' );
?>

<?php get_header(); ?>
<header class="header">
	<div class="job-article__header">
		<span class="job-item-meta__date"><i class="material-icons">date_range</i><?php the_date(); ?></span>
		<div class="job-item-meta__role">
			<?php foreach ( $terms as $term ): ?>
				<img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" />
				<span class="job-item-meta__category"><?php echo $term->slug; ?></span>
			<?php endforeach; ?>

		</div>
		<?php if($location): ?>
			<span class="job-item-meta__location"><i class="material-icons">location_on</i><?php echo $location; ?></span>
		<?php endif; ?>
		<?php if($number_of_shifts): ?>
			<span class="job-item-meta__shifts"><i class="material-icons">timelapse</i><?php echo $number_of_shifts; ?> <?php pll_e('Shifts'); ?></span>
		<?php endif; ?>
	</div>

	<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
	<span class="job-item__salary"><?php echo $hourly_rate; ?> <?php echo $currency; ?> / <?php pll_e('Hour'); ?></span>
</header>
<div id="content">
	<div id="inner-content" class="inner-wrap">

			<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<section class="entry-content" itemprop="articleBody">
						<div class="job-item__expires">
							<?php if($expireDate < $today && $expireDate): ?>
								<?php echo do_shortcode( '[expires expired="This job expired on: %s"]' ); ?>
							<?php endif; ?>
						</div>
						<?php the_content(); ?>
						<div class="job-item__expires">
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
<?php if(get_field( "include_cta" )): ?>
	<?php if( get_field('add_footer_cta_to_post', 'option') ): ?>
		<?php get_template_part( 'partials/footer--cta-hero' ); ?>
	<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>
