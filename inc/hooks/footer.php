<?php

if (!function_exists('online_magazine_site_footer')) {

    function online_magazine_site_footer() {
        $online_magazine_footer_logo=get_theme_mod('online_magazine_footer_logo');
        $online_magazine_social_icons=get_theme_mod('online_magazine_social_icons');
        $social_icons = json_decode($online_magazine_social_icons);
        $online_magazine_footer_copyright=get_theme_mod('online_magazine_footer_copyright');


        ?>
        <!-- site-footer -->
        <footer class="site-footer site-footer--white site-footer site-footer__section--flex  site-footer--inverse inverse-text">
            <div class="container">
                <div class="site-footer__section-inner inverse-text">
                    <div class="section-row">
                        <div class="section-column section-column-left text-left">
                            <div class="site-logo">
                                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo $online_magazine_footer_logo;?>" alt="logo" width="108">
                                  </a> 
                            </div>
                        </div>
                        <div class="section-column section-column-center text-center">
                            <nav class="footer-menu text-center">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer',
                                    'container' => 'false',
                                    'menu_class' => 'navigation navigation--footer navigation--inline',
                                    'menu_id' => 'menu-footer-menu',

                                ) );
                                ?>
                            </nav>
                        </div>
                        <div class="section-column section-column-right text-right section-socials">
                            <ul class="social-list social-list--md list-horizontal">
                                <?php 
                                if (!empty($social_icons)) {
                                    foreach ($social_icons as $social_icon) {
                                        if ($social_icon->enable === 'yes' && !empty($social_icon->link)) {
                                            echo '<li><a href="' . esc_url(esc_attr($social_icon->link)) . '" target="_blank"><i class="' . esc_attr($social_icon->icon) . '"></i></a></li>';
                                        }
                                    }
                                }?>

                            </ul>
                        </div>
                    </div>
                   <?php online_magazine_bottom_footer();?>
                </div>
            </div>
        </footer>   
        <!-- site-footer -->
        <?php 
    }
}

if (!function_exists('online_magazine_bottom_footer')) {

    function online_magazine_bottom_footer() {
        $online_magazine_footer_copyright=get_theme_mod('online_magazine_footer_copyright');?>
            <?php if (!empty($online_magazine_footer_copyright)) { ?>
                <div class="section-row section-last-child">
                    <div class="copy-right text-center">
                        <span> <?php echo do_shortcode($online_magazine_footer_copyright); ?></span> <a href="https://themeforest.net/user/designuptodate/portfolio"></a>
                    </div>
                </div>
            <?php }  
    }
}

if (!function_exists('online_magazine_sticky_header')) {

    function online_magazine_sticky_header() {?>
        <!-- Sticky header -->
        <div id="atbs-sticky-header" class="sticky-header js-sticky-header">
            <!-- Navigation bar -->
            <nav class="navigation-bar navigation-bar--fullwidth hidden-xs hidden-sm ">
                <div class="navigation-bar__inner">
                    <div class="navigation-bar__section">
                        <?php 
                            $online_magazine_enable_offcanvas = get_theme_mod('online_magazine_mh_show_offcanvas', true);
                            if ($online_magazine_enable_offcanvas){
                                ?>
                                <a href="#atbs-offcanvas-primary"
                                class="offcanvas-menu-toggle navigation-bar-btn js-atbs-offcanvas-toggle">
                                    <i class="mdicon mdicon-menu icon--2x"></i>
                                </a>
                            <?php
                            }
                            ?>
                        <div class="site-logo header-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if ( has_custom_logo() ) : ?>
                                   <?php the_custom_logo(); ?>
                               <?php endif; ?>
                           </a>
                        </div>
                    </div>
                    <div class="navigation-wrapper navigation-bar__section js-priority-nav">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'container' => 'false',
                            'menu_class' => 'navigation navigation--main navigation--inline flexbox-wrap',
                            'menu_id' => 'menu-main-menu-1',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'fallback_cb' => false,

                        ) );
                        ?>
                    </div>
                    <div class="navigation-bar__section lwa lwa-template-modal has-bookmark-list flexbox-wrap flexbox-center-y">
                        <?php 
                        $online_magazine_enable_search = get_theme_mod('online_magazine_mh_show_search', true);
                        if ($online_magazine_enable_search) {
                            ?>
                            <button type="submit" class="navigation-bar-btn js-search-dropdown-toggle">
                                <i class="mdicon mdicon-search"></i>
                            </button>
                            <?php
                        }
                        ?>
                    </div>
                </div><!-- .navigation-bar__inner -->
            </nav>
        </div><!-- Sticky header -->
        <?php 
    }
}

if (!function_exists('online_magazine_footer_offcanvas')) {

    function online_magazine_footer_offcanvas() {?>

        <!-- Off-canvas menu -->
        <div id="atbs-offcanvas-primary" class="atbs-offcanvas js-atbs-offcanvas">
            <!-- js-perfect-scrollbar-->
            <div class="atbs-offcanvas--inner js-perfect-scrollbar">
               <?php
                if (is_active_sidebar('online-magazine-sidebar-offcanvas')) {
                    dynamic_sidebar('online-magazine-sidebar-offcanvas');
                } else {
                    esc_html_e('No widgets found. Go to Widget page and add the widget in Offcanvas Sidebar Widget Area.', 'viral-mag');
                }
                ?>
      
            </div>
        </div>
        <?php 
    }
}


if (!function_exists('online_magazine_scroll_top')) {

    function online_magazine_scroll_top() {
     $backtotop = get_theme_mod('online_magazine_backtotop', true);
            if ($backtotop) {
                ?>
               <a href="#" class="atbs-go-top btn btn-default hidden-xs js-go-top-el">
                    <i class="mdicon mdicon-arrow_upward"></i>
               </a>
                <?php
            }
    }
}

if (!function_exists('online_magazine_footer_close')) {

    function online_magazine_footer_close() {

        echo'</div>';?>
        <!-- .site-wrapper -->
        <?php
        wp_footer();
        echo'</body>';
        echo'</html>';
    }
}


add_action('online_magazine_footer_template', 'online_magazine_site_footer', 10);
add_action('online_magazine_footer_template', 'online_magazine_sticky_header', 20);
add_action('online_magazine_footer_template', 'online_magazine_footer_offcanvas', 30);
add_action('online_magazine_footer_template', 'online_magazine_scroll_top', 40);
add_action('online_magazine_footer_template', 'online_magazine_footer_close', 100);
?>
