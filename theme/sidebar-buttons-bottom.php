<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?><!-- .Widget-area.Buttons.Bottom.Pages -->
<?php endif; ?>
