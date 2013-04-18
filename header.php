<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="www-sitename-com" data-template-set="html5-reset-wordpress-theme" profile="http://gmpg.org/xfn/11">

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
	   <?php
		  if (is_archive()) {
			 wp_title(''); echo ' Archief - '; }
		  elseif (is_search()) {
			 echo 'Zoeken &quot;'.wp_specialchars($s).'&quot; - '; }
		  elseif (!(is_404()) && (is_single()) || (is_page())) {
			 wp_title(''); echo ' - '; }
		  elseif (is_404()) {
			 echo 'Niet gevonden - '; }
		  elseif (is_home()) {
			 bloginfo('name'); }
		  else {
			  bloginfo('name'); }
	   ?>
	</title>
	
	<meta name="title" content="<?php
		  if (is_archive()) {
			 wp_title(''); echo ' Archief - '; }
		  elseif (is_search()) {
			 echo 'Zoeken &quot;'.wp_specialchars($s).'&quot; - '; }
		  elseif (!(is_404()) && (is_single()) || (is_page())) {
			 wp_title(''); echo ' - '; }
		  elseif (is_404()) {
			 echo 'Niet gevonden - '; }
		  elseif (is_home()) {
			 bloginfo('name'); }
		  else {
			  bloginfo('name'); }
	   ?>">

	<meta name="description" content="<?php bloginfo('description'); ?>">
	
	<meta name="author" content="RHinofly">
	<meta name="Copyright" content="Copyright Rhinofly 2012.">

	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/assets/images/icon/facebook_thumb.jpg" />

	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/icon/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/assets/images/icon/icon-retina.png">

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/print.css" type="text/css" media="print" />
	
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/modernizr-1.7.min.js"></script>
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<div id="container">

		<header id="header">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
			<?php // wp_nav_menu( array('menu' => 'hoofdmenu' )); ?>
		</header>

