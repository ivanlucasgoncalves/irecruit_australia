<?php
/**
** The template for displaying the header
** Displays all of the head element and everything up until the "site-content" div. **/
 $img_logo = get_theme_mod( 'img_logo', esc_url( get_template_directory_uri() . '/img/logo_irecruit.svg' ) ); // Logo
 $img_logo_white = get_theme_mod( 'img_logo_white', esc_url( get_template_directory_uri() . '/img/logo_irecruit_white.svg' ) ); // Logo White ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php if (is_front_page()) { bloginfo('name'); echo ' | ';  bloginfo('description'); } else { wp_title(''); } ?></title><!-- .put title -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1a76ab"><!-- Chrome, Firefox OS and Opera -->
  <link rel="icon" href="https://web-cdn.irecruit.com.au/web-v4.1.5/favicon.ico" type="image/x-icon">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>  
</head>

<body <?php body_class(); ?>>
  <div class="overlay-menu"></div> <!-- .overlay menu. -->
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="cbp-spmenu-s2" class="main_navigation cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu' ); ?>">
			<img class="logo-menu" src="<?php echo esc_url( $img_logo ); ?>" alt="Logo iRecruit" width="160px">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
				 ));	?>
         <div id="info-site" role="complementary">
         	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
         		<?php dynamic_sidebar( 'sidebar-3' ); ?><!-- .widget-area.copyright.and.address -->
         	<?php endif; ?>
         </div>
		</nav><!-- .main-navigation -->
	<?php endif; ?><!--/.end responsive-menu-->
  <header id="masthead" class="site-header" role="banner">
		<div class="site-header-main">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="iRecruit | People who fit better, perform better."><img src="<?php echo esc_url( $img_logo ); ?>" alt="Logo iRecruit" width="140px"></a>
			</div><!-- .site-branding -->
      <div class="site-menutop-button">
        <?php if ( has_nav_menu( 'menu-top' ) ) : ?>
      		<nav class="main_top" role="navigation" aria-label="<?php esc_attr_e( 'Menu Top' ); ?>">
      			<?php	wp_nav_menu( array(
    					'theme_location' => 'menu-top'
    				 ));	?>
      		</nav><!-- .main-navigation -->
      	<?php endif; ?><!--/.end menu-top -->
        <div class="div-button">
          <button id="showRightPush" class="tcon tcon-menu--xcross" aria-label="toggle menu">
            <span class="tcon-menu__lines" aria-hidden="true"></span>
            <span class="tcon-visuallyhidden">Show Menu</span>
          </button><!-- .button.main.menu -->
        </div>
      </div><!-- .site-blk navigation.button-main-nav -->
		</div><!-- .site-header-main -->
	</header><!-- .site-header -->
  <div id="mainsite"><!-- .main site -->
  <div id="myModal" class="modal">
  	<div class="modal-content">
  		<span class="close">x</span>
  		<img src="<?php echo esc_url( $img_logo_white ); ?>" alt="Logo iRecruit" width="140px">
  		<div class="modal-form">
  			<h4>TRY IRECRUIT FOR FREE</h4>
  			<p class="first-p">Get free access to all iRecruit’s features:</p>
  			<?php // Include the page content template.
  			get_template_part( 'template-parts/content', 'trialform' ); ?>
  		</div>
  		<h3><span>talent</span>rank<sup>™</sup></h3>
      <div class="icons-container">
    		<?php if( have_rows('info_icons', 'option') ):
    			$count = 1; ?>
    			<?php	while ( have_rows('info_icons', 'option') ) : the_row();
    				$icon = get_sub_field('icon');
    				$info = get_sub_field('info'); ?>
    			<div class="feature block-<?php echo $count; ?>">
    				<div class="blk-align">
    					<img src="<?php echo $icon; ?>" height="55px"/>
    					<p class="text-feature"><?php echo $info; ?></p>
    				</div>
    			</div>
    			<?php $count++;
    			endwhile; ?>
    		<?php endif; ?>
    	</div>
  	</div>
  </div> <!-- .modal form trial. -->
	<div id="content" class="site-content">
