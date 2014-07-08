<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
	<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		
<!-- TOP LEADERBOARD AD -->	
<?php if ( get_post_format() === false ) : ?>
	<div id="topleaderboard-post">
	<iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe>
	</div>
<?php endif; // get_post_format() ?>
<!-- TOP LEADERBOARD AD -->
		


			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>	
			<?php endwhile; ?>
			

<!-- BOTTOM LEADERBOARD AD -->	
	<div id="bottomleaderboard-post">
	<iframe id="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=%s;ord=%s" height="90" width="728" vspace="0" hspace="0" marginheight="0" marginwidth="0" align="center" frameborder="0" scrolling="no" src="http://ad.doubleclick.net/adi/trb.vivelohoy2/hp;tile=1;ptype=sf;pos=1;sz=728x90;u=http://www.vivelohoy.com/;ord=86950313"></iframe>
	</div>
<!-- BOTTOM LEADERBOARD AD -->




<!-- deactivated footer until we get ifinite scroll -->
<?php // get_footer();  ?>
