<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Restaurant_FWD
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
	<?php 
		if ( function_exists ( 'get_field' ) ) {
			if ( get_field( 'restaurant_name', 'option' ) ) {
	?>
		<section class= "restaurant-section">
			<h3><?php the_field( 'restaurant_name', 'option' );?> </h3> 
	<?php
		}
		if ( get_field( 'restaurant_hours', 'option' ) ) {
			?>
					<p><?php the_field( 'restaurant_hours', 'option' );?> </p>
			<?php
			}
			if ( get_field( 'restaurant_phone_number', 'option' ) ) {
				?>
						<p><?php the_field( 'restaurant_phone_number', 'option' );?> </p>
					</section> 
				<?php
				}
		}

	
	
	?>			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
