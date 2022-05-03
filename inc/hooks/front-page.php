<?php
/**
 * @package Online Magazine
 */
add_action('online_magazine_front_page_template', 'online_magazine_front_page_featured_section',10);
add_action('online_magazine_front_page_template', 'online_magazine_front_page_news1_section',20);
add_action('online_magazine_front_page_template', 'online_magazine_front_page_news2_section',30);
add_action('online_magazine_front_page_template', 'online_magazine_front_page_news3_section',40);
add_action('online_magazine_front_page_template', 'online_magazine_front_page_news4_section',50);
add_action('online_magazine_front_page_template', 'online_magazine_front_page_news5_section',60);




if (!function_exists('online_magazine_front_page_featured_section')) {

    function online_magazine_front_page_featured_section() {
        $online_magazine_featured_section_display_post=get_theme_mod('online_magazine_featured_section_display_post');  
         
        if (get_theme_mod('online_magazine_featured_section_disable') != 'on') {
            if(!empty($online_magazine_featured_section_display_post)){ 
                    $args = array(
                        'p' => $online_magazine_featured_section_display_post);
                    $query = new WP_Query($args);
                    if( $query->have_posts() ) : ?>
                        <?php while( $query->have_posts() ) : $query->the_post() ?>
                            <div class="atbs-block atbs-block--fullwidth atbs-featured-module-a">
                                <div class="container">
                                    <div class="atbs-block__inner">
                                        <article class="post post--overlay post--overlap post--overlap-fullwidth post--overlay-height-600 entry-author-horizontal-middle entry-author-horizontal-rotate">
                                            <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                                <a href="<?php the_permalink() ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                                </a>
                                            </div>
                                            <div class="post__text">
                                                <div class="post__text-wrap flexbox-wrap">
                                                    <div class="post__text-inner bg-white">
                                                        <?php 
                                                        $category_detail=get_the_category( get_the_ID() );
                                                        $author_id=get_the_author_meta('ID');
                                                        $author_url=get_author_posts_url($author_id);
                                                        $author_name=get_the_author();
                                                        foreach ($category_detail as $cat_name ) {
                                                            ?>
                                                            <a href="<?php echo get_category_link($cat_name->cat_ID) ?>" class="post__cat"><?php echo $cat_name->name?></a>
                                                            <?php
                                                        }
                                                        ?>
                                                        <h3 class="post__title title-line-bottom typescale-3_5 margin-bottom-0">
                                                            <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
                                                        </h3>
                                                        <div class="post__meta flexbox-wrap flexbox-bottom-y">
                                                            <div class="entry-author post-author entry-author__avatar-40 entry-author-round entry-author_style_1">
                                                                <a class="author__avatar" title="Posts by <?php echo $author_name;?> " rel="author" href="<?php echo esc_url($author_url); ?>">
                                                                    <img alt="Cdall" src="<?php echo get_avatar_url($author_id)?>">
                                                                </a>
                                                                <div class="author__text">
                                                                    <a class="author__name" title="Posts by <?php echo esc_attr($author_name);?> " rel="author" href="<?php echo esc_url($author_url); ?> "> <?php echo esc_attr($author_name);?></a>
                                                                    <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php the_permalink() ?>" class="link-overlay"></a>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; 
                wp_reset_postdata();
                ?>
            <?php }?>
        <?php }
    }
}


if (!function_exists('online_magazine_front_page_news1_section')) {

    function online_magazine_front_page_news1_section() {
        $online_magazine_news_1_super_title = get_theme_mod('online_magazine_news_1_super_title', 'News One Section Super Title');
        $online_magazine_news_1_title = get_theme_mod('online_magazine_news_1_title', esc_html__('News One Section Title', 'online-magazine'));
        $online_magazine_news_1_subtitle = get_theme_mod('online_magazine_news_1_subtitle', esc_html__('News One Section Sub Title', 'online-magazine'));
        $online_magazine_news_1_cat = get_theme_mod('online_magazine_news_one_section_display_categories');
        ?>

        <?php 
        if (get_theme_mod('online_magazine_first_news_section_disable') != 'on') {
            ?>
            <div class="atbs-block atbs-block--fullwidth atbs-featured-module-b">
                <div class="container">
                    <div class="block-heading block-heading-normal block-heading--has-subtitle">
                        <div class="block-heading__section">
                           <?php if ($online_magazine_news_1_super_title) { ?>
                            <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_1_super_title); ?></span>
                           <?php } ?>

                            <?php if ($online_magazine_news_1_title) { ?>
                                <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_1_title); ?></h4>
                            <?php } ?>
                        </div>
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_1_subtitle) { ?>
                                <div class="block-heading__description block-heading__description--line-before"> <?php echo wp_kses_post(wpautop($online_magazine_news_1_subtitle)); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if(!empty($online_magazine_news_1_cat)){ ?>
                        <div class="atbs-block__inner">
                            <?php
                            $args = array(
                                'cat' => $online_magazine_news_1_cat,
                                'posts_per_page' => '1'
                            );

                            $query = new WP_Query($args);
                            
                            if( $query->have_posts() ) : ?>
                                <?php while( $query->have_posts() ) : $query->the_post() ?>
                                    <div class="main-section">
                                        <article class="post post--horizontal post--horizontal-massive">
                                            <div class="post__thumb atbs-thumb-object-fit">
                                                <a href="<?php the_permalink() ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url()?>" alt="Post Image">
                                                </a>
                                            </div>
                                            <div class="post__text">
                                                <?php 
                                                $category_detail=get_the_category( get_the_ID() );
                                                foreach ($category_detail as $cat_name ) {
                                                    ?>
                                                    <a href="<?php echo get_category_link($cat_name->cat_ID) ?>" class="post__cat post__cat-style-2"><?php echo $cat_name->name?> </a>
                                                    <?php
                                                }
                                                ?>
                                                <h3 class="post__title post__title--line-bellow typescale-3_5">
                                                    <a class="line-limit line-limit-4" href="<?php the_permalink() ?>"><?php echo get_the_title()?></a>
                                                </h3>
                                                <div class="post__excerpt line-limit line-limit-4"><?php echo get_the_excerpt()?></div>
                                            </div>
                                        </article>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; 
                            wp_reset_postdata();
                            ?>


                            <?php
                            $args = array(
                                'cat' => $online_magazine_news_1_cat,
                                'offset' => '1',
                                'posts_per_page' => '4'
                            );

                            $query = new WP_Query($args);
                            ?>
                            
                            <div class="sub-section">
                                <div class="posts-list posts__horizontal_style_1 flexbox-wrap flexbox-wrap-2i flex-space-30">
                                    <?php if( $query->have_posts() ) : ?>
                                        <?php while( $query->have_posts() ) : $query->the_post() ?>
                                            <div class="list-item">
                                                <article class="post post--horizontal post--horizontal-tiny post--horizontal-middle">
                                                    <div class="post__thumb post__thumb--circle">
                                                        <a href="<?php the_permalink() ?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="Post Image">
                                                        </a>
                                                    </div>
                                                    <div class="post__text">
                                                        <?php 
                                                        $category_detail=get_the_category( get_the_ID());
                                                        foreach ($category_detail as $cat_name ) {
                                                            ?>
                                                            <a href="<?php echo get_category_link($cat_name->cat_ID) ?>" class="post__cat"><?php echo $cat_name->name?> </a>
                                                            <?php
                                                        }
                                                        ?>
                                                        <h3 class="post__title typescale-0">
                                                            <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title()?></a>
                                                        </h3>
                                                    </div>
                                                </article>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; 
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>                
                    <?php } ?>
                </div>
            </div>
        <?php }
    }
}

if (!function_exists('online_magazine_front_page_news2_section')) {

    function online_magazine_front_page_news2_section() {
        $online_magazine_news_2_super_title = get_theme_mod('online_magazine_news_2_super_title', 'News Second Section Super Title');
        $online_magazine_news_2_title = get_theme_mod('online_magazine_news_2_title', esc_html__('News Second Section Title', 'online-magazine'));
        $online_magazine_news_2_subtitle = get_theme_mod('online_magazine_news_2_subtitle', esc_html__('News Second Section Sub Title', 'online-magazine'));
        $online_magazine_news_2_button_text = get_theme_mod('online_magazine_news_2_button_text', esc_html__('Button Text', 'online-magazine'));
        $online_magazine_news_2_cat = get_theme_mod('online_magazine_news_two_section_display_categories');
        ?>
        <?php 
        if (get_theme_mod('online_magazine_second_news_section_disable') != 'on') {

            ?>
            <!-- post-grid-a -->
            <div class="atbs-block atbs-block--fullwidth atbs-post-grid-a">
                <div class="container">
                    <div class="block-heading block-heading-normal block-heading--has-subtitle">
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_2_super_title) { ?>
                                <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_2_super_title); ?></span>
                            <?php } ?>
                            <?php if ($online_magazine_news_2_title) { ?>
                                <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_2_title); ?></h4>
                            <?php } ?>
                        </div>
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_2_subtitle) { ?>
                                <div class="block-heading__description block-heading__description--line-before"> <?php echo wp_kses_post(wpautop($online_magazine_news_2_subtitle)); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    if($online_magazine_news_2_cat!=0){
                        $args = array(
                            'cat' => $online_magazine_news_2_cat,
                            'posts_per_page' => '3'
                        );
                        $author_name=get_the_author();
                        $author_id=get_the_author_meta('ID');
                        $author_url=get_author_posts_url($author_id);

                        $query = new WP_Query($args);

                        ?>
                        <div class="atbs-block__inner flexbox-wrap flex-space-30">
                            <?php if( $query->have_posts() ) : ?>
                                <?php 
                                $i = 1;
                                $last_post = $query->found_posts;
                                while( $query->have_posts() ) : 
                                    $query->the_post(); 
                                        if($i == 1){?>
                                            <div class="left-col">
                                                <article class="post post--overlay post--overlap post--overlap-medium post--overlay-height-730">
                                                    <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                                        <a href="<?php the_permalink()?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text">
                                                        <div class="post__text-wrap flexbox-wrap">
                                                            <div class="post__text-inner">
                                                                <?php 
                                                                $category_detail=get_the_category(get_the_ID());
                                                                foreach ($category_detail as $cat_name ) {
                                                                    ?>
                                                                    <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name)?></a>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <h3 class="post__title typescale-2_5">
                                                                    <a class="line-limit line-limit-3" href="<?php the_permalink()?>"><?php echo get_the_title()?></a>
                                                                </h3>
                                                                <div class="post__readmore ">
                                                                    <a class="button__readmore" href="<?php the_permalink()?>">
                                                                        <span class="readmore__text"><?php echo esc_html($online_magazine_news_2_button_text); ?></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                         <?php }

                                        if($i == 2){ ?>
                                            <div class="right-col">
                                                <div class="posts-list posts__vertical_style_1 flexbox-wrap flexbox-wrap-2i flex-space-30">
                                                    <div class="list-item">
                                                        <article class="post post--vertical post--vertical-medium post__thumb-420">
                                                            <div class="post__thumb atbs-thumb-object-fit">
                                                                <a href="<?php the_permalink()?>">
                                                                    <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                                                </a>
                                                            </div>
                                                            <div class="post__text ">
                                                                <div class="post__meta">
                                                                    <div class="entry-author post-author entry-author__avatar-40 entry-author-round">
                                                                        <a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
                                                                            <img alt="designuptodate" src="<?php echo get_avatar_url($author_id)?>" >
                                                                        </a>
                                                                        <div class="author__text">
                                                                            <a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name);?></a>
                                                                            <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                $category_detail=get_the_category(get_the_ID());
                                                                foreach ($category_detail as $cat_name ) {
                                                                    ?>
                                                                    <a class="post__cat post__cat--bg cat-theme-bg overlay-item--top-left" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name)?></a>
                                                                    <?php
                                                                }
                                                                ?> 
                                                                <h3 class="post__title typescale-2 custom-typescale-2">
                                                                    <a class="line-limit line-limit-3" href="<?php the_permalink()?>"><?php echo get_the_title()?></a>
                                                                </h3>
                                                                <div class="post__readmore">
                                                                    <a href="<?php the_permalink()?>" class="button__readmore">
                                                                        <span class="readmore__text"><?php echo esc_html($online_magazine_news_2_button_text); ?></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                        <?php } 
                                                        if($i == 3){?>
                                                            <div class="list-item">
                                                                <article class="post post--vertical post--vertical-reverse post--vertical-reverse-medium post__thumb-420">
                                                                    <div class="post__thumb atbs-thumb-object-fit">
                                                                        <a href="<?php the_permalink()?>">
                                                                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post__text text-center">
                                                                           <?php 
                                                                           $category_detail=get_the_category(get_the_ID());
                                                                           foreach ($category_detail as $cat_name ) {
                                                                            ?>
                                                                                <a class="post__cat post__cat-style-2" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name);?></a>
                                                                            <?php }?> 
                                                                            <h3 class="post__title typescale-2 custom-typescale-2">
                                                                                <a class="line-limit line-limit-3" href="<?php the_permalink()?>"><?php echo get_the_title()?></a>
                                                                            </h3>
                                                                        <div class="post__meta">
                                                                            <div class="entry-author post-author entry-author-no-avatar">By 
                                                                                <a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name);?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </div>
                                                        <?php } ?>
                                                    <?php if($i == 3 || $i == $last_post){ ?>        
                                                </div>
                                            </div>
                                    <?php } 
                                    $i++;
                                endwhile; ?>
                            <?php endif; 
                            wp_reset_postdata();
                            ?>
                        </div>
                    <?php }?>
                </div>
            </div>
        <?php }
    }
}


if (!function_exists('online_magazine_front_page_news3_section')) {

    function online_magazine_front_page_news3_section() {


        $online_magazine_news_3_super_title = get_theme_mod('online_magazine_news_3_super_title', 'News Third Section Super Title');
        $online_magazine_news_3_title = get_theme_mod('online_magazine_news_3_title', esc_html__('News Third Section Title', 'online-magazine'));
        $online_magazine_news_3_subtitle = get_theme_mod('online_magazine_news_3_subtitle', esc_html__('News Third Section Sub Title', 'online-magazine'));
        $online_magazine_news_3_button_text = get_theme_mod('online_magazine_news_3_button_text', esc_html__('Button Text', 'online-magazine'));
        $online_magazine_news_3_cat = get_theme_mod('online_magazine_news_third_section_display_categories');
        ?>


        <?php 
        if (get_theme_mod('online_magazine_third_news_section_disable') != 'on') {

            ?>
            <!-- listing-grid-b -->
            <div class="atbs-block atbs-block--fullwidth atbs-listing-grid-b">
                <div class="container">
                    <div class="block-heading block-heading-normal block-heading--has-subtitle">
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_3_super_title) { ?>
                                <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_3_super_title); ?></span>
                            <?php } ?>

                            <?php if ($online_magazine_news_3_title) { ?>
                                <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_3_title); ?></h4>
                            <?php } ?>
                        </div>
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_3_subtitle) { ?>
                                <div class="block-heading__description block-heading__description--line-before"><?php echo esc_html($online_magazine_news_3_subtitle); ?></div>
                            <?php } ?>
                            
                        </div>
                    </div>

                    <?php if(!empty($online_magazine_news_3_cat)){ ?>
                    <?php
                    $args = array(
                        'cat' => $online_magazine_news_3_cat,
                        'posts_per_page' => '6'
                    );

                    $query = new WP_Query($args);
                    $author_id=get_the_author_meta('ID');
                    $author_url=get_author_posts_url($author_id);
                    $author_name=get_the_author();
                    $category_detail=get_the_category(get_the_ID());
                    
                    ?>
                    <div class="atbs-block__inner">
                        <div class="posts-list posts__vertical_style_3 flexbox-wrap flexbox-wrap-3i    flex-space-30">
                           <?php if( $query->have_posts() ) : ?>
                            <?php while( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="list-item">
                                    <article class="post post--vertical post--vertical-medium post__thumb-420">
                                        <div class="post__thumb atbs-thumb-object-fit">
                                            <a href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                            </a>
                                        </div>
                                        <div class="post__text ">
                                            <div class="post__meta">
                                                <div class="entry-author post-author entry-author__avatar-40 entry-author-round">
                                                    <a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
                                                        <img alt="designuptodate" src="<?php echo get_avatar_url($author_id)?>">
                                                    </a>
                                                    <div class="author__text">
                                                        <a class="author__name" href="author.html"><?php echo esc_attr($author_name);?></a>
                                                        <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($category_detail as $cat_name ) {
                                                ?>
                                                <a class="post__cat post__cat--bg cat-theme-bg overlay-item--top-left" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo $cat_name->name; ?></a>
                                                <?php
                                            }
                                            ?>
                                            <h3 class="post__title typescale-2 custom-typescale-2">
                                                <a class="line-limit line-limit-4" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
                                            </h3>
                                            <div class="post__readmore">
                                                <a href="<?php the_permalink() ?>" class="button__readmore">
                                                    <span class="readmore__text"><?php echo esc_html($online_magazine_news_3_button_text); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                           <?php endif; 
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }


    }
}


if (!function_exists('online_magazine_front_page_news4_section')) {

    function online_magazine_front_page_news4_section() {
 

        $online_magazine_news_4_super_title = get_theme_mod('online_magazine_news_4_super_title', 'News Fourth Section Super Title');
        $online_magazine_news_4_title = get_theme_mod('online_magazine_news_4_title', esc_html__('News Fourth Section Title', 'online-magazine'));
        $online_magazine_news_4_subtitle = get_theme_mod('online_magazine_news_4_subtitle', esc_html__('News Fourth Section Sub Title', 'online-magazine'));
        $online_magazine_news_4_button_text = get_theme_mod('online_magazine_news_4_button_text', esc_html__('Button Text', 'online-magazine'));
        $online_magazine_news_4_cat = get_theme_mod('online_magazine_news_fourth_section_display_categories');
        $online_magazine_counter_col = get_theme_mod('online_magazine_counter_col', "5");
        ?>


        <?php 
        if (get_theme_mod('online_magazine_fourth_news_section_disable') != 'on') { ?>
            <div class="atbs-block atbs-block--fullwidth">
                <div class="container">
                    <div class="row">
                        <div class="atbs-main-col">
                            <!-- listing-grid-a -->
                            <div class="atbs-block atbs-block--fullwidth atbs-listing-grid-a">
                                <div class="block-heading block-heading-normal block-heading--has-subtitle">
                                    <div class="block-heading__section">
                                        <?php if ($online_magazine_news_4_super_title) { ?>
                                            <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_4_super_title); ?></span>
                                        <?php } ?>


                                        <?php if ($online_magazine_news_4_title) { ?>
                                            <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_4_title); ?></h4>
                                        <?php } ?>

                                    </div>
                                    <div class="block-heading__section">
                                        <?php if ($online_magazine_news_4_subtitle) { ?>
                                            <div class="block-heading__description block-heading__description--line-before"><?php echo esc_html($online_magazine_news_4_subtitle); ?></div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => $online_magazine_counter_col,
                                    'orderby' => 'date'
                                );
                                $author_name = get_the_author();
                                $author_id = get_the_author_meta('ID');
                                $author_url = get_author_posts_url($author_id);

                                $query = new WP_Query($args);
                                ?>
                                <?php if (!empty($online_magazine_news_4_cat)) { ?>

                                    <div class="atbs-block__inner">
                                        <div class="posts-list posts__vertical_style_2 flexbox-wrap flex-space-30">
                                            <?php if ($query->have_posts()) : ?>
                                                <?php
                                                $i = 1;
                                                $last_post = $query->found_posts;
                                                while ($query->have_posts()) :
                                                    $query->the_post();
                                                    if ($i == 1) {
                                                        ?>
                                                        <div class="list-item flexbox-item-100">
                                                            <article class="post post--overlay post--overlay-bottom post--overlap post--overlap-fullwidth_style_2 post--overlay-height-520">
                                                                <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                                                    <a href="<?php the_permalink() ?>">
                                                                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Post Image">
                                                                    </a>
                                                                </div>
                                                                <div class="post__text">
                                                                    <div class="post__text-wrap">
                                                                        <div class="post__text-inner bg-white">
                                                                            <?php
                                                                            $category_detail = get_the_category(get_the_ID());
                                                                            foreach ($category_detail as $cat_name) {
                                                                                ?>
                                                                                <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name) ?></a>
                                                                                <?php
                                                                            }
                                                                            ?> 
                                                                            <h3 class="post__title typescale-3 custom-typescale-3 margin-bottom-15">
                                                                                <a class="line-limit line-limit-3" href="single-1.html"><?php echo get_the_title() ?></a>
                                                                            </h3>
                                                                            <div class="post__excerpt post__excerpt--lg"><?php echo get_the_excerpt() ?></div>
                                                                            <div class="post__readmore text-right">
                                                                                <a class="button__readmore" href="<?php the_permalink() ?>">
                                                                                    <span class="readmore__text"><?php echo esc_html($online_magazine_news_4_button_text); ?></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a class="link-overlay" href="<?php the_permalink() ?>"></a>
                                                            </article>
                                                        </div>
                                                    <?php } ?>

                                                    <?php if ($i != 1) { ?>
                                                        <div class="list-item flexbox-item-50">
                                                            <article class="post post--vertical post--vertical-medium post__thumb-420">
                                                                <div class="post__thumb atbs-thumb-object-fit">
                                                                    <a href="<?php the_permalink() ?>">
                                                                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="file not found">
                                                                    </a>
                                                                </div>
                                                                <div class="post__text ">
                                                                    <div class="post__meta">
                                                                        <div class="entry-author post-author entry-author__avatar-40 entry-author-round">
                                                                            <a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
                                                                                <img alt="designuptodate" src="<?php echo get_avatar_url($author_id) ?>">
                                                                            </a>
                                                                            <div class="author__text">
                                                                                <a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name); ?></a>
                                                                                <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time('G:i'); ?>"><?php echo get_the_date(); ?></time>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $category_detail = get_the_category(get_the_ID());
                                                                    foreach ($category_detail as $cat_name) {
                                                                        ?>
                                                                        <a class="post__cat post__cat--bg cat-theme-bg overlay-item--top-left" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name) ?></a>
                                                                        <?php
                                                                    }
                                                                    ?> 
                                                                    <h3 class="post__title typescale-2 custom-typescale-2">
                                                                        <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a>
                                                                    </h3>
                                                                    <div class="post__readmore">
                                                                        <a href="<?php the_permalink() ?><?php the_permalink() ?>" class="button__readmore">
                                                                            <span class="readmore__text"><?php echo esc_html($online_magazine_news_4_button_text); ?></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    <?php } ?>
                                                    <?php
                                                    $i++;
                                                endwhile;
                                                ?>
                                                <?php
                                            endif;
                                            wp_reset_postdata();
                                            ?>
                                        </div>


                                    </div>
                                <?php } ?>
                            </div>
                            <!-- listing-grid-a -->
                        </div>
                           <?php get_sidebar()?>
                    </div>
                </div>
            </div>
        <?php }
    }
}


if (!function_exists('online_magazine_front_page_news5_section')) {

    function online_magazine_front_page_news5_section() {
 
        $online_magazine_news_5_super_title = get_theme_mod('online_magazine_news_5_super_title', 'News Fifth Section Super Title');
        $online_magazine_news_5_title = get_theme_mod('online_magazine_news_5_title', esc_html__('News Fifth Section Title', 'online-magazine'));
        $online_magazine_news_5_subtitle = get_theme_mod('online_magazine_news_5_subtitle', esc_html__('News Fifth Section Sub Title', 'online-magazine'));
        $online_magazine_news_5_button_text = get_theme_mod('online_magazine_news_5_button_text', esc_html__('Button Text', 'online-magazine'));
        $online_magazine_news_5_cat = get_theme_mod('online_magazine_news_fifth_section_display_categories');

        ?>

        <?php
        if (get_theme_mod('online_magazine_fifth_news_section_disable') != 'on') {

            ?>
            <div class="atbs-block atbs-block--fullwidth atbs-post-grid-b">
                <div class="container">
                    <div class="block-heading block-heading-normal block-heading--has-subtitle">
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_5_super_title) { ?>
                                <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_5_super_title); ?></span>
                            <?php } ?>


                            <?php if ($online_magazine_news_5_title) { ?>
                                <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_5_title); ?></h4>
                            <?php } ?>

                            
                        </div>
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_5_subtitle) { ?>
                                <div class="block-heading__description block-heading__description--line-before"><?php echo esc_html($online_magazine_news_5_subtitle); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php if(!empty($online_magazine_news_5_cat)){ 
                        $args = array(
                            'cat' => $online_magazine_news_5_cat,
                            'posts_per_page' => '3'
                        );
                        $author_name=get_the_author();
                        $author_id=get_the_author_meta('ID');
                        $author_url=get_author_posts_url($author_id);

                        $query = new WP_Query($args);

                        ?>
                        <div class="atbs-block__inner flexbox-wrap flex-space-30">

                            <?php if( $query->have_posts() ) : ?>
                                <?php 
                                $i = 1;
                                $last_post = $query->found_posts;
                                while( $query->have_posts() ) : 
                                    $query->the_post(); 
                                    if($i == 1){
                                        ?>
                                        <div class="left-col">
                                            <article class="post post--vertical post--vertical-large post__thumb-425 entry-author-horizontal-middle entry-author-horizontal-rotate">
                                                <div class="post__thumb atbs-thumb-object-fit">
                                                    <a href="<?php the_permalink() ?>">
                                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                                    </a>
                                                </div>
                                                <div class="post__text">
                                                    <?php 
                                                    $category_detail=get_the_category(get_the_ID());
                                                    foreach ($category_detail as $cat_name ) {
                                                        ?>
                                                        <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name);?></a>
                                                        <?php
                                                    }
                                                    ?> 
                                                    <h3 class="post__title typescale-2_7">
                                                        <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title()?></a>
                                                    </h3>
                                                    <div class="post__excerpt line-limit line-limit-3"><?php echo get_the_excerpt()?></div>
                                                    <div class="post__readmore">
                                                        <a href="<?php the_permalink() ?>" class="button__readmore">
                                                            <span class="readmore__text"><?php echo esc_html($online_magazine_news_5_button_text); ?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="post__meta flexbox-wrap flexbox-bottom-y">
                                                    <div class="entry-author post-author entry-author__avatar-40 entry-author-round">
                                                        <a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
                                                            <img alt="designuptodate" src="<?php echo get_avatar_url($author_id)?>" >
                                                        </a>
                                                        <div class="author__text">
                                                            <a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name);?></a>
                                                            <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    <?php }?>

                                    <?php  if($i == 2){?>
                                        <div class="right-col">
                                            <article class="post post--overlay post--overlap post--overlap-medium post--overlap-medium_style_2 post--overlay-height-625">
                                                <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                                    <a href="<?php the_permalink() ?>">
                                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                                    </a>
                                                </div>
                                                <div class="post__text inverse-text">
                                                    <div class="post__text-wrap flexbox-wrap">
                                                        <div class="post__text-inner">
                                                            <?php 
                                                            $category_detail=get_the_category(get_the_ID());
                                                            foreach ($category_detail as $cat_name ) {
                                                                ?>
                                                                <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name);?></a>
                                                                <?php
                                                            }
                                                            ?> 
                                                            <h3 class="post__title typescale-2 custom-typescale-2">
                                                                <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title()?></a>
                                                            </h3>
                                                            <div class="post__readmore ">
                                                                <a class="button__readmore" href="<?php the_permalink() ?>">
                                                                    <span class="readmore__text"><?php echo esc_html($online_magazine_news_5_button_text); ?></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    <?php }?>
                                    <?php $i++;
                                endwhile; ?>
                            <?php endif; 
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        <?php }
    }
}

