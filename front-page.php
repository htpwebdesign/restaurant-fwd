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

			$args = array(
				'post_type'        => 'res-home',
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

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
