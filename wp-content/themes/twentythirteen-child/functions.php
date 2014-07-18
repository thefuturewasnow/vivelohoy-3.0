<?php
 
	
// Reset theme to only provide video and gallery post formats in addition to Standard (considered no format)
// See http://codex.wordpress.org/Post_Formats#Formats_in_a_Child_Theme
add_action( 'after_setup_theme', 'childtheme_formats', 11 );
function childtheme_formats(){
     add_theme_support( 'post-formats', array( 'gallery' ) );
}


// Changing WP Gallery Default Settings
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'custom_gallery');


function custom_gallery($attr) {
	// hard-coding these values so that they can't be broken
	$attr['columns'] = 1;
	$attr['size'] = 'full';
	$attr['link'] = 'none';
	// Let the normal gallery shortcode handler do the rest
	return gallery_shortcode( $attr );
}

// Add Author Links 
function add_to_author_profile( $contactmethods ) {
	
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);

/**
 * Overiding post_nav function
 */
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Navegación', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Anterior', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Siguiente', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
/**
 * Overiding paging_nav function
 */

function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Anterior', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Siguiente <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/**
 * Enqueue scripts and styles for the front end.
 *
 */
function vivelohoy_scripts_styles() {
	// Loads script to insert leaderboard ads in galleries
	wp_enqueue_script( 'gallery-leaderboard-script', get_stylesheet_directory_uri() . '/js/gallery-alternating-leaderboards.js', array( 'jquery' ), '2014-07-10', true );
	// Loads script to insert leaderboard ads between posts in the loop
	wp_enqueue_script( 'loop-leaderboard-script', get_stylesheet_directory_uri() . '/js/loop-alternating-leaderboards.js', array( 'jquery' ), '2014-07-14', true );
	// Loads script to insert cube ad before second paragraph in standard post body
	wp_enqueue_script( 'standard-ad-cube', get_stylesheet_directory_uri() . '/js/standard-ad-cube.js', array( 'jquery' ), '2014-07-15', true );
}
add_action( 'wp_enqueue_scripts', 'vivelohoy_scripts_styles' );

// Custom Editor Style CSS - Able to style TinyMCE
function my_theme_add_editor_styles() {
    add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

add_action('after_setup_theme', 'vivelohoy_theme_setup');
function vivelohoy_theme_setup(){
    load_theme_textdomain('twentythirteen-child', get_stylesheet_directory() . '/languages');
}