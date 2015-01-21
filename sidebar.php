<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage PlateUp
 */
$sidebar = is_front_page() ? 'pu-sidebar-homepage' : 'primary-sidebar';

if ( is_active_sidebar( $sidebar ) ) :
?>

<section id="secondary" class="col-md-5">
	<div id="sidebar" class="widget-area sidebar-<?php echo $sidebar; ?>" role="complementary">
		<?php dynamic_sidebar( $sidebar ); ?>
	</div><!-- #sidebar -->
</section><!-- #secondary -->

<?php endif; ?>
