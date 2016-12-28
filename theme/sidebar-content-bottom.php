<?php
/**
** The template for the content bottom widget areas on posts and pages**/

if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
} // If we get this far, we have widgets. Let's do this. ?>

<div id="info-site" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-3' ); ?><!-- .widget-area.copyright.and.address -->
	<?php endif; ?>
</div>
<div id="content-bottom-menus" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-2' ); ?><!-- .widget-area.menus -->
	<?php endif; ?>
</div><!-- .content-bottom-widgets -->
