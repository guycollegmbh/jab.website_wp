<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hmh
 */

$instagram = get_field('instagram', 'option');
$aboutus = get_field('aboutus', 'option');
$termsconditions = get_field('termsconditions', 'option');

?>

<footer>
	<div class="row justify-content-end">
		<div class="col-12">
			<?php if ( $aboutus ): ?>
				<div class="links">
					<a href="<?php echo esc_url( $aboutus['url'] ); ?>" <?php if ( $aboutus['target'] ): ?>target="<?php echo esc_attr( $aboutus['target'] ); ?>"<?php endif; ?>>
						<?php echo esc_html( $aboutus['title'] ); ?>
					</a><br>
			<?php endif; ?>

			<?php if ( $termsconditions ): ?>
					<a href="<?php echo esc_url( $termsconditions['url'] ); ?>" <?php if ( $termsconditions['target'] ): ?>target="<?php echo esc_attr( $termsconditions['target'] ); ?>"<?php endif; ?>>
						<?php echo esc_html( $termsconditions['title'] ); ?>
					</a>
				</div>
			<?php endif; ?>

			<?php if ( $instagram ): ?>
				<div class="instagram">
					<a href="<?php echo esc_url( $instagram['url'] ); ?>" target="<?php echo esc_attr( $instagram['target'] ?: '_blank' ); ?>" rel="noopener noreferrer">
						<img src="/wp-content/themes/guycolle/assets/images/icon_instagram.svg" alt="Instagram">
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
