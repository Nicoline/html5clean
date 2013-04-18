<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php if (is_category()) { ?>
			<h1>Archief voor <strong><?php single_cat_title(); ?></strong></h1>
		<?php } elseif( is_tag() ) { ?>
			<h1>Archief voor <strong><?php single_tag_title(); ?></strong></h1>
		<?php } elseif (is_author()) { ?>
			<h1>Archief van <?php $author = get_userdata( get_query_var('author') );?><?php echo $author->display_name;?></h1>
		<?php } elseif ($post_type == '')  { ?>
			<!-- post_type -->
		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
			<article class="article" id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<span class="meta"><?php the_time('j F Y') ?> om <?php the_time('H:i') ?> door <?php the_author_posts_link(); ?> in <?php the_category(', '); ?></span>
				<span class="meta"><?php comments_popup_link('Geen reacties', '1 reactie', '% reacties', 'comments-link', ''); ?></span>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
		<div class="clearfix pagination">
			<?php if (function_exists("custom_pagination")) {
				custom_pagination($additional_loop->max_num_pages);
			} ?>
		</div>
	<?php else : ?>
		<h2>Pagina niet gevonden</h2>
	<?php endif; ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Archief')) : else : ?>
	<?php endif; ?>
<?php get_footer(); ?>
