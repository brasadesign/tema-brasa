<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Tema Brasa
 * @since Twenty Eleven 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

<!-- FONTES GOOGLE DO BRASA THEME -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

<!-- TOGGLE RODAPE -->
<script type="text/javascript">
jQuery(function(){
	jQuery(".slide-btn").click(function(){
		jQuery("#panel").slideToggle("slow");
		jQuery(this).toggleClass("active");
		return false;
	});
});
</script>

<!-- Chamar e rodar o magnificPopup -->
<script type="text/javascript">
jQuery(function() {
       jQuery('.open-popup-link').magnificPopup({
         type:'inline',
         midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
       });
});
       jQuery("document").ready(function() {
       jQuery('.open-popup-link').trigger('click');
		});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="single-page">
	<header id="branding" role="banner">

	<?php if ( is_singular('post') || is_home() ):?>


		<div id="blog-header">
			<a href="<?php echo home_url('/blog'); ?>">

				<img src="<?php echo get_stylesheet_directory_uri() . "/images/header-blog.jpg" ?>" alt="" />

			</a>
		</div><!-- blog-header -->

		<?php else : ?>

		<div id="logo">
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>">

			<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :
			?>
				<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
			<?php endif; // end check for removed header image ?>

			</a>
		</div><!--logo end-->

		<?php endif; ?>
	</header><!-- #branding -->

		<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content' ); ?>"><?php _e( 'Skip to primary content' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#colophon" title="<?php esc_attr_e( 'Skip to secondary content' ); ?>"><?php _e( 'Skip to secondary content' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->


	<div id="main">
