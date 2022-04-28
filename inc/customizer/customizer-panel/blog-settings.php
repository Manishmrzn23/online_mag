<?php

/**
 * Viral Mag Theme Customizer
 *
 * @package Viral Mag
 */
$wp_customize->add_section('online_magazine_blog_settings_section', array(
    'title' => esc_html__('Blog/Single Post Settings', 'viral-mag'),
    'priority' => 30
));

$wp_customize->add_setting('online_magazine_blog_sec_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new online_magazine_Tab_Control($wp_customize, 'online_magazine_blog_sec_nav', array(
    'section' => 'online_magazine_blog_settings_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('BLog Page', 'viral-mag'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'online_magazine_blog_layout',
                'online_magazine_blog_cat',
                'online_magazine_archive_content',
                'online_magazine_archive_excerpt_length',
                'online_magazine_archive_readmore',
                'online_magazine_blog_date',
                'online_magazine_blog_author',
                'online_magazine_blog_comment',
                'online_magazine_blog_category',
                'online_magazine_blog_tag',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Single Post', 'viral-mag'),
            'icon' => 'dashicons dashicons-admin-page',
            'fields' => array(
                'online_magazine_single_layout',
                'online_magazine_single_categories',
                'online_magazine_single_seperator1',
                'online_magazine_single_author',
                'online_magazine_single_date',
                'online_magazine_single_comment_count',
                'online_magazine_single_views',
                'online_magazine_single_reading_time',
                'online_magazine_single_seperator2',
                'online_magazine_single_tags',
                'online_magazine_single_social_share',
                'online_magazine_single_author_box',
                'online_magazine_single_seperator3',
                'online_magazine_single_prev_next_post',
                'online_magazine_single_comments',
                'online_magazine_single_related_posts',
                'online_magazine_single_related_heading',
                'online_magazine_single_related_post_title',
                'online_magazine_single_related_post_style',
                'online_magazine_single_post_views_count'
            ),
        ),
    ),
)));

$wp_customize->add_setting('online_magazine_blog_cat', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Multiple_Checkbox_Control($wp_customize, 'online_magazine_blog_cat', array(
    'label' => esc_html__('Exclude Category', 'viral-mag'),
    'section' => 'online_magazine_blog_settings_section',
    'choices' => online_magazine_cat(),
    'description' => esc_html__('Post with selected category will not display in the blog page', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_archive_content', array(
    'default' => 'excerpt',
    'sanitize_callback' => 'online_magazine_sanitize_choices'
));

$wp_customize->add_control('online_magazine_archive_content', array(
    'section' => 'online_magazine_blog_settings_section',
    'type' => 'radio',
    'label' => esc_html__('Archive Content', 'viral-mag'),
    'choices' => array(
        'full-content' => esc_html__('Full Content', 'viral-mag'),
        'excerpt' => esc_html__('Excerpt', 'viral-mag')
    )
));

$wp_customize->add_setting('online_magazine_archive_excerpt_length', array(
    'sanitize_callback' => 'absint',
    'default' => 100
));

$wp_customize->add_control(new online_magazine_Range_Slider_Control($wp_customize, 'online_magazine_archive_excerpt_length', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Excerpt Length (words)', 'viral-mag'),
    'input_attrs' => array(
        'min' => 50,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_archive_readmore', array(
    'default' => esc_html__('Read More', 'viral-mag'),
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control('online_magazine_archive_readmore', array(
    'section' => 'online_magazine_blog_settings_section',
    'type' => 'text',
    'label' => esc_html__('Read More Text', 'viral-mag')
));

$wp_customize->add_setting('online_magazine_blog_category', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_blog_category', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Category', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_single_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'layout1'
));


$wp_customize->add_setting('online_magazine_single_categories', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_single_categories', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Categories', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_single_seperator1', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Separator_Control($wp_customize, 'online_magazine_single_seperator1', array(
    'section' => 'online_magazine_blog_settings_section',
)));

$wp_customize->add_setting('online_magazine_single_author', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_single_author', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Author', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_single_date', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_single_date', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Posted Date', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_single_post_views_count', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_single_post_views_count', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Post View Count', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_single_seperator2', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Separator_Control($wp_customize, 'online_magazine_single_seperator2', array(
    'section' => 'online_magazine_blog_settings_section',
)));

$wp_customize->add_setting('online_magazine_single_author_box', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_setting('online_magazine_single_seperator3', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Separator_Control($wp_customize, 'online_magazine_single_seperator3', array(
    'section' => 'online_magazine_blog_settings_section',
)));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_single_author_box', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Author Box', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_single_prev_next_post', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_single_prev_next_post', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Prev/Next Post', 'viral-mag')
)));

$wp_customize->add_setting('online_magazine_single_comments', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_single_comments', array(
    'section' => 'online_magazine_blog_settings_section',
    'label' => esc_html__('Display Comments', 'viral-mag')
)));
