<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php
	// get the current page url (used for rel canonical and open graph tags)
	global $current_url;
	$current_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sm.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-med.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-lg.png" />	

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    <?php print_ad_script("home page"); ?>
</head>

<body <?php body_class(); ?>>
	<?php include_once("analyticstracking.php") ?>

	<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-inner full-container">
			<button id="menu-toggle" class="toggle">
				<svg version="1.1" class="menu-toggle-image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
					<g id="menu">
						<g>
							<rect x="3" y="4" width="18" height="3"/>
							<rect x="3" y="10" width="18" height="3"/>
							<rect x="3" y="16" width="18" height="3"/>
						</g>
					</g>
				</svg>
			</button>
			<div class="article-square-logo" style="padding: 0px 25px; display:block !important;">
				<a style="float:left;border-bottom: none; padding: 5.5px" href="<?php echo home_url() ?>">
					<img class="nav-logo" style="width: 35px; background: #F4F4F4; margin: 5px" src="<?php echo get_stylesheet_directory_uri();?>/images/square_logo.png">
				</a>
				<div style="top: 15px; left: 0; display: block !important; text-align: center; position: absolute; width: 100%; z-index: -1; text-transform: uppercase; font-weight: 300; font-family: 'Helvetica', Helvetica, Arial, 'Lucida Grande', sans-serif;">
					<?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?>
				</div>
				<div id="search-icon">
						<div id="search-icon-icon">
							<div class="vantage-icon-search">
								<span class="genericon genericon-search"></span>
							</div>
						</div>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div><!-- .site-header-inner -->
	</header><!-- #masthead -->

	<div id="toggle-sidebar">
		<button id="menu-close"></button>
		<div class="menu-wrapper">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'hoy-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
		</div>
		<footer class="entry-meta">
			<div>
				<div style="text-align:center; font-family:helvetica; font-weight:300; letter-spacing:0.5px; height:30px">Síganos en:</div>
				<div style="height: 42px; text-align:center">
					<a href="https://twitter.com/vivelohoy" target="_blank" style="padding-right:10px; border: none;"><span class="genericon genericon-twitter" style="color: #55acee"></span></a>
					<a href="https://www.facebook.com/HoyMedia" style="padding-right:20px; border: none;" target="_blank"><span class="genericon genericon-facebook" style="margin-right: 5px; color:#3b5998"></span></a>	
					<a href="http://instagram.com/vivelohoy" style="padding-right:10px;border: none;"><span class="genericon genericon-instagram" style="color: #3f729b"></span></a>
					<a href="https://www.youtube.com/user/VIVELOHOY" style="border: none;"><span class="genericon genericon-youtube" style="color:#b31217;"></span></a>
				</div>
			</div>
				<div id="footer-content" style="border-top:1px solid #E6E6E6">
				© 2014 Hoy<br>
			    <a href="/about-vivelohoy/"> Acerca de nosotros</a>
			    <a href="/terminos-de-servicio/"> Términos de servicio</a>
				<a href="/politica-de-confidencialidad"> Política de privacidad</a>
				<a href="/advertise"> Advertise</a>
			</div>
		</footer>
	</div>