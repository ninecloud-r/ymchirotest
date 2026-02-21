<?php get_header(); ?>
<?php $url = get_theme_file_uri(); ?>


        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $current_pt = get_post_type();
            $post_id    = get_the_ID();
        ?>
            
            <article class="post">
                <div class="page-title-area">
                    <div class="page-title">
                        <h1 class="page-title-box"><span><?php the_title(); ?></span></h1>
                        <div class="date-box">
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
                        </div>
                    </div>
                </div>

                <div class="entry-main-visual">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php elseif ( function_exists('first_image') && first_image() ) : ?>
                        <img src="<?php echo first_image(); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>

                <div class="entry-content-box-wrapper">
                    
                    <div class="link-box">
                        <div class="tag">
                            <?php 
                            if ( $current_pt === 'voice' ) {
                                the_terms( $post_id, 'parts', '', ' ' ); 
                            } else {
                                the_tags( '', '' ); 
                            }
                            ?>
                        </div>
                    </div>

                    <div class="entry-content">
                        <?php if ( $current_pt === 'voice' ) : ?>
                            <section class="voice-detail">
                                <div class="voice-header">
                                    <h2 class="voice-title">
                                        <span class="v-name"><?php echo esc_html(get_post_meta($post_id, 'name', true)); ?> 様</span>
                                        <span class="v-meta">
                                            （<?php echo esc_html(get_post_meta($post_id, 'age', true)); ?>代 
                                            <?php echo esc_html(get_post_meta($post_id, 'gender', true)); ?>）
                                        </span>
                                    </h2>
                                </div>
                                <div class="content-box voice-content">
                                <div class="voice-images">
                                    <?php 
                                    foreach (['image', 'image02', 'image03'] as $f) {
                                        $id = get_post_meta($post_id, $f, true);
                                        if ($id) {
                                            echo '<div class="v-img-item">' . wp_get_attachment_image($id, 'medium') . '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="voice-letter-box">
                                    
                                    <p class="v-letter">
    <?php 
        // 1. 現在の投稿からメタデータを直接取得（念のため変数に再代入）
        $letter_data = get_post_meta(get_the_ID(), 'letter', true);

        if ( !empty($letter_data) ) {
            // 2. 文字列としての "<br>" や "<br />" が混入していたら、本物の改行コードに置換
            $letter_data = str_replace(array('&lt;br&gt;', '&lt;br /&gt;', '<br>', '<br />'), "\n", $letter_data);
            
            // 3. HTMLタグを無効化しつつ、改行コードを <br> に変換して出力
            echo nl2br(esc_html($letter_data));
        }
    ?>
</p>
                                    <p class="menseki">※施術効果には個人差があります。</p>
                                </div>
                                </div>
                                <h2 class="voice-title">
                            てくてくスタッフより
                        </h2>
                            </section>
                            <div class="entry-body">
                            <?php the_content(); ?>
<p class="menseki">※内容は、当院での施術実績に基づいたものです。全てのケースに当てはまるわけではありません。</p>
                        <?php else: ?>
<div class="entry-body">
                            <?php the_content(); ?>
                        
                        <?php endif; ?>
</div>
                        
                    </div>

                    <div class="tag-term-wrap">
    <ul>
        <?php
        if ( $current_pt === 'voice' ) {
            $terms = get_terms(['taxonomy' => 'parts', 'hide_empty' => true]);
            foreach ( (array)$terms as $t ) {
                echo '<li><a href="'.get_term_link($t).'">'.esc_html($t->name).'</a> ('.$t->count.')</li>';
            }
        } else {
            // exclude パラメータを追加して指定のIDを除外します
            wp_list_categories([
                'title_li'   => '',
                'show_count' => true,
                'exclude'    => '11,73,46,10' // ここに除外したいIDを記述
            ]);
        }
        ?>
    </ul>
</div>

                    <div class="btn-box">
                        <div class="btn btn-readmore">
                            <?php 
                            if ( $current_pt === 'voice' ) : 
                                $back_url = get_post_type_archive_link('voice');
                                $back_txt = 'お客様の声一覧へ →';
                            else : 
                                $cats = get_the_category();
                                $back_url = (!empty($cats)) ? get_category_link($cats[0]->term_id) : home_url();
                                $back_txt = (!empty($cats)) ? $cats[0]->name . '一覧へ →' : 'ホームへ →';
                            endif;
                            ?>
                            <a href="<?php echo esc_url($back_url); ?>"><?php echo esc_html($back_txt); ?></a>
                        </div>
                    </div>

                    <div class="pager-box-wrap" style="display: flex; justify-content: space-between; margin-top: 40px;">
                        <?php 
                        $tax = ($current_pt === 'voice') ? 'parts' : 'category';
                        previous_post_link('<div class="prev-btn pager-box" style="flex:1; text-align:left;">%link</div>', '« 前の記事へ<br>%title', TRUE, '', $tax);
                        next_post_link('<div class="next-btn pager-box" style="flex:1; text-align:right;">%link</div>', '次の記事へ »<br>%title', TRUE, '', $tax);
                        ?>
                    </div>

                </div>
            </article>

        <?php endwhile; endif; ?>
<?php get_template_part('banner'); ?>
    </div>
    
</div>

<?php get_footer(); ?>