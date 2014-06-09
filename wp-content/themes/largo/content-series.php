<?php
/**
 * The template for displaying content on a series landing page
 */
global $opt, $tags;	//get display options for the loop

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<header>
 		<h2 class="entry-title">
 			<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
 		</h2>

 		<?php if ( $opt['show']['byline'] ) : ?>
 		<h5 class="byline"><?php largo_byline(); ?></h5>
 		<?php endif; ?>
	</header><!-- / entry header -->

	<div class="entry-content">
 		<?php if ( $opt['show']['image'] ) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		<?php endif; ?>

 		<?php if ( $opt['show']['excerpt'] ) :
			largo_excerpt( $post, 5, true, __('Continue&nbsp;Reading&nbsp;&rarr;', 'largo'), true, false );
		endif; ?>

    <?php if ( $opt['show']['tags'] && largo_has_categories_or_tags() ) { ?>
    	<h5 class="tag-list"><strong><?php _e('Filed under:', 'largo'); ?></strong> <?php largo_categories_and_tags( 8 ); ?></h5>
    	<?php } ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->