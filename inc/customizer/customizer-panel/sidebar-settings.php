<?php

/**
 * Viral Mag Theme Customizer
 *
 * @package Viral Mag
 */
//LAYOUT OPTIONS
$wp_customize->add_section('online_magazine_sidebar_settings_section', array(
    'title' => esc_html__('Sidebar Settings', 'viral-mag'),
    'priority' => 25
));

$wp_customize->add_setting('online_magazine_sidebar_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new online_magazine_Tab_Control($wp_customize, 'online_magazine_sidebar_nav', array(
    
    'section' => 'online_magazine_sidebar_settings_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Layouts', 'viral-mag'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'online_magazine_page_layout',
                'online_magazine_post_layout',
                'online_magazine_archive_layout',
                'online_magazine_home_blog_layout',
                'online_magazine_search_layout',
                'online_magazine_shop_layout'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Styles', 'viral-mag'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'online_magazine_sidebar_style',
                'online_magazine_content_widget_title_color'
            ),
        )
    ),
)));

$wp_customize->add_setting('online_magazine_sticky_sidebar', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_sticky_sidebar', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Sticky Sidebar', 'viral-mag'),
    'description' => esc_html__('The sidebar will stick at the top on scrolling', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_page_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_page_layout', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Page Layout', 'viral-mag'),
    'class' => 'online-magazine-one-forth-width',
    'description' => esc_html__('Applies to all the General Pages and Portfolio Pages.', 'viral-mag'),
    'options' => array(
        'right-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('online_magazine_post_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_post_layout', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Post Layout', 'viral-mag'),
    'class' => 'online-magazine-one-forth-width',
    'description' => esc_html__('Applies to all the Posts.', 'viral-mag'),
    'options' => array(
        'right-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('online_magazine_archive_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_archive_layout', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Archive Page Layout', 'viral-mag'),
    'class' => 'online-magazine-one-forth-width',
    'description' => esc_html__('Applies to all Archive Pages.', 'viral-mag'),
    'options' => array(
        'right-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('online_magazine_home_blog_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_home_blog_layout', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Blog Page Layout', 'viral-mag'),
    'class' => 'online-magazine-one-forth-width',
    'description' => esc_html__('Applies to Blog Page.', 'viral-mag'),
    'options' => array(
        'right-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('online_magazine_search_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_search_layout', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Search Page Layout', 'viral-mag'),
    'class' => 'online-magazine-one-forth-width',
    'description' => esc_html__('Applies to Search Page.', 'viral-mag'),
    'options' => array(
        'right-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar-narrow.png'
    )
)));

$wp_customize->add_setting('online_magazine_shop_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'right-sidebar'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_shop_layout', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Shop Page Layout(WooCommerce)', 'viral-mag'),
    'class' => 'online-magazine-one-forth-width',
    'description' => esc_html__('Applies to Shop Page, Product Category, Product Tag and all Single Products Pages.', 'viral-mag'),
    'options' => array(
        'right-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/right-sidebar.png',
        'left-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/left-sidebar.png',
        'no-sidebar' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar.png',
        'no-sidebar-narrow' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-layouts/no-sidebar-narrow.png'
    ),
        //'active_callback' => 'online_magazine_is_woocommerce_activated'
)));

$wp_customize->add_setting('online_magazine_sidebar_style', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'sidebar-style2',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_sidebar_style', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Sidebar Style', 'viral-mag'),
    'class' => 'vm-half-width',
    'options' => array(
        'sidebar-style1' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-styles/sidebar-style1.png',
        'sidebar-style2' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/sidebar-styles/sidebar-style2.png'
    )
)));

$wp_customize->add_setting('online_magazine_content_widget_title_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_content_widget_title_color', array(
    'section' => 'online_magazine_sidebar_settings_section',
    'label' => esc_html__('Sidebar Widget Title Color', 'viral-mag')
)));