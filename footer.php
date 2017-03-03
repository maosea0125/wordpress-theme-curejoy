    <footer class="footer text-left">
        <div class="footer-widget-area">
            <div class="container">
                <h5>快速链接</h5>
                <?php $pages = get_pages(array('sort_column'=>'post_title', 'sort_order'=>'ASC')); ?>
                <ul class="list-unstyled quick-link-split">
                    <?php foreach($pages as $page): ?>
                        <li><a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
                <h5>标签</h5>
                <ul class="list-unstyled quick-link-split cond-links">
                    <?php $tags = get_tags(array('orderby'=>'count', 'order'=>'DESC')); ?>
                    <?php foreach($tags as $tag): ?>
                        <li><a href="<?php echo esc_url(get_category_link($tag->term_taxonomy_id)); ?>" class="footer-topic" data-topic="<?php echo $tag->name; ?>" ><?php echo $tag->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div> <!-- end container -->
        </div> <!-- end footer-widget-area -->
    </footer> <!-- end footer -->

    <div id="fb-root"></div>
</body>
</html>
