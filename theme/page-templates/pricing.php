<?php
/**
** Template Name: Pricing
** The template part for displaying pricing page **/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="rotate-line-internal"></div>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<header class="entry-header">
    		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    	</header><!-- .entry-header -->
    	<div class="entry-content">
    		<?php
    			the_content(); ?>
    	</div><!-- .entry-content -->
			<div class="content-plans">
					<?php if( have_rows('plans') ):
						$count = 0; ?>
						<?php	while ( have_rows('plans') ) : the_row();
							$category = get_sub_field('category');
							$price = get_sub_field('price');
							$content = get_sub_field('content'); ?>
							<?php if( get_sub_field('recommended') ): ?><!-- .entry-recommended-if-yes -->
								<div class="blk-plan recommended">
									<div class="inside-div">
										<div class="blk_title_recommend">
											<span>Recommended</span>
											<h3><?php echo $category; ?></h3>
										</div>
										<div class="blk-price">
											<h4><sup>$</sup><?php echo $price; ?></h4>
											<span>monthly</span>
										</div>
										<?php echo $content; ?>
										<a href="javascript:void(0);" class="starttrial-link" id="<?php echo $category; ?>" data-value="<?php echo $category; ?>">Select</a>
									</div>
								</div>
							<?php else: ?><!-- .entry-if-no-recommended -->
								<div class="blk-plan blks-count<?php echo $count; ?>">
									<div class="inside-div">
										<h3><?php echo $category; ?></h3>
										<div class="blk-price">
											<h4><sup>$</sup><?php echo $price; ?></h4>
											<span>monthly</span>
										</div>
										<?php echo $content; ?>
										<a href="javascript:void(0);" class="starttrial-link" id="<?php echo $category; ?>" data-value="<?php echo $category; ?>">Select</a>
									</div>
								</div>
							<?php endif; ?>
					<?php
						$count++;
						endwhile; ?>
					<?php endif; ?>
			</div><!-- .entry-content-plans -->
			<div class="phrase-pricing">
				<h3>Start your 14 day free trial now, no credit card or downloads required.</h3>
				<a href="javascript:void(0);" class="starttrial-link" title="Try iRecruit for free">Try iRecruit for free</a>
			</div>
    </article><!-- #post-## -->
		<?php	$posts = get_field('client_testimonials');
			if( $posts ): ?>
			<?php // Include the page content testimonials.
			get_template_part( 'template-parts/content', 'testimonials' ); ?>
		<?php endif; ?><!-- .entry-testimonials -->
  </main><!-- .site-main -->
</div><!-- .content-area -->

<?php // Include the content video template.
get_template_part( 'template-parts/content', 'video' ); ?>

<?php // Include the content customers template.
get_template_part( 'template-parts/content', 'customers' ); ?>

<?php get_footer(); ?>
