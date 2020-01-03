<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package trends-theme
 */

?>

<main>
	<section class="hero container">

		<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

		<div class="hero__img load-hidden" style="background-image: url(<?php echo esc_url($featured_img_url); ?>);"></div>
		<div class="hero__text-wrap load-hidden">
			<div class="hero__text">
				<h1 class="hero__title"><?php the_field('hero_section_title'); ?></h1>
				<p><?php the_field('hero_section_text'); ?></p>
			</div>
			<div class="page-header__btns-wrap">
				<a class="header-btn header-btn--trends" href="#trend-1"><span>Global
						Trends</span></a>
				<a class="header-btn header-btn--reports" href="#report-1"><span>Sector
						Reports</span></a>
			</div>
		</div>
	</section>

	<section class="introduction">
		<div class="container">
			<h2 class="introduction__title"><?php the_field('intro_section_title'); ?></h2>
			<div class="introduction__text">
				<?php the_field('intro_section_content'); ?>
			</div>
		</div>
	</section>

	<?php 
	if(get_field('enable_section_global_trends')== 'yes'){ ?>
		<div class="global_trends_section">
			<div class="global_trends_section-inner container">
				<div class="trend_left">
					<h2 class="trend_left-title" ><?php the_field('section_title');?></h2>	
				</div>
				<div class="trend_right">
					<ul class="trend_right-list">
						<?php if( have_rows('global_trends_content') ): ?>
	    					<?php while( have_rows('global_trends_content') ): the_row(); ?>
	       				 		<?php if( get_row_layout() == 'global_trend_layout' ): ?>
									<li class="trend_right-list-item"> <span class="trend_right-number" ><?php the_sub_field('global_trends_number');?></span> <?php the_sub_field('global_trends_title'); ?></li>
						 		<?php endif; ?>
				    		<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>	
		</div>
	<?php }?>
	


	<div class="blog container">

<nav class="Quick-navigation">
	<div class="indicator-tab">
	<?php
		$j=1;
		$posts = get_field('select_global_trends_articles');
		if( $posts ):
			foreach( $posts as $post): setup_postdata($post);
				$total_post = count($posts);
				?>
				<a href="#section-<?php echo $j;?>" class="Quick-navigation-item">
					<div class="out_of_all"><?php echo $j;?> of <?php echo $total_post;?></div>
				</a>
				<?php
				$j++;
			endforeach;
			?>
			<a href="#section-<?php echo $j;?>" class="Quick-navigation-item">
				<div class="out_of_all">Sector Report</div>
			</a>
			<?php
		endif;
	?>

  <div class="Scroll-progress-indicator"></div>
</div>
</nav>

		<div id="trend-1"></div>

		<?php
		$j=1;
		if( $posts ):
			foreach( $posts as $post): setup_postdata($post); 
		    ?>

				<section class="blog__item blog__item--trend js-scroll-step" id="section-<?php echo $j;?>">
					<a href="<?php the_permalink(); ?>">
						<?php $post_featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
						<div class="blog__img" style="background-image: url('<?php echo esc_url($post_featured_img_url); ?>');"></div>
						<div class="blog__text-wrap">
							<span class="blog__badge">

								<?php

								$categories = get_the_category();

								if ( ! empty( $categories ) ) {
										echo esc_html( $categories[0]->name );
								}


								 ?>

							</span>
							<h3 class="blog__title"><?php the_title(); ?></h3>
							<p><?php the_field('hero_sub-heading'); ?></p>
							<span class="btn">Read More</span>
						</div>
					</a>
				</section>
			
		    <?php 
		    $j++; 
			endforeach;
		    wp_reset_postdata();
			endif;
			?>

		<?php /*?>	
		<div id="report-1"></div>
		<?php
		$i=1;
		if( $other_posts ):
			 foreach( $other_posts as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>

						<section class="blog__item blog__item--report" id="section-b<?php echo $i;?>">
							<a href="<?php the_permalink(); ?>">
								<?php $post_featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
								<div class="blog__img" style="background-image: url('<?php echo esc_url($post_featured_img_url); ?>');"></div>
								<div class="blog__text-wrap">
									<span class="blog__badge">

										<?php

										$categories = get_the_category();

										if ( ! empty( $categories ) ) {
												echo esc_html( $categories[0]->name );
										}


										 ?>

									</span>
									<h3 class="blog__title"><?php the_title(); ?></h3>
									<p><?php the_field('hero_sub-heading'); ?></p>
									<span class="btn">Read More</span>
								</div>
							</a>
						</section>

		    <?php
		    $i++;
			endforeach;
		    wp_reset_postdata(); 
			endif; 
			*/
			?>

	
	<?php if(get_field('enable_section_sector_report_grid')=='yes'){ ?>

	<div class="sector_report_grid js-scroll-step"  id="section-<?php echo $j;?>">
		<div class="sector_report_grid__container container">
			<div class="common-title-section">
				<h3 class="common-title-section__main-title" >
					<?php the_field('sector_report_section_title');?>
				</h3>
				<div class="common-title-section__sub-title">
					<p><?php the_field('sector_report_section_description');?></p>
				</div>
			</div>


			<div class="sector_report_grid__cards">
				<?php 
					$the_query = new WP_Query( array(
				    'post_type' => 'post',          
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'category',   
				            'terms' => 3,       
				        )
				    )
				) );

	  		 	while($the_query->have_posts() ) : $the_query->the_post();
				?>
				<div class="sector_report_grid__card">
					<div class="sector_report_grid__image-wrapper">
						<img class="sector_report_grid__image" src="<?php echo get_the_post_thumbnail_url();?>" alt="">
					</div>
					<div class="sector_report_grid__text-wrap">
						<div class="sector_report_grid__badge badge">
							Section Report
						</div>
						<h3 class="sector_report_grid__title">
							<a><?php the_title();?></a>
						</h3>
						<a href="<?php the_permalink();?>" class="sector_report_grid__btn">Read More</a>
					</div>	
				</div>
				<?php 
				endwhile;
		    	wp_reset_postdata();
		    	?>
			</div>
			
		</div>
	</div>
	<?php }?>

	</div>
	<div class="block--wrap container">
		<div class="block block--webinar" style="background-image: url('<?php the_field('webinar_section_image'); ?>');">
			<span><?php the_field('webinar_section_title'); ?></span>
			<h3 class="block__title"><?php the_field('webinar_large_title'); ?></h3>
			<?php the_field('webinar_section_copy'); ?>
			<a href="<?php the_field('webinar_button_url'); ?>" class="btn" target="_blank"><?php the_field('webinar_button_text'); ?></a>
		</div>
		<a href="<?php the_field('download_report', 'option'); ?>" target="_blank" class="block block--download">
			<span><?php the_field('download_section_title'); ?></span>
			<h3 class="block__title"><?php the_field('download_large_title'); ?></h3>
			<div class="block__links-wrap">
				<span class="block__link block__link--download" >
					<?php the_field('download_button_text') ?>
					<svg width="17" height="22">
						<use xlink:href="#icon-download"></use>
					</svg>
				</span>
			</div>
		</a>
		<!-- <div class="block block--reports">
			<span><?php the_field('reports_section_title'); ?></span>
			<h3 class="block__title"><?php the_field('reports_large_title'); ?></h3>
			<div class="block__links-wrap">
				<a class="block__link" href="<?php the_field('2018_link'); ?>" target="_blank">
					2018
					<svg width="15" height="15">
						<use xlink:href="#icon-arrow-right"></use>
					</svg>
				</a>
				<a class="block__link" href="<?php the_field('2017_link'); ?>" target="_blank">
					2017
					<svg width="15" height="15">
						<use xlink:href="#icon-arrow-right"></use>
					</svg>
				</a>
				<a class="block__link" href="<?php the_field('2016_link'); ?>" target="_blank">
					2016
					<svg width="15" height="15">
						<use xlink:href="#icon-arrow-right"></use>
					</svg>
				</a>
			</div>
		</div> -->
	</div>
	<div class="authors">
		<div class="container">
			<div class="authors__col">
				<h4 class="authors__title"><?php the_field('authors_section_title'); ?></h4>
				<div class="authors__wrap">

					<?php

					if( have_rows('add_authors') ):

							while ( have_rows('add_authors') ) : the_row(); ?>

								<div class="authors__person">
									<div class="authors__photo" style="background-image: url('<?php the_sub_field('author_picture'); ?>');">&nbsp;</div>
									<h5 class="authors__name"><?php the_sub_field('author_name'); ?></h5>
									<span><?php the_sub_field('author_title'); ?></span>
								</div>

							<?php endwhile;

					endif;

					?>

				</div>
			</div>
			<div class="authors__col">
				<h4 class="authors__title"><?php the_field('contributors_section_title'); ?></h4>
				<ul>

					<?php

					if( have_rows('add_contributors') ):

							while ( have_rows('add_contributors') ) : the_row(); ?>

								<li>
									<p class="authors__name"><?php the_sub_field('contributor_name'); ?></p><span><?php the_sub_field('contributor_title'); ?></span>
								</li>

							<?php endwhile;

					endif;

					?>

				</ul>
			</div>
		</div>
	</div>
</main>
