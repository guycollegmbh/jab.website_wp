<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hmh
 */

?>
<!DOCTYPE html>
<!--
 _____ _____ __ __ _____ _____ __    __    _____
|   __|  |  |  |  |     |     |  |  |  |  |   __|
|  |  |  |  |_   _|   --|  |  |  |__|  |__|   __|
|_____|_____| |_| |_____|_____|_____|_____|_____|

Realisation by GUYCOLLE GmbH, https://www.guycolle.com
-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/ms-icon-144x144.png">
 

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<?php
/**
 * The template for displaying the header
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hmh
 */

$logo = get_field('logo', 'option');
?>
<header>
	<nav class="navbar navbar-expand-sm">
		<div class="container-fluid">
			<a class="navbar-brand" href="/"><?php echo $logo; ?></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MAINMOBILEnav" aria-controls="MAINMOBILEnav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
				wp_nav_menu([
					'menu'            => 'contact-menu',
					'theme_location'  => 'contact-menu',
					'container'       => 'div',
					'container_id'    => 'CONTACTnav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => 'navbarContent',
					'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
					'depth'           => 2,
					'fallback_cb'     => 'bs4navwalker::fallback',
					'walker'          => new bs4navwalker()
				]);
			?>
			<?php
				wp_nav_menu([
					'menu'            => 'menu',
					'theme_location'  => 'menu',
					'container'       => 'div',
					'container_id'    => 'MAINnav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => 'navbarContent',
					'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
					'depth'           => 2,
					'fallback_cb'     => 'bs4navwalker::fallback',
					'walker'          => new bs4navwalker()
				]);
			?>
			<?php
				wp_nav_menu([
					'menu'            => 'mobile-menu',
					'theme_location'  => 'mobile-menu',
					'container'       => 'div',
					'container_id'    => 'MAINMOBILEnav',
					'container_class' => 'collapse navbar-collapse',
					'menu_id'         => 'navbarContent',
					'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
					'depth'           => 2,
					'fallback_cb'     => 'bs4navwalker::fallback',
					'walker'          => new bs4navwalker()
				]);
			?>
		</div>
	</nav>
</header>