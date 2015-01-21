<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till #content
 *
 * @package WordPress
 * @subpackage PlateUp
 */
global $wp_customize;
global $plateup_theme_mods;
$logo = empty( $plateup_theme_mods['logo'] ) ? get_template_directory_uri() . '/assets/img/logo.png' : $plateup_theme_mods['logo'];

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '&mdash;', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/lib/html5.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/lib/respond.js"></script>
	<![endif]-->

</head>

<body <?php body_class(); ?>>

	<!-- Header (Logo and Navigation Menu) -->
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo $logo; ?>" class="logo-image" alt="<?php bloginfo( 'name' ); ?>"<?php if ( isset( $wp_customize ) ) : ?> data-default="<?php echo get_template_directory_uri() . '/assets/img/logo.png'; ?>"<?php endif; ?>>
					</a>
				</div>
				<div class="col-md-9">
					<?php get_template_part( 'header', 'tagline' ); ?>
					<div id="header-navigation-bar" class="navbar">
						<nav id="site-navigation" class="navigation main-navigation" role="navigation">
							<a class="screen-reader-text skip-link" href="#content" title="Skip to content"><?php _e( 'Skip to content', PLATEUP_TEXTDOMAIN ); ?></a>
							<div class="collapsed-menu-toggle">
								<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<span class="glyphicon glyphicon-home" title="<?php _e( 'Home', PLATEUP_TEXTDOMAIN ); ?>"></span>
								</a>
								<a class="control" href="#">
									<span class="hamburger">
										<span></span>
										<span></span>
										<span></span>
									</span>
								<?php _e( 'Browse', PLATEUP_TEXTDOMAIN ); ?>
								</a>
							</div>
							<?php
								require_once( get_template_directory() . '/lib/wp_bootstrap_navwalker.php' );
								wp_nav_menu( array(
									'menu'              => 'Primary Menu',
									'theme_location'    => 'primary_menu',
									'container'       	=> 'div',
									'container_id'    	=> 'primary-menu-header-wrapper',
									'menu_id'         	=> 'primary-menu-header',
									'depth'             => 2,
									'menu_class'        => 'nav navbar-nav',
									'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
									'walker'            => new wp_bootstrap_navwalker())
								);
							?>

						</nav>
						<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'social_menu',
									'container'       => 'div',
									'container_id'    => 'social-menu-header',
									'container_class' => 'social-menu social-icons',
									'menu_id'         => 'social-menu-items',
									'menu_class'      => 'menu-items',
									'depth'           => 1,
									'link_before'     => '<span class="screen-reader-text">',
									'link_after'      => '</span>',
									'fallback_cb'     => '',
								)
							);
						?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php get_template_part( 'header', 'hero' ); // Large image on the front page ?>

	<div id="main" class="container site-main">
