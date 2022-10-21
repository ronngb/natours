<?php

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

function wpnatours_custom_logo_setup() {
	$args = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'Natours', 'test' ),
		'unlink-homepage-logo' => true,
	);

	add_theme_support( 'custom-logo', $args );
}

add_action( 'after_setup_theme', 'wpnatours_custom_logo_setup' );

function wpnatours_custom_header_setup() {
	$args = array(
		'default-image'      => get_template_directory_uri() . 'src/assets/images/hero.jpg',
		'header-text'        => true,
		'default-text-color' => '000',
		'flex-width'         => true,
		'flex-height'        => true,
		'width'  => 2000,
		'height' => 733,
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'wpnatours_custom_header_setup' );

function wpnatours_enqueue_styles() {
	wp_enqueue_style( 'lato-font', 'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap', array(), '', 'all' );

	wp_enqueue_style( 'varela-font', 'https://fonts.googleapis.com/css2?family=Varela+Round&display=swap', array(), '', 'all' );

	wp_enqueue_style( 'style-css', get_stylesheet_directory_uri() . '/style.css', array( 'varela-font', 'lato-font' ), 'all' );

	wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/dist/assets/css/main.css', array( 'style-css' ), time(), 'all' );
}
// filemtime( get_template_directory() . '/dist/assets/css/main.css' )

add_action( 'wp_enqueue_scripts', 'wpnatours_enqueue_styles' );

register_nav_menus(
	array(
		'main-menu-lg' => esc_html__( 'Main Menu Desktop', 'wpnatours' ),
	)
);

// Register a new menu
register_nav_menus( array( 'main-menu' => esc_html__( 'Main menu', 'wpnatours' ) ) );
// register_nav_menu( 'main-menu', 'Main menu' );

// Setup widgets area
function wpnatours_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Header Widgets', 'wpnatours' ),
			'id'            => 'header-widgets',
			'description'   => __( 'Heading for Header', 'wpnatours' ),
			'before_widget' => '<h1 class="heading-primary">',
			'after_widget'  => '</h1>',
			'before_title'  => '<span class="heading-primary--main" >',
			'after_title'   => '</span>',
		)
	);
}
add_action( 'widgets_init', 'wpnatours_widgets_init' );


// Apply Filter for Custom Logo
function wpnatours_custom_logo( $id ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );

	if ( has_custom_logo() ) {
		$cus_logo = '<img class="navbar__logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
	} else {
		$cus_logo = '<h1>' . get_bloginfo( 'name' ) . '</h1>';
	}

	return $cus_logo;
}

add_filter( 'wpnatours_logo', 'wpnatours_custom_logo' );
