<?php
/**
** The template used for displaying video **/ ?>

<section class="content-video">

	<div class="back-video"></div>
	<div class="iconsContainer">
		<?php if( have_rows('info_icons', 'option') ):
			$count = 1; ?>
			<?php	while ( have_rows('info_icons', 'option') ) : the_row();
				$icon = get_sub_field('icon');
				$info = get_sub_field('info'); ?>
			<div class="feature block-<?php echo $count; ?>">
				<div class="blk-align">
					<img src="<?php echo $icon; ?>" height="65px"/>
					<p class="text-feature"><?php echo $info; ?></p>
				</div>
			</div>
			<?php $count++;
			endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="video-text">
		<?php if ( $title_video = get_field('title_video', 'option') ): ?>
			<h2><?php echo $title_video; ?></h2>
		<?php endif; ?>
		<div class="playBtn"></div>
		<?php if ( $content_video = get_field('content_video', 'option') ): ?>
			<?php echo $content_video; ?>
		<?php endif; ?>
	</div>

</section><!-- .section.video -->
