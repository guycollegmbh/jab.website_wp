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

$titel = get_field('titel', 'option');
$firma = get_field('firma', 'option');
$adresse = get_field('adresse', 'option');
$website = get_field('website', 'option');
$url_target = $website['target'] ? $website['target'] : '_self';
$icon_anydesk_macos = get_field('icon_anydesk_macos', 'option');
$link_anydesk_macos = get_field('link_anydesk_macos', 'option');
$icon_anydesk_windows = get_field('icon_anydesk_windows', 'option');
$link_anydesk_windows = get_field('link_anydesk_windows', 'option');
$icon_termin_buchen = get_field('icon_termin_buchen', 'option');
$link_terminbuchung = get_field('link_terminbuchung', 'option');

?>

<footer>
	<div class="row">
		<div class="col-12 col-lg-10 offset-lg-2">
			<p class="subline"><?php echo $titel; ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-10 offset-lg-2">
			<div class="row inline-col">
				&nbsp;
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-10 offset-lg-2">
			<?php
				wp_nav_menu([
					'menu'            => 'footer-menu',
					'theme_location'  => 'footer-menu',
					'container'       => 'div',
					'container_id'    => 'footernav',
					'container_class' => '',
					'menu_id'         => 'footernavi',
					'menu_class'      => 'ms-auto mb-2 mb-lg-0',
					'depth'           => 1,
					'fallback_cb'     => 'bs4navwalker::fallback',
					'walker'          => new bs4navwalker()
				]);
			?>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
