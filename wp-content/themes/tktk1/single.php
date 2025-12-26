<?php get_header(); ?>

<main class="under-page single-main">
  <div class="container lg">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
      <article class="post-content">
        <header class="post-header">
          <div class="post-meta">
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
            <span class="post-category"><?php the_category(', '); ?></span>
          </div>
          <h1 class="post-title"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
          <div class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <div class="entry-body">
          <?php the_content(); ?>
        </div>

        <footer class="post-footer">
          <div class="post-nav">
            <div class="prev"><?php previous_post_link('%link', '← 前の記事'); ?></div>
            <div class="next"><?php next_post_link('%link', '次の記事 →'); ?></div>
          </div>
        </footer>
      </article>

    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>