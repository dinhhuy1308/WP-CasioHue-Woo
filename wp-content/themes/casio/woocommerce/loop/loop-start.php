<?php

/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="term-layout">
    <div class="row ">
        <?php if (is_shop() || is_product_category()) : ?>
            <div class="sidebar col-3">
                <?php do_action('custom_sidebar_content_start'); ?>
                <?php dynamic_sidebar('woocommerce-sidebar'); ?>
                <?php do_action('custom_sidebar_content_end'); ?>
            </div>
            <ul class="col-9 products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
            <?php else : ?>
                <ul class="  col-12 products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
                    <div class="owl-carousel owl-carousel-related">
                <?php endif; ?>