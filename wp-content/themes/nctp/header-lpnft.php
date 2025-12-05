  <!DOCTYPE html>
  <html lang="ja">
  <head>
    <?php   $url = get_theme_file_uri(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $url?>/view/images/favicon.ico" />
    <meta property="og:url" content="https://shotaro-bingata.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="SHOTARO BINGATA" />
    <meta property="og:description" content="金城昌太郎紅型工房" />
    <meta property="og:site_name" content="SHOTARO BINGATA" />
    <meta property="og:image" content="<?php echo $url?>/view/images/sns_img1.jpg" />
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

<?php wp_head(); ?>

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

