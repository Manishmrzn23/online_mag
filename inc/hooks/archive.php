
<?php 

if (!function_exists('online_magazine_archive_content')) {

    function online_magazine_archive_content(){
        ?>

        <?php
            
            ?>
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
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts() ) :the_post();?>
                                            <?php online_magazine_archive_content_summary(); ?>
                                        <?php endwhile;?>

                                        <?php 
                                        $pagination = get_the_posts_pagination( array(
                                        
                                            'prev_text' => '<i class="mdicon mdicon-arrow_back"></i>',
                                            'next_text' => '<i class="mdicon mdicon-arrow_forward"></i>',
                                            'class'=> 'atbs-pagination atbs-module-pagination',
                                        ) );
                                        echo $pagination;
                                        ?>

                                        <?php else : ?>
                                        <?php get_template_part('template-parts/content', 'none'); ?>
                                    <?php endif; ?>  
                                </div>
                            </div>
                        </div>
                      <?php get_sidebar()?>
                    </div>
                </div>
            </div>
    <!-- sidebar -->
    <?php 
    }
}
add_action('online_magazine_archive_template','online_magazine_archive_content');



if (!function_exists('online_magazine_archive_content_summary')) {

    function online_magazine_archive_content_summary(){
        $sidebar=get_theme_mod('online_magazine_archive_layout');
            $online_magazine_archive_content = get_theme_mod('online_magazine_archive_content', 'excerpt');
            $online_magazine_archive_excerpt_length = get_theme_mod('online_magazine_archive_excerpt_length', '100');
            $online_magazine_archive_readmore = get_theme_mod('online_magazine_archive_readmore', esc_html__('Read More', 'online-magazine'));
            $online_magazine_blog_category = get_theme_mod('online_magazine_blog_category', true);
            ?>

        <div class="posts-list posts__horizontal_style_2 list-space-xxl">
            <div class="list-item">
                <article id="post-<?php the_ID(); ?>" class="post post--overlay post--overlay-bottom post--overlap post--overlap-fullwidth_style_2 post--overlay-height-520">
                    <?php if (has_post_thumbnail()){
                            $online_magazine_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                        ?>
                        <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                            <a href="<?php the_permalink() ?>">
                               <img src="<?php echo esc_url($online_magazine_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()) ?>">
                            </a>
                        </div>
                    <?php }?>
                    <div class="post__text">
                        <div class="post__text-wrap">
                            <div class="post__text-inner bg-white">
                                <?php if ('post' == get_post_type() && $online_magazine_blog_category ) { ?>
                                    <?php
                                        $category_detail=get_the_category(get_the_ID());
                                        foreach ($category_detail as $cat_name ) {
                                            ?>
                                            <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php echo get_category_link($cat_name->cat_ID) ?>"><?php echo esc_attr($cat_name->name)?></a>
                                            <?php
                                        }
                                        ?> 
                                <?php } ?>
                                <h3 class="post__title typescale-3 custom-typescale-3 margin-bottom-15">
                                    <?php the_title(sprintf('<a href="%s" class="line-limit line-limit-3">', esc_url(get_permalink())), '</a>'); ?>
                                </h3>

                                <div class="entry-content">
                                    <?php
                                    if ($online_magazine_archive_content == 'excerpt') {?>
                                        <!-- <div class="post__excerpt post__excerpt--lg line-limit line-limit-3"> --><p><?php echo wp_trim_words(strip_shortcodes(get_the_content()), $online_magazine_archive_excerpt_length);?></p><!-- </div> --><?php
                                    } else {
                                        the_content();
                                    }
                                    ?>
                                </div><!-- .entry-content -->

                                <?php if ($online_magazine_archive_content == 'excerpt') { ?>
                                    <div class="post__readmore text-right">
                                        <a class="button__readmore" href="<?php the_permalink(); ?>"><span class="readmore__text"><?php echo $online_magazine_archive_readmore; ?></span></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <a class="link-overlay" href="<?php the_permalink() ?>"></a>
                </article>
            </div>
        </div>
        <?php
    }
}





if (!function_exists('online_magazine_search_content')) {

    function online_magazine_search_content(){?>

              <main id="primary" class="site-main">
                     <div class="atbs-block atbs-block--fullwidth">
                            <div class="container">
                                   <div class="row">
                                          <div class="atbs-main-col has-right-sidebar">
                                                 <div class="atbs-block atbs-block--fullwidth atbs-listing-list-a">
                                                               <div class="block-heading block-heading-normal block-heading--has-subtitle">
                                                                      <div class="block-heading__section">
                                                                             <span class="block-heading__subtitle">Search Results for:</span>
                                                                             <h4 class="block-heading__title"><?php echo get_search_query()?></h4>
                                                                      </div>
                                                               </div>
                                                               <?php if ( have_posts() ) : 
                                                               /* Start the Loop */
                                                               while ( have_posts() ) :
                                                                      the_post();

                                                                      /**
                                                                       * Run the loop for the search to output the results.
                                                                       * If you want to overload this in a child theme then include a file
                                                                       * called content-search.php and that will be used instead.
                                                                       */
                                                                      get_template_part( 'template-parts/content', 'search' );


                                                               endwhile;

                                                               $pagination = get_the_posts_pagination( array(

                                                                      'prev_text' => '<i class="mdicon mdicon-arrow_back"></i>',
                                                                      'next_text' => '<i class="mdicon mdicon-arrow_forward"></i>',
                                                                      'class'=> 'atbs-pagination atbs-module-pagination',
                                                               ) );
                                                               echo $pagination;?>




                                                               <?php
                                                        else :

                                                               get_template_part( 'template-parts/content', 'none' );

                                                        endif;
                                                               ?>
                                                 </div>
                                          </div>
                                          <?php get_sidebar()?>
                                   </div>
                            </div>
                     </div>
              </main><!-- #main -->
              <?php
       }
}
add_action('online_magazine_search_template','online_magazine_search_content');