<?php

if (!function_exists('online_magazine_sidebar_content')) {

    function online_magazine_sidebar_content() {

        $online_magazine_sidebar_layout = "right-sidebar";

        if (is_singular('page')) {
            $online_magazine_sidebar_layout = get_theme_mod('online_magazine_page_layout', 'right-sidebar');
        } elseif (is_singular('post')) {
            $online_magazine_sidebar_layout = get_theme_mod('online_magazine_post_layout', 'right-sidebar');
        } elseif (is_singular('product')) {
            $online_magazine_sidebar_layout = get_theme_mod('online_magazine_shop_layout', 'right-sidebar');
        } elseif (is_archive() && !is_home() && !is_search()) {
            $online_magazine_sidebar_layout = get_theme_mod('online_magazine_archive_layout', 'right-sidebar');
        } elseif (is_home()) {
            $online_magazine_sidebar_layout = get_theme_mod('online_magazine_home_blog_layout', 'right-sidebar');
        } elseif (is_search()) {
            $online_magazine_sidebar_layout = get_theme_mod('online_magazine_search_layout', 'right-sidebar');
        }
        if ($online_magazine_sidebar_layout == "no-sidebar" || $online_magazine_sidebar_layout == "no-sidebar-narrow") {
            return;
        }

        if (is_active_sidebar('online-magazine-sidebar-right') && $online_magazine_sidebar_layout == "right-sidebar") {
            ?>
                <div class="atbs-sub-col js-sticky-sidebar">
                    <?php dynamic_sidebar('online-magazine-sidebar-right'); ?>
                </div>
            <?php
        }

        if (is_active_sidebar('online-magazine-sidebar-left') && $online_magazine_sidebar_layout == "left-sidebar") {
            ?>
                <div class="atbs-sub-col js-sticky-sidebar">
                    <?php dynamic_sidebar('online-magazine-sidebar-left'); ?>
                </div>
            <?php
        }
    }    
}   

add_action('online_magazine_sidebar_template', 'online_magazine_sidebar_content');