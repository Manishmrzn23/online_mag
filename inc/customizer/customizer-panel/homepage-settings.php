<?php

/* ============PRO FEATURES============ */

$online_magazine_pro_features = '<ul class="upsell-features">
	<li>' . esc_html__("5+ Demos that can be imported with one click", "total") . '</li>
        <li>' . esc_html__("Elementor compatible - Built your Home Page with Customizer or Elementor whichever you like", "total") . '</li>
        <li>' . esc_html__("18 Front Page Customizer sections with lots of variations", "total") . '</li>
	<li>' . esc_html__("30+ Elementor Elements", "total") . '</li>
        <li>' . esc_html__("26 custom widgets", "total") . '</li>
	<li>' . esc_html__("Video background, Image Motion background, Parallax background, Gradient background option for each section", "total") . '</li>
	<li>' . esc_html__("4 icon pack for icon picker (5000+ Icons)", "total") . '</li>
	<li>' . esc_html__("Unlimited slider with linkable button", "total") . '</li>
	<li>' . esc_html__("Add unlimited blocks(like slider, team, testimonial) for each Section", "total") . '</li>
	<li>' . esc_html__("Fully customizable options for Front Page blocks", "total") . '</li>
	<li>' . esc_html__("15+ Shape divider to choose from for each section", "total") . '</li>
	<li>' . esc_html__("Remove footer credit Text", "total") . '</li>
	<li>' . esc_html__("6 header layouts and advanced header settings", "total") . '</li>
	<li>' . esc_html__("4 blog layouts", "total") . '</li>
	<li>' . esc_html__("In-built MegaMenu", "total") . '</li>
	<li>' . esc_html__("Advanced Typography options", "total") . '</li>
	<li>' . esc_html__("Advanced color options", "total") . '</li>
	<li>' . esc_html__("Top header bar", "total") . '</li>
	<li>' . esc_html__("PreLoader option", "total") . '</li>
	<li>' . esc_html__("Sidebar layout options", "total") . '</li>
	<li>' . esc_html__("Advanced blog settings", "total") . '</li>
	<li>' . esc_html__("Advanced footer setting", "total") . '</li>
	<li>' . esc_html__("Front page sections with full window height", "total") . '</li>
	<li>' . esc_html__("Blog single page - Author Box, Social Share and Related Post", "total") . '</li>
	<li>' . esc_html__("Google map option", "total") . '</li>
	<li>' . esc_html__("WooCommerce Compatible", "total") . '</li>
	<li>' . esc_html__("Fully Multilingual and Translation ready", "total") . '</li>
	<li>' . esc_html__("Fully RTL(Right to left) languages compatible", "total") . '</li>
	</ul>
	<a class="ht-implink" href="https://hashthemes.com/wordpress-theme/total/#theme-comparision" target="_blank">' . esc_html__("Comparision - Free Vs Pro", "total") . '</a>';

$wp_customize->add_section(new Online_Magazine_Upgrade_Section($wp_customize, 'online-magazine-pro-section', array(
    'priority' => 0,
    'pro_text' => esc_html__('Upgrade to Pro', 'online-magazine'),
    'pro_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=online-magazine-customizer-button&utm_campaign=online-magazine-upgrade'
)));

$wp_customize->add_section('online_magazine_pro_feature_section', array(
    'title' => esc_html__('Pro Theme Features', 'online-magazine'),
    'priority' => 0
));

$wp_customize->add_setting('online_magazine_pro_features', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Text_Info_Control($wp_customize, 'online_magazine_pro_features', array(
    'settings' => 'online_magazine_pro_features',
    'section' => 'online_magazine_pro_feature_section',
    'input_attrs' => array('class' => 'ht-white-box'),
    'description' => $online_magazine_pro_features
)));

$wp_customize->add_section(new Online_Magazine_Upgrade_Section($wp_customize, 'online-magazine-doc-section', array(
    'title' => esc_html__('Documentation', 'online-magazine'),
    'priority' => 1000,
    'pro_text' => esc_html__('View', 'online-magazine'),
    'pro_url' => 'https://hashthemes.com/documentation/online-magazine-documentation/'
)));

$wp_customize->add_section(new Online_Magazine_Upgrade_Section($wp_customize, 'online-magazine-demo-import-section', array(
    'title' => esc_html__('Import Demo Content', 'online-magazine'),
    'priority' => 999,
    'pro_text' => esc_html__('Import', 'online-magazine'),
    'pro_url' => admin_url('admin.php?page=online-magazine-welcome')
)));

/* ============HOMEPAGE SETTINGS PANEL============ */
$wp_customize->get_section('static_front_page')->priority = 1;

$wp_customize->add_setting('online_magazine_enable_frontpage', array(
    'sanitize_callback' => 'online_magazine_sanitize_checkbox'
));

$wp_customize->add_control(new Online_Magazine_Toggle_Control($wp_customize, 'online_magazine_enable_frontpage', array(
    'section' => 'static_front_page',
    'label' => esc_html__('Enable FrontPage', 'online-magazine'),
    'description' => sprintf(esc_html__('Overwrites the homepage displays setting and shows the frontpage for Customizer %s', 'online-magazine'), '<a href="javascript:wp.customize.panel(\'online_magazine_home_panel\').focus()">' . esc_html__('Front Page Sections', 'online-magazine') . '</a>') . '<br/><br/>' . esc_html__('Do not enable this option if you want to use Elementor in home page.', 'online-magazine')
)));
