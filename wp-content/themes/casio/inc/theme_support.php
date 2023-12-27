<?php 

// Đăng ký các thành phần hỗ trợ theme
add_action( 'after_setup_theme', 'casio_theme_support' );
function casio_theme_support () {
    // Đăng ký menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'text_domain' ),
    ) );

    // Đăng ký hình ảnh cho bài viết
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    add_theme_support('woocommerce');


}