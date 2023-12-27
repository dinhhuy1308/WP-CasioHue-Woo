<div class="col-inner">
    <a href="<?php the_permalink() ?>" class="plain">
        <div class="box row">
            <div class="box-image">
                <?php the_post_thumbnail() ?>
            </div>
            <div class="box-text text-left">
                <div class="box-text-inner blog-post-inner">
                    <p class="cat-label  is-xxsmall op-7 uppercase">HƯỚNG DẪN SỬ DỤNG </p>
                    <h5 class="post-title is-large "><?php the_title() ?></h5>
                    <div class="is-divider"></div>
                    <p class="from_the_blog_excerpt "><?php echo wp_trim_words(get_the_excerpt(), 25) ?> [...]</p>
                    <button href="<?php the_permalink() ?>" class="button  is-outline is-small mb-0">
                        Continue reading <span class="meta-nav">→</span> 
                    </button>
                </div>
            </div>
        </div>
    </a>
</div>