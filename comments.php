<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage online_magazine_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
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
