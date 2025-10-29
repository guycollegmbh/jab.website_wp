<?php

function wpbasic_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'interviews', 'thumbnail' );
	require_once('bs4navwalker.php');
}

add_action( 'after_setup_theme', 'wpbasic_setup' );

function scripts() {
	//wp_enqueue_style('jqueryui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
	//wp_enqueue_style('font_acumin', '//use.typekit.net/wak0zii.css');
	wp_enqueue_style('style', get_theme_file_uri( '/assets/css/style.min.css' ));


	//wp_enqueue_script('jqueryui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array( 'jquery' ),'',true);
	//wp_enqueue_script('popper', '//cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array( 'jquery' ),'',true);
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.7.1.min.js', array(),'',true);
	wp_enqueue_script('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', array( 'jquery' ),'',true);

	wp_enqueue_script('global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'scripts' );


add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_style( 'classic-theme-styles' );
	wp_dequeue_style( 'global-styles' );
	wp_deregister_style( 'classic-theme-styles' );
	wp_deregister_style( 'global-styles' );
}, 100000 );

function remove_wp_emoji_styles() {
	wp_dequeue_style( 'wp-emoji-styles' );
  }
  add_action( 'wp_print_styles', 'remove_wp_emoji_styles', 100 );

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


function register_my_menus() {
	register_nav_menus(
		array(
			'menu' => __( 'Menü' ),
			'mobile-menu' => __( 'Mobile Menü' ),
			'contact-menu' => __( 'Kontakt Menü' ),
			'footer-menu' => __( 'Footer Menü' )
		)
	);
}
add_action( 'after_setup_theme', 'register_my_menus');


// Gutenberg fullwidth
function editor_full_width_gutenberg() {
	echo '<style>
	body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
		max-width: none !important;
	}
	.block-editor__container .wp-block {
		max-width: none !important;
	}
	.editor-post-preview{display: none!important;}
	#acf-image-crop-overlay{
		display: none !important;
	}
	</style>';
}
add_action('admin_head', 'editor_full_width_gutenberg');

/** ACF HANDLING */
/**
 * ACF register blocks */

add_action( 'init', 'guc_load_blocks');
function guc_load_blocks() {
	$theme  = wp_get_theme();
	$blocks = get_blocks();
	foreach( $blocks as $block ) {
		if ( file_exists( get_template_directory() . '/blocks/' . $block . '/block.json' ) ) {
			register_block_type( get_template_directory() . '/blocks/' . $block . '/block.json' );
			wp_register_style( $block, get_template_directory_uri() . '/blocks/' . $block . '/' . $block . '.min.css', null, $theme->get( 'Version' ) );
			wp_register_script( $block, get_template_directory_uri() . '/blocks/' . $block . '/' . $block . '.js', [ 'jquery', 'acf' ] );
		}
	}
}

/**
 * Get Blocks
 */
function get_blocks() {
	$theme   = wp_get_theme();
	$blocks  = get_option( 'guc_blocks' );
	$version = get_option( 'guc_blocks_version' );
	
	$folderblocks = scandir( get_template_directory() . '/blocks/' );
	$folderblocks = array_values( array_diff( $folderblocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );
	$difference = array_diff($folderblocks, $blocks);

	if ( !empty($difference) || empty( $blocks ) || version_compare( $theme->get( 'Version' ), $version ) || ( function_exists( 'wp_get_environment_type' ) && 'production' !== wp_get_environment_type() ) ) {
		$blocks = scandir( get_template_directory() . '/blocks/' );
		$blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );

		update_option( 'guc_blocks', $blocks );
		update_option( 'guc_blocks_version', $theme->get( 'Version' ) );

	}
	return $blocks;
}

/** 
 * ACF Categories
 */
function register_guc_category( $guccategories ) {
    $guccategories[] = array(
        'slug'  => 'guc-custom-category',
        'title' => 'GUYCOLLE Elements',
    	'icon'  => 'marker',
    );

    return $guccategories;
}

add_filter( 'block_categories_all', 'register_guc_category' );

/** 
 * ACF Options
 */
add_action('init', 'register_guc_options');
function register_guc_options() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('GUYCOLLE Einstellungen'),
            'menu_title'  => __('Theme'),
            'redirect'    => false,
		));
    }
}
