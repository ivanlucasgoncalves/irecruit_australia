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
    </article><!-- #post-## -->
		<div class="customers-wrapper">
			<div class="entry-customers">
				<div class="rotate-line-internal"></div><!--. line into content page .-->
				<figure>
					<?php the_post_thumbnail(); ?>
				</figure><!-- .figure.thumbnail -->
				<div class="blk-customers">
					<h3><span><?php the_field('title_customer_testimonial'); ?></span></h3>
					<?php	the_field('content_customer_testimonial'); ?>
				</div><!-- .content.testimonials -->
			</div><!--. content.customers.page .-->
			<div class="customers-container">
				<?php $customers = new WP_Query( array(
					'post_type' => 'our_customers',
					'posts_per_page' => 12,	)); ?>
				<?php $i=1; // Counting articles
					echo '<section class="line-customers">';
					while ( $customers->have_posts() ) : $customers->the_post(); ?>
					<figure class="customer">
						<?php the_post_thumbnail(); ?>
					</figure><!-- .figure.thumbnail -->
				<?php // if multiple of 4 close div and open a new div
					if($i % 4 == 0) { echo '</section><section class="line-customers">'; }
					$i++;
					endwhile;
					if(!empty($customers)){	echo 'hide'; } ?>
				<?php echo '</section>';
					wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			</div>
		</div><!-- .section.customers.logos -->
		<?php	$posts = get_field('client_testimonials');
			if( $posts ): ?>
			<?php // Include the page content testimonials.
			get_template_part( 'template-parts/content', 'testimonials' ); ?>
		<?php endif; ?><!-- .entry-testimonials -->
  </main><!-- .site-main -->
</div><!-- .content-area -->

<?php // Include the content video template.
get_template_part( 'template-parts/content', 'video' ); ?>

<?php get_footer(); ?>
