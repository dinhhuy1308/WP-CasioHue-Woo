<footer class="footer" id="footer">
    <div class="container">
        <?php get_template_part('template-parts/footer/footer', 'widgets') ?>

    </div>
</footer>


<?php wp_footer() ?>
<!-- Owl carausel -->
<script>
    function setupOwlCarousel(selector, items) {
        jQuery(selector).owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: items.mobile || 2
                },
                600: {
                    items: items.tablet || 2
                },
                1000: {
                    items: items.desktop || 4
                }
            }
        });
    }
    setupOwlCarousel('.owl-carousel.banner', {
        desktop: 1
    });
    setupOwlCarousel('.owl-carousel-best-selling-product', {
        mobile: 2,
        desktop: 6
    });
    setupOwlCarousel('.owl-carouse-edifice-product', {
        mobile: 2,
        desktop: 4
    });
    setupOwlCarousel('.owl-carouse-gshock-product', {
        mobile: 2,
        desktop: 4
    });
    setupOwlCarousel('.owl-carousel-instructions', {
        mobile: 2,
        desktop: 4
    });
    setupOwlCarousel('.owl-carousel-related', {
        mobile: 2,
        desktop: 4
    });
    setupOwlCarousel('.owl-carousel.featured-posts', {
        mobile: 2,
        desktop: 1
    });
</script>

<!-- jQuery -->
<script>
    jQuery(document).ready(function($) {
        let iconMagnifying = $('.fa-solid.fa-magnifying-glass');
        let loadingIcon = $('.icon-loading');


        // Lắng nghe sự kiện khi người dùng nhập ký tự vào trường tìm kiếm
        $('#woocommerce-product-search-field').on('input', function() {
            var searchQuery = $(this).val();
            // Kiểm tra xem người dùng đã nhập ít nhất 3 ký tự hay chưa
            if (searchQuery.length >= 3) {
                // Gửi yêu cầu Ajax để lấy kết quả tìm kiếm
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'GET',
                    data: {
                        action: 'search_products',
                        search_query: searchQuery
                    },
                    beforeSend: function() {
                        loadingIcon.show();
                        iconMagnifying.hide();
                    },
                    success: function(response) {
                        $('.live-search-results').html(response);
                    },
                    complete: function() {
                        loadingIcon.hide();
                        iconMagnifying.show();
                    }
                });
            } else {
                $('.live-search-results').html('');
            }
        });
    });
</script>

<!-- <script>
    jQuery(document).ready(function($) {
        $(".checkout-button").click(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'check_cart_total',
                },
                success: function(response) {
                    // if (response.success) {
                    //     // window.location.href = '/checkout';
                    // } 
                    if (response.success) {
                        $('.text-warning').html(response.message).css('display', 'block');
                    }
                }
            });
        });
    });
</script> -->

<!-- Fixed Header -->
<script>
    const handlefixedHeader = () => {
        const header = document.getElementById('header');
        if (window.scrollY > 100) {
            header.classList.add('fixed');
        } else {
            header.classList.remove('fixed');
        }
    }
    window.addEventListener('scroll', handlefixedHeader);
</script>


</body>

</html>