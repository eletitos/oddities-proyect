<?php
/**
 * The blog template file
 *
 * This is the template file for the blog archive page (oddones). Check the hierarchy
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oddities
 */

get_header();
?>

	<section id="primary">
		<main id="main">

			<div class="blog-header relative">
				<div class="pt-[132%] sm:pt-[45%] relative overflow-hidden">
					<div class="absolute top-0 bottom-0 rigth-0 left-0 w-full">

						<?php echo wp_get_attachment_image( get_theme_mod('blog_archive_image'), "", "", array( "class" => "object-cover min-h-full min-w-full", 'loading' => 'eager' )  )?>



					</div>
				</div>
				<div class="title md:absolute w-full bottom-0">
					<h1 class="text-center bg-pink md:max-w-2xl lg:max-w-4xl mx-auto text-[32px] md:text-[50px] lg:text-[68px] leading-[1.1] border-t-2 md:border-r-2 md:border-l-2 border-blue px-4 md:px-10 pt-7 pb-10 md:pb-16">
						<?php echo get_theme_mod('blog_archive_title')?>
					</h1>
				</div>
			</div>


			<div class="content bg-yellow border-t-2 border-blue relative">
				<div class="w-fit mx-auto bg-white border-2 border-blue px-8 py-3 rounded-[50%] font-display text-[13px] -translate-y-6"><?php echo __( "LET'S SEE", 'oddities' ) ?></div>
				<!-- <div class="pt-28 w-full"></div> -->



		<?php

		if ( have_posts() ) {

			?>
			<div class="entry-content">
			<ul class="flex flex-wrap">
			<?php

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content', 'postgrid' );
			}

			?>
			</ul>
			</div>

			<div class="pt-10 pb-8"><?php oddities__the_posts_navigation(); ?></div>
			</div>
			<?php

			// Previous/next page navigation.



		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}

		?>
	<div class="py-2 border border-blue relative z-[7] bg-white">
	<?php

	echo do_shortcode('[marquee text="Pairing is caring - this is a cold world, bundle up - great alone, better together"]');

	?>
	</div>
	<?php

		echo do_shortcode( '[products limit=4 category=pack]' );
		get_footer();
		?>
