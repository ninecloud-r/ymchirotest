<?php
/*
Template Name: seminar
*/
?>
<?php get_header(); ?>
			
<div class="section blog-section">
							<div class="container lg">
								<div class="section-title">
									<h2 class="en-title">News & Blog</h2>
									<p class="jp-title">
										お知らせとブログ
										</p>
									</div>
									
                                
										<div class="contents-area">
											<div class="contents-wrap">
												<ul class="blog-contents-wrap">
                                                 <?php
$wp_query = new WP_Query();
$args = array(
'post_type' => 'post',
'post_status' => 'publish',
'category__in' => 226,
'posts_per_page' => 12,
'order' => 'DESC'
);
$wp_query->query($args);
if($wp_query->have_posts()){
?>
                        
<?php
while (have_posts()) {
the_post();
?>   
                                                    
													<li>
														<a href="<?php echo get_permalink(); ?>" class="archive-column">
														<div class="blog-icon">
                                                            <div class="img-box">
                                                            <?php if(first_image()): ?>
  <img src="<?php echo first_image(); ?>" alt="<?php the_title(); ?>">
                                                            <?php else: ?>

															<img src="<?php echo $url?>/view/images/top_img09.jpg" />
                                                            <?php endif; ?>
                                                                </div>
															<p class="time-box">
																<?php the_time('Y/m/d'); ?>
																</p>
															</div>
														<h4><?php the_title(); ?></h4>
														</a>

														</li>
                                                    

<?php
}
wp_reset_query();
}
?>
														
													</ul>
												</div>
												</div>
												


											</div>

								</div>
		
</div><!-- container -->
<?php get_footer(); ?>