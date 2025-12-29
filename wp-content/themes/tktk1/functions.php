<?php
// アーカイブタイトルのカスタマイズ
function custom_archive_title($title){
    $titleParts=explode(': ',$title);
    if($titleParts[1]){
        return $titleParts[1];
    }
    return $title;
}
add_filter('get_the_archive_title','custom_archive_title');

//カスタムメニュー
register_nav_menus(
    array(
        'global' => 'グローバル',
        'header' => 'ヘッダー',
        'footer' => 'フッター',
    )
);

function first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];
  if(empty($first_img)){
    $first_img = '';
  }
  return $first_img;
}


  add_image_size( '大', 640, 640, false );


/*********************************
 メインループページネーション出力用関数
**********************************/
function pagination($end_size = 1, $mid_size = 2, $prev_next = true) {
  global $wp_query;
  $page_format = paginate_links(
    array(
      'current' => max(1, get_query_var('paged')),
      'total' => $wp_query->max_num_pages,
      'type'  => 'array',
      'prev_text' => '前へ',//前へのリンク文言
      'next_text' => '次へ',//次へのリンク文言
      'end_size' => $end_size,//初期値：１  両端のﾍﾟｰｼﾞﾘﾝｸの数
      'mid_size' => $mid_size,//初期値：２  現在のﾍﾟｰｼﾞの両端にいくつページリンクを表示するか（現在のページは含まない）
      'prev_next' => $prev_next,//初期値：true  リストの中に「前へ」「次へ」のリンクを含むか
    )
  );
  $code = '';
  if( is_array($page_format) ) {
    $paged = get_query_var('paged') == 0 ? 1 : get_query_var('paged');
    $code .= '<div class="pagination pn-parts">'.PHP_EOL;
    $code .= '<ul>'.PHP_EOL;
    foreach ( $page_format as $page ) {
      $code .= '<li>'.$page.'</li>'.PHP_EOL;
    }
    $code .= '</ul>'.PHP_EOL;
    $code .= '</div>'.PHP_EOL;
    //$code .= '<div class="pagination-total">'.$paged.'/'.$wp_query->max_num_pages.'</div>'.PHP_EOL;
  }
  wp_reset_query();
  return $code;
}

//-----------------------------------------------------
// 【記事中の最初の画像を表示】
//-----------------------------------------------------
function post_firstimg() {
    global $post, $posts;
    $firstimg = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $firstimg = $matches [1] [0];
    if(empty($firstimg)){
        // 画像が無い場合は以下デフォルト画像を読み込む
        $firstimg = "/thamnail.jpg";
    }
    return $firstimg;
}

function my_theme_setup() {
    // アイキャッチ画像をサポートする
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

?>

