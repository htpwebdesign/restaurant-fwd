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

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );


			$image = get_field('image_about', 'option');
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
						if( $link ): ?>
							<a class="menu-link" href="<?php echo esc_url( $link ); ?>">Careers Page</a>
						<?php endif; ?>
				<?php } ?>	
				</div>
			<?php } ?>

			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
