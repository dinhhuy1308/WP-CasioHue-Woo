<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;
$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();
$percent_discount = percentSale( $regular_price, $sale_price );

$columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
		'woocommerce-product-gallery--columns-' . absint($columns),
		'images',
	)
);
?>
<div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>" data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="woocommerce-product-gallery__wrapper">
		<?php
		if ($post_thumbnail_id) {
			$html = wc_get_gallery_image_html($post_thumbnail_id, true);
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
			$html .= '</div>';
		}

		if ($post_thumbnail_id && has_action('woocommerce_product_thumbnails')) {
		?>
			<!-- <div class="row" style="flex-direction: row-reverse;">
				<div class="col-10" style="position: relative; padding-left: 0">
					<?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); ?>
					<?php
					global $product;
					if ($product->is_on_sale()) {
						echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('Sale!', 'woocommerce') . '</span>',  $product);
					}
					?>
				</div>
				<div class="col-2">
					<?php do_action('woocommerce_product_thumbnails'); ?>
				</div>
			</div> -->
			<!-- =================== -->

			<div class="row" style="flex-direction: row-reverse;">
				<?php
				if ($attachment_ids) :
				?>
					<div class="col-10" style="position: relative; padding-left: 0">
						<?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); ?>
						<?php
						global $product;
						if ($product->is_on_sale()) {
							echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( '-' . $percent_discount . '%', 'woocommerce' ) . '</span>', $product );

						}
						?>
					</div>
					<div class="col-2">
						<?php do_action('woocommerce_product_thumbnails'); ?>
					</div>
				<?php else : ?>
					<?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); ?>
					<?php
					global $product;
					if ($product->is_on_sale()) {
						echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( '-' . $percent_discount . '%', 'woocommerce' ) . '</span>', $post, $product );

					}
					?>
					
					
				<?php endif; ?>
			</div>

		<?php

		}

		// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); 

		// do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>
</div>