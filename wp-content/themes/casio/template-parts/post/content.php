<?php global $product; ?>
<div class="product-small box has-hover box-bounce box-text-bottom">
    <div class="box-image">
        <a href="<?php the_permalink(); ?>">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'thumbnail')); ?>
            <a href=<?php echo esc_url($product->add_to_cart_url()); ?>>
                <div class="cart-icon">
                    <strong>+</strong>
                </div>
            </a>
        </a>
        <?php if ($product->is_on_sale()) { ?>
            <p class="sale"><?php echo -percentSale($product->get_regular_price(), $product->get_sale_price()) ?>%</p>
        <?php }; ?>
    </div>
    <div class="box-text text-center is-small">
        <div class="title-wrapper">
            <p class="name product-title woocommerce-loop-product__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </p>
        </div>
        <div class="price-wrapper d-flex align-items-center">
            <?php echo $product->get_price_html(); ?>
        </div>
    </div>
    
</div>