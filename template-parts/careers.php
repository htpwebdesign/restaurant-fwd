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

	$terms = get_terms( 
		array(
			'taxonomy' => 'res-career-location',
			'parent'   => 0,
			'hide_empty' => false,
		) 
	);
	if ( $terms && ! is_wp_error($terms) ) : ?>
		<section>
			<h2>Sort By Location:</h2>
				<ul>
					<?php foreach ( $terms as $term ) : ?>
						<li>
							<a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
		</section>
	<?php endif;

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
					<article <?php post_class(' careers-card'); ?>>
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
