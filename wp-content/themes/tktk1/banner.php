<?php $url = get_theme_file_uri(); ?>
        <div class="banner-contents">
            <div class="banner-box">
                <div class="banner">
                <a href="#">
                    <p class="img-box"><img src="<?php echo $url; ?>/view/images/7004.jpg" alt="" /></p>
                    <p class="title-box">施術ブログ・コラム</p></a>
                </div>
            </div>
            <div class="banner-box">
                <div class="banner">
                <a href="#">
                    <p class="img-box"><img src="<?php echo $url; ?>/view/images/7004.jpg" alt="" /></p>
                    <p class="title-box">施術方法</p></a>
                </div>
            </div>
            <div class="banner-box">
                <div class="banner">
                <a href="#">
                    <p class="img-box"><img src="<?php echo $url; ?>/view/images/7004.jpg" alt="" /></p>
                    <p class="title-box">回復された方の声</p></a>
                </div>
            </div>
            <div class="banner-box">
                <div class="banner">
                <a href="#">
                    <p class="img-box"><img src="<?php echo $url; ?>/view/images/7004.jpg" alt="" /></p>
                    <p class="title-box">症状別の事例</p></a>
                </div>
            </div>
        </div>


        -----

       <div class="banner-contents">
    <?php 
    // バナーを管理しているページのIDを固定
    $banner_page_id = 6980; 

    for ( $i = 1; $i <= 4; $i++ ) : 
        // 第2引数に $banner_page_id を入れて、どのページからも 6980 のデータを呼ぶようにする
        $img_data = get_field( "banner_{$i}_img", $banner_page_id );
        $title    = get_field( "banner_{$i}_title", $banner_page_id );
        $link     = get_field( "banner_{$i}_url", $banner_page_id );
        
        // 画像URLを取得（配列で返ってきている場合にも対応）
        $img_url = "";
        if ( is_array($img_data) ) {
            $img_url = $img_data['url']; // 配列（デフォルト）の場合
        } elseif ( is_string($img_data) ) {
            $img_url = $img_data; // URL（設定変更済み）の場合
        }

        if ( $img_url && $title && $link ) :
    ?>
    <div class="banner-box">
        <div class="banner">
            <a href="<?php echo esc_url($link); ?>">
                <p class="img-box">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" />
                </p>
                <p class="title-box"><?php echo esc_html($title); ?></p>
            </a>
        </div>
    </div>
    <?php endif; endfor; ?>
</div>
</div>