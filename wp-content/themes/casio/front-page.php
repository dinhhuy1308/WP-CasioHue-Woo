<?php get_header() ?>
<div class="main">

    <!-- <ul class="nav-dropdown nav-dropdown-simple dropdown-uppercase">
        <li class="html widget_shopping_cart">
            <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
            </div>
        </li>
    </ul> -->

    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content() ?>
            <?php endwhile; ?>
        <?php endif ?>

        <div class="owl-carousel banner owl-theme ">
            <div class="item banner_item">
                <div class="banner_slide_img">
                    <img src="<?php echo get_field('banner_1')['url'] ?>" alt="">
                </div>
            </div>
            <div class="item banner_item">
                <div class="banner_slide_img">
                    <img src="<?php echo get_field('banner_2')['url'] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-inner">
            <div class="section-title-container">
                <h3 class="section-title section-title-bold-center">
                    <b></b>
                    <span class="section-title-main" style="color:rgba(0, 8, 191, 0.907);">Dòng sản phẩm</span>
                    <b></b>
                </h3>
            </div>
            <div class="row product-line">
                <div class="col medium-3 small-6 large-3">
                    <div class="col-inner">
                        <a href="">
                            <div class="img-inner">
                                <img src=<?php echo get_field('product_line_1')['url'] ?> alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col medium-3 small-6 large-3">
                    <div class="col-inner">
                        <a href="">
                            <div class="img-inner">
                                <img src=<?php echo get_field('product_line_2')['url'] ?> alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col medium-3 small-6 large-3">
                    <div class="col-inner">
                        <a href="">
                            <div class="img-inner">
                                <img src=<?php echo get_field('product_line_3')['url'] ?> alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col medium-3 small-6 large-3">
                    <div class="col-inner">
                        <a href="">
                            <div class="img-inner">
                                <img src=<?php echo get_field('product_line_4')['url'] ?> alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="is-divider divider clearfix" style="max-width:1000000px;background-color:rgba(0, 0, 0, 0.488);"></div>
            <div class="section-title-container">
                <h3 class="section-title section-title-bold-center">
                    <b></b>
                    <span class="section-title-main" style="color:rgba(0, 8, 191, 0.907);">TOP SẢN PHẨM BÁN CHẠY NHẤT THÁNG</span>
                    <b></b>
                </h3>
            </div>
            <div class="owl-carousel product-item owl-carousel-best-selling-product product-item owl-theme ">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                );

                $the_query = new WP_Query($args);

                while ($the_query->have_posts()) : $the_query->the_post();
                    get_template_part('template-parts/post/content');
                endwhile;

                wp_reset_postdata();
                ?>
            </div>
        </div>

        <div class="row hide-for-small">
            <div class="col-12" style="padding-bottom: 30px;">
                <div class="row col-inner text-center">
                    <div class="col-3 pr-0">
                        <img src="<?php echo get_field('banner_edifice')['url'] ?>" alt="">
                    </div>
                    <div class="col-9 pl-0">
                        <div class="col-inner" style=" background-color:rgb(219, 245, 255)" ;>
                            <div class="col-12" style="padding: 15px;">
                                <div class="container section-title-container">
                                    <h3 class="section-title section-title-bold-center">
                                        <span class="section-title-main" style="font-size:113%;">Edifice bán chạy nhất tháng</span><b></b>
                                    </h3>
                                </div>
                                <div class="owl-carousel product-item owl-carouse-edifice-product">
                                    <?php

                                    $term = get_term(18, 'product_cat');
                                    $cat_slug = $term->slug;

                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => -1,
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'slug',
                                                'terms'    => 'edifice',
                                            ),
                                        ),
                                    );



                                    $the_query = new WP_Query($args);

                                    while ($the_query->have_posts()) : $the_query->the_post();
                                        get_template_part('template-parts/post/content');
                                    endwhile;

                                    wp_reset_postdata();
                                    ?>
                                </div>
                                <a class="button primary is-outline lowercase" href="<?php echo get_term_link($term); ?>">
                                    <span>Xem tất cả mẫu Edifice</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hide-for-small">
            <div class="col-12" style="padding-bottom: 30px;">
                <div class="row col-inner text-center">
                    <div class="col-3 pr-0">
                        <img src="<?php echo get_field('banner_gshock')['url'] ?>" alt="">
                    </div>
                    <div class="col-9 pl-0">
                        <div class="col-inner" style=" background-color:rgb(219, 245, 255)" ;>
                            <div class="col-12" style="padding: 15px;">
                                <div class="container section-title-container">
                                    <h3 class="section-title section-title-bold-center">
                                        <span class="section-title-main" style="font-size:113%;">Gshock bán chạy nhất tháng</span><b></b>
                                    </h3>
                                </div>
                                <div class="owl-carousel product-item owl-carouse-gshock-product">
                                    <?php
                                    $term = get_term(21, 'product_cat');
                                    $cat_slug = $term->slug;

                                    $args = array(
                                        'post_type'      => 'product',
                                        'posts_per_page' => -1,
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'slug',
                                                'terms'    => 'gshock',
                                            ),
                                        ),
                                    );


                                    $the_query = new WP_Query($args);

                                    while ($the_query->have_posts()) : $the_query->the_post();
                                        get_template_part('template-parts/post/content');
                                    endwhile;

                                    wp_reset_postdata();
                                    ?>
                                </div>
                                <a class="button primary is-outline lowercase" href="<?php echo get_term_link($term); ?>">
                                    <span>Xem tất cả mẫu Gshock</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-collapse row-divided hide-for-small">
            <img width="100%" src="<?php echo get_field('he_thong_cua_hang')['url'] ?>" alt="">
        </div>
        <div class="row hide-for-small">
            <div class="col-12" style="background-color: #fff; margin: 30px 0; padding-top: 30px;">
                <div class="col-inner">
                    <div class="container section-title-container" style="margin-bottom: 30px;">
                        <h3 class="section-title section-title-normal">
                            <span class="section-title-main">TIN TỨC - HƯỚNG DẪN</span>
                            <a href="<?php echo home_url('huong-dan-su-dung') ?>" target="">Xem thêm
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </h3>
                    </div>
                    <div class="instructions">
                        <div class="owl-carousel product-item owl-carousel-instructions">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => -1,
                            );

                            $the_query = new WP_Query($args);

                            while ($the_query->have_posts()) : $the_query->the_post();
                            ?>
                                <a href="<?php the_permalink() ?>">
                                    <div class="box-image">
                                        <?php the_post_thumbnail('full') ?>
                                    </div>
                                    <div class="box-text">
                                        <h5 class="post-title is-large "><?php the_title() ?></h5>
                                    </div>

                                </a>
                            <?php
                            endwhile;

                            wp_reset_postdata();
                            ?>


                        </div>
                        <div class="row">
                            <div class="col-3 instruction-item">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

</div>








<?php get_footer() ?>