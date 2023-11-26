<?php

if ( ! defined( 'GOTALENT_VER' ) ) {
	define( 'GOTALENT_VER', '1.0.0' );
}


function gotalent_setup() {
	load_theme_textdomain( 'gotalent', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'gotalent' ),
			'category_menu' => esc_html__('Category Menu', 'gotalent'),
			'quick_links' => esc_html__('Quick Links', 'gotalent'),
			'for_talent' => esc_html__('For Talent Menu', 'gotalent'),
			'for_recruiter' => esc_html__('For Recruiter Menu', 'gotalent'),

		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'gotalent_setup' );


add_action( 'wp_enqueue_scripts', 'gotalent_scripts' );
function gotalent_scripts() {
	/** Enqueue Styles */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/assets/css/boostrap-select.min.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('glightbox', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('shortcode', get_template_directory_uri() . '/assets/css/shortcodes.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('gtstyle', get_template_directory_uri() . '/assets/css/style.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('calendar', get_template_directory_uri() . '/assets/css/calendar.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('icon-fonts', get_template_directory_uri() . '/assets/css/icon-font.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('dashboard-css', get_template_directory_uri() . '/assets/css/dashboard.css', array(), GOTALENT_VER, 'all');
	wp_enqueue_style('override', get_template_directory_uri() . '/assets/css/override.css', array(), GOTALENT_VER, 'all');


	/** Enqueue Scripts */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0', true);
	wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/assets/js/boostrap-select.min.js', array(), '1.0', true);
	wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '1.0', true);
	wp_enqueue_script('nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('plugins', get_template_directory_uri() . '/assets/js/plugin.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('typed', 'https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js', array(), '1.0', true);
	wp_enqueue_script('glight-box', 'https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js', array(), '1.0', true);
	wp_enqueue_script('calendar', get_template_directory_uri() . '/assets/js/gt-calendar.js', array(), '1.0', true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper.js', array('jquery', 'swiper-bundle'), '1.0', true);
	wp_enqueue_script('dropdown-js', get_template_directory_uri() . '/assets/js/dropdown.js', array('jquery'), '1.0', true);
	wp_enqueue_script('dashboard-menu-js', get_template_directory_uri() . '/assets/js/dashboard-menu.min.js', array('jquery','dropdown-js'), '1.0', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/** Setup Constants */
define('GT_IMAGES', get_template_directory_uri() . '/assets/images');


function gt_logo($variant = 'default', $id = '')
{
	echo '<a href="/"><img src="'.GT_IMAGES.'/logo.svg" alt="logo-'.$id.'"></a>';
}


