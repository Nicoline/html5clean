<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="article" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<span class="meta"><?php the_time('j F Y') ?> om <?php the_time('H:i') ?> door <?php the_author_posts_link(); ?> in <?php the_category(', '); ?></span>
			<span class="meta"><?php comments_popup_link('Geen reacties', '1 reactie', '% reacties', 'comments-link', ''); ?></span>
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</article>
	<?php comments_template(); ?>
<?php endwhile; endif; ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Single')) : else : ?>
	<?php endif; ?>
<?php get_footer(); ?>