<?php
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_url($custom_logo_id, 'full');
?>



<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head() ?>
</head>

<!-- ============================== -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
                <div style="position: relative;">
                    <label class="screen-reader-text" for="woocommerce-product-search-field"><?php esc_html_e('Search for:', 'woocommerce'); ?></label>
                    <input autocomplete="off" type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr__('Search products&hellip;', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <input type="hidden" name="post_type" value="product" />
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <div class="icon-loading"></div>
                    </button>
                </div>
                <div class="live-search-results"></div>
            </form>
        </div>
    </div>
</div>
<!-- ============================== -->


<body <?php body_class() ?>>
    <header id="header" class="header">
        <div class="header-wrapper">
            <div id="logo" class="logo">
                <a href="<?php echo home_url() ?>">
                    <!-- <img src="<?php $image ?>" alt=""> -->
                    <img width="200" height="68" src="https://casio-danang.vn/wp-content/uploads/2023/10/Casio_Logo-1.jpg" alt="">
                </a>
            </div>
            <div class="me-auto">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class' => 'header-nav header-nav-main nav nav-left',
                        'items_wrap' => '<ul class="%2$s" id="main-menu">%3$s</ul>',
                    ]);
                }
                ?>

            </div>
            <div class="menu-icons">
                <ul class="header-nav header-nav-main nav nav-right  nav-box nav-size-large nav-uppercase">
                    <li class="header-search ">
                        <a href="" class="icon button circle is-outline is-small" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                    </li>
                    <li class="cart-item">
                        <a href="<?php echo wc_get_cart_url() ?>" class="header-cart-link icon button circle is-outline is-small">
                            <i id="cart-icon" class="fa-solid fa-cart-shopping" data-icon-label="<?php echo WC()->cart->get_cart_contents_count() ?>"></i>
                        </a>
                        
                        <!-- ============== -->
                        <ul class="nav-dropdown nav-dropdown-simple dropdown-uppercase">
                            <li class="html widget_shopping_cart">
                                <div class="widget_shopping_cart_content">
                                    <?php woocommerce_mini_cart(); ?>
                                </div>
                            </li>
                        </ul>
                        <!-- ============== -->
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>