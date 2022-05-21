<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_image_size('jumbotron-thumb',1440, 880, false);
    add_image_size('citation-thumb',1440, 460, false);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

    add_theme_support( 'woocommerce' );

}

add_action( 'after_setup_theme', 'tailpress_setup' );

function wpza_replace_repeater_field( $where ) {
    $where = str_replace( "meta_key = 'repeaterkey_$", "meta_key LIKE 'repeaterkey_%", $where );
    return $where;
}
add_filter( 'posts_where', 'wpza_replace_repeater_field' );

function function_tailpress_site_before() {
    get_template_part('/incs/svg');
}

add_action('tailpress_site_before', 'function_tailpress_site_before');
/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'alpinejs', tailpress_asset( 'js/alpinejs.js' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );
add_action('admin_enqueue_scripts', 'tailpress_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Option header du theme',
            'menu_title'	=> 'Header',
            'parent_slug'	=> 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Options footer du site',
            'menu_title'	=> 'Pied de page',
            'parent_slug'	=> 'theme-general-settings',
        ));
    }
}

if(!function_exists('header_page')):
    function header_page($id_page) {


        $titre = get_field('titre_h1', $id_page) ? get_field('titre_h1', $id_page) : '';
        $description = get_field('description_courte', $id_page) ? get_field('description_courte', $id_page) : '';

        ?>
        <header class="cs-header-page">
            <div class="container mx-auto">
                <h1 class="page-title"><?php echo $titre; ?></h1>
                <?php echo $description; ?>
            </div>
        </header>
        <?php
    }
endif;

add_action('header_page_action', 'header_page', 1, 10);
require get_template_directory() . '/woocommerce/wc-template-functions.php';
require get_template_directory() . '/incs/acf.php';


