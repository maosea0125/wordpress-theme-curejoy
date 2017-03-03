<?php get_header(); ?>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                
            <?php endwhile;?>

        <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                'next_text'          => __( 'Next page', 'twentyfifteen' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>

<?php get_footer(); ?>
