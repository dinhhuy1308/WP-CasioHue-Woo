<?php
global $theme_uri;

$theme_uri = get_template_directory_uri() . '/assets';
$theme_dir = get_template_directory();
$theme_version = '1.0';



// Đăng ký style cho theem
require_once $theme_dir . '/inc/scripts.php';

// Đăng ký các thành phần hỗ trợ theme
require_once $theme_dir . '/inc/theme_support.php';

// Đăng ký sidebar, widgets
require_once $theme_dir . '/inc/widgets.php';


// % discount
function percentSale($price, $price_sale)
{
    $sale = ($price_sale * 100) / $price;
    $percent = 100 - $sale;
    return number_format($percent);
}


// Button Mua Ngay
add_filter('woocommerce_add_to_cart_redirect', function ($link) {
    global $aaaaa;
    return $aaaaa ? wc_get_checkout_url() : $link;
});

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
function woocommerce_ajax_add_to_cart()
{
    global $aaaaa;
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    $aaaaa =  true;

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        echo wp_send_json($data);
    }
    wp_die();
}


// Icon social
add_action('woocommerce_share', 'add_icon_social');
function add_icon_social()
{
    global $product;

    if (is_product() && $product) {
        $product_title = get_the_title($product->get_id());
        $sanitized_product_title = sanitize_title($product_title);
        $product_permalink = get_permalink($product->get_id());

        echo '<div class="social-icons share-icons share-row relative">
    <a href="https://www.facebook.com/sharer/sharer.php?u=http://' . $product_permalink . '" class="facebook">
        <i class="fa-brands fa-facebook-f"></i>
    </a>
    <a href="https://twitter.com/intent/tweet?url=https://' . $product_permalink . '" class="twitter">
        <i class="fa-brands fa-twitter"></i>
    </a>
    <a href="mailto:enteryour@addresshere.com?subject=' . esc_attr($sanitized_product_title) . '&body=Check%20this%20out:%20https://' . $product_permalink . '/" class="email">
        <i class="fa-regular fa-envelope"></i>
    </a>
    <a href="https://pinterest.com/pin/create/button/?url=https://' . $product_permalink . '/&media=https://casio-danang.vn/wp-content/uploads/2023/09/W-218H-1A.jpg&description=' . esc_attr($sanitized_product_title) . '" class="pinterest">
        <i class="fa-brands fa-pinterest-p"></i>
    </a>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://' . $product_permalink . '/&title=' . esc_attr($sanitized_product_title) . '" class="linkedin">
        <i class="fa-brands fa-linkedin-in"></i>
    </a>
</div>';
    }
}

// Delete tab Review
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs');
function woo_remove_product_tabs($tabs)
{
    unset($tabs['reviews']);
    return $tabs;
}

// Add tab Hướng dẫn thanh toán
add_filter('woocommerce_product_tabs', 'woo_attrib_desc_tab');
function woo_attrib_desc_tab($tabs)
{
    // Adds the Attribute Description tab
    $tabs['attrib_desc_tab'] = array(
        'title'     => __('Hướng dẫn thanh toán', 'woocommerce'),
        'priority'  => 100,
        'callback'  => 'woo_attrib_instruction_tab_content'
    );
    return $tabs;
}
function woo_attrib_instruction_tab_content()
{

    $nd_page = new WP_Query(array(
        'post_type' => 'page',
        'p' => 48
    ));

    while ($nd_page->have_posts()) {
        $nd_page->the_post();
        the_content();
    }
    wp_reset_postdata();
}

// Rename tab Mô tả
add_filter('woocommerce_product_description_tab_title', 'bbloomer_rename_description_product_tab_label');
function bbloomer_rename_description_product_tab_label()
{
    return 'Mô tả';
}

// Input tăng giảm số lượng
add_action('woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus');
function bbloomer_display_quantity_plus()
{
    echo '<button type="button" class="plus">+</button>';
}

add_action('woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus');
function bbloomer_display_quantity_minus()
{
    echo '<button type="button" class="minus">-</button>';
}

// -------------
// 2. Trigger update quantity script

add_action('wp_footer', 'bbloomer_add_cart_quantity_plus_minus');
function bbloomer_add_cart_quantity_plus_minus()
{
    if (!is_product() && !is_cart()) return;
    wc_enqueue_js("   
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   ");
}






// Remove Checkout Fields
add_filter('woocommerce_checkout_fields', 'custom_woocommerce_billing_fields');
function custom_woocommerce_billing_fields($fields)
{
    // Billing
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_email']);

    // Shipping
    unset($fields['shipping']['shipping_address_2']);


    return $fields;
}

function add_image_zoom_support_webtalkhub()
{
    add_theme_support('wc-product-gallery-zoom');
}
add_action('wp', 'add_image_zoom_support_webtalkhub', 100);




// ================================================
// Đăng ký hàm xử lý Ajax
add_action('wp_ajax_search_products', 'search_products_callback');
add_action('wp_ajax_nopriv_search_products', 'search_products_callback');

// Hàm xử lý Ajax
function search_products_callback()
{
    $search_query = sanitize_text_field($_GET['search_query']);

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 5,
        's' => $search_query,
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) : $the_query->the_post();
            // Hiển thị kết quả tìm kiếm
            global $product;
?>
            <div class="autocomplete-suggestion">
                <img class="search-image" src="<?php the_post_thumbnail_url(); ?>">
                <div class="search-name"><?php the_title(); ?></div>
                <span class="search-price">
                    <?php
                    // Hiển thị giá sản phẩm
                    echo $product->get_price_html();
                    ?>
                </span>
            </div>
    <?php
        endwhile;
    } else {
        echo '<div class="autocomplete-suggestion">
        <div class="search-name">Không tìm thấy sản phẩm</div>
        </div>';
    }

    // wp_reset_query();
    wp_reset_postdata();

    // Dừng xử lý và trả về kết quả
    // wp_die();
}



// Update số lượng sản phẩm
 add_filter('woocommerce_add_to_cart_fragments', 'misha_add_to_cart_fragment');

function misha_add_to_cart_fragment($fragments) {
    $fragments['#cart-icon'] = '<i id="cart-icon" class="fa-solid fa-cart-shopping" data-icon-label="' . WC()->cart->get_cart_contents_count() . '"></i>';
    return $fragments;
}



// add_action('wp_ajax_check_cart_total', 'check_cart_total_ajax');
// add_action('wp_ajax_nopriv_check_cart_total', 'check_cart_total_ajax');
// function check_cart_total_ajax() {
//     // Kiểm tra giỏ hàng
//     $cart_total = WC()->cart->total;
//     $minimum_order_amount = 1000000;

//     if ($cart_total >= $minimum_order_amount) {
//         wp_send_json_success(array('redirect_url' => wc_get_checkout_url()));
//     } else {
//         wp_send_json_error(array('message' => '<p class="text-warning">Đơn hàng bắt buộc phải trên 1.000.000 đ, vui lòng mua sắm tiếp</p>'));
//     }
//     wp_die();
// }

function cart_total_is_valid() {
    $cart_total = WC()->cart->total;
    $minimum_order_amount = 1000000;
    $result = $cart_total >= $minimum_order_amount;
    return $result;
}

add_action('template_redirect', 'skip_cart_page_redirection_to_checkout');
function skip_cart_page_redirection_to_checkout() {
    if( is_checkout() && !cart_total_is_valid() ) {
        wp_redirect( wc_get_cart_url() );
    }
}

add_action('woocommerce_before_cart', 'check_cart');
function check_cart() {
    $minimum_order_amount = 1000000;
    $cart_total = WC()->cart->total;

    if ($cart_total < $minimum_order_amount) {
        echo '<p class="text-warning">Đơn hàng bắt buộc phải trên 1.000.000 đ, vui lòng mua sắm tiếp</p>';
    }
}


