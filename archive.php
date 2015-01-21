<?php
/**
 * The template for displaying Archive pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage PlateUp
 */

get_header(); ?>

		<div id="main-content" class="row main-content">
			<section id="primary" class="col-md-7 content-area">
				<main id="content" class="site-content index" role="main">

				<?php if ( have_posts() ) : ?>

					<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', PLATEUP_TEXTDOMAIN ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', PLATEUP_TEXTDOMAIN ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', PLATEUP_TEXTDOMAIN ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', PLATEUP_TEXTDOMAIN ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', PLATEUP_TEXTDOMAIN ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', PLATEUP_TEXTDOMAIN ) ) . '</span>' );

						elseif ( is_post_type_archive() ) :
							post_type_archive_title();

						elseif ( defined( 'GRFWP_REVIEW_CATEGORY' ) && is_tax( GRFWP_REVIEW_CATEGORY ) ) :
							single_term_title( __( 'Reviews: ', PLATEUP_TEXTDOMAIN ) );

						elseif ( is_tax() ) :
							single_term_title( __( 'Archives: ', PLATEUP_TEXTDOMAIN ) );

						else :
							_e( 'Archives', PLATEUP_TEXTDOMAIN );

						endif;
					?>
					</h1>

					<?php if ( ( is_category() || is_tag() || is_tax() ) && $summary = term_description() ) : ?>
					<div class="page-summary">
						<?php echo $summary; ?>
					</div>
					<?php endif;

					// Start the Loop
					while ( have_posts() ) : the_post();

						// Load the content template for this post
						get_template_part( 'content', get_post_type( get_the_ID() ) );

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
