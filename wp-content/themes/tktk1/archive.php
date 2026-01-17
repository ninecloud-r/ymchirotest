<?php get_header(); ?>
<?php $url = get_theme_file_uri(); ?>
        <div class="page-title-area">
            <div class="page-title">
                <<h1 class="page-title-box">
    <?php
    if ( is_post_type_archive('voice') || is_tax('parts') ) {
        echo 'ご利用者様の声';
    } elseif ( is_category() ) {
        // 現在のURLパスを取得 (例: /category/colum,blog/)
        $current_url = $_SERVER['REQUEST_URI'];
        
        // category/ の後ろの文字列を抽出
        if ( preg_match('/category\/(.+?)\//', $current_url, $matches) ) {
            $slug_string = $matches[1]; // "colum,blog" が入る
            
            if ( strpos($slug_string, ',') !== false ) {
                $slugs = explode(',', $slug_string);
                $names = [];
                foreach ( $slugs as $slug ) {
                    $cat = get_category_by_slug($slug);
                    if ( $cat ) {
                        $names[] = $cat->name;
                    }
                }
                echo implode(' と ', $names);
            } else {
                single_cat_title();
            }
        } else {
            single_cat_title();
        }
    } elseif ( is_tag() ) {
        single_tag_title();
    } elseif ( is_archive() ) {
        echo 'お知らせとブログ';
    }
    ?>
</h1>
            </div>
        </div>

        <div class="contents-area">
            <div class="contents-wrap">
                
                <?php if(is_post_type_archive('voice') || is_tax('parts')): ?>
                    <div class="page-description">
                        <?php
                        // 固定ページ ID:6974 から説明文を取得
                        $voice_page = get_post(6974);
                        if ($voice_page) {
                            echo apply_filters('the_content', $voice_page->post_content);
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <ul class="blog-contents-wrap">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); 
                        $current_pt = get_post_type();
                        $v_name   = get_post_meta(get_the_ID(), 'name', true);
                        $v_age    = get_post_meta(get_the_ID(), 'age', true);
                        $v_letter = get_post_meta(get_the_ID(), 'letter', true);
                    ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="archive-column">
                                <div class="blog-icon">
                                    <div class="img-box">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('full'); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/view/images/top_img09.jpg" alt="no image" />
                                        <?php endif; ?>
                                    </div>
                                    <p class="category-box">
                                        <?php
                                        if ( $current_pt === 'voice' ) {
                                            $terms = get_the_terms(get_the_ID(), 'parts');
                                            echo ($terms && !is_wp_error($terms)) ? esc_html($terms[0]->name) : 'お客様の声';
                                        } else {
                                            $cats = get_the_category();
                                            echo ($cats) ? esc_html($cats[0]->name) : 'ブログ';
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="blog-text">
                                    <h4><?php the_title(); ?></h4>

                                    <?php if($v_name || $v_age): ?>
                                        <p class="voice-meta">
                                            <strong><?php echo esc_html($v_name); ?>様</strong>
                                            <?php if($v_age): ?>（<?php echo esc_html($v_age); ?>代）<?php endif; ?>
                                        </p>
                                    <?php endif; ?>

                                    <p class="excerpt">
                                        <?php 
                                        if ( $current_pt === 'voice' && $v_letter ) {
                                            echo wp_trim_words(strip_tags($v_letter), 45, '...');
                                        } else {
                                            echo wp_trim_words(strip_tags(get_the_excerpt()), 40, '...');
                                        }
                                        ?>
                                    </p>
                                    <p class="time-box"><?php the_time('Y/m/d'); ?></p>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; endif; ?>
                </ul>

                <div class="pagination">
                    <?php the_posts_pagination(); ?>
                </div>
            </div>
        </div>
        <?php get_template_part('banner'); ?>
    </div>
</main>

<?php get_footer(); ?>