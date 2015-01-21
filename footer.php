<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage PlateUp
 */
global $wp_customize;
global $plateup_theme_mods;
$copyright = empty( $plateup_theme_mods['copyright'] ) ? '' : $plateup_theme_mods['copyright'];
$footer_map = empty( $plateup_theme_mods['footer_map'] ) ? 'never' : $plateup_theme_mods['footer_map'];
if ( $footer_map == 'all' || ( $footer_map == 'front' && is_front_page() ) ) {
	$footer_map = true;
}
?>

	</div><!-- #main -->

	<?php
	if ( defined ( 'BPFWP_VERSION' ) && ( $footer_map === true || isset( $wp_customize ) ) ) :
		global $bpfwp_controller;
		$address = $bpfwp_controller->settings->get_setting( 'address' );
		if ( !empty( $address['text'] ) || !empty( $address['lat'] ) ) :
	?>
	<section class="container footer-map<?php if ( $footer_map !== true ) : ?> tc<?php endif; ?>">
		<address class="bp-contact-card" itemscope itemtype="http://schema.org/<?php echo $bpfwp_controller->settings->get_setting( 'schema_type' ); ?>">
			<?php bpwfwp_print_map(); ?>
		</address>
	</section>
	<?php
		endif;
	endif;
	?>

	<footer id="site-footer">
		<?php if ( is_active_sidebar( 'pu-sidebar-footer-1' ) || is_active_sidebar( 'pu-sidebar-footer-2' ) || is_active_sidebar( 'pu-sidebar-footer-3' ) ) : ?>
		<div class="container footer-top">
			<div class="row">
				<div class="col-md-4 widget-area">
				<?php if ( is_active_sidebar( 'pu-sidebar-footer-1' ) ) : ?>
					<?php dynamic_sidebar('pu-sidebar-footer-1'); ?>
				<?php endif; ?>
				</div>
				<div class="col-md-4 widget-area">
				<?php if ( is_active_sidebar( 'pu-sidebar-footer-2' ) ) : ?>
					<?php dynamic_sidebar('pu-sidebar-footer-2'); ?>
				<?php endif; ?>
				</div>
				<div class="col-md-4 widget-area">
				<?php if ( is_active_sidebar( 'pu-sidebar-footer-3' ) ) : ?>
					<?php dynamic_sidebar('pu-sidebar-footer-3'); ?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="container hangover">
			<div class="copyright"><?php echo $copyright; ?></div>
			<div class="assets">
				
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>

</body>

</html>