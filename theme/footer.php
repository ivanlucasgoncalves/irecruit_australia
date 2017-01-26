<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after */ ?>

		</div><!-- .site-content -->

		<footer id="footer">
			<section class="common-footer-wrapper">
				<div class="three-buttons">
					<?php // Widgets bottom - Buttons Pages
					get_sidebar("buttons-bottom"); ?>
				</div>
				<div class="info-nav-wrapper">
					<?php // Widgets bottom - Menus and Copyright | Addresss
					get_sidebar("content-bottom"); ?>
				</div>
			</section><!-- .section.buttons.and.menus-copyright.address -->
		</footer>
		</div><!-- .site-inner -->
	</div><!-- .site -->
	<?php wp_footer(); ?>
	</div><!-- .main site -->
</body>
</html>
