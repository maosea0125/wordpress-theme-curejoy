<?php
    $origianlPost = $post;
    global $post;
var_dump(get_post());exit;
    $categories = wp_get_post_categories($post->ID);

var_dump($categories);exit;

    if ($tags) {
        $tagIds = array();

        foreach($tags as $tag){
            $tagIds[] = $tag->term_id;
        }
        $args = array(
            'category__in' => $tagIds,
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 5,
            'caller_get_posts'=> 1,
        );
   
        $relatedPostQuery = new wp_query( $args );

        while( $relatedPostQuery->have_posts() ) {
            $relatedPostQuery->the_post();
?>
    
    <div class="relatedthumb">
<a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail(array(150,100)); ?><br />
<?php the_title(); ?>
</a>
</div>
   
<? }
}
$post = $orig_post;
wp_reset_query();
?>


<div class="span4 column_container" id="responsiveSidebar" style="margin-top: 40px;">
    <aside class="widget outbrain-sidebar-widget-holder">
        <h4 class="block-title"><span>推荐阅读</span></h4>
        <div class="outbrain-sidebar-widget">
            <div class="ob-widget ob-strip-layout MB_2">
                <div class="ob-widget-section ob-first">
                    <ul class="ob-widget-items-container">
                        <li class="ob-dynamic-rec-container ob-recIdx-0 ob-o">
                            <a class="ob-dynamic-rec-link" target="_self">
                                <span class="ob-unit ob-rec-image-container" data-type="Image">
                                    <div class="ob-image-ratio"></div>
                                    <img class="ob-rec-image ob-show ob-show" src="#" />
                                </span>
                                <span class="ob-unit ob-rec-text" data-type="Title" title="Side Effects Of Masturbation You Should Know">Side Effects Of Masturbation You Should Know</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>