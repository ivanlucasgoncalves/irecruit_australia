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
		<a href="javascript:void(0);" class="play_btn" title="Click to play | The most powerful Candidate Ranking Engine ever created.">play video</a>
		<?php if ( $content_video = get_field('content_video', 'option') ): ?>
			<?php echo $content_video; ?>
		<?php endif; ?>
	</div>

</section><!-- .section.video -->

<div id="myModal_Video" class="modal video_modal">
	<div class="modal-content">
		<span class="close x_modal_video">x</span>
		<div class="videoWrapper">
			<iframe id="video" width="100%" height="100%" src="https://www.youtube.com/embed/Yo09H_wztkU?enablejsapi=1&rel=0&amp;controls=0&amp;showinfo=0&enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allowfullscreen=""></iframe>
		</div>
	</div>
</div> <!-- .modal form trial. -->
