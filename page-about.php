<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Restaurant_FWD
 */

get_header();
?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlc0CQZKqH8D3hXgsuXY3QYWwIlWEO8Sw
&callback=initMap"></script>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );


			$image = get_field('image_about');
			$size = 'large'; // (thumbnail, medium, large, full or custom size)
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}

			if( function_exists( 'get_field' ) ) {
				if ( get_field( 'intro_paragraph') ) {
					?>
					<section class="intro-paragraph">
						<p><?php the_field('intro_paragraph'); ?></p>
					</section>
					<?php
					?>
				<div class="careers-cta-wrapper">
					<?php 
						if( get_field('cta_text')){
							?>
							<section class="cta-text">
								<p><?php the_field('cta_text'); ?></p>
							</section>
							<?php 
						}
					?>
					<?php  
						$link = get_field('careers_cta');
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
			
				<?php } ?>	
				</div>
			<?php } ?>

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
			<?php endif;


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
