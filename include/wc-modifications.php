<?php 

function remove_woocommerce_sidebar_on_shop_page(){
    if (is_shop()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
    }
}
// remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
add_action('template_redirect', 'remove_woocommerce_sidebar_on_shop_page');


function add_container_row_div_classes(){
    echo '<div class="container owt-container"><div class="row owt-row">';
}
add_action('woocommerce_before_main_content', 'add_container_row_div_classes', 5);

function close_container_row_div_classes(){
    echo '</div> </div>';
}
add_action('woocommerce_after_main_content', 'close_container_row_div_classes', 5);

add_action('template_redirect', 'load_template_layouts');
function load_template_layouts(){

    if ( is_shop() ) {
        function open_sidebar_column_grid(){
            echo '<div class="col-sm-4">';
        }
        add_action('woocommerce_before_main_content', 'open_sidebar_column_grid', 6);
        
        add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);
        
        function close_sidebar_column_grid(){
            echo '</div>';
        }
        add_action('woocommerce_before_main_content', 'close_sidebar_column_grid', 8);
        
        function open_product_column_grid(){
            echo '<div class="col-sm-8">';
        }
        add_action('woocommerce_before_main_content', 'open_product_column_grid', 9);
        
        function close_product_column_grid(){
            echo '</div>';
        }
        add_action('woocommerce_before_main_content', 'close_product_column_grid', 10);
    }

}

// WooCommerce page title
// add_filter('woocommerce_show_page_title', 'toggle_page_title'); 
// function toggle_page_title($val){
//     $val = false;
//     return $val;
// }

// remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);

// remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

// add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt');

//woocommerce_before_shop_loop

// remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices');

// remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// function add_image_div(){
//     echo '<div class="col-sm-4">';
// }
// add_action('woocommerce_before_main_content', 'add_image_div', 6);

// function add_image_div01(){
//     echo '</div><div class="col-sm-8">';
// }
// add_action('woocommerce_before_main_content', 'add_image_div01', 8);

// function add_image_div02(){
//     echo '</div>';
// }
// add_action('woocommerce_before_main_content', 'add_image_div02', 11);

function add_custom_field(){
    $dat = get_field('testing_data');
    if ($dat) {
        echo "<p>".$dat."</p>";
    }    
}
add_action('woocommerce_single_product_summary', 'add_custom_field', 6);


if (isset($_POST['billing_phone'])) {
    $new_phone_number = sanitize_text_field($_POST['billing_phone']);
    $user_id = get_current_user_id(); // Get the current user ID

    // Update the user meta value
    update_user_meta($user_id, 'billing_phone', $new_phone_number);
    
    echo "Phone number updated successfully!";
}


// function wpdocs_my_search_form( $form ) {
// 	$form = '<form role="search" method="get" id="searchform" class="searchform custom" action="' . home_url( '/' ) . '" >
// 	<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
// 	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search"/>
// 	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
// 	</div>
// 	</form>';

// 	return $form;
// }
// add_filter( 'get_search_form', 'wpdocs_my_search_form' );
/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'simple_woo_theme_woocommerce_header_add_to_cart_fragment' );

function simple_woo_theme_woocommerce_header_add_to_cart_fragment( $fragments ) {	
	ob_start();
	?>
	<span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.items-count'] = ob_get_clean();
	return $fragments;
}

function custom_theme_sidebars() {
    register_sidebar( array(
        'name'          => 'Sidebar 1',
        'id'            => 'sidebar-1',
        'description'   => 'This is the first custom sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Sidebar 2',
        'id'            => 'sidebar-2',
        'description'   => 'This is the second custom sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'custom_theme_sidebars' );


function add_cart_icon_to_menu($items, $args) {
    if ($args->theme_location == 'theme_primary_menu') {
        // Get the WooCommerce cart URL
        $cart_url = wc_get_cart_url();
        $cart_count = WC()->cart->get_cart_contents_count();
        
        // Create the cart icon HTML
        $cart_icon = '<li class="menu-item menu-cart-icon"><a class="cart-contents" href="' . $cart_url . '"><span class="cart-icon">Cart</span>
        <span class="cart-count">' .esc_html( $cart_count ). '</span></a></li>';
        
        // Add the cart icon to the menu items
        $items .= $cart_icon;
    }
    
    return $items;
}
//add_filter('wp_nav_menu_items', 'add_cart_icon_to_menu', 10, 2);

function add_cart_dropdown_to_menu($items, $args) {
    if ($args->theme_location == 'theme_primary_menu') {
        // Get the WooCommerce cart URL
        $cart_url = wc_get_cart_url();
        
        // Create the cart icon HTML
        $cart_icon = '<li class="menu-item menu-cart-icon"><a href="' . $cart_url . '"><i class="fas fa-shopping-cart"></i></a>';
        
        // Get cart items
        $cart_items = WC()->cart->get_cart();
        
        // Build the dropdown menu content
        if ($cart_items) {
            $cart_icon .= '<ul class="sub-menu">';
            foreach ($cart_items as $cart_item_key => $cart_item) {
                $product = $cart_item['data'];
                $product_name = $product->get_name();
                $product_price = wc_price($product->get_price());
                $cart_icon .= '<li><a href="' . $cart_url . '">' . $product_name . ' - ' . $product_price . '</a></li>';
            }
            $cart_icon .= '</ul>';
        }
        
        $cart_icon .= '</li>';
        
        // Add the cart icon and dropdown to the menu items
        $items .= $cart_icon;
    }
    
    return $items;
}
// add_filter('wp_nav_menu_items', 'add_cart_dropdown_to_menu', 10, 2);


// Update cart count on header menu when removing a product from the cart
// Enqueue JavaScript for cart count update on cart page
// function enqueue_cart_count_update_script() {
//     if (is_cart()) {
//         wp_enqueue_script('cart-count-update', get_template_directory_uri() . '/assets/js/cart-count-update.js', array('jquery'), time(), true);
//         wp_localize_script('cart-count-update', 'cartCountAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
//     }
// }
// add_action('wp_enqueue_scripts', 'enqueue_cart_count_update_script');



// // Remove item from cart
// function custom_remove_cart_item($cart_item_key) {
//     WC()->cart->remove_cart_item($cart_item_key);
//     $cart_count = WC()->cart->get_cart_contents_count();
//     print_r($cart_count);
//     wp_send_json_success(array('message' => 'Item removed from cart.', 'count' => $cart_count ));
// }
// add_action('wp_ajax_custom_remove_cart_item', 'custom_remove_cart_item');
// add_action('wp_ajax_nopriv_custom_remove_cart_item', 'custom_remove_cart_item');

// Update item count in cart
// function custom_update_cart_item_count() {
//     $cart_count = WC()->cart->get_cart_contents_count();
//     wp_send_json_success(array('count' => $cart_count));
// }
// add_action('wp_ajax_custom_update_cart_item_count', 'custom_update_cart_item_count');
// add_action('wp_ajax_nopriv_custom_update_cart_item_count', 'custom_update_cart_item_count');



// Add Extra Tabs Woocommerce

// Add custom tabs to WooCommerce product pages
function custom_product_tabs($tabs) {
    // Add your custom tabs here
    $tabs['custom_tab_1'] = array(
        'title'     => __('Custom Tab 1', 'woocommerce'),
        'priority'  => 50,
        'callback'  => 'custom_tab_1_content',
    );

    $tabs['custom_tab_2'] = array(
        'title'     => __('Custom Tab 2', 'woocommerce'),
        'priority'  => 60,
        'callback'  => 'custom_tab_2_content',
    );
    $tabs['custom_tab_3'] = array(
        'title'     => __('Custom Tab 3', 'woocommerce'),
        'priority'  => 80,
        'callback'  => 'custom_tab_3_content',
    );

    // Add more custom tabs if needed
    
    return $tabs;
}
add_filter('woocommerce_product_tabs', 'custom_product_tabs');

// Callback functions for custom tab content
function custom_tab_1_content() {
    echo '<div id="custom_tab_content">';
    echo '<h2>Custom Tab 1 Content</h2>';
    echo '<p>This is the content for Custom Tab 1.</p>';
    echo '</div>';
}

function custom_tab_2_content() {
    echo '<div id="custom_tab_content">';
    echo '<h2>Custom Tab 2 Content</h2>';
    echo '<p>This is the content for Custom Tab 2.</p>';
    echo '</div>';
}
function custom_tab_3_content() {
    echo '<div id="custom_tab_content">';
    echo '<h2>Custom Tab 3 Content</h2>';
    echo '<p>This is the content for Custom Tab 3.</p>';
    echo '</div>';
}

