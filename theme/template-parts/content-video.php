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
		<?php if ( $content_video = get_field('content_video', 'option') ): ?>
			<a href="javascript:void(0);" class="play_btn" title="Click to play | <?php echo strip_tags($content_video); ?>">play video</a>
			<?php echo $content_video; ?>
		<?php endif; ?>
	</div>

</section><!-- .section.video -->

<div class="cd-popup-video" role="alert">
	<div class="cd-popup-video-container">
		<div id="myModal_Video" class="modal video_modal">
			<div class="modal-content">
				<a href="#0" class="cd-popup-video-close img-replace close">x</a>
				<div class="videoWrapper">
					<?php if ( $iframe = get_field('video', 'option') ): // get iframe HTML?>
						<?php
						// use preg_match to find iframe src
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						// add extra params to iframe src
						$params = array(
							'enablejsapi'    => 1,
							'rel'    => 0,
							'controls'    => 0,
					    'hd'        => 1,
					    'autohide'    => 1,
							'showinfo'    => 0,
						);
						$new_src = add_query_arg($params, $src);
						$iframe = str_replace($src, $new_src, $iframe);
						// add extra attributes to iframe html
						$attributes = 'id="video" frameborder="0"';
						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						echo $iframe; // echo $iframe ?>
					<?php endif; ?>
				</div>
			</div>
		</div> <!-- .modal form trial. -->
	</div> <!-- cd-popup-video-container -->
</div> <!-- cd-popup-video -->
