<?php
/**
** Template Name: Customers
** The template part for displaying customers page **/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<header class="entry-header">
    		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    	</header><!-- .entry-header -->
    	<div class="entry-content">
    		<?php
    			the_content(); ?>
    	</div><!-- .entry-content -->
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
