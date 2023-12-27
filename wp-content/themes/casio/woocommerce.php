<?php get_header(); ?>


<div class="main">
    <?php
    if (is_singular('product')) {

        while (have_posts()) :
            the_post();
            wc_get_template_part('content', 'single-product');
        endwhile;
    } else {
    ?>
<div class="page-title-inner flex-row  medium-flex-wrap" style="background-color: #022975; color: #fff; margin-bottom: 30px" >
    <div class="container d-flex justify-content-between align-items-center" style="padding: 20px;">
    <div class="flex-col flex-grow medium-text-center">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
            <?php woocommerce_breadcrumb() ?>
        <?php endif; ?>

        <?php do_action('woocommerce_archive_description'); ?>
    </div>
        <?php if (woocommerce_product_loop()) : ?>
            <?php do_action('woocommerce_before_shop_loop'); ?>
    </div>
</div>
<div class="container">
            <?php woocommerce_product_loop_start(); ?>

            <?php if (wc_get_loop_prop('total')) : ?>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <?php wc_get_template_part('content', 'product'); ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php do_action('woocommerce_after_shop_loop'); ?>

    <?php
        else :
            do_action('woocommerce_no_products_found');
        endif;
    }
    ?>


</div>


<?php get_footer(); ?>