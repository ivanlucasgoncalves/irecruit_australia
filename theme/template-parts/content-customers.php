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
				if($i % 4 == 0) { echo '</section><section class="lineCustomers">'; }
				$i++;
				endwhile;
				if(!empty($customers)){	echo 'hide'; } ?>
			<?php echo '</section>';
				wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		</div>
		<div class="customersContent">
			<div class="customersText">
				<p><span class="hundredPlus">100+</span><br/> BRILLIANT COMPANIES</p>
				<p class="better">are already doing something better with their time</p>
				<a href="/customers/" class="customersButton">SEE OUR CUSTOMERS</a>
			</div>
		</div>
	</div>

</section><!-- .section.customers -->
