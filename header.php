<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/cj-all-page.js"></script>
    <link rel='stylesheet' id='fontawesome-css'  href='//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo esc_url( get_template_directory_uri() ); ?>/css/td-bootstrap.css' type='text/css' media='all' />
</head>

<body class="home page page-id-3614 page-parent page-template-default homepage td-custom-background wpb-js-composer js-comp-ver-3.6.8 vc_responsive">
<div id="fb-root"></div>
<div class="shadescreen"></div>

<!-- cj_extended_header_menu -->
<nav class="cj-wildebeest-menu-placeholder">
    <div class="container-fluid cj-wildebeest-menu-wrap">
        <div class="row-fluid">
            <div class="cj-logo">
                <a href="http://www.curejoy.com/content/" style="background-image: url('http://cdn2.curejoy.com/content/wp-content/themes/CurejoyMagazinly/images/header/logo_inwhite2.png');background-size: contain;background-repeat: no-repeat;width: 84px;height: 40px;display:block"></a>
            </div>
            <ul class="cj-header-menu">
                <li class="menu-btn">
                    <span id="cj-extended-menu-btn-desktop-trigger" class="cj-extended-menu-btn"><i class="fa fa-bars"></i></span>
                    <span id="cj-extended-menu-btn-tablet-trigger" class="cj-extended-menu-btn"><i class="fa fa-bars"></i></span>
                    <span class="cj-extended-menu-btn-mobile-trigger cj-extended-menu-btn"><i class="fa fa-bars"></i></span>
                </li>
                <li class="search-desktop">
                    <!-- DESKTOP SEARCH -->
                    <div class="cj-search-desktop-holder">
                        <form role="search" id="searchBarContainer" method="get" action="http://www.curejoy.com/content/" class="cj-search-desktop-form">
                            <input type="text" class="typeahead" name="s" placeholder="What do you need help with?">
                            <button type="submit" style="display:none"></button>
                            <span class="td-sp cj-ico-search"></span>
                        </form>
                    </div>
                </li>
                <li class="search-mobile">
                    <!-- MOBILE SEARCH -->
                    <span class="toggle-search-mobile-button fa fa-search" role="button"></span>
                    <div class="cj-search-mobile-holder">
                        <div id="mobile-search-title-container">
                            <div class="mobile-search-title-text">(Tap Here To Hide)</div>
                        </div>
                        <div class="clear"></div>
                        <form role="search" id="searchBarContainer" method="get" action="http://www.curejoy.com/content/" class="cj-search-mobile-form">
                            <input type="text" class="typeahead" name="s" placeholder="What do you need help with?">
                            <button type="submit" style="display: none"></button>
                            <span class="td-sp cj-ico-search"></span>
                        </form>
                        <div class="mobile-search-screen"></div>
                    </div>
                </li>
            </ul>
        </div> <!-- /.row-fluid -->

        <div class="cj-extended-menu-holder-desktop">
            <div class="main-menu-tag-holder">
                <?php $tags = get_tags(array('orderby'=>'count', 'order'=>'DESC')); ?>
                <?php foreach($tags as $tag): ?>
                    <a href="<?php echo esc_url(get_category_link($tag->term_taxonomy_id)); ?>" data-tag="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                <?php endforeach; ?>
            </div>
            <?php $categories = get_categories(array('parent'=>'0', 'orderby'=>'name', 'order'=>'DESC')); ?>
            <?php foreach($categories as $category): ?>
                <?php $catgoryUrl = esc_url(get_category_link($category->cat_ID)); ?>
                <div class="main-menu-item-holder">
                    <h4><a href="<?php echo $catgoryUrl; ?>"><?php echo $category->cat_name; ?></a></h4>
                    <?php $subCategories = get_categories(array('parent'=>$category->cat_ID, 'hide_empty'=>false)); ?>
                    <div class="sub-menu-holder">
                        <ul class="sub-menu">
                            <?php foreach($subCategories as $subCategory): ?>
                            <li data-link="Sex" class="item ">
                                <a href="<?php echo esc_url(get_category_link($subCategory->cat_ID)); ?>" class="title"><?php echo $subCategory->cat_name; ?></a>
                            </li>
                            <?php endforeach; ?>
                            <li data-link="Meditation" class="item ">
                                <a href="<?php echo $catgoryUrl; ?>" class="title and-more-link">更多</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cj-extended-menu-holder-mobile side-menu-close">
            <div class="cj-mobile-menu-content-wrap">
                <div class="main-menu-item-holder-mobile">
                    <a href="#" class="cj-extended-menu-btn-mobile-trigger side-menu-close-btn"><i class="fa fa-times"></i></a>
                    <ul>
                        <?php foreach($categories as $category): ?>
                            <?php $catgoryUrl = esc_url(get_category_link($category->cat_ID)); ?>
                            <li>
                                <a href="<?php echo $catgoryUrl; ?>"><?php echo $category->cat_name; ?></a>
                                <span class="active-link"></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="main-menu-tag-holder-mobile">
                    <?php foreach($tags as $tag): ?>
                        <a href="<?php echo esc_url(get_category_link($tag->term_taxonomy_id)); ?>" class=""><?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div><!-- /.td-menu-wrap -->
</nav> <!-- /.td-menu-placeholder -->
<div class="cj-wildebeest-menu-spacer"></div>

<script>
    jQuery(document).ready(function(){
        jQuery('#cj-extended-menu-btn-desktop-trigger').on('click', function(event){
            event.preventDefault();
            jQuery('.menu-btn .cj-extended-menu-btn i').toggleClass('fa-bars').toggleClass('fa-close');
            jQuery( ".cj-extended-menu-holder-desktop" ).slideToggle( "slow" );
        });
        jQuery('.cj-extended-menu-btn-mobile-trigger, #cj-extended-menu-btn-tablet-trigger').on('click', function(event){
            event.preventDefault();
            jQuery('.menu-btn .cj-extended-menu-btn i').toggleClass('fa-bars').toggleClass('fa-close');
            jQuery('.cj-extended-menu-holder-mobile').toggleClass('side-menu-open').toggleClass('side-menu-close');
            jQuery('body').toggleClass('nobgscroll');
        });
        jQuery('.toggle-search-mobile-button, #mobile-search-title-container').on('click', function() {
            jQuery('.cj-search-mobile-holder').slideToggle(500,function() {
                jQuery('.cj-search-mobile-holder .mobile-search-screen').toggleClass("show");
            });
        });
        jQuery('li.profile .cj-extended-menu-btn').on('click', function() {
            var menu = jQuery('#header_UserSettingsMenu');
            if(menu.hasClass("hide-me")) {
                menu.fadeIn(400).removeClass("hide-me");
            } else {
                menu.fadeOut(400).addClass("hide-me");
            }
        });
        var screenSizeWidth = jQuery(window).width();
        var screenSizeHeight = jQuery(window).height();
        if(getParameterByName("cjhb_web_view") == "ios"){
            screenSizeHeight = screenSizeHeight - 64;
        }
        if(screenSizeWidth <= 480) {
            jQuery('.cj-mobile-menu-content-wrap').height(screenSizeHeight);
        }else{
            jQuery('.cj-mobile-menu-content-wrap').height("auto");
        }
        jQuery('.main-menu-item-holder-mobile').height(screenSizeHeight - 140);
    });
</script>

