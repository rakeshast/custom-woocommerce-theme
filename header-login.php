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
        </div>
    </nav>