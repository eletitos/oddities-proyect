<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oddities
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header relative max-w-content mx-auto lg:px-28 px-5 mt-12 lg:mt-14 xl:mt-20 2xl:mt-28">

		<div class="absolute z-[2] -translate-y-6 right-0 left-0">
			<div class="w-fit mx-auto bg-white border-2 border-blue px-8 py-3 rounded-[50%] font-display text-[13px]"><?php echo __( 'ODD ONES', 'oddities' ) ?></div>
		</div>

		<!-- Post image -->
		<?php
			if ( has_post_thumbnail() ):
		?>

		<div class="post-image pt-[132%] sm:pt-[45%] relative overflow-hidden">
			<?php oddities__post_thumbnail(); ?>
		</div>

		<?php
		endif;
		?>


		<!-- Metadatas -->
		<?php if ( ! is_page() ) : ?>
			<div class="entry-meta my-8">

				<?php oddities__entry_meta(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title text-[53px] md:text-[80px] xl:text-[100px] 2xl:text-[120px] leading-none max-w-5xl ml-0">', '</h1>' ); ?>


	</header><!-- .entry-header -->



	<div class="entry-content prose md:prose-figure:max-w-[50%] prose-blockquote:font-cool pb-10">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'oddities' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);


		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer relative max-full mt-12 lg:mt-14 xl:mt-20 2xl:mt-28 bg-yellow border-t-blue  border-y-2 pb-6 lg:pb-16">

		<!-- Elipse title -->
		<div class="absolute z-[2] -translate-y-6 right-0 left-0">
			<div class="w-fit mx-auto bg-white border-2 border-blue px-8 py-3 rounded-[50%] font-display text-[13px]"><?php echo __( 'ODD ONES', 'oddities' ) ?></div>
		</div>

		<!-- Subtitle -->
		<div class="font-cool-regular text-center mt-10 mb-4 lg:mb-8">
			<?php
				echo __('Reading is good for you' , 'oddities');
			?>
		</div>

		<!-- Related posts -->
		<?php oddities_the_related_posts(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->
