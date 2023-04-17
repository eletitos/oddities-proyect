<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package oddities
 */

get_header();
?>

	<section id="primary" class="absolute inset-0">
		<main id="main" class="h-screen bg-blue flex flex-col justify-center items-center">


				<img class="w-[80px]" src="<?php echo get_template_directory_uri(); ?>/icons/octopus.png" alt="not found icon">
				<div class="font-cool text-pink text-[35px] md:text-[60px]">
				ooooooops
				</div>
				<h1 class="text-yellow text-[45px] text-center font-header leading-tight p-7 max-w-3xl">This page doesn’t exist but you do and that’s pretty cool.</h1>

		</main><!-- #main -->
	</section><!-- #primary -->
</div><!-- #content -->
</div> <!-- #page -->

<?php
wp_footer();

