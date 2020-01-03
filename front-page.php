<?php
/**
 * The template for displaying the front page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package trends-theme
 */

get_header(); ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

<?php
get_footer();
