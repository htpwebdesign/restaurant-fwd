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
				
				$args = array(
					'post_type'        => 'res-food-category',
					'posts_per_page'=>    -1,
					);

					$query = new WP_Query( $args);
					if ( $query -> have_post() ) {
						?>
						<section class="menu-section">
							<?php 
								while( $query -> have_posts() ) {
									$query -> the_post();
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
												if ( get_field( 'food_price' ) ) {
													?>
													<section class= "food-price">
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
							}
						</section>
					}

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
