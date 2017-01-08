<?php
/**
** The main template file **/
get_header();  $img_logo = get_theme_mod( 'img_logo', esc_url( get_template_directory_uri() . '/img/img01.jpg' ) ); // Logo ?>

	<section id="slider">
		<div class="wrapper">
	      <?php $slideshow = new WP_Query( array(
	        'post_type' => 'slideshow'	)); ?>
	      <?php while ( $slideshow->have_posts() ) : $slideshow->the_post();
					/// Get the url from thumbnail
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
					$thumb_url = $thumb_url_array[0]; ?>
					<div class="item" style="background-image:url(<?php echo $thumb_url ?>)">
						<div class="data">
							<h3>Talent<span>rank<sup>tm</sup></span></h3>
							<h2><?php echo the_field( 'title', false, false ); ?></h2>
							<?php echo the_field( 'content' ); ?>
						</div>
						<a href="<?php echo the_field( 'page_link' ); ?>" title="<?php echo the_field( 'title_link' ); ?>">link</a>
					</div>
	      <?php endwhile;
				wp_reset_query(); ?>
		</div>
		<ul class="bullets"></ul><!-- .bullets.slider -->
		<div class="lines-left"></div><!-- .square.lines.slider.left -->
		<div class="lines-right"></div><!-- .square.lines.slider.right -->
		<div class="arrow"></div><!-- .arrow.slider.middle -->
		<div class="rotate-line"></div><!-- .line.rotate.bottom.slider -->
	</section><!-- .section.slider -->

	<section id="darg_drop">
		<article class="content-drag_drop">
			<h2><?php the_field('title', 'option'); ?></h2>
			<?php the_field('content', 'option'); ?>
		</article><!-- .article.top.drag.and.drop -->
		<section class="dragdrop_container">
			<div id="yes-drop" class="draggable drag-drop applicant1 1">
				<div class="dragMe">
					<p>DRAG ME!</p>
				</div>
			</div><!-- .drag.me.balls -->
			<div id="yes-drop" class="draggable drag-drop applicant2 2">
				<div class="dragMe">
					<p>DRAG ME!</p>
				</div>
			</div><!-- .drag.me.balls -->
			<div id="yes-drop" class="draggable drag-drop applicant3 3">
				<div class="dragMe">
					<p>DRAG ME!</p>
				</div>
			</div><!-- .drag.me.balls -->
			<div class="laptop-container">
				<div class="screenContainer">
					<div class="frontCam"></div>
					<div id="outer-dropzone" class="dropzone">
						<div id="inner-dropzone" class="dropzone">
							<div class="dragHere">
								<h3><span>Talent</span>rank<sup>tm</sup></h3>
								<p>Drag and Drop the Applicants here</p>
							</div>
							<div class="candidate candidate1">
							<div class="profilePic"></div>
							<p class="candidateName">John Claude</p>
							<p class="matchText">Match rate:</p>
							<div class="matchRate">
								<div class="centre">95%</div>
							</div>
						</div>
						<div class="candidate candidate2">
							<div class="profilePic"></div>
							<p class="candidateName">Van Damme</p>
							<p class="matchText">Match rate:</p>
							<div class="matchRate">
								<div class="centre">88%</div>
							</div>
						</div>
						<div class="candidate candidate3">
							<div class="profilePic"></div>
							<p class="candidateName">Peter Parker</p>
							<p class="matchText">Match rate:</p>
							<div class="matchRate">
								<div class="centre">77%</div>
							</div>
						</div>
						</div>
				 </div>
				</div>
				<div class="baseContainer">
					<div class="base1">
						<div class="detail"></div>
					</div>
					<div class="base2"></div>
					<div class="base2bottomBorder"></div>
					<div class="shadow"></div>
				</div>
			</div><!-- .laptop.structure -->
			<div class="quality">
				<h2>Ranked . Sorted . Relevant</h2>
				<p class="textQuality">Automatically rank and sort your candidates using powerful and reliable software you can trust.</p>
				<a href="javascript:void(0);" class="trialButton starttrial-link" title="Start the free trial">Start the free trial</a>
				<span>*No credit card required</span>
			</div><!-- .text.bottom.quality -->
		</section>
		<div class="rotate-line"></div><!-- .line.rotate.bottom.drag-drop -->
	</section><!-- .drag.and.drop -->

	<section class="phone-section">
		<div class="line-top"></div>
		<div class="back-phone"></div>
		<div class="phone-menu-container">
			<h2>Behavioural Analysis</h2>
			<p>Proven personality profiling and behavioural analysis for powerful insights on who your candidates are, not just what they can do.</p>
			<h3>Explore:</h3>
			<nav>
				<ul>
					<li><a href="javascript:void(0)" id="AddCityA">personality profile</a></li>
					<li><a href="#">personality summary</a></li>
					<li><a href="#">workplace insights</a></li>
					<li><a href="#">strenghts</a></li>
				</ul>
			</nav>
		</div>
		<div class="iphone-container">
			<div class="marvel-device iphone6plus gold">
			    <div class="top-bar"></div>
			    <div class="sleep"></div>
			    <div class="volume"></div>
			    <div class="camera"></div>
			    <div class="sensor"></div>
			    <div class="speaker"></div>
			    <div class="screen">
			        <!-- Content goes here -->
							<div id="AddCity"><img src="<?php echo esc_url( $img_logo ); ?>"></div>
			    </div>
			    <div class="home"></div>
			    <div class="bottom-bar"></div>
			</div>
			<div class="description">
				<div class="flag-dir"></div>
				<h3>Workplace Insights</h3>
				<p>What does your candidate think or expect from work environments, and how does he or she behaves on adverse situations.</p>
			</div>
		</div>
		<div class="blk-button">
			<a href="#">Get Started Now</a>
			<span>Free trial, no credit card required :)</span>
		</div>
	</section>

	<?php // Include the content video template.
	get_template_part( 'template-parts/content', 'video' ); ?>

	<?php // Include the content customers template.
	get_template_part( 'template-parts/content', 'customers' ); ?>

<?php get_footer(); ?>
