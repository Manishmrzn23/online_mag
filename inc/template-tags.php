<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Online_Magazine
 */

if ( ! function_exists( 'online_magazine_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function online_magazine_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'online-magazine' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'online_magazine_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function online_magazine_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'online-magazine' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'online_magazine_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function online_magazine_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'online-magazine' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'online-magazine' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'online-magazine' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'online-magazine' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'online-magazine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'online-magazine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'online_magazine_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function online_magazine_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;



if (!function_exists('online_magazine_single_comments')) {

    function online_magazine_single_comments() {

	        $online_magazine_single_comments = get_theme_mod('online_magazine_single_comments', true);
	        // If comments are open or we have at least one comment, load up the comment template.
	        if ($online_magazine_single_comments && (comments_open() || get_comments_number())) :
	            comments_template();
	        endif;

        comment_form(
            array(
                'title_reply'        => esc_html__( 'Leave A Reply', 'online-magazine' ),
                'title_reply_before' => '<div class="block-heading comment-form-block-heading"><h3 class="block-heading__title title-style-2">',
                'title_reply_after'  => '</h3></div>',
            )
        );

    }

}

if (!function_exists('online_magazine_single_related_posts')) {

    function online_magazine_single_related_posts() {

		$author_id=get_the_author_meta('ID');
		$author_url=get_author_posts_url($author_id);
		$author_name=get_the_author();
		customSetPostViews(get_the_ID());


        $related = get_posts( 
        	array( 
        		'category__in' => wp_get_post_categories( get_the_ID()), 
        		'numberposts'  => 2, 
        		'post__not_in' => array(get_the_ID()) 
        	) 
        );
        ?>

        <div class="related-posts single-entry-section">
        	<div class="block-heading">
        		<h4 class="block-heading__title">You may also like</h4>
        	</div>
        	<div class="posts-list posts__vertical_style_4 flexbox-wrap flexbox-wrap-2i flex-space-30">
        		<?php
        		if( $related ) { 
        			foreach( $related as $post ) {
        					?>
        				<div class="list-item">
        					<article class="post post--vertical post--vertical-medium post--vertical-medium_style_2 post__thumb-460">
        						<div class="post__thumb atbs-thumb-object-fit">
        							<a href="<?php the_permalink($post) ?>">
        								<img src="<?php echo get_the_post_thumbnail_url($post)?>" alt="file not found">
        							</a>
        						</div>
        						<div class="post__text ">
        							<div class="post__meta">
        								<div class="entry-author post-author entry-author__avatar-40 entry-author-round">
        									<a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
        										<img alt="designuptodate" src="<?php echo get_avatar_url($author_id)?>">
        									</a>
        									<div class="author__text">
        										<a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name);?></a>
        										<time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
        									</div>
        								</div>
        							</div>
        							<h3 class="post__title typescale-2 custom-typescale-2">
        								<a class="line-limit line-limit-3" href="<?php the_permalink($post) ?>"><?php echo $post->post_title; ?></a>
        							</h3>
        							<div class="post__readmore">
        								<a href="<?php the_permalink($post) ?>" class="button__readmore">
        									<span class="readmore__text">View More</span>
        								</a>
        							</div>
        						</div>
        					</article>
        				</div>
        				<?php
        			}
        			wp_reset_postdata();
        		}?>
        	</div>
        </div>
        <?php
    }
}


if (!function_exists('online_magazine_single_prev_next_post')) {

    function online_magazine_single_prev_next_post() {

     $online_magazine_single_prev_next_post = get_theme_mod('online_magazine_single_prev_next_post', true);
	    if($online_magazine_single_prev_next_post) {?>
	        <?php 
	        $prevPost = get_previous_post();
	        $nextPost = get_next_post();
	        $post_id  = get_the_ID();
	        ?>

	        <div class="posts-navigation single-entry-section clearfix">
	        	<div class="posts-navigation__prev">
	        		<article class="post post--horizontal post--horizontal-mini">
	        			<div class="post__thumb post__thumb--circle">
	        				<a href="<?php echo get_permalink( $prevPost->ID ); ?>">
	        					<img src="<?php echo get_the_post_thumbnail_url($prevPost->ID)?>" alt="Post Image">
	        				</a>
	        			</div>
	        			<div class="post__text">
	        				<a class="posts-navigation__label" href="<?php echo get_permalink( $prevPost->ID ); ?>">
	        					<img src="https://allthebestsofts.com/logen/wp-content/themes/logen/images/arrows/dark-prev-arrow.png" alt="file not found">
	        					<span>Previous Article</span>
	        				</a>
	        				<h3 class="post__title typescale-1">
	        					<?php previous_post_link($format = '%link'); ?>
	        				</h3>
	        			</div>
	        		</article>
	        	</div>
	        	<div class="posts-navigation__next text-right">
	        		<article class="post post--horizontal post--horizontal-mini post--horizontal-reverse">
	        			<div class="post__thumb post__thumb--circle">
	        				<a href="<?php echo get_permalink( $nextPost->ID ); ?>">
	        					<img src="<?php echo get_the_post_thumbnail_url($nextPost->ID)?>" alt="Post Image">
	        				</a>
	        			</div>
	        			<div class="post__text">
	        				<a class="posts-navigation__label" href="<?php echo get_permalink( $nextPost->ID ); ?>">
	        					<span>Next Article</span>
	        					<img src="https://allthebestsofts.com/logen/wp-content/themes/logen/images/arrows/dark-next-arrow.png" alt="file not found">
	        				</a>
	        				<h3 class="post__title typescale-1">
	        					<?php next_post_link($format = '%link'); ?>
	        				</h3>
	        			</div>
	        		</article>
	        	</div>
	        </div>
	    	<?php 
		}
	}
}

if (!function_exists('online_magazine_single_author_box')) {

    function online_magazine_single_author_box() {
    	$author_id=get_the_author_meta('ID');
		$author_url=get_author_posts_url($author_id);
		$author_name=get_the_author();


		$online_magazine_single_author_box = get_theme_mod('online_magazine_single_author_box', true);
	    if($online_magazine_single_author_box) {?>
	        <!-- Author Box -->
	        <div class="author-box single-entry-section">
	        	<div class="author-box__image">
	        		<div class="author__avatar">
	        			<img class="avatar avatar-180 photo avatar photo" alt="<?php echo esc_attr($author_name);?>" src="<?php echo get_avatar_url($author_id)?>">
	        		</div>
	        	</div>
	        	<div class="author-box__text">
	        		<div class="author-name meta-font"><a href="<?php echo esc_url($author_url); ?>" title="Posts by <?php echo esc_attr($author_name);?>" rel="author"><?php echo esc_attr($author_name);?></a></div>
	        		<div class="author-bio"><?php the_author_meta('description')?></div>
	        		<div class="author-info">
	        			<div class="row row--flex row--vertical-center grid-gutter-20">
	        				<div class="author-socials col-xs-12">
	        					<ul class="list-unstyled list-horizontal list-space-sm">
	        						<li><a href="https://www.facebook.com/sharer.php?u=<?php echo get_avatar_url($author_id);?>&t=<?php echo esc_attr($author_name);?>"><i class="mdicon mdicon-public"></i><span class="sr-only">Website</span></a></li>
	        						<li><a href="#"><i class="mdicon mdicon-twitter"></i><span class="sr-only">Twitter</span></a></li>
	        						<li><a href="#"><i class="mdicon mdicon-facebook"></i><span class="sr-only">Facebook</span></a></li>
	        						<li><a href="#"><i class="mdicon mdicon-youtube"></i><span class="sr-only">Youtube</span></a></li>
	        					</ul>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    <?php }
	}
}



if (!function_exists('online_magazine_single_social_share_link')) {

    function online_magazine_single_social_share_link() {
		$author_name=get_the_author();
		$tag_detail=get_the_tags(get_the_ID());

				if ($tag_detail) {
					$s = '';
					$tag_url='';
					foreach ($tag_detail as $tag) {

						$tags=$tag->name;
						$tag_url.=$s . $tags;
						$s = ',';
					}
				}	
			?>

			<footer class="single-footer entry-footer ">
				<div class="entry-info flexbox flexbox--middle">
					<div class="single-social-share">
						<div class="social-share">
							<ul class="social-list social-list--md list-horizontal">
								<li>
									<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>">
										<div class="share-item__icon">
											<i class="mdicon mdicon-facebook " title="Facebook"></i>
										</div>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title(); ?>&via=<?php echo esc_attr($author_name);?>&hashtags=<?php echo $tag_url; ?>">
										<div class="share-item__icon">
											<i class="mdicon mdicon-twitter " title="Twitter"></i>
										</div>
									</a>
                                </li>
                                <li>
                                	<a href="https://plus.google.com/share?url=<?php the_permalink();?>">
                                		<div class="share-item__icon">
                                			<i class="mdicon mdicon-google-plus " title="Google Plus"></i>
                                		</div>
                                	</a>
                                </li>
                                <li>
                                	<a href="https://pinterest.com/pin/create/bookmarklet/?media=<?php echo get_the_post_thumbnail_url()?>&url=<?php the_permalink();?>&is_video=[is_video]&description=<?php the_title(); ?>">
                                		<div class="share-item__icon">
                                			<i class="mdicon mdicon-pinterest-p " title="Pinterest"></i>
                                		</div>
                                	</a>
                                </li>
                                <li>
                                	<a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink();?>&title=<?php the_title(); ?>">
                                		<div class="share-item__icon">
                                			<i class="mdicon mdicon-linkedin " title="Linkedin"></i>
                                		</div>
                                	</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="entry-meta">
                    	<time class="time" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                    </div>
                </div>
            </footer>
        <?php 
    }
}

if (!function_exists('online_magazine_single_tag')) {

    function online_magazine_single_tag() {
    $tag_detail=get_the_tags(get_the_ID());


		$online_magazine_single_tags = get_theme_mod('online_magazine_single_tags', true);
		if($online_magazine_single_tags && 'post' === get_post_type()) {?>
			<div class="entry-tags">
				<ul class="post__tags">
					
					<?php
					if ($tag_detail) {?>
						<li class="entry-tags__icon"><i class="mdicon mdicon-local_offer"></i></li>

						<?php
						foreach ($tag_detail as $tag ) {
							?>
							<li><a class="post-tag" rel="tag" href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name; ?></a></li>
							<?php
						}
					}
					?>
				</ul>
			</div>
		<?php }
	}
}


if (!function_exists('online_magazine_single_post_meta')) {

    function online_magazine_single_post_meta() {

    	$author_id=get_the_author_meta('ID');
		$author_url=get_author_posts_url($author_id);
		$author_name=get_the_author();
		customSetPostViews(get_the_ID());

			$online_magazine_single_author = get_theme_mod('online_magazine_single_author', true);
			if($online_magazine_single_author) {?>
					<span class="entry-author">
						<a href="<?php echo esc_url($author_url); ?>"><img class="entry-author__avatar" src="<?php echo get_avatar_url($author_id)?>" alt="file not found">
							<?php echo esc_attr($author_name);?></a>
					</span>
			<?php }?>

	    <?php  $online_magazine_single_date = get_theme_mod('online_magazine_single_date', true);
			if($online_magazine_single_date) {?>
				<span class="entry-time"><i class="mdicon mdicon-schedule"></i><time class="time" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time></span>
			<?php }?>

		<?php  $online_magazine_single_post_views_count = get_theme_mod('online_magazine_single_post_views_count', true);
			if($online_magazine_single_post_views_count) {?>
				<span>
					<i class="mdicon mdicon-visibility"></i><?php
					$post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true );
					if ( ! empty( $post_views_count ) ) {
						echo $post_views_count;
					}
					?>
				</span>
			<?php }
	}
}

if (!function_exists('online_magazine_single_category')) {

    function online_magazine_single_category() {
    $category_detail=get_the_category(get_the_ID());

		$online_magazine_single_categories = get_theme_mod('online_magazine_single_categories', true);
        if ($online_magazine_single_categories && 'post' === get_post_type()) {
            if ($category_detail) {											
				foreach ($category_detail as $cat ) {
					?>
					<a class="entry-cat post__cat--bg cat-theme-bg" href="<?php echo get_category_link($cat->cat_ID) ?>"><?php echo $cat->name; ?></a>
					<?php
				}
			}
        }	
    }		
}										
?>

