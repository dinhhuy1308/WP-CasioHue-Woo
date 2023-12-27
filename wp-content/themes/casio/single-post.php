<?php get_header(); ?>

<section class="page-content">
    <!-- <div class="container"> -->
    <?php
    if (have_posts()) :
        while (have_posts()) {
            the_post();
    ?>
            <div class="featured-posts">
                <div class="col-inner">
                    <a href="<?php the_permalink() ?>" class="plain">
                        <div class="box row">
                            <div class="box-image">
                                <?php the_post_thumbnail() ?>
                                <div class="title-overlay fill" style="background-color: rgba(0,0,0,.5)"></div>
                            </div>
                            <div class="box-text text-left">
                                <div class="box-text-inner blog-post-inner">
                                    <p class="cat-label  is-xxsmall op-7 uppercase">HƯỚNG DẪN SỬ DỤNG </p>
                                    <h5 class="post-title is-large "><?php the_title() ?></h5>
                                    <div class="is-divider"></div>
                                    <!-- <p class="from_the_blog_excerpt "><?php echo wp_trim_words(get_the_excerpt(), 25) ?> [...]</p> -->
                                    <!-- <button href="<?php the_permalink() ?>" class="button  is-outline is-small mb-0">
                                        Continue reading <span class="meta-nav">→</span>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row content-use-manual container mx-auto">
                    <div class="col-9">
                        <div class="content-single-post">
                            <!-- <div class="col-12 post-item"> -->
                            <?php
                            the_content()
                            ?>
                            <!-- </div> -->
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

                            if (!empty($terms)) {
                                echo '<ul>';
                                foreach ($terms as $term) {
                                    echo '<li><a href="' . home_url($term->slug) . '">' . $term->name . '</a></li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php

        }
    endif;
    ?>
    <!-- </div> -->
</section>





<?php get_footer(); ?>