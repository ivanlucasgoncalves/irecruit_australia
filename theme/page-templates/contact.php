<?php
/**
** Template Name: Contact
** The template part for displaying contact page **/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<header class="entry-header">
    		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    	</header><!-- .entry-header -->
    	<div class="entry-content">
    		<?php
    			the_content(); ?>
    	</div><!-- .entry-content -->
			<div class="info-contact">
				<?php if( have_rows('add_info_of_the_contact') ): ?>
					<?php	while ( have_rows('add_info_of_the_contact') ) : the_row();
						$icon = get_sub_field('icon');
						$info = get_sub_field('info'); ?>
					<div class="blk-info">
						<img src="<?php echo $icon; ?>" height="40px"/>
						<?php echo $info; ?>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div><!-- .entry-section.add.info.contact -->
			<div class="content-form">
				<form id="form" method="post">
						<div class="divform">
							<input type="text" id="yourname" name="yourname" placeholder="Your name">
						</div>
						<div class="divform">
							<input type="text" id="email" name="email" placeholder="Email">
						</div>
						<div class="divform">
							<input type="text" id="phone" name="phone" placeholder="Phone">
						</div>
						<div class="divform">
							<textarea type="text" id="yourmessage" name="yourmessage" placeholder="Your message\nTell us more about your business - what are your needs?"></textarea>
						</div>
						<div class="submit-wrap">
							<input id="submit" type="submit" value="Send Message">
						</div>
						<div class="message-ok" style="display:none">
							<p><b> Thank you!</b> Your place has been secured. Keep an eye on your inbox for your confirmation!</p>
						</div>
				</form>
			</div>
    </article><!-- #post-## -->

  </main><!-- .site-main -->
</div><!-- .content-area -->
<section class="blueVideo">
	<div class="back-video"></div>
	<div class="iconsContainer">
		<div class="feature">
			<div class="icon skills"></div>
			<div class="textFeature">
				<p>SKILLS AND EXPERIENCE</p>
			</div>
		</div>
		<div class="plus">+</div>
		<div class="feature">
			<div class="icon personality"></div>
			<div class="textFeature">
				<p>PERSONALITY PROFILING</p>
			</div>
		</div>
		<div class="plus">+</div>
		<div class="feature">
			<div class="icon ranked"></div>
			<div class="textFeature">
				<p>RANKED & SORTED</p>
			</div>
		</div>
	</div>
	<div class="videoText">
		<p class="weAreIrecruit">WE ARE IRECRUIT</p>
		<div class="playBtn"></div>
		<p class="theEngine">The most powerful Candidate Ranking Engine ever created.</p>
	</div>
</section>
<?php // Include the content customers template.
get_template_part( 'template-parts/content', 'customers' ); ?>

<?php get_footer(); ?>
