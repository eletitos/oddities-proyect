<?php
/**
 * The template for unsuscribe page
 *
 * @link https://odditieskin.com/newsletter-unsubscribe/
 *
 * @package oddities
 */

get_header();
?>

	<section id="primary" class="absolute inset-0">
		<main id="main" class="h-screen bg-blue flex flex-col justify-center items-center mb-10">


				<img class="w-[80px]" src="<?php echo get_template_directory_uri(); ?>/icons/octopus.png" alt="not found icon">
				<div class="font-cool text-pink text-[35px] md:text-[60px]">
				oh noooo!
				</div>
				<h1 class="text-yellow text-[45px] text-center font-header leading-tight p-7 max-w-3xl">We're are sorry you don't want to stay with us anymore.</h1>
				<a href="<?php echo get_home_url(); ?>/shop" class="text-pink font-display text-[13px] px-5 py-3 md:hover:bg-lilac rounded-full border-pink border-2 md:hover:border-lilac md:hover:text-blue">HAVE A LOOK</a>

		</main><!-- #main -->
	</section><!-- #primary -->
</div><!-- #content -->
</div> <!-- #page -->

<?php
wp_footer();
