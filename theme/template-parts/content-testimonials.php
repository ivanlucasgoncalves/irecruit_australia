<?php
/**
** The template used for displaying testimonials **/ ?>

<section class="content-testimonials">

	<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
			<article>
					<figure>
						<?php the_post_thumbnail(); ?>
					</figure><!-- .figure.thumbnail -->
					<div class="blk-testimonials">
						<h3><span><?php the_title(); ?></span></h3>
						<?php	the_content(); ?>
						<div class="blk-find-out">
							<h5>Find out more about our Personality Test</h5>
							<a href="#" title="Try iRecruit for free">Try iRecruit for free</a>
						</div><!-- .link.try.irecruit -->
					</div><!-- .content.testimonials -->
			</article>
	<?php endforeach; ?>

</section><!-- .section.testimonials -->

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
