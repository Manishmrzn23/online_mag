<?php
if (!function_exists('online_magazine_404_content')) {

    function online_magazine_404_content() {?>

        <div class="site-content">
            <div class="atbs-block atbs-block--fullwidth module-404">
                <div class="container">
                    <div class="text-error">
                        <p>404</p>
                        <h2 class="error">Something went wrong!</h2>
                        <h3>We couldn't find the page you're looking for. Try searching or go back to the <a href="<?php echo esc_url(home_url('/')); ?>">Homepage</a></h3>
                    </div>
                </div>
            </div>
        </div><!-- .site-content -->

        <?php
    }

}
add_action('online_magazine_404_template', 'online_magazine_404_content');


if (!function_exists('online_magazine_comments_content')) {

    function online_magazine_comments_content() {
        if ( post_password_required() ) {
            return;
        }

        $online_magazine_one_comment_count = get_comments_number();
        ?>
        <div class="comments-section single-entry-section">
            <div id="comments" class="comments-area"> 
                <?php
                if ( have_comments() ) :?>
                    <div class="comment-title" >
                        <div class="comment-count__inner comment-form-block-heading block-heading">
                            <h4 class="block-heading__title title-style-2">
                                <?php if ( '1' === $online_magazine_one_comment_count ) : ?>
                                    <?php esc_html_e( '1 comment', 'online-magazine' ); echo '</h4></div></div>';?>
                                <?php else : ?>
                                    <?php
                                    printf(
                                        /* translators: %s: Comment count number. */
                                        esc_html( _nx( '%s comment', '%s comments', $online_magazine_one_comment_count, 'Comments title', 'online-magazine' ) ),
                                        esc_html( number_format_i18n( $online_magazine_one_comment_count ) )
                                    );
                                    ?>
                            </h4><!-- .comments-title -->
                        </div>
                    </div>
                <?php endif; ?>

                    <ol class="comment-list">
                        <?php
                        wp_list_comments(
                            array(
                                'callback'=>'online_magazine_comment',
                                'avatar_size' => 50,
                                'style'       => 'ol',
                                'short_ping'  => true,
                            )
                        );
                        ?>
                    </ol><!-- .comment-list -->

                    <?php the_comments_navigation(); ?>

                    <?php if ( ! comments_open() ) : ?>
                        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'online-magazine' ); ?></p>s
                    <?php endif; ?>
                <?php endif; ?>
            </div><!-- #comments -->
        </div>
        <?php
    }

}

add_action('online_magazine_comments_template', 'online_magazine_comments_content');
