<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Restaurant_FWD
 */
// [instagram-feed feed=2]

get_header();
?>

	<main id="primary" class="site-main">


					<section class="hero-section">
						
					<?php

					
								while ( have_posts() ) :
									the_post();

									// Output Hero Image and Text
						
									$image = get_field('image_home');
									$size = 'large'; // (thumbnail, medium, large, full or custom size)
									if( $image ) {
										echo wp_get_attachment_image( $image, $size );
									}
						
											if ( function_exists ( 'get_field' ) ) {
												if ( get_field( 'hero_home_text') ) {
													?>
													<section class= "hero-home-text">
													 <p><?php the_field( 'hero_home_text');?> </p>
													</section> 
													<?php
												}
											}
											?>
										</section>
											
										<section class="menu-cta">
											<?php  
									//  Output Our Menu CTA

									if ( function_exists ( 'get_field' ) ) {
										if ( get_field( 'cta_menu_heading' ) ) {
											?>
											 <h2 class= "cta-menu-heading"><?php the_field( 'cta_menu_heading',  );?> </h2>
											<?php
										}
										if ( get_field( 'cta_menu_text' ) ) {
											?>
											 <p class= "cta-menu-text"><?php the_field( 'cta_menu_text',  );?> </p>
											<?php
										}
									}
									?>
									
									<?php
			endwhile;
	
			// Our Menu CTA Carousel
			 echo do_shortcode('[metaslider id="317"]'); ?>

			
			 <?php
			$link = get_field('cta_menu_link');
			if( $link ) : 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a class="button" 
					href="<?php echo esc_url( $link_url ); ?>" 
					target="<?php echo esc_attr( $link_target ); ?>">
					<?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>

				<?php  
			the_posts_navigation();

			?>
			</section>
				<?php 


		echo do_shortcode('[instagram-feed feed=3]');
		?>


		<?php

		// ACF For Google Maps

		if ( function_exists ( 'get_field' ) ) {
			if ( get_field( 'maps_title', 'options' ) ) {
				?>
				 <h2 class= "maps-title"><?php the_field( 'maps_title', 'options' );?> </h2>
				<?php
			}
		}
		if( have_rows('locations', 'options') ): ?>
			<div class="acf-map" data-zoom="16">
			<?php while ( have_rows('locations', 'options') ) : the_row();
			// Load sub field values.
			$location = get_sub_field('google_maps', 'options');
			$title = get_sub_field('title', 'options');
			$description = get_sub_field('description', 'options');

			?>
			<div class="marker" data-lat="<?php echo
			esc_attr($location['lat']); ?>" data-lng="<?php echo
			esc_attr($location['lng']); ?>">
			<h3><?php echo esc_html( $title ); ?></h3>
			<p><em><?php echo esc_html( $location['address'] );
			?></em></p>
			<p><?php echo esc_html( $description ); ?></p>
			</div>
			<?php endwhile; ?>
			</div>
			<?php endif; ?>

		

	</main><!-- #main -->

<?php
get_footer();