<?php
/**
** The template used for displaying phone home page section **/
$profileimg = get_theme_mod( 'profileimg', esc_url( get_template_directory_uri() . '/img/per_profile.jpg' ) ); // Phone - Img Profile
//$summaryimg = get_theme_mod( 'summaryimg', esc_url( get_template_directory_uri() . '/img/per_summary.jpg' ) ); // Phone - Img Summary
$insightsimg = get_theme_mod( 'insightsimg', esc_url( get_template_directory_uri() . '/img/insights.jpg' ) ); // Phone - Img Insights
$strengthsimg = get_theme_mod( 'strengthsimg', esc_url( get_template_directory_uri() . '/img/strengths.jpg' ) ); // Phone - Img Strenghts ?>

<section class="phone-section">

	<div class="line-top"></div>
	<div class="back-phone"></div>
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
		<div class="description personality_profile">
			<div class="flag-dir"></div>
			<h3>Workplace Insights</h3>
			<p>What does your candidate think or expect from work environments, and how does he or she behaves on adverse situations.</p>
		</div>
		<div class="description strenghts">
			<div class="flag-dir"></div>
			<h3>Strenghts</h3>
			<p>Complete analysis of talent's strenghts which would contribute improving the team's culture and performance.</p>
		</div>
	</div>
	<div class="blk-button">
		<a href="javascript:void(0);" class="starttrial-link" title="Get Started Now | Free trial, no credit card required :)">Get Started Now</a>
		<span>Free trial, no credit card required :)</span>
	</div>

</section><!-- .section.phone -->
