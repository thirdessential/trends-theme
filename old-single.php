<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trends-theme
 */

get_header(); ?>

<main>

	<?php
	while ( have_posts() ) : the_post(); ?>

	<section class="hero hero--trend container">

		<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>

		<div class="hero__img" style="background-image: url(<?php echo esc_url($featured_img_url); ?>);"></div>
		<div class="hero__text-wrap">
			<span class="hero__badge">

				<?php

				$categories = get_the_category();

				if ( ! empty( $categories ) ) {
				    echo esc_html( $categories[0]->name );
				}


				 ?>

			</span>
			<div class="hero__text">
				<h1 class="hero__title"><?php the_title(); ?></h1>
				<p class="hero__subheading"><?php the_field('hero_sub-heading'); ?></p>
			</div>
		</div>
	</section>

	<div class="post post--trend container">
		<aside class="post__nav">
			<ul>

				<?php

				if( have_rows('add_sidebar_menu_items') ):

				    while ( have_rows('add_sidebar_menu_items') ) : the_row(); ?>

						<li><a href="#<?php the_sub_field('id_for_page_item'); ?>"><?php the_sub_field('menu_item_name'); ?></a></li>

				    <?php endwhile;

				endif;

				?>
			</ul>
		</aside>
		<div class="post__text-wrap">

		<?php

		if( have_rows('add_content') ):

		    while ( have_rows('add_content') ) : the_row();

		        if( get_row_layout() == 'general_content_block' ): ?>

							<div class="post__text post__signal" id="<?php the_sub_field('unique_id_for_block'); ?>">
								<?php if (get_sub_field('general_content_title')) { ?>
									<h2>
										<?php the_sub_field('general_content_title'); ?>
									</h2>
								<?php } ?>
								<?php if (get_sub_field('general_content_sub-heading')) { ?>
									<b>
										<?php the_sub_field('general_content_sub-heading'); ?>
									</b>
								<?php } ?>
								<?php the_sub_field('general_content_area'); ?>
							</div>


		        <?php elseif( get_row_layout() == 'title_block' ):  ?>

							<div class="post__signals">
								<h3><?php the_sub_field('title_block_text'); ?></h3>
							</div>


						<?php elseif( get_row_layout() == 'quote_block' ):  ?>

							<div class="post__signal">

								<blockquote class="post__quote">
									<?php the_sub_field('quote_copy'); ?>
									<footer>
										<svg width="30" height="30">
											<use xlink:href="#icon-quote"></use>
										</svg>
										<cite><?php the_sub_field('quote_author'); ?></cite>
									</footer>
								</blockquote>

							</div>


						<?php elseif( get_row_layout() == 'coloured_bullets_block' ):  ?>

							<div class="post__signal">

								<ul class="post__bullets">

									<?php

									    while ( have_rows('add_bullets') ) : the_row(); ?>

											<li>
												<?php the_sub_field('bullet_content'); ?>
											</li>

										<?php endwhile;

									?>

								</ul>

							</div>


						<?php elseif( get_row_layout() == 'image_block' ):  ?>

							<div class="post__signal">

								<figure class="post__photo">
									<img src="<?php the_sub_field('image_for_block'); ?>" alt="">
									<figcaption>
										<svg width="17" height="14">
											<use xlink:href="#icon-camera"></use>
										</svg>
										<p>
											<?php the_sub_field('image_caption'); ?>
										</p>
									</figcaption>
								</figure>

							</div>

						<?php elseif( get_row_layout() == 'video_block' ):  ?>

							<div class="post__signal">
								<div class="post__video embed-container">
									<div class="post__video--overlay" onClick="style.pointerEvents='none'"></div>
									<iframe src='<?php the_sub_field('video_embed_link'); ?>'
										frameborder='0' webkitAllowFullScreen mozallowfullscreen
										allowFullScreen></iframe>
								</div>
							</div>

						<?php elseif( get_row_layout() == 'reverse_colour_block' ):  ?>

							<section class="post__expectations" id="<?php the_sub_field('unique_id_for_menu_use'); ?>">
								<h3><?php the_sub_field('reverse_colour_block_title'); ?></h3>
								<?php the_sub_field('reverse_colour_block_content'); ?>
							</section>

						<?php elseif( get_row_layout() == 'numbered_list_block' ):  ?>

							<section class="post__list" id="<?php the_sub_field('unique_id_for_menu'); ?>">
								<?php the_sub_field('numbered_list_intro_content'); ?>
								<ul>

									<?php

									    while ( have_rows('add_numbered_list_items') ) : the_row(); ?>

											<li>
												<h4><?php the_sub_field('list_item_title'); ?></h4>
												<p><?php the_sub_field('list_item_copy'); ?></p>
											</li>

										<?php endwhile;

									?>

								</ul>
							</section>

		        <?php endif;

		    endwhile;

		endif;

		?>


			<?php endwhile; // End of the loop.
			?>

			<div class="post__pagination">

				<?php
				/**
				 *  Infinite next and previous post looping in WordPress
				 */
				if( get_adjacent_post(false, '', true) ) {

					$prev_post_obj  = get_adjacent_post( '', '', false );
					$prev_post_ID   = isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';
					$prev_post_link     = get_permalink( $prev_post_ID );
					?>

					<a href="<?php echo $next_post_link; ?>" class="btn btn--arrow btn--arrow-left">
						<svg width="17" height="17">
              <use xlink:href="#icon-arrow-right"></use>
            </svg>
						Previous Trend
          </a>


				<?php } else {
				    $first = new WP_Query('post_type=post&posts_per_page=1&order=DESC'); $first->the_post();
				    	echo '<a class="btn btn--arrow btn--arrow-left" href="' . get_permalink() . '"><svg width="17" height="17"><use xlink:href="#icon-arrow-right"></use></svg> ' . 'Previous Trend' . '</a>';
				  	wp_reset_query();
				};

				if( get_adjacent_post(false, '', false) ) {

					$next_post_obj  = get_adjacent_post( '', '', false );
					$next_post_ID   = isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';
					$next_post_link     = get_permalink( $next_post_ID );
					?>

					<a href="<?php echo $next_post_link; ?>" class="btn btn--arrow btn--arrow-right">
            Next Trend
            <svg width="17" height="17">
              <use xlink:href="#icon-arrow-right"></use>
            </svg>
          </a>

				<?php } else {
					$last = new WP_Query('post_type=post&posts_per_page=1&order=ASC'); $last->the_post();
				    	echo '<a class="btn btn--arrow btn--arrow-right" href="' . get_permalink() . '">' . 'Next Trend' .  '<svg width="17" height="17"><use xlink:href="#icon-arrow-right"></use></svg></a>';
				    wp_reset_query();
				}; ?>

			</div>
		</div>
	</div>


</main>


<?php
get_footer();
