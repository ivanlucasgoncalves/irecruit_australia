<?php
/**
** The template used for displaying drag and drop home page section **/ ?>

<section id="darg_drop">
	<div class="center_maincontent">
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
			<div class="howitworks-section">
				<section class="sec-top">
					<?php if( have_rows('how_it_works', 'option') ):
						$count = 1; ?>
						<?php	while ( have_rows('how_it_works', 'option') ) : the_row();
						$image_works = get_sub_field('image_works');
						$title_works = get_sub_field('title_works');
						$content_works = get_sub_field('content_works'); ?>
						<article class="art-<?php echo $count ?>">
							<div class="content-artworks">
								<img src="<?php echo $image_works; ?>" height="60px">
								<h2><?php echo $title_works; ?></h2>
								<?php echo $content_works; ?>
							</div>
						</article>
						<?php
						$count++;
						endwhile; ?>
					<?php endif; ?>
				</section>
				<section class="sec-bottom">
					<?php if( have_rows('work_standards', 'option') ):
						$count = 1; ?>
						<?php	while ( have_rows('work_standards', 'option') ) : the_row();
						$image_standards = get_sub_field('image_standards');
						$description_standards = get_sub_field('description_standards'); ?>
						<article class="content-standards stands-<?php echo $count ?>">
							<img src="<?php echo $image_standards; ?>" height="60px">
							<h2><?php echo $description_standards; ?></h2>
						</article>
						<?php
						$count++;
						endwhile; ?>
					<?php endif; ?>
				</section>
			</div>
			<!--<div class="quality">
				<h2><?php //the_field('title_bottom', 'option'); ?></h2>
				<p class="textQuality"><?php //the_field('content_bottom', 'option'); ?></p>
				<div class="trialButton starttrial-link"><?php //the_field('trial_link', 'option'); ?></div>
				<span>*No credit card required</span>
			</div>--><!-- .text.bottom.quality -->
		</section>
	</div><!-- .center.main.content -->
	<div class="rotate-line"></div><!-- .line.rotate.bottom.drag-drop -->

</section><!-- .drag.and.drop -->
