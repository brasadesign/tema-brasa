<?php

// Adiciona Minhas Opções
require_once( get_stylesheet_directory() . '/options/admin_options.php' );

// Adiciona a função the_excerpt às Páginas
add_post_type_support( 'page', 'excerpt' );

add_theme_support( 'post-thumbnails' );


// Make Tema Brasa available for translation. Translations can be added to the /languages/ directory.
load_theme_textdomain( 'twentyeleven', get_template_directory() . '/languages' );

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// Grab Twenty Eleven's Ephemera widget.
require( get_template_directory() . '/inc/widgets.php' );

//Add support for a custom header image.
//require( get_template_directory() . '/inc/custom-header.php' );


//Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';


// Add default posts and comments RSS feed links to <head>.
add_theme_support( 'automatic-feed-links' );


// Add support for a variety of post formats
// add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

// This theme supports custom background color and image, and here we also set up the default background color.
//add_theme_support( 'custom-background', array(
//'default-color' => 'e6e6e6',
//) );

// This theme uses wp_nav_menu() in one location.
register_nav_menu( 'primary', __( 'Primary Menu', 'tema_brasa' ) );


/* Redefine the header image width and height ********************************************/
//define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentytwelve_header_image_width', 460 ) );
//define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentywelve_header_image_height', 290 ) );

// Register sidebars and widgetized areas.

function tema_brasa_widgets_init() {


	register_sidebar( array(
		'name'          => __( 'Barra Lateral Principal', 'tema_brasa' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
		'name'          => __( 'Primeira Area do Rodape', 'tema_brasa' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Segunda Area do Rodape', 'tema_brasa' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Terceira Area do Rodape', 'tema_brasa' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
		'name'          => __( 'Primeira Area do Rodape das LandPages', 'tema_brasa' ),
		'id'            => 'sidebar-6',
		'description'   => __( 'An optional widget area for your land page footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Segunda Area do Rodape das LandPages', 'tema_brasa' ),
		'id'            => 'sidebar-7',
		'description'   => __( 'An optional widget area for your land page footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Terceira Area do Rodape das LandPages', 'tema_brasa' ),
		'id'            => 'sidebar-8',
		'description'   => __( 'An optional widget area for your land page footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'tema_brasa_widgets_init' );


/**
 * Add two classes to the array of body classes.
 *
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Twenty Eleven 1.0
 *
 * @param array $classes Existing body classes.
 *
 * @return array The filtered array of body classes.
 */
function twentyeleven_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) ) {
		$classes[] = 'singular';
	}

	if(wp_is_mobile()){
		$classes[] = 'is-mobile';
	}

	return $classes;
}

add_filter( 'body_class', 'twentyeleven_body_classes' );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );


//include new jQuery

function my_scripts_method() {
	//wp_deregister_script( 'jquery' );
	//wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'mobile-nav', get_stylesheet_directory_uri() . '/js/mobile_nav.js', array( 'jquery' ) );
	if ( ! is_home() && ! is_front_page() ) {
		// Chamando o LigthBox Magnific!
		wp_enqueue_script( 'jquery.magnific-popup', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri() . '/js/magnific-popup.css' );
		wp_enqueue_script( 'custom-magnific-popup', get_stylesheet_directory_uri() . '/js/custom-magnific-popup.js', array( 'jquery.magnific-popup' ), '', true );
	}
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

// Acabaram as coisas do Tema Brasa especificamente

// Remove notificações de update do WP para usuários abaixo do Administrador
global $user_login;
get_currentuserinfo();
if ( ! current_user_can( 'update_plugins' ) ) { // checks to see if current user can update plugins
	add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

// Remove o Item Editar do menu Aparência
function remove_editor_menu() {
	remove_action( 'admin_menu', '_add_themes_utility_last', 101 );
}

add_action( '_admin_menu', 'remove_editor_menu', 1 );

// Custom login
function my_custom_login_logo() {
	echo '<style type="text/css">
        h1 a { background:url(' . get_bloginfo( 'stylesheet_directory' ) . '/images/logo-medio.png) no-repeat scroll center top !important;
                height: 180px !important; width: 235px !important;  margin-top: -40px !important;  margin-left: 55px !important;
                overflow: hidden;
                }
                body { background-image:url(' . get_bloginfo( 'stylesheet_directory' ) . '/images/bg-2000-1250.jpg) !important; }
                #login { padding: 70px 0 0; }

    </style>';
}

add_action( 'login_head', 'my_custom_login_logo' );

// Remove Widgets do Wp-Admin
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );

}

add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

/**
 * Desabilita o script HeartBeat no Admin, exceto em post.php e post-new.php.
 * E aumenta o intervado para 60 segundos.
 */
add_action( 'init', 'brasa_deregister_heartbeat', 1 );
function brasa_deregister_heartbeat() {
	global $pagenow;

	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow ) {
		wp_deregister_script( 'heartbeat' );
	}
}

function brasa_settings_heartbeat( $settings ) {
	$settings['interval'] = 60;

	return $settings;
}

add_filter( 'heartbeat_settings', 'brasa_settings_heartbeat' );

// Insere os metaboxes (MetaBrasa) no CPT Portolio
require_once( get_stylesheet_directory() . '/metaboxes-portfolio.php' );
//if(is_tax('portfolio_category') || is_singular('portfolio')){
//	die('skies is blues, and makes me cry (8)');
//	require_once (get_stylesheet_directory() . '/functions-portfolio.php');
//}
// Adiciona o tamanho de imagem GALERIA
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'galeria', 500, 500, true );
}


// Fun��o do Carousel na Unha.
function load_caroufredsel() {
	$path_theme = get_bloginfo( 'stylesheet_directory' );
	wp_register_script( 'caroufredsel', $path_theme . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), '6.2.1', true );
	wp_enqueue_script( 'caroufredsel_pre', $path_theme . '/js/caroufredsel_pre.js', array( 'caroufredsel' ), '', true );
	wp_enqueue_script( 'custom-hover', $path_theme . '/js/custom-hover.js' );
	if ( is_tax( 'jetpack-portfolio-type' ) || is_singular( 'jetpack-portfolio' ) ) {
		wp_enqueue_style( 'style-portfolio', get_stylesheet_directory_uri() . '/style-portfolio.css' );
	}
	else{
		wp_enqueue_style( 'style-default', get_stylesheet_directory_uri() . '/style-default.css' );
		wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/bootstrap.css' );
	}
}

add_action( 'wp_enqueue_scripts', 'load_caroufredsel' );


// Fun��o para usar o Thickbox nativo do WP no tema Portfolio Brasa
function add_themescript() {
	if ( ! is_admin() ) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'thickbox', null, array( 'jquery' ) );
		wp_enqueue_style( 'thickbox.css', '/' . WPINC . '/js/thickbox/thickbox.css', null, '1.0' );
	}
}

add_action( 'init', 'add_themescript' );

//change slug portfolio tax
//add_action( 'jetpack-portfolio-type_rewrite_rules', 'tax_portfolio_jetpack' );
function tax_portfolio_jetpack($rule) {
	//var_dump($rule);
	foreach ($rule as $key => $value){
		unset ($rule[$key]);
		$new_key = str_replace('project-type', 'portfolio-type', $key);
		$rule[$new_key] = $value;
	}
	return $rule;
}

function shortcode_date( $atts ){
	$time = strtotime( date( 'd-m-Y' ) );
	$final = date('d\/m', strtotime('+1 month', $time));
    return '<span class="shortcode_date">' . $final . '</span>';
}

add_shortcode( 'data', 'shortcode_date' );

require_once get_stylesheet_directory() . '/inc/custom-types.php';
if (!function_exists('get_field')) {
  function get_field($field) {
  	global $post;
  	return get_post_meta($post->ID, $field, true);
  }
}
if (!function_exists('the_field')) {
  function the_field($field) {
  	global $post;
  	echo get_field($field);
  }
}
function team_query( $query ) {
    if ( is_post_type_archive('equipe') ) {
        $query->set( 'orderby', 'rand' );
        return;
    }
}
add_action( 'pre_get_posts', 'team_query' );

function clipping_query_shortcode($atts) {

   // EXAMPLE USAGE:
   // [loop the_query="showposts=100&post_type=page&post_parent=453"]

   // Defaults
   extract(shortcode_atts(array(
      "the_query" => '',
      "title" => ''
   ), $atts));

   // de-funkify query
   $the_query = preg_replace('~&#x0*([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $the_query);
   $the_query = preg_replace('~&#0*([0-9]+);~e', 'chr(\\1)', $the_query);

   // query is made
   query_posts($the_query);

   // Reset and setup variables
   $output = '';
   $temp_title = '';
   $temp_link = '';

   $output .= "<div class='row short-loop'>";
   if (!empty($title)) {
	   $output .=  "<h3>" . $title . "</h3>";
   }

   // the loop
   if (have_posts()) : while (have_posts()) : the_post();

      $temp_title = get_the_title($post->ID);
      $temp_link = get_permalink($post->ID);
      $temp_excerpt = get_the_content($post->ID);

      // output all findings - CUSTOMIZE TO YOUR LIKING
      $output .= "<span class='col-md-5 each'>";
      $output .= "<h3>" . $temp_title . "</h3>";
      $output .= "<span class='desc'>";
      $output .= $temp_excerpt;
      $output .= "</span>";
      $output .= "</span>";

   endwhile; else:

      $output .= "nothing found.";

   endif;

   wp_reset_query();

   $output .= "</div>";

   return $output;

}
add_shortcode("loop", "clipping_query_shortcode");

function exclude_category( $wp_query ) {
	if( !is_admin() && $wp_query->is_main_query() ) {
		$wp_query->set( 'cat', '-83' );
	}
}
add_action( 'pre_get_posts', 'exclude_category' );

function exclude_widget_categories( $args ){
	$exclude = "83";
	$args["exclude"] = $exclude;
	return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");


// Include the Google Analytics Tracking Code (ga.js)
// @ https://developers.google.com/analytics/devguides/collection/gajs/
function google_analytics_tracking_code(){

	?>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40375752-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<?php 
}

// include GA tracking code before the closing head tag
add_action('wp_head', 'google_analytics_tracking_code');

// OR include GA tracking code before the closing body tag
// add_action('wp_footer', 'google_analytics_tracking_code');
