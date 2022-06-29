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

$terms = get_terms( 
    array(
        'taxonomy' => 'res-food-category',
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

	
				<article class="menu-card">
				<h2><?php the_title(); ?></h2>

				<?php 
					if (function_exists('get_field') ) {
						if ( get_field( 'food_description' ) ) {
							?>
							<section class= "food-description">
								<p><?php the_field( 'food_description' );?> </p>
							</section> 
							<?php
						}
						if ( get_field( 'food_price' ) ) {
							?>
							<section class= "food-price">
								<p> <?php the_field( 'food_price' ); ?> </p>
							</section> 
							<?php
						}
						if ( get_field( 'food_flavour' ) ) {
							?>
							<section class= "food-flavour">
								<?php 
									$flavors = get_field('food_flavour');
									if ($flavors) :
									?>
									<ul>
										<?php foreach( $flavors as $flavor) : ?>
											<li><?php echo $flavor; ?></li>
											<?php endforeach; ?>
									</ul>
									<?php endif; ?>
							</section> 
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
get_sidebar();
get_footer();
