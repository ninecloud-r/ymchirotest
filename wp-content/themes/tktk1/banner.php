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
    <?php for ( $i = 1; $i <= 4; $i++ ) : 
        // フィールド名（banner_1_img, banner_2_img...）を動的に生成
        $img   = get_field( "banner_{$i}_img" );
        $title = get_field( "banner_{$i}_title" );
        $link  = get_field( "banner_{$i}_url" );
        
        // 全ての項目が入っている場合のみ表示
        if ( $img && $title && $link ) :
    ?>
    <div class="banner-box">
        <div class="banner">
            <a href="<?php echo esc_url($link); ?>">
                <p class="img-box">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" />
                </p>
                <p class="title-box"><?php echo esc_html($title); ?></p>
            </a>
        </div>
    </div>
    <?php endif; endfor; ?>
</div>