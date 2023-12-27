<?php get_header(); ?>



<section class="page-content">
    <div class="container">

        <?php
        if(have_posts()): 
            while (have_posts()) { the_post();
                the_content();

            } 
        endif;
        ?>
    </div>
</section>





<?php get_footer(); ?>