<?php /* Template Name: Huong dan su dung */ ?>

<?php get_header(); ?>

<div class="main use-manual">
    <div class="owl-carousel featured-posts">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );
        $the_query = new WP_Query($args);
        while ($the_query->have_posts()) : $the_query->the_post();
            get_template_part('template-parts/post/content-banner-page-template');
        endwhile;
        wp_reset_postdata();
        ?>

    </div>
    <div class="row content-use-manual container mx-auto">
        <div class="col-9">
            <div class="row">
                <div class="col-12 post-item">
                    <?php
                    while ($the_query->have_posts()) : $the_query->the_post();
                        get_template_part('template-parts/post/content-page-template');
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <div class="post-sidebar col-3">
            <div class="is-sticky-column">
                <h3 class="mb-3">Chuyên mục</h3>
                <?php
                $terms = get_terms(array(
                    'taxonomy'   => 'category',
                    'hide_empty' => false,
                ));
                
                if ( !empty($terms) ) {
                    echo '<ul>';
                    foreach( $terms as $term ) {
                        echo '<li><a href="' . home_url($term->slug) . '">' . $term->name . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </div>
</div>






<?php get_footer() ?>