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

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

<<<<<<< Updated upstream
				$args = array(
					'post_type'        => 'res-careers',
					'posts_per_page'=>    -1,
					);
			
					$query = new WP_Query( $args );
					if ( $query -> have_posts() ) 
						?>
						<section class="hero-section">
						<?php
							while( $query -> have_posts() ) 
								$query -> the_post();
								?>
										<h2><?php the_title(); ?></h2>
									<?php 
												if ( function_exists ( 'get_field' ) ) {
													if ( get_field( 'intro_message' ) ) {
														?>
														<section class= "intro_message">
														 <p><?php the_field( 'intro_message' );?> </p>
														</section> 
														<?php
													}
													if ( get_field( 'intro_message' ) ) {
														?>
														<section class= "job-pay">
														 <p> <?php the_field( 'job_pay' ); ?> </p>
														</section> 
														<?php
													}
												}
=======
				
				$image = get_field('image_home', 'option');
				$size = 'banner-image'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
>>>>>>> Stashed changes

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
