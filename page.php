<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage PlateUp
 */

get_header(); ?>

		<div id="main-content" class="row main-content">
			<section id="primary" class="col-md-7 content-area">
				<main id="content" class="site-content" role="main">
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						
					endwhile;
				?>
				</main>
			</section><!-- .col-md-7 -->
			<?php get_sidebar(); ?> <!-- .col-md-5 -->
		</div>

<?php get_footer();
