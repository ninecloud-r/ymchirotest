<?php
/*
Template Name: seminar
*/
?>
<?php get_header(); ?>

<div class="section blog-section">
<div class="container lg">
<div class="section-title">
<h2 class="en-title"><?php single_cat_title(); ?></h2>
<!--<p class="jp-title">
<h1><?php single_cat_title(); ?></h1>
</p>-->
</div>
<div class="contents-area">
<div class="contents-wrap">
<ul class="blog-contents-wrap">
<?php /***** メインループ開始 *****/ ?>
<?php if (have_posts()) :?>
<?php while (have_posts()) : the_post(); ?>
<li>
<a href="<?php echo get_permalink(); ?>" class="archive-column">
<div class="blog-icon">
<div class="img-box">
<?php if(first_image()): ?>
<img src="<?php echo first_image(); ?>" alt="<?php the_title(); ?>">
<?php else: ?>
<img src="<?php echo get_template_directory_uri()?>/view/images/top_img09.jpg" />
<?php endif; ?>
</div>
<p class="time-box">
<?php the_time('Y/m/d'); ?>
</p>
</div>
<h4><?php the_title(); ?></h4>
</a>
</li>
<?php endwhile; ?>
<?php endif; ?>
<?php /***** メインループ終了 *****/ ?>
</ul>

</div>

<?php // ページネーション ?>
<?php
if ( pagination() ) {
echo pagination();
}
?>
</div>
<div class="tag-term-wrap">
<ul>
<?php
$posttags = get_tags();  //タグの情報を取得
if ($posttags) {
  foreach($posttags as $tag) {
    echo ' <li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ('. $tag->count .')</li>';
  }
}
?>
</ul>
</div>
</div><!-- .flex -->



</div><!-- .container -->
</div><!-- .blog-section" -->

</div>
<?php get_footer(); ?>