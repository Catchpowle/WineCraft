<?php
/**
 * The template for displaying all single posts
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

						// Include the post content template.
						get_template_part( 'content', get_post_type( get_the_ID() ) );

						// Add prev/next post navigation for posts
						get_template_part( 'single', 'post-nav' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					endwhile;
				?>
				</main>
			</section><!-- .col-md-7 -->
			<?php get_sidebar(); ?> <!-- .col-md-5 -->
		</div>

<?php get_footer();
