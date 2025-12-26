<?php get_header(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
			<?php endwhile; ?>
	<?php if( is_page('17') ) : ?>
		<div class="section product-section">
				<div class="container lg">
					<div class="section-title">
						<h2 class="en-title">Product</h2>
						<p class="jp-title">
							製品紹介
							</p>
						</div>
						<div class="description-area">
							紅型師：金城昌太郎が貫き通した美学を後世にも伝えたい。<br>
製品は全て、その貫き通した美が息づくよう尽力しております。
							</div>
<div class="contents-area">
<div class="contents-wrap">
<!--<div class="add-contents">
<img src="<?php echo $url?>/view/images/top_img03.jpg" />
<h3>紅型制作の様子</h3>
<p>
金城昌太郎の紅型制作の様子を動画で紹介します。
</p>
</div>-->
<ul>
<?php
$wp_query = new WP_Query();
$args = array(
'post_type' => 'post',
'post_status' => 'publish',
'category__in' => 2,
'posts_per_page' => 10,
'order' => 'DESC'
);
$wp_query->query($args);
if($wp_query->have_posts()){
?>
<?php
while (have_posts()) {
the_post();
?>
<li class="archive-column">
<div class="lp-icon">
<div class="img-box">
<a href="<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ): ?><!-- if文による条件分岐 アイキャッチが有る時-->
<?php the_post_thumbnail( 'thumbnail' ); ?>
<?php else: ?><!-- アイキャッチが無い時-->
<?php
$image = get_field('lp_main_img');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
?>
    <?php  if( $image ):?>
        <?php echo wp_get_attachment_image( $image, $size );?>
    <?php else: ?>
        <img src="<?php echo first_image(); ?>" alt="<?php the_title(); ?>">
    <?php endif; ?>
<?php endif; ?>
</a>
</div>
</div>
<a href="<?php echo get_permalink(); ?>" >
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
<div class="btn-box">
<div class="btn btn-forec"><a href="https://shoutarou-bingata.net/">ECストアで商品を見る</a></div>
</div>


	<?php elseif ( is_page('17') ) : ?>

	<?php else: ?>

	<?php endif; ?>
<?php get_footer(); ?>
