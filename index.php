<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online_Magazine
 */
get_header();
?>

<?php $sidebar=get_theme_mod('online_magazine_archive_layout');?>
<!-- sidebar -->
<div class="atbs-block atbs-block--fullwidth">
    <div class="container">
        <div class="row">
            <div class="atbs-main-col has-right-sidebar">
                <div class="atbs-block atbs-block--fullwidth atbs-listing-list-a">
                    <div class="block-heading block-heading-normal block-heading--has-subtitle">
                        <div class="block-heading__section">
                            <h4 class="block-heading__title"><?php echo get_the_archive_title()?></h4>
                        </div>
                        <div class="block-heading__section">
                        </div>
                    </div>

                    <div class="atbs-block__inner">
                        <?php while (have_posts() ) :the_post(); ?>
                            <div class="posts-list posts__horizontal_style_2 list-space-xxl">
                                <div class="list-item">
                                    <article class="post post--overlay post--overlay-bottom post--overlap post--overlap-fullwidth_style_2 post--overlay-height-520">
                                        <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                            <a href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url()?>" alt="Post Image">
                                            </a>
                                        </div>
                                        <div class="post__text">
                                            <div class="post__text-wrap">
                                                <div class="post__text-inner bg-white">
                                                    <?php
                                                    $category_detail=get_the_category( $post->ID );
                                                    foreach ($category_detail as $cat_name ) {
                                                        ?>
                                                        <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php the_permalink() ?>>"><?php echo esc_attr($cat_name->name)?></a>
                                                        <?php
                                                    }
                                                    ?> 
                                                    <h3 class="post__title typescale-3 custom-typescale-3 margin-bottom-15">
                                                        <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title();?></a>
                                                    </h3>
                                                    <div class="post__excerpt post__excerpt--lg line-limit line-limit-3"><?php echo get_the_excerpt()?></div>
                                                    <div class="post__readmore text-right">
                                                        <a class="button__readmore" href="<?php the_permalink() ?>">
                                                            <span class="readmore__text">View more</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="link-overlay" href="<?php the_permalink() ?>"></a>
                                    </article>
                                </div>
                            </div>

                        <?php endwhile;?>
                        <?php 
                        $pagination = get_the_posts_pagination( array(
                        
                            'prev_text' => '<i class="mdicon mdicon-arrow_back"></i>',
                            'next_text' => '<i class="mdicon mdicon-arrow_forward"></i>',
                            'class'=> 'atbs-pagination atbs-module-pagination',
                        ) );
                        echo $pagination;
                        ?>

                        
                    </div>
                </div>
            </div>
            <?php get_sidebar()?>
        </div>
    </div>
</div>
<!-- sidebar -->

<?php

get_footer();
