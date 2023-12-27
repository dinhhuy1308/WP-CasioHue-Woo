<?php 

// Đăng ký style cho theem
add_action('wp_enqueue_scripts','ascend_theme_register_styles');
function ascend_theme_register_styles(){
    global $theme_uri,$theme_version;

    // wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('font-google-css', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
    wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_style('-owl-carousel-min', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('-owl-theme-default-min', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
    wp_enqueue_style('-bootstrap5-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css');

    wp_enqueue_style('style-css',$theme_uri.'/css/style.css');


    wp_enqueue_script( 'wc-cart-fragments' );

    wp_enqueue_script('-popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', ['jquery'], $theme_version ,true);
    // wp_enqueue_script('-bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', ['jquery'] , $theme_version ,true);
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['jquery'], $theme_version ,true);
    wp_enqueue_script('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js', ['jquery'], $theme_version ,true);


    wp_enqueue_script('app-script',$theme_uri.'/js/app.js', ['jquery'], $theme_version ,true);
    wp_localize_script('app-script','casio_vars', 
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'checkout_url' => wc_get_checkout_url(),
        )
    );

}


// <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
// integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
// </script>

// <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
// integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
// </script>































