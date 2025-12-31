<?php get_header(); ?>

<main class="archive-main">
    <div class="container mid">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <article class="post">
                <div class="page-title-area">
                    <h1 class="page-title-box"><span><?php the_title(); ?></span></h1>
                    <div class="date-box">
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                            <?php the_time('Y/m/d'); ?>
                        </time>
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
                        <div class="tag"><?php the_tags( '', '' ); ?></div>
                    </div>

                    <div class="entry-body">
                        <?php the_content(); ?>
                    </div>

                    <div class="tag-term-wrap">
                        <ul>
                            <?php
// 'parts' タクソノミーの全カテゴリーを取得
$terms = get_terms( array(
    'taxonomy' => 'parts',
    'hide_empty' => true, // 記事が0件のカテゴリーは表示しない
) );

if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    foreach ( $terms as $term ) {
        // 各カテゴリーのリンクを取得
        $term_link = get_term_link( $term );
        
        // リンクがエラーでない場合に表示
        if ( ! is_wp_error( $term_link ) ) {
            echo '<li><a href="' . esc_url( $term_link ) . '">' . esc_html( $term->name ) . '</a> (' . $term->count . ')</li>';
        }
    }
}
?>
                        </ul>
                    </div>

                    <div class="pager-box-wrap">
                        <div class="prev-btn pager-box">
                            <?php previous_post_link('%link', '« 前の記事へ<br>%title', TRUE); ?>
                        </div>
                        <div class="next-btn pager-box">
                            <?php next_post_link('%link', '次の記事へ »<br>%title' , TRUE); ?>
                        </div>
                    </div>

                    <div class="btn-box">
                        <div class="btn btn-readmore">
                            <?php 
                            $cats = get_the_category();
                            $cat = $cats[0];
                            $cat_name = ($cat->parent) ? get_category($cat->parent)->cat_name : $cat->cat_name;
                            $cat_link = ($cat->parent) ? get_category_link($cat->parent) : get_category_link($cat->term_id);
                            ?>
                            <a href="<?php echo esc_url($cat_link); ?>">
                                <?php echo esc_html($cat_name); ?>一覧へ →
                            </a>
                        </div>
                    </div>
                </div>
            </article>

        <?php endwhile; endif; ?>

    </div>
</main>
<?php get_footer(); ?>