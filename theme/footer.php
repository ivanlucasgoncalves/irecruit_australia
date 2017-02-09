<?php
/**
* The template for displaying the footer
* Contains the closing of the #content div and all content after */
$scrolltop = get_theme_mod( 'scrolltop', esc_url( get_template_directory_uri() . '/img/scrolltop.svg' ) ); // Phone - Img Profile ?>

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
		<a href="#mainsite" class="scrolltop" title="Scroll to top"><img src="<?php echo $scrolltop ?>" width="40px"></a><!-- .scroll.to.top -->
		<?php wp_footer(); ?>
	</div><!-- .main site -->
</body>
</html>
