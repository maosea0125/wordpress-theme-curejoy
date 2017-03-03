<div class="span8 column_container">
    <div class="article-holder">
        <div class="continue-reading-button-holder">
            <div class="continue-reading-button">CONTINUE READING</div>
        </div>
        <!-- .post -->
        <article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>" >
            <div class="post-header-pc">
                <header>
                    <h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
                    <div class="row">
                        <div class="post-meta-box-desktop clearfix">
                            <div class="pull-left">
                                <time>Feb 28, 2017</time>
                            </div>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </header>
            </div>
            <div class="post-header-mobile">
                <div class="post-featured-image-holder-mobile">
                    <div class="post-image-wrap-mobile">
                        <img src="<?php the_post_thumbnail_url('original') ?>" width="100%"/>
                        <div class="mobile-cover-tint"></div>
                    </div>
                    <div class="header-category-mobile-wrap" style="position: absolute">
                        <header>
                            <h1 itemprop="name" class="entry-title">
                                <a style="color: #fff!important;"><?php the_title(); ?></a>
                            </h1>
                        </header>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="span8 column_container">
                    <div class="post-featured-image-container-desktop">
                        <div class="post-featured-image-holder-pc">
                            <img src="<?php the_post_thumbnail_url('original') ?>" width="100%" />
                        </div>
                        <div class="cj-native-like-share-holder clearfix"></div>
                    </div>

                    <div class="content-container"><?php echo the_content(); ?></div>

                    <div class="span4 column_container" id="responsiveSidebar">
                        <aside class="widget outbrain-sidebar-widget-holder"></aside>
                    </div>
                </div>
            </div>
        </article> <!-- /.post -->
    </div>
</div>
