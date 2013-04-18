<?php get_header(); ?>
	<h1>Niet gevonden (404)</h1>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 404')) : else : ?>
	<?php endif; ?>
<?php get_footer(); ?>