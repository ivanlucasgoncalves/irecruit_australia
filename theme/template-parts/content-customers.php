<?php
/**
** The template used for displaying customers **/ ?>

<section class="content-customers">

	<div class="customersWrapper">
		<div class="customersContainer">
			<?php $customers = new WP_Query( array(
				'post_type' => 'our_customers',
				'posts_per_page' => 12,	)); ?>
			<?php $i=1; // Counting articles
				echo '<section class="lineCustomers">';
				while ( $customers->have_posts() ) : $customers->the_post(); ?>
				<figure class="customer">
					<?php the_post_thumbnail(); ?>
				</figure><!-- .figure.thumbnail -->
			<?php // if multiple of 4 close div and open a new div
				if($i % 4 == 0 && ( $i < 13 ) ) { echo '</section><section class="lineCustomers">'; }
				$i++;
				endwhile;
				if(!empty($customers)){	echo 'hide'; } ?>
			<?php echo '</section>';
				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		</div>
		<div class="customersContent">
			<div class="customersText">
				<?php if ( $main_title = get_field('main_title_customer', 'option') ):
					$secondary_title = get_field('secondary_title_customer', 'option'); ?>
					<h2><span class="hundredPlus"><?php echo $main_title; ?></span><span class="secondarytitle"><?php echo $secondary_title; ?></span></h2>
				<?php endif; ?>
				<?php if ( $description_customer = get_field('description_customer', 'option') ):?>
					<div class="better"><?php echo $description_customer; ?></div>
				<?php endif; ?>
				<div class="customersButton">
					<?php if ( $get_started_link = get_field('link_wp_hubspot_customer', 'option') ): ?>
						<?php echo $hubspot_cta = get_field('hubspot_cta_customer', 'option'); ?>
					<?php else: ?>
						<a href="<?php echo $page_link_from_wp = get_field('page_link_customer', 'option'); ?>" title="See our customers">See our customers</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</section><!-- .section.customers -->
