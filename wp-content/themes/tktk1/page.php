<?php get_header(); ?>
<?php $url = get_theme_file_uri(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
			<?php endwhile; ?>
			<?php get_template_part('banner'); ?>
		</div>
<?php get_footer(); ?>
