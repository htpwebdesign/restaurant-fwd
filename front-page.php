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

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			?>
					<section class="hero-section">
					<?php
								while ( have_posts() ) :
									the_post();

									// Output Hero Image and Text
						
									$image = get_field('image_home', 'option');
									$size = 'large'; // (thumbnail, medium, large, full or custom size)
									if( $image ) {
										echo wp_get_attachment_image( $image, $size );
									}
						
											if ( function_exists ( 'get_field' ) ) {
												if ( get_field( 'hero_home_text', 'option' ) ) {
													?>
													<section class= "hero-home-text">
													 <p><?php the_field( 'hero_home_text', 'option' );?> </p>
													</section> 
													<?php
												}
											}


									//  Output Our Menu CTA

									if ( function_exists ( 'get_field' ) ) {
										if ( get_field( 'cta_menu_heading' ) ) {
											?>
											<section class= "cta-menu-heading">
											 <h2><?php the_field( 'cta_menu_heading',  );?> </h2>
											</section> 
											<?php
										}
										if ( get_field( 'cta_menu_text' ) ) {
											?>
											<section class= "cta-menu-text">
											 <p><?php the_field( 'cta_menu_text',  );?> </p>
											</section> 
											<?php
										}
									}

			endwhile;

			// Our Menu Continued outside of loop

			$term = get_queried_object();
			$images = get_field('cta_menu_gallery', $term);
			$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
			if( $images ): ?>
				<ul>
					<?php foreach( $images as $image_id ): ?>
						<li>
							<?php echo wp_get_attachment_image( $image_id, $size ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif;

			$link = get_field('cta_menu_link');
			if( $link ): ?>
				<a class="menu-link" href="<?php echo esc_url( $link ); ?>">Menu</a>
			<?php endif;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		echo do_shortcode('[instagram-feed feed=2]');
		?>

	</main><!-- #main -->

<?php
get_footer();