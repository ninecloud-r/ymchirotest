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
    $banner_page_id = 6980; 

    for ( $i = 1; $i <= 4; $i++ ) : 
        // どんな形式で返ってきても画像URLに変換する処理
        $img_raw  = get_field( "banner_{$i}_img", $banner_page_id );
        $title    = get_field( "banner_{$i}_title", $banner_page_id );
        $link     = get_field( "banner_{$i}_url", $banner_page_id );

        $img_url = "";
        if ( $img_raw ) {
            if ( is_numeric($img_raw) ) {
                // IDで返ってきた場合
                $img_url = wp_get_attachment_url($img_raw);
            } elseif ( is_array($img_raw) ) {
                // 配列で返ってきた場合
                $img_url = $img_raw['url'];
            } else {
                // URL文字列で返ってきた場合
                $img_url = $img_raw;
            }
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