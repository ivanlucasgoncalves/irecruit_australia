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
				<!--[if lte IE 8]>
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
				<![endif]-->
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
				<script>
					hbspt.forms.create({
						css: '',
						portalId: '2223430',
						formId: '998f1772-5de1-46fd-b401-1c4dd6b2f202'
					});
				</script><!-- .Contact HubSpot Form. -->
			</div>
    </article><!-- #post-## -->

  </main><!-- .site-main -->
</div><!-- .content-area -->

<?php // Include the content video template.
get_template_part( 'template-parts/content', 'video' ); ?>

<?php // Include the content customers template.
get_template_part( 'template-parts/content', 'customers' ); ?>

<?php get_footer(); ?>
