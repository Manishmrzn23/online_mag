
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