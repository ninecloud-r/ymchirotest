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
    $categories = get_the_category();
    if (!empty($categories)) {
        echo esc_html($categories[0]->name);
    }
    ?>
</p>
                                </div>
                                <div class="blog-text">
                                <h4><?php the_title(); ?></h4>
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