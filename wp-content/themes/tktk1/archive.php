<?php get_header(); ?>

<main class="archive-main">
    <div class="container mid">
        <div class="page-title-area">
                    <h1 class="page-title-box"><span><?php
                if (is_category()) {
                    single_cat_title();
                } elseif (is_archive()) {
                    echo 'Archives';
                }
                ?><?php 
                if (is_category('voice')) {
                    echo 'お客様の声';
                } else {
                    echo 'お知らせとブログ';
                }
                ?></span></h1>
                    
                </div>
                
                
            
       

        <div class="contents-area">
            <div class="contents-wrap">
                <ul class="blog-contents-wrap">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="archive-column">
                                <div class="blog-icon">
                                    <div class="img-box">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium'); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/view/images/top_img09.jpg" alt="no image" />
                                        <?php endif; ?>
                                    </div>
                                    
    <p class="category-box">
    <?php
    // 現在の投稿タイプを取得（'voice'などが返ってくるはず）
    $post_type = get_post_type();
    // このテーマの規則「投稿タイプ名-cat」でタクソノミー名を指定
    $taxonomy = $post_type . '-cat';
    
    $terms = get_the_terms( get_the_ID(), $taxonomy );

    if ( $terms && ! is_wp_error( $terms ) ) {
        echo esc_html( $terms[0]->name );
    } else {
        // もし上記でダメなら通常のカテゴリーを試す
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            echo esc_html( $categories[0]->name );
        } else {
            echo 'お客様の声';
        }
    }
    ?>
</p>
                                </div>
                                <div class="blog-text">
                                <h4><?php the_title(); ?></h4>

<div style="background:#fff9e6; border:1px solid #ffcc00; padding:10px; font-size:12px; color:#333;">
    <strong>【デバッグ情報】</strong><br>
    投稿ID: <?php the_ID(); ?><br>
    投稿タイプ: <?php echo get_post_type(); ?><br>
    --- カスタムフィールド一覧 ---<br>
    <pre><?php print_r( get_post_custom() ); ?></pre>
</div>


                                
                                <?php if (!is_category('information')) : // お知らせ以外なら抜粋を表示する場合 ?>
                                    <p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
                                <?php endif; ?>
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
    

<?php get_footer(); ?>