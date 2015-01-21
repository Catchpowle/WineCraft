<?php
/**
 * The template for displaying a 404 error page
 *
 * @package WordPress
 * @subpackage PlateUp
 */

get_header(); ?>

		<div id="main-content" class="row main-content">
			<section id="primary" class="col-md-7 content-area">
				<main id="content" class="site-content" role="main">
				<?php get_template_part( 'content', '404' ); ?>
				</main>
			</section><!-- .col-md-7 -->
			<?php get_sidebar(); ?> <!-- .col-md-5 -->
		</div>

<?php get_footer();
