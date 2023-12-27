<div class="col-inner">
    <a href="<?php the_permalink() ?>" class="plain">
        <div class="box row">
            <div class="box-image col">
                <?php the_post_thumbnail() ?>
            </div>
            <div class="box-text text-left col">
                <div class="box-text-inner blog-post-inner">
                    <h5 class="post-title is-large "><?php the_title() ?></h5>
                    <p class="from_the_blog_excerpt "><?php echo wp_trim_words(get_the_excerpt(), 25) ?> [...]</p>
                </div>
            </div>
        </div>
    </a>
</div>