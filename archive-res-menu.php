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
<!-- instead of a wpquery I'll use a get_terms -->
	<main id="primary" class="site-main">



			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php

			$image = get_field('image_menu', 'option');
			$size = 'large'; // (thumbnail, medium, large, full or custom size)
			if( $image ) {
				echo wp_get_attachment_image( $image, $size );
			}

			$terms = get_terms( 
				array(
					'taxonomy' => 'res-food-category',
					'parent'   => 0,
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

	</main><!-- #main -->

<?php

get_footer();
