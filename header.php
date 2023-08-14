<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name=”referrer” content=”origin-when-crossorigin”>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('title'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'theme_primary_menu',
                        'container' => false,
                        'items_wrap' => '<ul class="navbar-nav ms-auto mb-2 mb-lg-0">%3$s</ul>',
                    ));
                ?>
                <?php if (class_exists('WooCommerce')) : ?>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-primary" style="margin-right:10px;">
                    Cart (<span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)
                    </a>
                    <?php if (is_user_logged_in()) : ?>
                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="btn btn-primary">
                                My Account
                            </a>
                            <a href="<?php echo wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="btn btn-danger" style="margin-left:10px;">
                                Logout
                            </a>
                    <?php else: ?>
                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="btn btn-primary">
                                Login
                            </a>
                    <?php endif; ?>
                <?php endif; ?>

                

                

            </div>
        </div>
    </nav>