<?php
/**
** The template used for displaying phone home page section **/ ?>

<section class="phone-section">

	<div class="line-top"></div>
	<!--<svg viewBox=" 0 0 100 100" class="line-top">
		<polygon points="100 98,0 88,100 94" />
	</svg>--> <!-- .line.rotate.top -->
	<div class="back-phone"></div>
	<div class="center_maincontent">
		<div class="phone-menu-container">
			<?php if ( $title_behavioural = get_field('title_behavioural', 'option') ): ?>
				<h2><?php echo $title_behavioural; ?></h2>
			<?php endif; ?>
			<?php if ( $content_behavioural = get_field('content_behavioural', 'option') ): ?>
				<?php echo $content_behavioural; ?>
			<?php endif; ?>
			<h3>Explore:</h3>
			<?php if( have_rows('explore_options', 'option') ):
				$count = 0; ?>
				<nav>
					<ul class="phonelinks">
				<?php	while ( have_rows('explore_options', 'option') ) : the_row();
					$title_explore_option = get_sub_field('title_explore_option'); ?>
						<li data-target="<?php echo strtolower(str_replace(' ', '', $title_explore_option));?>"><a href="javascript:void(0)" title="<?php echo $title_explore_option; ?>"><span><?php echo $title_explore_option; ?></span></a></li>
				<?php
				$count++;
				endwhile; ?>
					</ul>
				</nav>
			<?php endif; ?>
		</div>
		<div class="iphone-container">
			<div class="marvel-device iphone6plus black">
					<div class="top-bar"></div>
					<div class="sleep"></div>
					<div class="volume"></div>
					<div class="camera"></div>
					<div class="sensor"></div>
					<div class="speaker"></div>
					<div class="screen">
							<!-- Content goes here -->
							<?php if( have_rows('explore_options', 'option') ):
								$count = 1; ?>
								<div id="phonessel">
									<div class="wrapper_phone">
								<?php	while ( have_rows('explore_options', 'option') ) : the_row();
									$title_explore_option = get_sub_field('title_explore_option');
									$image_explore_option = get_sub_field('image_explore_option'); ?>
										<div class="item number_<?php echo $count; ?>" id="<?php echo strtolower(str_replace(' ', '', $title_explore_option));?>"><img src="<?php echo $image_explore_option; ?>" height="415px"></div>
								<?php
								$count++;
								endwhile; ?>
									</div>
								</div>
							<?php endif; ?>
					</div>
					<div class="home"></div>
					<div class="bottom-bar"></div>
			</div>
			<?php if( have_rows('explore_options', 'option') ):
				$count = 1; ?>
				<?php	while ( have_rows('explore_options', 'option') ) : the_row();
					$title_explore_option = get_sub_field('title_explore_option'); ?>
					<?php if( have_rows('description_flag', 'option') ): ?>
						<?php	while ( have_rows('description_flag', 'option') ) : the_row();
							$title_flag = get_sub_field('title_flag');
							$content_flag = get_sub_field('content_flag'); ?>
							<div class="description <?php echo strtolower(str_replace(' ', '', $title_explore_option));?>">
								<div class="flag-dir"></div>
								<h3><?php echo $title_flag; ?></h3>
								<?php echo $content_flag; ?>
							</div>
						<?php	endwhile; ?>
					<?php endif; ?>
				<?php
				$count++;
				endwhile; ?>
			<?php endif; ?>
		</div><!-- .iphone.container -->
		<div class="blk-button">
			<?php if ( $get_started_link = get_field('get_started_link', 'option') ): ?>
				<?php echo $hubspot_cta = get_field('hubspot_cta', 'option'); ?>
			<?php else: ?>
				<a href="<?php echo $page_link_from_wp = get_field('page_link_from_wp', 'option'); ?>" class="starttrial-link" title="Get Started Now | Free trial, no credit card required :)">Get Started Now</a>
			<?php endif; ?>
			<span>Free trial, no credit card required :)</span>
		</div>
	</div><!-- .center.main.content -->

</section><!-- .section.phone -->

<section class="phone_mobile-section">

	<div class="phone_mobile-content">
		<?php if ( $title_behavioural = get_field('title_behavioural', 'option') ): ?>
			<h2><?php echo $title_behavioural; ?></h2>
		<?php endif; ?>
		<?php if ( $content_behavioural = get_field('content_behavioural', 'option') ): ?>
			<?php echo $content_behavioural; ?>
		<?php endif; ?>
		<h3>Explore:</h3>
	</div>
	<div class="center slider">
		<!-- Content goes here -->
		<?php if( have_rows('explore_options', 'option') ): ?>
			<?php	while ( have_rows('explore_options', 'option') ) : the_row();
				$title_explore_option = get_sub_field('title_explore_option');
				$image_explore_option = get_sub_field('image_explore_option'); ?>
				<div class="mobile-content">
					<div class="marvel-device iphone6plus black">
							<div class="top-bar"></div>
							<div class="sleep"></div>
							<div class="volume"></div>
							<div class="camera"></div>
							<div class="sensor"></div>
							<div class="speaker"></div>
							<div class="screen">
									<!-- Content goes here -->
									<div id="phonessel">
										<div class="wrapper_phone">
											<div class="item"><img src="<?php echo $image_explore_option; ?>" height="415px"></div>
										</div>
									</div>
							</div>
							<div class="home"></div>
							<div class="bottom-bar"></div>
					</div>
					<div class="blk-mobile_text">
						<?php if( have_rows('description_flag', 'option') ): ?>
							<?php	while ( have_rows('description_flag', 'option') ) : the_row();
								$title_flag = get_sub_field('title_flag');
								$content_flag = get_sub_field('content_flag'); ?>
								<h3><?php echo $title_flag; ?></h3>
								<?php echo $content_flag; ?>
							<?php	endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php	endwhile; ?>
		<?php endif; ?>
	</div>

</section><!-- .section.phone.mobile -->
