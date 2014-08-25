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
<?php global $ADS_ENABLED; if ( $ADS_ENABLED ) : ?>
	<?php 
		if ( 'gallery' !== get_post_format() ) {
			print_ad_script("s");
		} else {
			print_ad_script("pg");
		}
	?>
<?php endif; // End if ( $ADS_ENABLED ) ?>
</head>

<body <?php body_class(); ?>>
	<?php include_once("analyticstracking.php") ?>

	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					
					<div id="hoy-menu" style="display:none">
						<div id="menu-global-navigation" class="hoy-menu">
							<ul>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'hoy-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
							</ul>
							
								<footer class="entry-meta" style="padding: 12px 10px 70px 50px; margin-top:0; border-bottom: none" >
									<div id="footer-content" style="border-top:1px solid #E6E6E6"> 
											© 2014 Hoy      
								            <a href="/about-vivelohoy/"> Acerca de nosotros</a>
								            <a href="/advertise"> Advertise</a>
								            <a href="/terminos-de-servicio/"> Términos de servicio</a>
								 			<a href="/politica-de-confidencialidad"> Política de privacidad</a>
									</div>
								</footer>
						</div>
					</div>

					<div class="new-menu">		
						<a class="screen-reader-text skip-link" href="#main" title="Skip to content">Saltar al contenido</a>
						<span id="hoy-menunav" class="genericon genericon-menu"></span>
						<ul class="hoy-navicon">
							<li><a href="<?php echo home_url() ?>"><img class="nav-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/hoy-logo.png"></a></li>
						</ul>

						<ul class="hoy-socicon">
							<li><a href="#" onclick="toggle_visibility('hoy-social');"><i class="icon-export"></i></a></li>
							<a href="#" onclick="toggle_visibility('search');"><span style="margin: 6px 7px 0 2px; color: #000" class="genericon genericon-search"></span></a>
						</ul>
							<?php get_search_form() ?>					
					</div>
					

				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->
		<script type="text/javascript">
		    function toggle_visibility(id) {
		    	event.preventDefault();
		       var e = document.getElementById(id);
		       if(e.style.display == 'block')
		          e.style.display = 'none';
		       else
		          e.style.display = 'block';
		    }
		</script>
		<div id="hoy-social">
			<div style="width: 200px; float: right;">
				<div class="hoy-social-box">
							<ul style="list-style-type: none; padding: 0 20px">
								<li style="text-align:center; font-family:helvetica; font-weight:200; letter-spacing:0.5px">Compártelo</li>
								<hr>
								<li style="float:left"><a class="twitter_link" href="http://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-twitter" style="color: #55acee"></span></a></li>
								<li style="float:left; margin-right:10px"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><span class="genericon genericon-facebook" style="margin-right: 5px; color:#3b5998"></span></a></li>			
								<li><a href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>"><span class="genericon genericon-mail"></span></a></li>
							</ul>
				</div>
			</div>
		</div>