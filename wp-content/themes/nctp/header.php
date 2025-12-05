  <!DOCTYPE html>
  <html lang="ja">
  <head>
    <?php   $url = get_theme_file_uri(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $url?>/view/images/favicon.ico" />
    
    <?php if (is_single() || is_page()): ?>
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:description" content="Shoutarou Bingata NAHA 伝統紅型シャツブランド" />
    <!-- サムネイル画像があるならサムネイル画像を表示-->
    <?php if (post_firstimg()): //最初の画像があればサムネイル化して使用 ?>
      <meta property="og:image" content="<?php echo post_firstimg();?>" />
    <?php elseif (has_post_thumbnail()): //サムネイルがあればサムネイルを使用 ?>
      <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
    <?php else: //サムネイルがなければ共通画像を使用?>
      <meta property="og:image" content="<?php echo $url?>/view/images/sns_img1.jpg" />
    <?php endif; ?>

    <?php else: ?>
    <meta property="og:title" content="Shoutarou Bingata NAHA" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://shotaro-bingata.com" />
    <meta property="og:description" content="伝統紅型シャツブランド Shoutarou Bingata NAHA" />
    <meta property="og:site_name" content="Shoutarou Bingata NAHA" />
    <meta property="og:image" content="<?php echo $url?>/view/images/sns_img1.jpg" />
 <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <title>
<?php wp_title( '--', true, 'right' ); ?>
<?php bloginfo( 'name' ); ?>
       </title>
<link media="screen" type="text/css" href="<?php echo $url?>/view/css/style2.css" rel="stylesheet">
<script src="<?php echo $url?>/view/js/common.js" type="text/javascript"></script>
<?php if ( is_home() || is_front_page() ) : //in_categoryが単体で動かないのでヘッダータグのみ適用 ?>
<?php elseif(in_category('lp')) : ?>
<?php echo '<script type="text/javascript">';
// カテゴリースラッグ"news"の記事一覧が表示されているときの処理を書く
//値が空の場合出力を除外する
$field = get_field('header_tag');
if($field){echo $field;};
      echo '</script>';
?>
<?php endif; ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-6247217833"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-V2RHGPZ1ZG');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PWV6KDLC');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>

  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWV6KDLC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div class="wrap-all top-page">
    <div class="wrapper">
<?php if ( is_home() || is_front_page() ) : //in_categoryが単体で動かないのでヘッダータグのみ適用 ?>
      <header>
    <?php elseif ( in_category('lp') ) : ?>
                <header class="header-lp">
                    <?php else: ?>
                    <header>

        <?php endif; ?>

    <div class="container">
      <div class="header-left">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
          <img src="<?php echo $url?>/view/images/logo.png" />
        </a>
      </div>
      <div class="header-right">
        <div class="gnav-wrapper">


            	<p class="btn-gnav">
            		<span></span>
            		<span></span>
            		<span></span>
            	</p>
              <nav class="gnav-box">
                <ul class="gnav menu">
                  <li>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <span class="jp-title">
                        トップ
                      </span>
                      <span class="en-title">
                        top
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo esc_url( home_url( '/concept' ) ); ?>">
                      <span class="jp-title">
                        コンセプト
                      </span>
                      <span class="en-title">
                        concept
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo esc_url( home_url( '/product' ) ); ?>">
                      <span class="jp-title">
                        製品紹介
                      </span>
                      <span class="en-title">
                        product
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo esc_url( home_url( '/story' ) ); ?>">
                      <span class="jp-title">
                        ストーリー
                      </span>
                      <span class="en-title">
                        story
                      </span>
                    </a>
                  </li>
                  <li class="sp-only">
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
                      <span class="jp-title">
                        お問い合わせ
                      </span>
                      <span class="en-title">
                        contact
                      </span>
                    </a>
                  </li>

                </ul>
                <div class="contact-box">
                  <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="contact-btn">
                    お問い合わせ
                  </a>

                </div>
      </nav>

      </div>



      </div>
    </div>
  </header>


<?php if ( is_home() || is_front_page() ) : ?>
<div class="main-img-area">
<img class="pc-only" src="<?php echo $url?>/view/images/top_main_pc.jpg" />
<img class="sp-only" src="<?php echo $url?>/view/images/top_main_sp.jpg" />
</div>
<?php elseif(is_page()): ?>
        <?php
	$page = get_post( get_the_ID() );
	$slug = $page->post_name;
	$subtitle = ucfirst($slug);
?>
<div class="page-title-area">
<div class="container">
<h2>
<div class="en-title">
<?php echo $subtitle; ?> </div>
<div class="jp-title"> <?php the_title_attribute(); ?> </div>
</h2>
<p class="description-area">
<?php the_field('description') ?></p>
</div>
<div class="bread-crumb">
<div class="container">
  <ul>
    <li> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページ</a> </li>
    <li><?php the_title_attribute(); ?></li>
  </ul>
</div>
</div>
</div>

        <?php else: ?>
        <?php endif; ?>
