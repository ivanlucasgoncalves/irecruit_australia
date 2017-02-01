<?php
/**
** The main template file **/
get_header(); ?>

	<section id="slider">
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
			<div class="blk-drag blk-applione">
				<div id="yes-drop" class="draggable drag-drop applicant1 1">
					<div class="dragMe">
						<p>DRAG ME!</p>
					</div>
				</div>
			</div><!-- .drag.me.balls -->
			<div class="blk-drag blk-applitwo">
				<div id="yes-drop" class="draggable drag-drop applicant2 2">
					<div class="dragMe">
						<p>DRAG ME!</p>
					</div>
				</div>
			</div><!-- .drag.me.balls -->
			<div class="blk-drag blk-applithree">
				<div id="yes-drop" class="draggable drag-drop applicant3 3">
					<div class="dragMe">
						<p>DRAG ME!</p>
					</div>
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
				<h2><?php the_field('title_bottom', 'option'); ?></h2>
				<p class="textQuality"><?php the_field('content_bottom', 'option'); ?></p>
				<div class="trialButton starttrial-link"><?php the_field('trial_link', 'option'); ?></div>
				<span>*No credit card required</span>
			</div><!-- .text.bottom.quality -->
		</section>
		<div class="rotate-line"></div><!-- .line.rotate.bottom.drag-drop -->
	</section><!-- .drag.and.drop -->

	<?php // Include the content video template.
	get_template_part( 'template-parts/content', 'phone' ); ?>

	<?php // Include the content video template.
	get_template_part( 'template-parts/content', 'video' ); ?>

	<?php // Include the content customers template.
	get_template_part( 'template-parts/content', 'customers' ); ?>

<?php get_footer(); ?>
