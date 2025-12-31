<?php get_header(); ?>

<main class="archive-main">
    <div class="container mid">
        <div class="page-title-area">
            <h1 class="page-title-box">
                <span>
                <?php
                if ( is_post_type_archive('voice') || is_tax('parts') ) {
                    echo 'お客様の声';
                } elseif ( is_category() ) {
                    single_cat_title();
                } elseif ( is_tag() ) {
                    single_tag_title();
                } elseif ( is_archive() ) {
                    echo 'お知らせとブログ';
                }
                ?>
                </span>
            </h1>
        </div>

        <div class="contents-area">
            <div class="contents-wrap">
                <ul class="blog-contents-wrap">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); 
                        $current_pt = get_post_type();
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

                                    <?php if ( $current_pt === 'voice' ) : ?>
                                        <?php 
                                            $v_name = get_post_meta(get_the_ID(), 'name', true);
                                            $v_age  = get_post_meta(get_the_ID(), 'age', true);
                                            $v_letter = get_post_meta(get_the_ID(), 'letter', true);
                                            
                                            if($v_name || $v_age): 
                                        ?>
                                            <p class="voice-meta"><strong><?php echo esc_html($v_name); ?>様</strong>（<?php echo esc_html($v_age); ?>代）</p>
                                        <?php endif; ?>

                                        <?php if ($v_letter) : ?>
                                            <p class="excerpt"><?php echo wp_trim_words(esc_html($v_letter), 45, '...'); ?></p>
                                        <?php endif; ?>

                                    <?php else : ?>
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
    </div>
</main>

<?php get_footer(); ?>