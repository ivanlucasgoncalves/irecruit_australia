<?php
/**
** The template used for displaying page content */ ?>

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
