<?php 

//Register simple-woo-theme stylesheet and scripts
function simple_woo_theme_load_scripts(){

    //Simple Woo Theme Stylesheets
    wp_enqueue_style('theme-css', get_template_directory_uri(). '/assets/css/theme.css', array(), time(), 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    //Simple Woo Theme Scripts
    wp_enqueue_script('script-js', get_template_directory_uri(). '/assets/js/script.js', array('jquery'), time(), true );

}
add_action('wp_enqueue_scripts', 'simple_woo_theme_load_scripts');


//Register simple-woo-theme nav menu configuration
function simple_woo_theme_nav_config(){

    register_nav_menus(array(
        //menu_id => menu name
        'theme_primary_menu' => "Primary Menu Theme",
        'theme_footer_menu'  => "Footer Menu Theme",
        'theme_sidebar_menu' => 'Sidebar Menu Theme'
    ));
    add_theme_support('post-thumbnails');
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width'    => 600,

        'product_grid'          => array(
            'default_rows'    => 6,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support('custom-logo', [
        "height" => 90,
        "width" => 90,
        "flex-height" => true,
        "flex-width" => true,
    ]);

}
add_action('after_setup_theme', 'simple_woo_theme_nav_config');

//Add li class to wordpress menu 
function simple_add_li_menu_class($classes, $item, $args){
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'simple_add_li_menu_class', 1, 3);

//Add a anchor class to wordpress menu 
function simple_add_anchor_menu_class($classes, $item, $args){
    $classes['class'] = 'nav-link';
    return $classes;
}
add_filter('nav_menu_link_attributes', 'simple_add_anchor_menu_class', 1, 3);


// function add_menu_atts( $atts, $item, $args ) {
// 	$atts['onClick'] = 'setCurrent()';
//     return $atts;
// }
// add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );


if (class_exists("WooCommerce")) { 
    require_once get_template_directory() . '/include/wc-modifications.php';
    require_once get_template_directory() . '/include/pdf-order-generator.php';
}
require_once get_template_directory() . '/include/theme-customization.php';

// Enqueue JavaScript for cart count update on cart page
function enqueue_cart_count_update_script() {
    // Enqueue jQuery if not already loaded
    if (!wp_script_is('jquery', 'enqueued')) {
        wp_enqueue_script('jquery');
    }
    wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery'), time(), true);

    // Pass PHP variables to JavaScript
    wp_localize_script('custom-ajax-script', 'custom_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom-ajax-nonce'),
    ));

}
add_action('wp_enqueue_scripts', 'enqueue_cart_count_update_script');