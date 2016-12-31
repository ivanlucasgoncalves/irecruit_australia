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
										<a href="javascript:void(0);" class="open-modal" id="<?php echo $category; ?>" data-value="<?php echo $category; ?>">Select</a>
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
										<a href="javascript:void(0);" class="open-modal" id="<?php echo $category; ?>" data-value="<?php echo $category; ?>">Select</a>
									</div>
								</div>
							<?php endif; ?>
					<?php
						$count++;
						endwhile; ?>
					<?php endif; ?>
			</div><!-- .entry-content-plans -->
			<?php	$posts = get_field('client_testimonials');
				if( $posts ): ?>
				<?php // Include the page content testimonials.
				get_template_part( 'template-parts/content', 'testimonials' ); ?>
			<?php endif; ?><!-- .entry-testimonials -->
    </article><!-- #post-## -->

  </main><!-- .site-main -->
</div><!-- .content-area -->
<section class="blueVideo">
	<div class="back-video"></div>
	<div class="iconsContainer">
		<div class="feature">
			<div class="icon skills"></div>
			<div class="textFeature">
				<p>SKILLS AND EXPERIENCE</p>
			</div>
		</div>
		<div class="plus">+</div>
		<div class="feature">
			<div class="icon personality"></div>
			<div class="textFeature">
				<p>PERSONALITY PROFILING</p>
			</div>
		</div>
		<div class="plus">+</div>
		<div class="feature">
			<div class="icon ranked"></div>
			<div class="textFeature">
				<p>RANKED & SORTED</p>
			</div>
		</div>
	</div>
	<div class="videoText">
		<p class="weAreIrecruit">WE ARE IRECRUIT</p>
		<div class="playBtn"></div>
		<p class="theEngine">The most powerful Candidate Ranking Engine ever created.</p>
	</div>
</section>
<?php get_footer(); ?>
