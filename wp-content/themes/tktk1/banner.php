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

       <div class="banner-contents" style="background: #eee; padding: 20px;">
    <?php 
    $banner_page_id = 6980; 
    // とりあえず1番目のデータだけ中身を覗いてみる
    $test_img   = get_field( "banner_1_img", $banner_page_id );
    $test_title = get_field( "banner_1_title", $banner_page_id );

    echo "";
    echo "<p>ページID: " . $banner_page_id . "</p>";
    echo "<p>タイトル取得結果: " . ($test_title ? $test_title : "空っぽです") . "</p>";
    echo "<p>画像データ型: " . gettype($test_img) . "</p>";
    
    if ($test_img) {
        echo "<pre>";
        print_r($test_img);
        echo "</pre>";
    }
    ?>
</div>
</div>