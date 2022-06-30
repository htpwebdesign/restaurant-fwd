<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Restaurant_FWD
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php


				$image = get_field('image_single_menu', 'option');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}


$terms = get_terms( 
    array(
        'taxonomy' => 'res-career-location',
		'parent'   => get_queried_object()->term_id,
		'hide_empty' => false,
    ) 
);
if ( $terms && ! is_wp_error($terms) ) : ?>
    <section>
        <h2>Explore our menu</h2>
			<ul>
				<?php foreach ( $terms as $term ) : ?>
					<li>
						<a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
    </section>

<?php endif; ?>

			<?php  
			while ( have_posts() ) :
				the_post();
			?>		

	
				<article <?php post_class( 'menu-card' ); ?>>
				<h2><?php the_title(); ?></h2>

				<?php 
					if (function_exists('get_field') ) {
						if ( get_field( 'job_description' ) ) {
							?>
							<section class= "job_description">
								<p><?php the_field( 'job_description' );?> </p>
							</section> 
							<?php
						}
						if ( get_field( 'job_pay' ) ) {
							?>
							<section class= "job_pay">
								<p> <?php the_field( 'job_pay' ); ?> </p>
							</section> 
							<?php
							?>
						<p><?php the_taxonomies(); ?></p>
						<?php  							
						}

					}

				?>
			</article>
			<?php  

			endwhile;

			?>
			<?php 
				$term = get_queried_object();
				$images = get_field('gallery', $term);
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
					<ul>
						<?php foreach( $images as $image_id ): ?>
							<li>
								<?php echo wp_get_attachment_image( $image_id, $size ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php  

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php

get_footer();
