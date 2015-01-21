<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage PlateUp
 */

get_header(); ?>

		<div id="main-content" class="row main-content">
			<section id="primary" class="col-md-7 content-area">
				<main id="content" class="site-content index search-index" role="main">
				
				<h1 class="page-summary">
					<?php printf( __( 'Search results for: %s', PLATEUP_TEXTDOMAIN ), '<q>' . get_search_query() . '</q>' ); ?>
				</h1>

				<?php
				if ( have_posts() ) :

					// Start the Loop
					while ( have_posts() ) : the_post();

						// Load the content template for this post
						get_template_part( 'content', 'search' );

					endwhile;

					// Load the previous/next pages template: index-paging.php
					get_template_part( 'index', 'paging' );

				else :

					// Load the content-none.php template if no posts are found
					get_template_part( 'content', 'none' );

				endif;
				?>

				</main>
			</section><!-- .col-md-7 -->
			<?php get_sidebar(); ?> <!-- .col-md-5 -->
		</div>

<?php get_footer();
