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
							<div class="blk-prices blks-count<?php echo $count; ?>">
								<div class="inside-div">
									<h3><?php echo $category; ?></h3>
									<h4><sup>$</sup><?php echo $price; ?></h4>
									<span>monthly</span>
									<?php echo $content; ?>
									<a href="javascript:void(0);" class="open-modal" id="<?php echo $category; ?>" data-value="<?php echo $category; ?>">Select</a>
								</div>
							</div>
					<?php
						$count++;
						endwhile; ?>
					<?php endif; ?>
			</div><!-- .entry-content-plans -->
			<?php

				$posts = get_field('client_testimonials');

				if( $posts ): ?>
				    <ul>
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				        <li>
				            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php	the_content(); ?>
				            <span>Custom field from $post: <?php the_field('author'); ?></span>
				        </li>
				    <?php endforeach; ?>
				    </ul>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
    </article><!-- #post-## -->

  </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
