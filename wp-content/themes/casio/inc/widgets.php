<?php 

function ascend_theme_slug_widgets_init() {
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => __('Footer Sidebar ' . $i, 'textdomain'),
            'id'            => 'f-sidebar-' . $i,
            'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        ));

    }

    register_sidebar(array(
        'name'          => __('Woocommerce Sidebar', 'textdomain'),
        'id'            => 'woocommerce-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="widget-title shop-sidebar">',
        'after_title'   => '</span>',
    ));

    register_sidebar(array(
        'name'          => __('Instruction Sidebar', 'textdomain'),
        'id'            => 'instruction-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ));

}
add_action('widgets_init', 'ascend_theme_slug_widgets_init');





