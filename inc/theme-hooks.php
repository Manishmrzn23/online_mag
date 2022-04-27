<?php 

function online_magazine_body_classes_body($classes) {

    $sticky_header = get_theme_mod('online_magazine_sticky_header', 'off');
    if ($sticky_header == 'on') {
        $classes[] = 'om-sticky-header';
    }

    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    $online_magazine_sidebar_layout = '';

    if (is_singular('page')) {
        $online_magazine_sidebar_layout = get_theme_mod('online_magazine_page_layout', 'right-sidebar');
    } elseif (is_singular('post')) {
        $online_magazine_sidebar_layout = get_theme_mod('online_magazine_post_layout', 'right-sidebar');
    } elseif (online_magazine_is_woocommerce_activated() && is_woocommerce()) {
        $online_magazine_sidebar_layout = get_theme_mod('online_magazine_shop_layout', 'right-sidebar');
    } elseif (is_archive() && !is_home() && !is_search()) {
        $online_magazine_sidebar_layout = get_theme_mod('online_magazine_archive_layout', 'right-sidebar');
    } elseif (is_home()) {
        $online_magazine_sidebar_layout = get_theme_mod('online_magazine_home_blog_layout', 'right-sidebar');
    } elseif (is_search()) {
        $online_magazine_sidebar_layout = get_theme_mod('online_magazine_search_layout', 'right-sidebar');
    } else {
        $online_magazine_sidebar_layout = 'right-sidebar';
    }

    $classes[] = 'om-' . $online_magazine_sidebar_layout;

    $sticky_header = get_theme_mod('online_magazine_sticky_header', 'off');
    $website_layout = get_theme_mod('online_magazine_website_layout', 'wide');
    $sidebar_style = get_theme_mod('online_magazine_sidebar_style', 'sidebar-style2');
    $sticky_sidebar = get_theme_mod('online_magazine_sticky_sidebar', true);


    if (is_singular('post')) {
        $online_magazine_post_layout = get_theme_mod('online_magazine_single_layout', 'layout1');
        $classes[] = 'om-single-' . $online_magazine_post_layout;
    }

    if ($sticky_header == 'on') {
        $classes[] = 'om-sticky-header';
    }

    if ($sticky_sidebar) {
        $classes[] = 'om-sticky-sidebar';
    }

    $classes[] = 'om-' . $website_layout;

    $classes[] = 'om-' . $sidebar_style;


    if (is_archive() || is_home() || is_search()) {
        $blog_layout = get_theme_mod('online_magazine_blog_layout', 'layout1');
        $classes[] = 'om-blog-' . $blog_layout;
    }

    return $classes;
}

add_filter('body_class', 'online_magazine_body_classes_body');