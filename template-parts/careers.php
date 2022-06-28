<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Restaurant_FWD
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
	$args = array(
		'post_type'        => 'res-careers',
		'posts_per_page'=>    -1,
		);

		$query = new WP_Query( $args );
		if ( $query -> have_posts() ) {
			?>
			<section class="career-section">
			<?php
				while( $query -> have_posts() ) {
					$query -> the_post();
					?>
					<article class="student-card">
							<h2><?php the_title(); ?></h2>
						<?php 
									if ( function_exists ( 'get_field' ) ) {
										if ( get_field( 'job_description' ) ) {
											?>
											<section class= "job-description">
											 <p><?php the_field( 'job_description' );?> </p>
											</section> 
											<?php
										}
										if ( get_field( 'job_pay' ) ) {
											?>
											<section class= "job-pay">
											 <p> <?php the_field( 'job_pay' ); ?> </p>
											</section> 
											<?php
										}
									}
						?>

						<p><?php the_taxonomies(); ?></p>
					</article>
					<?php wp_reset_postdata(); 
					?>

				<?php

			}
		}
	
		?>
	</header><!-- .entry-header -->

	<?php restaurant_fwd_post_thumbnail(); ?>
