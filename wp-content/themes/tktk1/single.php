<?php get_header(); ?>

<main class="archive-main">
    <div class="container mid">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $current_pt = get_post_type(); // 投稿タイプを取得
        ?>
            
            <article class="post">
                <div class="page-title-area">
                    <div class="page-title">
                    <h1 class="page-title-box">
                        <span><?php the_title(); ?></span></h1>
                    <div class="date-box">
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                            <?php the_time('Y/m/d'); ?>
                        </time>
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
                                // お客様の声の場合は紐づいているpartsタクソノミーを表示
                                the_terms( get_the_ID(), 'parts', '', ' ' ); 
                            } else {
                                // 通常投稿の場合は標準のタグを表示
                                the_tags( '', '' ); 
                            }
                            ?>
                        </div>
                    </div>
<article class="voice-detail">
    <div class="voice-header">
        <h2 class="voice-title">
            <span class="v-name"><?php echo esc_html(get_post_meta(get_the_ID(), 'name', true)); ?> 様</span>
            <span class="v-meta">
                （<?php echo esc_html(get_post_meta(get_the_ID(), 'age', true)); ?>代 
                <?php echo esc_html(get_post_meta(get_the_ID(), 'gender', true)); ?>）
            </span>
        </h2>
    </div>

    <div class="voice-letter-box">
        <h3>いただいたお手紙の内容</h3>
        <p class="v-letter">
            <?php 
                $letter = get_post_meta(get_the_ID(), 'letter', true);
                echo nl2br(esc_html($letter)); 
            ?>
        </p>
    </div>

    <div class="voice-images">
        <?php 
        $images = ['image', 'image02', 'image03'];
        foreach ($images as $img_field) :
            $img_id = get_post_meta(get_the_ID(), $img_field, true);
            if ($img_id) :
                // 画像IDからURLとaltを取得（中サイズで出力）
                $img_src = wp_get_attachment_image_src($img_id, 'medium');
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
        ?>
                <div class="v-img-item">
                    <img src="<?php echo esc_url($img_src[0]); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                </div>
        <?php 
            endif;
        endforeach; 
        ?>
    </div>
</article>
                    <div class="entry-body">
                        <?php the_content(); ?>
                    </div>

                    <div class="tag-term-wrap">
                        <ul>
                            <?php
                            // voiceの時だけ「parts」タクソノミーの一覧を出す
                            if ( $current_pt === 'voice' ) {
                                $terms = get_terms( array( 'taxonomy' => 'parts', 'hide_empty' => true ) );
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                    foreach ( $terms as $term ) {
                                        $term_link = get_term_link( $term );
                                        if ( ! is_wp_error( $term_link ) ) {
                                            echo '<li><a href="' . esc_url( $term_link ) . '">' . esc_html( $term->name ) . '</a> (' . $term->count . ')</li>';
                                        }
                                    }
                                }
                            } else {
                                // 通常投稿の場合は標準のカテゴリー一覧を出す（必要であれば）
                                wp_list_categories( array( 'title_li' => '', 'show_count' => true ) );
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="btn-box">
                        <div class="btn btn-readmore">
                            <?php 
                            if ( $current_pt === 'voice' ) : 
                                // voiceの場合はカスタム投稿アーカイブへ
                                $archive_link = get_post_type_archive_link( 'voice' );
                            ?>
                                <a href="<?php echo esc_url($archive_link); ?>">お客様の声一覧へ →</a>
                            <?php else : 
                                // 通常投稿の場合は親カテゴリーまたはカテゴリー一覧へ
                                $cats = get_the_category();
                                if ( !empty($cats) ) {
                                    $cat = $cats[0];
                                    $cat_name = ($cat->parent) ? get_category($cat->parent)->cat_name : $cat->cat_name;
                                    $cat_link = ($cat->parent) ? get_category_link($cat->parent) : get_category_link($cat->term_id);
                                }
                            ?>
                                <a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?>一覧へ →</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="pager-box-wrap" style="display: flex; justify-content: space-between; margin-top: 40px;">
                        <?php 
                        $tax_name = ($current_pt === 'voice') ? 'parts' : 'category';
                        
                        $prev_link = get_previous_post_link('%link', '« 前の記事へ<br>%title', TRUE, '', $tax_name); 
                        if ( $prev_link ) : ?>
                            <div class="prev-btn pager-box" style="flex: 1; text-align: left;"><?php echo $prev_link; ?></div>
                        <?php endif; ?>

                        <?php 
                        $next_link = get_next_post_link('%link', '次の記事へ »<br>%title', TRUE, '', $tax_name); 
                        if ( $next_link ) : ?>
                            <div class="next-btn pager-box" style="flex: 1; text-align: right;"><?php echo $next_link; ?></div>
                        <?php endif; ?>
                    </div>

                </div>
            </article>

        <?php endwhile; endif; ?>

    </div>
</main>

<?php get_footer(); ?>