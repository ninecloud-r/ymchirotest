<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php $url = get_theme_file_uri(); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $url?>/view/images/favicon.ico" />

<meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:image" content="<?php echo $url?>/view/images/sns_img1.jpg" />

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?php echo $url?>/view/js/common.js" type="text/javascript"></script>
<link media="screen" type="text/css" href="<?php echo $url?>/view/css/style.css" rel="stylesheet">

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NWG724T');</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NWG724T"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <div class="wrap-all">
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
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">予約・お問い合わせ</a>
              </div>
            </div>
          </div>
        </div>
      </header>

      <?php if ( is_home() || is_front_page() ) : ?>
        <?php 
          $top_page_id = 7007; 
          // 画像取得処理
          $img_pc_raw = get_field('top_main_img_pc1', $top_page_id);
          $img_sp_raw = get_field('top_main_img_sp1', $top_page_id);
          
          // URL変換関数（簡略化）
          function get_acf_img_url($data) {
              if (!$data) return "";
              if (is_array($data)) return $data['url'];
              if (is_numeric($data)) return wp_get_attachment_url($data);
              return $data;
          }
          $img_pc_url = get_acf_img_url($img_pc_raw);
          $img_sp_url = get_acf_img_url($img_sp_raw) ?: $img_pc_url;
        ?>
        <div class="main-img-area">
          <?php if ($img_pc_url) : ?>
            <img class="pc-only" src="<?php echo esc_url($img_pc_url); ?>" alt="てくてくカイロプラクティック整体院" />
            <img class="sp-only" src="<?php echo esc_url($img_sp_url); ?>" alt="てくてくカイロプラクティック整体院" />
          <?php else : ?>
            <img class="pc-only" src="<?php echo $url?>/view/images/main_img_pc01.webp" />
            <img class="sp-only" src="<?php echo $url?>/view/images/main_img_sp.webp" />
          <?php endif; ?>
        </div>
      <?php elseif(is_page()): ?>
        <div class="bread-crumb">
          <div class="container">
            <ul>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページ</a></li>
              <li><?php the_title(); ?></li>
            </ul>
          </div>
        </div>
      <?php endif; ?>

      <div class="gnav-wrapper">
        <p class="btn-gnav">
          <span></span>
          <span></span>
          <span></span>
        </p>
        <nav class="gnav-box">
          <ul class="gnav menu">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="jp-title">トップページ</span></a></li>
            <li><a href="<?php echo esc_url( home_url( '/aboutus' ) ); ?>"><span class="jp-title">当院について</span></a></li>
            <li><a href="<?php echo esc_url( home_url( '/voice' ) ); ?>"><span class="jp-title">ご利用者様の声</span></a></li>
            <li><a href="<?php echo esc_url( home_url( '/treatment' ) ); ?>"><span class="jp-title">施術と料金</span></a></li>
            <li><a href="<?php echo esc_url( home_url( '/accsess' ) ); ?>"><span class="jp-title">アクセス</span></a></li>
          </ul>
        </nav>
      </div>

<?php if ( is_home() || is_front_page() ) : ?>
<main class="top-page">
<?php elseif(is_page()): ?>
<main>
  <div class="page-wrapper">
    <div class="page-title-area">
      <div class="page-title">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
<?php else: ?>
<main class="archive-main">
  <div class="bread-crumb">
    <div class="container">
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページ</a></li>
        <li><?php wp_title(''); ?></li>
      </ul>
    </div>
  </div>  
  <div class="container mid">
<?php endif; ?>