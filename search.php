<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<h1>Zoekresultaten</h1>
		<?php while (have_posts()) : the_post(); ?>
			<article class="article" id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<span class="meta"><?php the_time('j F Y') ?> om <?php the_time('H:i') ?> door <?php the_author_posts_link(); ?> in <?php the_category(', '); ?></span>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
		<div class="clearfix pagination">
			<?php if (function_exists("custom_pagination")) {
				custom_pagination($additional_loop->max_num_pages);
			} ?>
		</div>
	<?php else : ?>
		<h1>Geen resultaten gevonden</h1>
	<?php endif; ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Zoeken')) : else : ?>
	<?php endif; ?>
<?php get_footer(); ?>
