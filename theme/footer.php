<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 */
?>

		</div><!-- .site-content -->

		<footer id="footer">
			<div class="customersWrapper">
				<div class="customersContainer">
					<div class="lineCustomers">
						<div class="customer"></div>
						<div class="customer"></div>
						<div class="customer"></div>
						<div class="customer"></div>
					</div>
					<div class="lineCustomers">
						<div class="customer"></div>
						<div class="customer"></div>
						<div class="customer"></div>
						<div class="customer"></div>
					</div>
				</div>
				<div class="customersContent">
					<div class="customersText">
						<p><span class="hundredPlus">100+</span><br/> BRILLIANT COMPANIES</p>
						<p class="better">are already doing something better with their time</p>
						<a href="#" class="customersButton">SEE OUR CUSTOMERS</a>
					</div>
				</div>
			</div>
			<div class="commonFooterWrapper">
				<div class="threeButtons">
					<div class="button">
						<div class="iconButton pricingModel"></div>
						<div class="textContainer">
							<p class="title">OUR PRICING MODEL</p>
							<p class="text">Monthly fees adapted to suit the needs of your business.</p>
						</div>
					</div>
					<div class="button">
						<div class="iconButton blog"></div>
						<div class="textContainer">
							<p class="title">BLOG</p>
							<p class="text">Weekly updates from recruitment specialists giving tips and stuff</p>
						</div>
					</div>
					<div class="button">
						<div class="iconButton getInTouch"></div>
						<div class="textContainer">
							<p class="title">GET IN TOUCH</p>
							<p class="text">Contact our sales representative now and be part of the revolution.</p>
						</div>
					</div>
				</div>
				<div class="info-nav-wrapper">
					<?php // Widgets bottom - Menus and Copyright | Addresss
					get_sidebar("content-bottom"); ?>
				</div>
			</div>
		</footer>



	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
