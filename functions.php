<?php


/** handle grid for sidebar, so this coulb be easily overwriten in child themes **/

if (!isset($sf_big_col)) $sf_big_col = 'nine';
if (!isset($sf_small_col)) $sf_small_col = 'three';


if ( ! function_exists( 'sf_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which runs
* before the init hook. The init hook is too late for some features, such as indicating
* support post thumbnails.
*
* @since sf 1.0
*/
function sf_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on sf, use a find and replace
	 * to change 'sf' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sf', get_template_directory() . '/languages' );
	
	/**
	 * Add theme support for jetpacks infinte scroll
	 */
	add_theme_support( 'infinite-scroll', array(
			'container'    => 'posts_wrapper',
			'footer'    => false,
				
	) );
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'link' ) );
	
	add_theme_support( 'custom-background' );
	add_editor_style ( '/stylesheets/foundation.css' );
	add_editor_style ( '/stylesheets/app.css' );
}
endif; // sf_setup
add_action( 'after_setup_theme', 'sf_setup' );

add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );  
function custom_image_sizes_choose( $sizes ) {  
    $custom_sizes = array(  
        'sf_slider_gallery' => 'Slider Image'  
    );  
    return array_merge( $sizes, $custom_sizes );  
}  



add_image_size( 'sf_slider_gallery', 960, 540, true );


/************* THUMBNAIL SIZE OPTIONS *************/

/************* ENQUEUE CSS AND JS *****************/

function theme_styles()
{
	// Bring in Open Sans from Google fonts
	wp_register_style( 'custom-font', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600');
	// This is the compiled css file from SCSS
	wp_register_style( 'foundation-core', get_template_directory_uri() . '/stylesheets/foundation.css', array(), '3.0', 'all' );
	wp_register_style( 'foundation-app', get_template_directory_uri() . '/stylesheets/app.css', array(), '3.0', 'all' );
    // Load this from child theme if a child theme is used
    wp_register_style( 'foundation-style', get_stylesheet_directory_uri() . '/style.css', array(), '3.0', 'all' );

	wp_enqueue_style( 'custom-font' );
	wp_enqueue_style( 'foundation-core' );
	wp_enqueue_style( 'foundation-app' );
    wp_enqueue_style( 'foundation-style' );
}

function foundation_js(){
	// $handle, $src = false, $deps = array(), $ver = false, $in_footer = false
    wp_enqueue_script( 'jquery', array(), '0.2', FALSE );

	wp_register_script( 'foundation-core', get_template_directory_uri() . '/javascripts/foundation.min.js' );
	wp_enqueue_script( 'foundation-core', array('jquery'), '3.2', FALSE );
    wp_register_script( 'sf-gallery', get_template_directory_uri() . '/javascripts/jquery.montage.js' );
    wp_enqueue_script( 'sf-gallery', array('jquery'), '3.1', FALSE );
	wp_register_script( 'foundation-app', get_template_directory_uri() . '/javascripts/app.js' );
	wp_enqueue_script( 'foundation-app', array('jquery'), '3.1', FALSE );
}

add_action('wp_enqueue_scripts', 'foundation_js');
add_action('wp_enqueue_scripts', 'theme_styles');

// the top bar left menu
function sf_topbarleft_nav() {
	// display the wp3 menu if available
	$option = array(
			'container' => ' ',                           // remove nav container
			'menu' => 'Top bar left',                      // nav name
			'menu_class' => 'left',         // adding custom nav class
			'theme_location' => 'top-nav-right',                 // where it's located in the theme
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' =>   '__return_false()' ,
			'walker' => new sf_nav_walker_top          // fallback function
	);
	$nav = wp_nav_menu($options);
	$nav = str_replace( 'sub-menu', 'sub-menu dropdown',  $nav );
	echo $nav;
}
//has-dropdown

// the top bar right
function sf_topbarright_nav() {
	// display the wp3 menu if available
	$options = array(
			'container' => ' ',                           // remove nav container
			'menu' => 'Top bar right',                      // nav name
			'theme_location' => 'top-nav-left',                 // where it's located in the theme
			'depth' => 0,
			'items_wrap'      => '%3$s',
			'fallback_cb' =>   '__return_false()' ,
			'walker' => new sf_nav_walker_top                                     // limit the depth of the nav

	);
	$nav = wp_nav_menu($options);
	$nav = str_replace( 'sub-menu', 'sub-menu dropdown',  $nav );
	echo $nav;
}



function sf_content_nav() {

	$options= array(
			'container' => ' ',                           // remove nav container
			'menu' => 'Content Navigation',                 // nav name
			'menu_class' => 'nav-bar',                      // adding custom nav class
			'theme_location' => 'content-menu',                  // where it's located in the theme
			'depth' => 0,
			'fallback_cb' =>   'sf_fallback_menu' ,
			'echo' => false,
			'walker' => new reverie_walker
	);
	$nav = wp_nav_menu($options);
	 
	$nav = str_replace( 'sub-menu', 'sub-menu dropdown',  $nav );
	return $nav;

}
//credits for this: https://github.com/milohuang/reverie/
// Customize output for menu
class reverie_walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<a href=\"#\" class=\"flyout-toggle\"><span> </span></a><ul class=\"flyout\">\n";
	}
}

class sf_nav_walker_top extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown\">\n";
	}
}
// Add Foundation 'active' class for the current menu item
function reverie_active_nav_class( $classes, $item )
{
	if($item->current == 1)
	{
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'reverie_active_nav_class', 10, 2 );


register_nav_menu( 'top-nav-left', 'Title Bar Menu (left)' );
//register_nav_menu( 'top-nav-right', 'Title Bar Menu (right)' );
register_nav_menu( 'content-menu', 'Content Menu' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function sf_widgets_init() {

	register_sidebar( array(
			'name' => 'sidebar',
			'id' => 'sidebar1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 classs>',
			'after_title' => '</h4>'
	) );
	
	register_sidebar( array(
			'name' => 'footer',
			'id' => 'footer1'
	) );
	
}
add_action( 'widgets_init', 'sf_widgets_init' );


/**
 * Add parent class on all parent menu items
 *
 */
add_filter('wp_nav_menu_objects', function ($items) {
	$hasSub = function ($menu_item_id, &$items) {
		foreach ($items as $item) {
			if ($item->menu_item_parent && $item->menu_item_parent==$menu_item_id) {
				return true;
			}
		}
		return false;
	};
	$allParents = array();

	foreach ($items as &$item) {
		if ($hasSub($item->ID, &$items)) {
			$allParents[] = $item->ID;
			$item->classes[] = 'has-flyout';
			$item->classes[] = 'has-dropdown'; // all elements of field "classes" of a menu item get join together and render to class attribute of <li> element in HTML
		}
	}
	return $items;
});


//Theme
require_once(dirname(__FILE__).'/library/theme-options.php');

//Include shortcodes
require_once(dirname(__FILE__).'/library/shortcodes.php');

// Numeric Page Navi (built into the theme by default)
function foundation_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) {
		return;
	}
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ul class="pagination">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = "First";
		echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">&laquo;</a></li>';
	}
	echo '<li class="bpn-prev-link">';
	previous_posts_link('&lt;');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="current"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="bpn-next-link">';
	next_posts_link('&gt;');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = "Last";
		echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">&raquo;</a></li>';
	}
	echo '</ul></nav>'.$after."";
} /* end page navi */



/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
    $background_color = get_background_color();

    if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
        $classes[] = 'full-width';

    if ( is_page_template( 'page-templates/front-page.php' ) ) {
        $classes[] = 'template-front-page';
        if ( has_post_thumbnail() )
            $classes[] = 'has-post-thumbnail';
        if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
            $classes[] = 'two-sidebars';
    }

    if ( empty( $background_color ) )
        $classes[] = 'custom-background-empty';
    elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
        $classes[] = 'custom-background-white';

    // Enable custom font class only if the font CSS is queued to load.
    if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
        $classes[] = 'custom-font-enabled';

    if ( ! is_multi_author() )
        $classes[] = 'single-author';

    return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );
function custom_taxonomies_terms_links() {
	$return = null;
    global $post, $post_id;
    // get post by post id
    $post = &get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $taxonomies = get_object_taxonomies($post_type);
    foreach ($taxonomies as $taxonomy) {
        // get the terms related to post
        $terms = get_the_terms( $post->ID, $taxonomy );
        if ( !empty( $terms ) ) {
            $out = array();
            foreach ( $terms as $term )
                $out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
            $return = join( ', ', $out );
        }
    }
    return $return;
} 
