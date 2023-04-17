<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oddities
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php oddities__post_thumbnail(); ?>

	<div class="entry-content prose">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'oddities' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
