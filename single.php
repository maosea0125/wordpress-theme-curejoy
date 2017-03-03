<?php get_header(); ?>

<div class="container">
    <div class="row">
        <?php
            while( have_posts() ){
                the_post();
                get_template_part('content', get_post_format());
            }

            get_sidebar();
        ?>
    </div>
</div>

<?php get_footer(); ?>