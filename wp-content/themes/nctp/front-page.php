<?php
/*
Template Name: front-page
*/
?>
<?php get_header(); ?>
    <div class="section concept-section gray-section-bg">
		<div class="container mid">
			<div class="section-title">
				<h2 class="en-title">
					About
				</h2>
				<p class="jp-title">
					私達について
				</p>
				</div>
				<div class="description-area">
					「沖縄の伝統を受け継ぐ紅型は美しい。」<br>
					紅型師：金城昌太郎は、自らの人生をかけ、琉球紅型の伝統の美を伝えてきました。<br>
					Shoutarou Binagata NAHAは、<br>
					その美しさを「伝統紅型シャツ」で伝えるアパレルブランドです。
					</div>
			</div>
			

		</div>

	<div class="section concept-section">
		<div class="container mid">
			<div class="section-title">
				<h2 class="en-title">
					Concept
				</h2>
				<p class="jp-title">
					コンセプト
				</p>
				</div>
				<div class="description-area">
					紅型師・金城昌太郎が貫いた琉球紅型の伝統の美を伝える。
					</div>
			</div>
			<div class="btn-box">
				<div class="btn btn-readmore">
					<a href="<?php echo esc_url( home_url( '/concept' ) ); ?>">
						詳しく見る →
					</a>
					</div>
				</div>

		</div>
		<?php   $url = get_theme_file_uri(); ?>

<?php if ( is_home() || is_front_page() ) : ?>
<?php
$page_id = 20;//ページIDを指定
$page = get_post($page_id, 'OBJECT', 'raw'); //指定のページIDから情報を取得
$page_include = apply_filters( 'the_content',$page->post_content); //ページの本文をフィルターフックで整形
echo $page_include; //出力
?>
<?php endif; ?>

			<div class="section product-section">
				<div class="container lg">
					<div class="section-title">
						<h2 class="en-title">Tradition Bingata</h2>
						<p class="jp-title">
							伝統紅型シャツ
							</p>
						</div>
						<div class="description-area">
							紅型師：金城昌太郎が貫ぬく伝統の美を伝える。<br>
伝統紅型シャツは全て、昌太郎の追求した美が<br>
息づくよう尽力しております。
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
// 1. 新しいクエリのための引数を定義
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category__in' => 23,
    'posts_per_page' => 4,
    'order' => 'DESC'
);

// 2. カスタムクエリオブジェクトを作成し、実行
$custom_query = new WP_Query($args); // グローバル変数を汚染しない方法

// 3. カスタムクエリを使ってループを開始
if($custom_query->have_posts()){
    while ($custom_query->have_posts()) {
        $custom_query->the_post(); // the_post() ではなく、クエリオブジェクトのメソッドを使用
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
    
    // 4. カスタムクエリ終了後、メインクエリの投稿データを復元
    wp_reset_postdata(); // ★ wp_reset_query() ではなく、wp_reset_postdata() を使用
}
?>
</ul>
</div>
</div>
									<div class="btn-box">
										<div class="btn btn-readmore">
											<a href="<?php echo esc_url( home_url( '/product' ) ); ?>">
												詳しく見る →
											</a>
											</div>
										</div>


								</div>

					</div>
					<div class="section company-section">
						<div class="container">
							<div class="section-title">
								<h2 class="en-title">Company</h2>
								<p class="jp-title">
									会社概要
									</p>
								</div>
								<div class="description-area">
									会社の場所は、沖縄の伝統あふれる街、首里（しゅり）にあります。
									</div>
									<div class="contents-area">
										<div class="content-box">
											<div class="txt-box">
												<h3>会社概要</h3>
												<p>
													会社名：Shoutarou Bingata NAHA<br>
                                                    住所：沖縄県那覇市首里山川町1-60<br>
                                                    email：info@kinjo-shoutarou.com<br>
                                                    代表者：金城 昌之<br>
                                                    事業内容：琉球紅型を使用したアパレル製品の開発<br>
                                                    関連企業：<br>
金城昌太郎びんがた工房<br>
馬場染工場<br>
HiCREATIVE<br>
NUNU工房
													</p>

												</div>
												<div class="img-box">
													<img src="<?php echo $url?>/view/images/com_img01.jpg" />
													</div>
											</div>

										</div>
										

							</div>


						</div>

	
                        
                    
                <!-- 新着記事表示 -->

                        
                        
                        
						<div class="section blog-section">
							<div class="container lg">
								<div class="section-title">
									<h2 class="en-title">News & Blog</h2>
									<p class="jp-title">
										お知らせとブログ
										</p>
									</div>
									<div class="description-area">
										展示会や販売会のお知らせ。ブログなどを発信します。
										</div>
                                
										<div class="contents-area">
											<div class="contents-wrap">
												<ul class="blog-contents-wrap">
                                                 <?php
$wp_query = new WP_Query();
$args = array(
'post_type' => 'post',
'post_status' => 'publish',
'category__in' => 39,
'posts_per_page' => 6,
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
												<div class="btn-box">
													<div class="btn btn-readmore">
														<a href="<?php echo esc_url( home_url( '/post-category/blog/' ) ); ?>">
															記事一覧を見る →
														</a>
														</div>
													</div>


											</div>

								</div>
				</div>
<?php get_footer(); ?>
