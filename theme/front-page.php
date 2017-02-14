<?php
/**
** The main template file **/
get_header(); ?>

	<section id="slider">

		<div class="center_mainslider">
			<div class="wrapper">
		      <?php $slideshow = new WP_Query( array(
		        'post_type' => 'slideshow'	)); ?>
		      <?php while ( $slideshow->have_posts() ) : $slideshow->the_post();
						/// Get the url from thumbnail
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
						$thumb_url = $thumb_url_array[0]; ?>
						<div class="item">
							<div class="blur" style="background-image:url(<?php echo $thumb_url ?>)"></div>
							<div class="data">
								<h3>Talent<span>rank<sup>tm</sup></span></h3>
								<h2><?php echo the_field( 'title', false, false ); ?></h2>
								<?php echo the_field( 'content' ); ?>
							</div>
							<?php if( get_field('select_slideshow') ): ?>
								<div class="link-hubspot"><?php echo the_field( 'hubspot_cta' ); ?></div>
							<?php else: ?><!-- .if-no-hubspot-cta -->
									<a href="<?php echo the_field( 'page_link' ); ?>" title="<?php the_title(); ?>">link</a>
							<?php endif; ?><!-- .if.there.is.page.link.or.hubspot.cta -->
						</div>
		      <?php endwhile;
					wp_reset_query(); ?>
			</div>
			<ul class="bullets"></ul><!-- .bullets.slider -->
			<div class="lines-left"></div><!-- .square.lines.slider.left -->
			<div class="lines-right"></div><!-- .square.lines.slider.right -->
			<div class="arrow"></div><!-- .arrow.slider.middle -->
		</div>
		<div class="rotate-line"></div><!-- .line.rotate.bottom.slider -->
		<!--<svg viewBox=" 0 0 100 100" class="rotate-line">
			<polygon points="100 97,0 94,100 98" />
		</svg> .line.rotate.bottom.slider -->

	</section><!-- .section.slider -->

	<?php // Include the content drag and drop.
	get_template_part( 'template-parts/content', 'drag_drop' ); ?>

	<?php // Include the content video template.
	get_template_part( 'template-parts/content', 'phone' ); ?>

	<?php // Include the content video template.
	get_template_part( 'template-parts/content', 'video' ); ?>

	<?php // Include the content customers template.
	get_template_part( 'template-parts/content', 'customers' ); ?>

<?php get_footer(); ?>
