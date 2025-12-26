<!DOCTYPE html>
<html lang="ja">
<head>
<?php $url = get_theme_file_uri(); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url?>/view/images/favicon.ico" />
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:description" content="<?php bloginfo('description') ?>" />
<meta property="og:site_name" content="<?php the_title(); ?>" />
<meta property="og:image" content="<?php echo $url?>/view/images/sns_img1.jpg" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="description" content="<?php bloginfo('description'); ?>" />
<title>
<?php wp_title( '--', true, 'right' ); ?>
<?php bloginfo( 'name' ); ?>
</title>
<link media="screen" type="text/css" href="<?php echo $url?>/view/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="<?php echo $url?>/view/js/common.js" type="text/javascript"></script>
<!-- Google Tag Manager -->
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
</head>
  <body>
  <div class="wrap-all top-page">
    <div class="wrapper">
      <header>
  <div class="header-headline">
    <div class="container">
      <h1>神奈川県大和市の整体院【頭痛・不眠・坐骨神経痛】にお悩みの方へ！てくてくカイロプラクティック整体院</h1>
    </div>
  </div>

  <div class="container header-main-wrap">
    <div class="header-left">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
        <img src="<?php echo $url?>/view/images/header-logo.png" alt="てくてくカイロプラクティック整体院" />
      </a>
    </div>

    <div class="header-right">
      <div class="header-info">
        <div class="phone">
          <p><span class="email">ご予約、ご相談はお気軽に</span><br>
          <span class="emp">TEL: 046-204-8003</span></p>
        </div>
        <div class="header-btn">
          <a href="./contact">予約・お問い合わせ</a>
        </div>
      </div>
    </div>
  </div>
</header>
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
                        トップページ
                      </span>
                    </a>
                  </li>
                  <li>
            <a href="./company">
                      <span class="jp-title">
                        当院について
                      </span>
                    </a>
                  </li>
                  <li>
            <a href="./concept">
                      <span class="jp-title">
                        ご利用者様の声
                      </span>
                    
                    </a>
                  </li>
                  <li>
            <a href="./results">
                      <span class="jp-title">
                        施術と料金
                      </span>
                      
                    </a>
                  </li>
                  <li>
            <a href="./contact">
                      <span class="jp-title">
                        アクセス
                      </span>
                      
                    </a>
                  </li>

                </ul>
                
      </nav>

      </div>

    

<main>
<?php if ( is_home() || is_front_page() ) : ?>
<div class="main-img-area">
  <img class="pc-only" src="<?php echo $url?>/view/images/main_img_pc01.webp" />
  <img class="sp-only" src="<?php echo $url?>/view/images/main_img_sp.jpg" />
</div>
<?php elseif(is_page()): ?>
        <?php
	$page = get_post( get_the_ID() );
	$slug = $page->post_name;
	$subtitle = ucfirst($slug);
?>
<div class="bread-crumb">
<div class="container">
  <ul>
    <li> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページ</a> </li>
    <li><?php the_title_attribute(); ?></li>
  </ul>
</div>
</div>
<div class="page-wrapper">
<div class="page-title-area">
<div class="page-title">
<h1>
<?php the_title_attribute(); ?>
</h1>
</div>

        <?php else: ?>
        <?php endif; ?>
