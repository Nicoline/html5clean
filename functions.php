<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	//Making jQuery Google API
	function modify_jquery() {
		if (!is_admin()) {
			// comment out the next two lines to load the local copy of jQuery
			wp_deregister_script('jquery');
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
			wp_enqueue_script('jquery');
		}
	}
	add_action('init', 'modify_jquery');

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Clean up the admin
	show_admin_bar(false);

	function disable_default_dashboard_widgets() {
	   remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	   remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	   remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	   remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	   remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	   remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	   remove_meta_box('dashboard_primary', 'dashboard', 'core');
	   remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	}
	add_action('admin_menu', 'disable_default_dashboard_widgets');

	function remove_links_menu() {
		// remove_menu_page('index.php'); // Dashboard
		// remove_menu_page('edit.php'); // Posts
		// remove_menu_page('upload.php'); // Media
		 remove_menu_page('link-manager.php'); // Links
		// remove_menu_page('edit.php?post_type=page'); // Pages
		 remove_menu_page('edit-comments.php'); // Comments
		// remove_menu_page('themes.php'); // Appearance
		 //remove_menu_page('plugins.php'); // Plugins
		// remove_menu_page('users.php'); // Users
		 remove_menu_page('tools.php'); // Tools
		 //remove_menu_page('options-general.php'); // Settings
	}
	add_action( 'admin_menu', 'remove_links_menu' );

	// Add support for menus
	if (function_exists('add_theme_support')) {
	   add_theme_support('menus');
	}

	// Easy support for custom fields
	function field_func($atts) {
	   global $post;
	   $name = $atts['name'];
		  if (empty($name)) return;
			 return get_post_meta($post->ID, $name, true);
	   }

	// Add featured thumbnails
	add_theme_support( 'post-thumbnails' );  
	set_post_thumbnail_size( 150, 150 );

	add_shortcode('field', 'field_func');
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
// Custom pagination
	function custom_pagination($pages = '', $range = 4)
	{
     $showitems = ($range * 2)+1;
  
     global $paged;
     if(empty($paged)) $paged = 1;
  
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     } 
  
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Pagina ".$paged." van ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; Eerste</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Vorige</a>";
  
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
  
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Volgende &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Laatste &raquo;</a>";
         echo "</div>\n";
     }
}

?>