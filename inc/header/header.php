
<?php 
if (!function_exists('online_magazine_header_content')) {

    function online_magazine_header_content(){?>

        <div id="atbs-mobile-header" class="mobile-header visible-xs visible-sm ">
            <div class="mobile-header__inner mobile-header__inner--flex">
                <!-- mobile logo open -->
                <div class="header-branding header-branding--mobile mobile-header__section text-left">
                    <div class="header-logo header-logo--mobile flexbox__item text-left">
                        <?php online_magazine_header_logo()?>
                    </div>
                </div>
                <!-- logo close -->
                <div class="mobile-header__section text-right">
                    <div class="flexbox has-bookmark-list">
                       <?php 
                        $online_magazine_enable_search = get_theme_mod('online_magazine_mh_show_search', true);
                         $online_magazine_enable_offcanvas = get_theme_mod('online_magazine_mh_show_offcanvas', true);
                        if ($online_magazine_enable_search) {
                            ?>
                            <button type="submit" class="mobile-header-btn js-search-dropdown-toggle">
                                <i class="mdicon mdicon-search mdicon--last hidden-xs"></i><i class="mdicon mdicon-search visible-xs-inline-block"></i>
                            </button>
                            <?php
                        }
                        ?>

                        <?php 
                        if ($online_magazine_enable_offcanvas){
                            ?>
                            <a href="#atbs-offcanvas-primary" class="offcanvas-menu-toggle mobile-header-btn js-atbs-offcanvas-toggle">
                                <i class="mdicon mdicon-menu mdicon--last hidden-xs"></i><i class="mdicon mdicon-menu visible-xs-inline-block"></i>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation bar -->
        <nav class="navigation-bar hidden-xs hidden-sm js-sticky-header-holder">
            <div class="container">
                <div class="navigation-bar__inner">
                    <div class="navigation-bar__section">
                        <div class="header-logo">
                          <?php online_magazine_header_logo()?>
                        </div>                                   
                    </div>
                    <div class="navigation-wrapper navigation-bar__section js-priority-nav">
                   <?php online_magazine_main_navigation()?>
                    </div>

                    <div class="navigation-bar__section">
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
                    </div><!-- .navigation-bar__section -->
                </div><!-- .navigation-bar__inner -->
                <?php do_action('online_magazine_header_search_form'); ?>
            </div><!-- .container -->
        </nav><!-- Navigation-bar -->
        <?php
    }
}

add_action('online_magazine_header_template', 'online_magazine_header_content', 100);