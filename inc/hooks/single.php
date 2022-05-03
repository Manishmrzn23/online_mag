
<?php 

if (!function_exists('online_magazine_single_content')) {

	function online_magazine_single_content(){
		?>
		<div class="site-content single-entry atbs-single-style-2">
			<div class="atbs-block atbs-block--fullwidth single-entry-wrap">
				<div class="container">
					<div class="row">
						<div class="atbs-main-col" role="main">
								<?php while (have_posts()) : the_post();?>
									<!-- Post Single -->
									<article id="post-<?php the_ID(); ?>" class="atbs-block post post--single has-post-thumbnail">
										<div class="single-content">
											<header class="single-header">
												<?php online_magazine_single_category();
												 the_title('<h1 class="entry-title typescale-3_2">', '</h1>');?>
												<!-- Entry meta -->
												<div class="entry-meta">
													<?php online_magazine_single_post_meta()?>
												</div>
											</header>
												<div class="entry-thumb single-entry-thumb">
													<img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
												</div>
												<div class="single-body entry-content typography-copy">
													<?php the_content()?>
												</div>


											<?php online_magazine_single_tag()?>

											<?php online_magazine_single_social_share_link()?>
			                            </div>   
			                        </article>
			                          <!-- .single-content -->

		                        <?php online_magazine_single_author_box()?>
			                    <!-- Posts Navigation -->
	                            <?php online_magazine_single_prev_next_post()?>
								<?php endwhile;?>
			                    <!-- Related Posts -->
			                    <?php online_magazine_single_related_posts()?>
			                    <!-- Comments Section -->    
		                    	<?php online_magazine_single_comments()?>
		                    	<!-- .comment-list -->
	                    </div>
					    <!-- .atbs-main-col -->
					       <?php get_sidebar()?>
					    <!-- .atbs-sub-col -->
	                </div>         
	            </div>
	        </div>
	    </div>
	    <?php 
	}    
}
 
add_action('online_magazine_single_template','online_magazine_single_content');

if (!function_exists('online_magazine_page_content')) {
	function online_magazine_page_content(){ ?>		
			<div class="site-content single-entry atbs-single-style-1">
				<div class="atbs-block atbs-block--fullwidth single-entry-wrap">
					<div class="container">
						<div class="row">
							<!-- .atbs-main-col -->
							<div class="atbs-main-col" role="main">	
								<?php 
								online_magazine_page_title_content();?>
								<!-- Post Single -->
								<?php
								while (have_posts()) : the_post();
								$author_id=get_the_author_meta('ID');
								$author_url=get_author_posts_url($author_id);
								$author_name=get_the_author();

								$category_detail=get_the_category( get_the_ID());
								$tag_detail=get_the_tags( get_the_ID());
								customSetPostViews(get_the_ID());
								$sidebar=get_theme_mod('online_magazine_page_layout');
								?>
								<article class="atbs-block post post--single has-post-thumbnail">
								  <?php online_magazine_page_social_share();?>
		                            <!-- .single-content -->
		                        </article>
		                        <!-- Author Box -->
		                        <!-- Posts Navigation -->
		                        <?php endwhile;?>
		                    </div>
		                     <!-- .atbs-main-col -->
		                    <?php get_sidebar()?>
		                    <!-- .atbs-sub-col -->
		                </div>
		            </div>
		        </div>
		    </div>
		<?php 
    }
}


if (!function_exists('online_magazine_page_title_content')) {
	function online_magazine_page_title_content(){ 	
		$online_magazine_show_title = get_theme_mod('online_magazine_show_title', true);		
		if ($online_magazine_show_title) {?>
        	<div class="block-heading block-heading-normal block-heading--has-subtitle">
            	<h4 class="block-heading__title"><?php echo get_the_title()?></h4>
            </div>
        <?php }
    }
}



if (!function_exists('online_magazine_page_social_share')) {
	function online_magazine_page_social_share(){ 
		$author_name=get_the_author();
		$tag_detail=get_the_tags( get_the_ID());?>
				<div class="single-content">
					<div class="single-body entry-content typography-copy">
						<?php the_content()?>
					</div>
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

					<?php
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
		   		</div>
		   		<?php
	}
		 
}
 
add_action('online_magazine_page_template','online_magazine_page_content');