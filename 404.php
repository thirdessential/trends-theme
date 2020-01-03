<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trends-theme
 */

get_header(); ?>

			<main>
		    <section class="hero hero--404 container">
		      <div class="hero__img" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/img/img-404@2x.jpg');"></div>
		      <div class="hero__text-wrap">
		        <div class="hero__text">
		          <span class="hero__error">Whoops!</span>
		          <h1 class="hero__title">You seem to have taken a wrong turn – nothing
		            to see
		            here.</h1>
		          <a href="<?php echo esc_url( home_url() ); ?>" class="btn">Go back home</a>
		        </div>
		      </div>
		    </section>
		  </main>

<?php
get_footer();
