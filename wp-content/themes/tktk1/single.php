<?php if ( in_category('lpnft') ) :?>
<?php get_header('lpnft'); ?>
<?php else: ?>
<?php get_header(); ?>
<?php endif; ?>
<?php if ( in_category('lp') ) :?>
<div class="lp-wrapper">
<?php if( get_field('lp_main_img') ): ?>
<div class="lp-main-img-pc"><?php 
$image = get_field('lp_main_img');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
echo wp_get_attachment_image( $image, $size );
}
?></div>
<div class="lp-main-img-sp"><?php 
$image = get_field('lp_main_img_sp');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
echo wp_get_attachment_image( $image, $size );
}
?></div>
<?php endif; ?>
<?php else: ?>
<div class="archive-main">
<div class="container mid">
<div class="page-title-area">
<h1 class="page-title-box"><span><?php the_title(''); ?></span></h1>
</div>
<?php endif; ?>

<div class="date-box">
<?php if ( in_category('lp') ) :?>
<?php #ページカテゴリーはなし ?>
<?php elseif ( in_category('lpnft') ) :?>
<?php else: ?>
<?php the_time('Y/m/d'); ?>
<?php endif ?>
</div>
<article class="post">
<div class="entry-content-box-wrapper">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<div class="link-box">
	<div class="tag"><?php the_tags( '', '' ); ?></div>
</div>
<?php 
the_content();
?>
<?php
endwhile;
endif;
?>
<?php if ( in_category('lp') ) :?>
<?php #ページカテゴリーはなし ?>
<?php elseif ( in_category('lpnft') ) :?>
<?php else: ?>
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
<?php endif; ?>
<?php if ( in_category('lp') ) :?>
<?php #ページカテゴリーはなし ?>
<?php elseif ( in_category('lpnft') ) :?>
<?php else: ?>
<div class="pager-box-wrap">
<div class="prev-btn pager-box">
<?php previous_post_link('%link', '« （後の記事へ）<br>%title', TRUE); ?>
</div>
<div class="next-btn pager-box">
<?php next_post_link('%link', '（先の記事へ） »<br>%title' , TRUE); ?>
</div>
</div>
<div class="btn-box">
<div class="btn btn-readmore">
<a href="<?php echo esc_url( home_url( '/post-category/news/' ) ); ?>">

<?php 
$cats = get_the_category(); //現在のカテゴリーを取得
$cat = $cats[0];

if( $cat->parent ){ //親カテゴリの場合
  $parent = get_category( $cat->parent );
  //echo $parent->cat_ID; //カテゴリーIDを表示
  echo $parent->cat_name; //カテゴリー名を表示
  //echo $parent->slug; //スラッグを表示
} else {
  //echo $cat->cat_ID; //カテゴリーIDを表示
  echo $cat->cat_name; //カテゴリー名を表示
  //echo $cat->slug; //スラッグを表示
}
?>記事一覧へ →
</a>
</div>

</div>
<?php endif ?>
</div>
</article><!-- #post -->
<?php if ( in_category('lp') ) :?>
<?php else: ?>
</div>
<?php endif; ?>
</div><!-- main -->
</div><!-- container -->
<?php if ( in_category('lpnft') ) :?>
<?php get_footer('lpnft'); ?>
<?php else: ?>
<?php get_footer(); ?>
<?php endif; ?>